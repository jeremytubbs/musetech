<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['last_updated'];

   	public function getUpdatedAttribute()
	{
		return $this->last_updated->diffForHumans();
	}
}
