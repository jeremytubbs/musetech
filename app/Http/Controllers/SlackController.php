<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\SlackRequest;
use App\Slack;


class SlackController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('slack.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(SlackRequest $request)
	{
		$slackInviteUrl='https://musetech.slack.com/api/users.admin.invite?t='.time();

		$fields = array(
			'email' => urlencode($request->get('email')),
			'first_name' => urlencode($request->get('first_name')),
			'last_name' => urlencode($request->get('last_name')),
			// 'channels' => urlencode('C0459RJ9S,C046YRQC5,C046YQQKM,C046YRS21,C046YRS5P'),
			'token' => env('SLACK_TOKEN'),
			'set_active' => urlencode('true'),
			'_attempts' => '1'
		);

		// url-ify the data for the POST
		$fields_string='';
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');

		// open connection
		$ch = curl_init();

		// set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $slackInviteUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

		// exec
		$replyRaw = curl_exec($ch);
		$reply=json_decode($replyRaw,true);
		// close connection
		curl_close($ch);

		if ($reply['ok']==false) {
			\Flash::error('Error: '.$reply['error']);
			return redirect()->back();
		}

		$slack = new Slack();
		$slack->first_name = $request->first_name;
		$slack->last_name = $request->last_name;
		$slack->email = $request->email;
		$slack->twitter = isset($request->twitter) ? $request->twitter : null;
		$slack->save();
		\Flash::message('Invitation sent successfully!');

		return redirect()->to('/');
	}

}
