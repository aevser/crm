<?php

namespace App\Jobs\Hosts;

use App\Models\Host;
use Illuminate\Foundation\Bus\Dispatchable;

class Update
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $hostsId,
        private int $project_id,
        private string $url
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $hosts = Host::findOrFail($this->hostsId);

        $hosts->update([
            'project_id' => $this->project_id,
            'url' => $this->url
        ]);

        return $hosts;
    }
}
