<?php

namespace App\Jobs\Roles;

use App\Models\Role;
use Illuminate\Foundation\Bus\Dispatchable;

class Show
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $rolesId
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $roles = Role::findOrFail($this->rolesId);

        return $roles;
    }
}
