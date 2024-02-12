<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\Projects;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = \App\Jobs\Projects\Index::dispatchSync();

        return response()->json(['projects' => $projects], 200);
    }

    public function show($projectsId)
    {
        $projects = \App\Jobs\Projects\Show::dispatchSync($projectsId);

        return response()->json(['projects' => $projects], 200);
    }

    public function store(Request $request)
    {
        $token = Str::random(60);

        $projects = \App\Jobs\Projects\Create::dispatchSync(
            user_id: $request->user_id,
            name: $request->name,
            settings: $request->settings,
            api_token: $token,
            timezone: $request->timezone,
            enabled: $request->enabled,
            lead_validation_days: $request->lead_validation_days,
            detect_region: $request->detect_region,
            calltracking: $request->calltracking,
            leads_today: $request->leads_today,
            leads_total: $request->leads_total,
        );

        return response()->json(['success' => 'Проект успешно добавлен'], 200);
    }

    public function update(Request $request, $projectsId)
    {
        $existingProject = Project::findOrFail($projectsId);

        $token = $existingProject->api_token ?? Str::random(60);

        $projects = \App\Jobs\Projects\Update::dispatchSync(
            projectsId: $projectsId,
            user_id: $request->user_id,
            name: $request->name,
            settings: $request->settings,
            api_token: $token,
            timezone: $request->timezone,
            enabled: $request->enabled,
            lead_validation_days: $request->lead_validation_days,
            detect_region: $request->detect_region,
            calltracking: $request->calltracking,
            leads_today: $request->leads_today,
            leads_total: $request->leads_total,
        );

        return response()->json(['success' => 'Данные проекта успешно обновлены'], 200);
    }

    public function destroy(Request $request, $projectsId)
    {
        $projects = \App\Jobs\Projects\Delete::dispatchSync($projectsId);

        return response()->json(['success' => 'Проект успешно удален'], 200);
    }
}
