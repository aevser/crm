<?php

namespace App\Jobs\Roles;

use App\Models\Role;
use Illuminate\Foundation\Bus\Dispatchable;

class Delete
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $rolesId,
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $roles = Role::findOrFail($this->rolesId)->delete();

        return $roles;
    }
}
