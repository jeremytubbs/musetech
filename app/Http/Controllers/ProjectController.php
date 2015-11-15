<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Project;
use Carbon\Carbon;

use GrahamCampbell\GitHub\Facades\GitHub;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get request values or set defaults
        $sortBy = \Request::get('sortBy') ? \Request::get('sortBy') : 'stars';
        $orderBy = \Request::get('orderBy') ? \Request::get('orderBy') : 'desc';
        $query = \Request::get('query') ? \Request::get('query') : NULL;

        $projects = Project::orderBy($sortBy, $orderBy)
                    ->where('name', 'LIKE', "%$query%")
                    ->orWhere('description', 'LIKE', "%$query%")
                    ->orWhere('owner', 'LIKE', "%$query%")
                    ->orWhere('language', 'LIKE', "%$query%")
                    ->paginate(15);

        return view('project.index', compact('projects', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $fullname = preg_replace('/(http|https):\/\/.*github.com\/|github.com+/', '', $request->get('github_url'));
        $github = preg_split('/\//', $fullname);
        $twitter = $request->get('twitter') ? $request->get('twitter') : NULL;

        if (isset($github[0]) && isset($github[1]))
        {
            try
            {
                $repo = GitHub::repo()->show($github[0], $github[1]);
            }
            catch (\RuntimeException $e)
            {
                // flash()->error($request->get('github_url') . ' ' . $e->getMessage());
                return view('project.create');
            }
        }

        if (isset($repo))
        {
            $project = new Project();
            $project->github_url = $repo['html_url'];
            $project->name = $repo['name'];
            $project->owner = $repo['owner']['login'];
            $project->description = $repo['description'];
            $project->homepage = $repo['homepage'];
            $project->stars = $repo['stargazers_count'];
            $project->language = $repo['language'];
            $project->last_updated = Carbon::parse($repo['pushed_at'])->toDateTimeString();
            $project->is_listed = 1;
            $project->twitter = $twitter;
            $project->save();

            // flash()->message('Project submitted.');
            return view('project.create');
        }

        // flash()->error('Whoops! There were some problems with your input.');
        return view('project.create');
    }
}
