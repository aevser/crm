<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Leads\Classes;

class LeadClassesController extends Controller
{
    public function index()
    {
        $leadsClass = \App\Jobs\Leads\Classes\Index::dispatchSync();

        return response()->json(['leadsClass' => $leadsClass], 200);
    }

    public function store(Classes\Store $request)
    {
        $leadsClass = \App\Jobs\Leads\Classes\Create::dispatchSync(
            project_id: $request->project_id,
            name: $request->name,
            color: $request->color,
            type: $request->type
        );

        return response()->json(['success' => 'Класс лида успешно добавлен'], 200);
    }

    public function update(Classes\Update $request, $leadsClassId)
    {
        $leadsClass = \App\Jobs\Leads\Classes\Update::dispatchSync(
            leadsClassId: $leadsClassId,
            project_id: $request->project_id,
            name: $request->name,
            color: $request->color,
            type: $request->type
        );

        return response()->json(['success' => 'Класс лида успешно обновлен'], 200);
    }

    public function destroy($leadsClassId)
    {
        $leadsClass = \App\Jobs\Leads\Classes\Delete::dispatchSync($leadsClassId);

        return response()->json(['success' => 'Класс лида успешно удален'], 200);
    }
}
