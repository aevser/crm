<?php

namespace App\Jobs\Leads\Classes;

use App\Models\LeadClass;
use Illuminate\Foundation\Bus\Dispatchable;

class Delete
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $leadsClassId
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $leadsClass = LeadClass::findOrFail($this->leadsClassId)->delete();

        return $leadsClass;
    }
}
