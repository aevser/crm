<?php

namespace App\Jobs\Leads;

use App\Models\Lead;
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
        $leads = Lead::all();

        return $leads;
    }
}
