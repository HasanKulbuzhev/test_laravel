<?php

namespace App\Jobs;

use App\Models\Proxy;
use App\Services\ProxyService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProxiesCheckerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private readonly int $groupId,
        private readonly ProxyService $proxiServie
    )
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Proxy::query()->where('group_id', $this->groupId)->chunk(500, function($proxies) {
            $this->proxiServie->checkProxies($proxies);
        });
    }
}
