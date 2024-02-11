<?php

namespace App\Jobs\Permissions;

use App\Models\Permission;
use Illuminate\Foundation\Bus\Dispatchable;

class Show
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $permissionsId
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $permissions = Permission::findOrFail($this->permissionsId);

        return $permissions;
    }
}
