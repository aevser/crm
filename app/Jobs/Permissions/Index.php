<?php

namespace App\Jobs\Permissions;

use App\Models\Permission;
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
        $permissions = Permission::with(['user:id,name', 'project:id,name'])
            ->select(['id', 'user_id', 'project_id'])
            ->simplePaginate(20);

        return $permissions;
    }
}
