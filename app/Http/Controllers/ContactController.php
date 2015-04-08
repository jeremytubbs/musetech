<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

use Illuminate\Http\Request;

class ContactController extends Controller {

	public function getContact()
	{
		return view('pages.contact');
	}

	public function postContact(ContactRequest $request)
	{
		$data = [
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'the_message' => $request->get('message')
		];

		try
		{
			\Mail::send('emails.contact', $data, function($message)
		    {
		        $message->to(env('MAIL_USERNAME'), env('MAIL_NAME'))->subject('Contact Form');
		    });

	    	flash()->message('Thank you.');
			return redirect()->back();
		}
		catch(Exception $e)
		{
			flash()->error($e);
			return redirect()->back();
		}
	}

}
