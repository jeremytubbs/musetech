<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Slack extends Model {

	protected $table = 'slacks';
	protected $fillable = ['email', 'first_name', 'last_name', 'twitter'];

}
