<?php

namespace App\Jobs\Leads;

use App\Models\Project;
use Illuminate\Foundation\Bus\Dispatchable;

class CountLeads
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

        foreach($projects as $project){
            $leads_today = $project->leads()
                ->whereDate('created_at', today())
                ->count();

            $leads_total = $project->leads()->count();

            $project->update([
                'leads_today' => $leads_today,
                'leads_total' => $leads_total
            ]);
        }
    }
}
