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
        $proxies = Proxy::query()->get()->groupBy(['group_id']);
        return view('index', compact('proxies'));
    }

    public function test(Request $request)
    {
        $groupId = (Proxy::query()->max('group_id') + 1) ?? 1;

        $proxies = Proxy::query()->where('group_id', 1)->get();
        $this->service->checkProxies($proxies);

        ProxiesCheckerJob::dispatch($groupId);
    }
}
