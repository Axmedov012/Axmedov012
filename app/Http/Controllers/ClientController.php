<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;


class ClientController extends Controller
{

    public function index():View
    {
        $clients = Client::paginate(20);
        return view('clients.index',compact('clients'));
    }

    public function create():View
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request):RedirectResponse
    {
        Client::create($request->validated());
        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        Gate::authorize(PermissionEnum::DELETE_CLIENTS->value);
        $client->delete();
        return redirect()->route('clients.index');
    }
}
