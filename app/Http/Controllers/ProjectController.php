<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['user','client'])->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::select(['id', 'first_name','last_name'])->get();
        $clients = Client::select(['id','company_name'])->get();
        return view('projects.create', compact('users', 'clients'));
    }

    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());
        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        $users = User::select(['id', 'first_name','last_name'])->get();
        $clients = Client::select(['id','company_name'])->get();
        return view('projects.edit', compact('users', 'clients','project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        Gate::authorize(PermissionEnum::DELETE_PROJECTS->value);
        $project->delete();
        return redirect()->route('projects.index');
    }
}
