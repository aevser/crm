<?php

namespace App\Jobs\Projects;

use App\Models\Project;
use Illuminate\Foundation\Bus\Dispatchable;

class Show
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $projectsId
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $projects = Project::findOrFail($this->projectsId);

        return $projects;
    }
}
