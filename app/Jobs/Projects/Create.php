<?php

namespace App\Jobs\Projects;

use App\Models\Project;
use Illuminate\Foundation\Bus\Dispatchable;

class Create
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int $user_id,
        private ?string $name,
        private ?string $settings,
        private ?string $api_token,
        private ?string $timezone,
        private ?bool $enabled,
        private ?int $lead_validation_days,
        private ?bool $detect_region,
        private ?bool $calltracking,
        private ?int $leads_today,
        private ?int $leads_total

    )

    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $projects = Project::create([
            'user_id' => $this->user_id,
            'name' => $this->name,
            'settings' => $this->settings,
            'api_token' => $this->api_token,
            'timezone' => $this->timezone,
            'enabled' => $this->enabled,
            'lead_validation_days' => $this->lead_validation_days,
            'detect_region' => $this->detect_region,
            'calltracking' => $this->calltracking,
            'leads_today' => $this->leads_today,
            'leads_total' => $this->leads_total,
        ]);

        return $projects;
    }
}
