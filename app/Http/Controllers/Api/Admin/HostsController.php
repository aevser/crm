<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Hosts;

class HostsController extends Controller
{
    public function index()
    {
        $hosts = \App\Jobs\Hosts\Index::dispatchSync();

        return response()->json(['hosts' => $hosts], 200);
    }

    public function store(Hosts\Store $request)
    {
        $hosts = \App\Jobs\Hosts\Create::dispatchSync(
            project_id: $request->project_id,
            url: $request->url
        );

        return response()->json(['success' => 'Хост успешно добавлен'], 200);
    }

    public function update(Hosts\Update $request, $hostsId)
    {
        $hosts = \App\Jobs\Hosts\Update::dispatchSync(
            hostsId: $hostsId,
            project_id: $request->project_id,
            url: $request->url
        );

        return response()->json(['success' => 'Хост успешно обновлен'], 200);
    }

    public function destroy($hostsId)
    {
        $hosts = \App\Jobs\Hosts\Destroy::dispatchSync($hostsId);

        return response()->json(['success' => 'Хост успешно удален'], 200);
    }
}
