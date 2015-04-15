<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Project;
use Carbon\Carbon;

use GrahamCampbell\GitHub\Facades\GitHub;


class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('project.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
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
				flash()->error($request->get('github_url') . ' ' . $e->getMessage());
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

			flash()->message('Project submitted.');
			return view('project.create');
		}

		flash()->error('Whoops! There were some problems with your input.');
		return view('project.create');

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
