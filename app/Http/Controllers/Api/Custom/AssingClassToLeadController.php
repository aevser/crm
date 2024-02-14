<?php

namespace App\Http\Controllers\Api\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssingClassToLeadController extends Controller
{
    public function assignClassToLead($project_id, $class_id, $lead_id)
    {
        $leadsClass = \App\Jobs\Leads\Classes\AssingClassToLead::dispatchSync($project_id, $class_id, $lead_id);

        return response()->json(['success' => 'Класс для проекта успешно назчанен лиду'], 200);
    }

    public function removeClassFromLead($lead_id)
    {
        $leadsClass = \App\Jobs\Leads\Classes\RemoveClassFromLead::dispatchSync($lead_id);

        return response()->json(['success' => 'Класс лида успешно снят'], 200);
    }
}
