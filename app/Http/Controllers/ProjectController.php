<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index() {
        $search = request('search');
        if (empty($search)) {
            $projects = Project::paginate(4);
        } else {
            $projects = Project::where(request('searchBy'), 'LIKE', '%'.$search.'%')->paginate(4)->withQueryString();
        }
        return view('projects.index', [
            'projects' => $projects,
            'search' => $search
        ]);
    }

    public function show($id) {
        $project = Project::findOrFail($id);
        $user = User::findOrFail($project->id);
        return view('projects.show', ['project' => $project, 'user' => $user]);
    }

    public function create() {
        return view('projects.create');
    }

    public function store() {
        $project = new Project();
        $project->title = request('title');
        $project->start_date = request('sDate');
        $project->end_date = request('eDate');
        $project->phase = request('phase');
        $project->description = request('description');
        $project->id = Auth::id();
        $project->save();
        return redirect('home');
    }
}