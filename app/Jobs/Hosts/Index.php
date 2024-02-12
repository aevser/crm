<?php

namespace App\Jobs\Hosts;

use App\Models\Host;
use Illuminate\Foundation\Bus\Dispatchable;

class Index
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $hosts = Host::with(['project:id,name'])
            ->select(['id', 'url', 'project_id'])
            ->simplePaginate(20);

        return $hosts;
    }
}
