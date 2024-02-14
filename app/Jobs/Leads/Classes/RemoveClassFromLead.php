<?php

namespace App\Jobs\Leads\Classes;

use App\Models\Lead;
use Illuminate\Foundation\Bus\Dispatchable;

class RemoveClassFromLead
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $lead_id
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle() // Снять класс у лида
    {
        $leads = Lead::findOrFail($this->lead_id);

        $leads->update([
            'class_id' => 0
        ]);

        return $leads;
    }
}
