<?php

namespace App\Jobs\Leads\Classes;

use App\Models\Lead;
use App\Models\Project;
use Illuminate\Foundation\Bus\Dispatchable;

class AssingClassToLead
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $project_id,
        private int $class_id,
        private int $lead_id
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle() // Назначить класс для лида
    {
        $projects = Project::findOrFail($this->project_id);

        $leads = Lead::where('id', $this->lead_id)
            ->where('project_id', $this->project_id)
            ->first();

        $leads->update([
            'class_id' => $this->class_id
        ]);

        return $leads;
    }
}
