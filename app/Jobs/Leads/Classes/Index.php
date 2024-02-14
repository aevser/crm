<?php

namespace App\Jobs\Leads\Classes;

use App\Models\LeadClass;
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
        $leadsClass = LeadClass::all();

        return $leadsClass;
    }
}
