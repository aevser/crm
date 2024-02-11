<?php

namespace App\Jobs\Roles;

use App\Models\Role;
use Illuminate\Foundation\Bus\Dispatchable;

class Create
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $user_id,
        private ?bool $create_projects,
        private ?bool $manage_users,
        private ?bool $manage_permissions,
        private ?bool $edit_projects,
        private ?bool $global_settings,
    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $roles = Role::create([
            'user_id' => $this->user_id,
            'create_projects' => $this->create_projects,
            'manage_users' => $this->manage_users,
            'manage_permissions' => $this->manage_permissions,
            'edit_projects' => $this->edit_projects,
            'global_settings' => $this->global_settings
        ]);

        return $roles;
    }
}
