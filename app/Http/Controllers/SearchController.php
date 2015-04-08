<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Project;

class SearchController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /search
	 *
	 * @return Response
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

		return view('search.index', compact('projects', 'query'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /search
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

}
