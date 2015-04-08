<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model {

	protected $table = 'projects';
	protected $fillable = ['github_url', 'name', 'owner', 'description', 'website', 'stars', 'last_updated'];
	protected $dates = ['last_updated'];

	public function getUpdatedAttribute()
	{
		return $this->last_updated->diffForHumans();
	}

}
