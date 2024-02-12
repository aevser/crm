<?php

namespace App\Jobs\Hosts;

use App\Models\Host;
use Illuminate\Foundation\Bus\Dispatchable;

class Destroy
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $hostsId
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $hosts = Host::findOrFail($this->hostsId)->delete();

        return $hosts;
    }
}
