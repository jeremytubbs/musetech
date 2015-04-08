<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'github_url' => array('required', 'regex:/(http|https):\/\/.*github.com\/|github.com+/', 'unique:projects')
			// 'owner' => 'required',
			// 'name' => 'required'
		];
	}

}
