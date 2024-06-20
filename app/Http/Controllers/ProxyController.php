<?php

namespace App\Http\Controllers;

use App\Jobs\ProxiesCheckerJob;
use App\Models\Proxy;
use App\Services\ProxyService;
use Illuminate\Http\Request;

class ProxyController extends Controller
{
    public function __construct(
        private readonly ProxyService $service
    )
    {
    }

    public function index()
    {
        $groups = Proxy::query()->select('group_id')->get()->groupBy('group_id');
        return view('index', compact('groups'));
    }

    public function test(Request $request)
    {
        $groupId = (Proxy::query()->max('group_id') + 1) ?? 1;

        $proxies = Proxy::query()->where('group_id', 1)->get();
        $this->service->checkProxies($proxies);

        ProxiesCheckerJob::dispatch($groupId);
    }

    public function proxiesToGroup(Request $request, int $groupId)
    {
        $proxies = Proxy::query()->where('group_id', $groupId)->get();
        return view('proxies', compact('proxies'));
    }
}
