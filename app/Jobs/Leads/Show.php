<?php

namespace App\Jobs\Leads;

use App\Models\Lead;
use Illuminate\Foundation\Bus\Dispatchable;

class Show
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $leadsId
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $leads = Lead::findOrFail($this->leadsId);

        return $leads;
    }
}
