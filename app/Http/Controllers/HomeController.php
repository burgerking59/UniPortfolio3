<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $search = request('search');
        if (empty($search)) {
            $projects = Project::where("id", Auth::id())->paginate(4);
        } else {
            $projects = Project::where([["id", Auth::id()], [request('searchBy'), 'LIKE', '%'.$search.'%'],])->paginate(4)->withQueryString();
        }

        return view('home', [
            'projects' => $projects,
            'search' => $search
        ]);
    }

    public function edit($pid) {
        $project = Project::findOrFail($pid);
        if (! Gate::allows('confirm-delete', $project)) {
            abort(403);
        }
        return view('edit', ['project' => $project]);
    }

    public function save($pid) {
        $project = Project::findOrFail($pid);
        $project->title = request('title');
        $project->start_date = request('sDate');
        $project->end_date = request('eDate');
        $project->phase = request('phase');
        $project->description = request('description');
        $project->save();
        return view('edit', ['project' => $project]);
    }

    public function confirm($pid) {
        $project = Project::findOrFail($pid);
        if (! Gate::allows('confirm-delete', $project)) {
            abort(403);
        }
        return view('confirm', ['project' => $project]);
    }

    public function destroy($pid) {
        $project = Project::findOrFail($pid);
        $project->delete();
        return redirect('home');
    }
}
