<?php

namespace App\Jobs\Projects;

use App\Models\Project;
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
        $projects = Project::with(['user:id,name'])
            ->select(['id', 'name', 'user_id'])
            ->simplePaginate(20);

        return $projects;
    }
}
