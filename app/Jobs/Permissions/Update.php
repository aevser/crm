<?php

namespace App\Jobs\Permissions;

use App\Models\Permission;
use Illuminate\Foundation\Bus\Dispatchable;

class Update
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $permissionsId,
        private int $project_id,
        private int $user_id,
        private ?array $fields,
        private ?bool $manage_leads,
        private ?bool $export_data,
        private ?bool $manage_permissions,
        private ?bool $manage_settings,
        private ?bool $manage_project,
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

        $permissions->update([
            'project_id' => $this->project_id,
            'user_id' => $this->user_id,
            'fields' => $this->fields,
            'manage_leads' => $this->manage_leads,
            'export_data' => $this->export_data,
            'manage_permissions' => $this->manage_permissions,
            'manage_settings' => $this->manage_settings,
            'manage_project' => $this->manage_project,
        ]);

        return $permissions;
    }
}
