<?php

namespace App\Jobs\Leads\Classes;

use App\Models\LeadClass;
use Illuminate\Foundation\Bus\Dispatchable;

class Update
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $leadsClassId,
        private int $project_id,
        private string $name,
        private string $color,
        private string $type
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $leadsClass = LeadClass::findOrFail($this->leadsClassId);

        $leadsClass->update([
            'project_id' => $this->project_id,
            'name' => $this->name,
            'color' => $this->color,
            'type' => $this->type
        ]);

        return $leadsClass;
    }
}
