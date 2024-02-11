<?php

namespace App\Jobs\Roles;

use App\Models\Role;
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
        $roles = Role::with(['user:id,name'])
            ->select(['id', 'user_id'])
            ->simplePaginate(20);

        return $roles;
    }
}
