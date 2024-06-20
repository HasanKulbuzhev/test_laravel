<?php

namespace App\Services;

use App\Models\Proxy;
use App\ProxyStatusEnum;
use Curl\Curl;
use Curl\MultiCurl;
use IP2LocationIO\IPGeolocation;

class ProxyService
{
    public function createProxies(int $groupId, string $proxies)
    {
        $proxies = explode("\n", $proxies); // Get each proxy
        $proxyData = [];
        foreach ($proxies as $ip) {
            $splited = explode(':', $ip); // Separate IP and port
            $proxyData[] = [
                'ip' => $splited[0],
                'port' => $splited[1],
                'group_id' => $groupId,
                'status' => ProxyStatusEnum::CREATED->value
            ];
        }

        return Proxy::query()->insert($proxyData);
    }

    public function checkProxies($proxies)
    {
        $multiCurl = new MultiCurl();

        $multiCurl->success(function($instance) {
            Proxy::query()->where('id', $instance->proxy_id)->first()->update([
                'status' => ProxyStatusEnum::SUCCESS->value,
                'type' => $instance->proxy_type,
                'timeout' => $instance?->curl?->total_time ?? null,
                'location' => isset($instance?->curl?->primary_ip) ?
                    $this->getLocationToProxy((string) $instance?->curl?->primary_ip) : null,
                'original_ip' => $instance?->curl?->local_ip ?? null,
            ]);
        });

        $multiCurl->error(function($instance) {
            $proxy = Proxy::query()->where('id', $instance->proxy_id)->first();
            if ($proxy->status === ProxyStatusEnum::CREATED){
                $proxy->update([
                    'status' => ProxyStatusEnum::ERRORS
                ]);
            }
        });

        /** @var Proxy $proxy */
        foreach ($proxies as $proxy) {
            $multiCurl->addCurl($this->getCurlToProxy($proxy, CURLPROXY_SOCKS4));
            $multiCurl->addCurl($this->getCurlToProxy($proxy, CURLPROXY_HTTP));
        }
        $multiCurl->start();
    }
//
//    private function checkProxy(string $ip, string $port = '80'): array|bool
//    {
//        if ( $con = @fopen($ip, $port) ) {
//            fclose($con);
//            return [
//                'type' => 1,
//                'success' => true
//            ];
//        }
//
//        if ( $con = @fsockopen($ip, $port) ) {
//            fclose($con);
//            return [
//                'type' => 1,
//                'success' => true
//            ];
//        }
//
//        return false;
//    }

    private function getLocationToProxy(string $url): string
    {
        /** @var IPGeolocation $ipLocationService */
        $ipLocationService = app(IPGeolocation::class);
        $result = $ipLocationService->lookup($url);
        return sprintf('%s, %s, %s',
            $result->country_name,
            $result->region_name,
            $result->city_name
        );
    }

    private function getCurlToProxy(Proxy $proxy, int $type): Curl
    {
        $curl = new Curl();
        $curl->get('http://google.com');
        $curl->setProxy($proxy->url);
        $curl->setProxyType($type);
        $curl->proxy_id = $proxy->id;
        $curl->proxy_type = $type;
        return $curl;
    }
}
