<?php namespace App\Http\Controllers;

use Frlnc\Slack\Http\SlackResponseFactory;
use Frlnc\Slack\Http\CurlInteractor;
use Frlnc\Slack\Core\Commander;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $musetech = \Twitter::getSearch(['q' => '#musetech']);
		// dd($musetech);

		$interactor = new CurlInteractor;
		$interactor->setResponseFactory(new SlackResponseFactory);

		$commander = new Commander(env('SLACK_TOKEN'), $interactor);

		$response = $commander->execute('users.list');
		$userList = json_decode(json_encode($response), true);
		$userCount = count($userList['body']['members']);
		return view('home', compact('userCount'));
	}

}
