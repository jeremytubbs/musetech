<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Frlnc\Slack\Http\SlackResponseFactory;
use Frlnc\Slack\Http\CurlInteractor;
use Frlnc\Slack\Core\Commander;

class PagesController extends Controller
{

    public function home()
    {
        $userCount = 1;
        // $interactor = new CurlInteractor;
        // $interactor->setResponseFactory(new SlackResponseFactory);

        // $commander = new Commander(env('SLACK_TOKEN'), $interactor);

        // $response = $commander->execute('users.list');
        // $userList = json_decode(json_encode($response), true);
        // $userCount = count($userList['body']['members']);
        return view('pages.home', compact('userCount'));
    }

}
