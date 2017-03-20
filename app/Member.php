<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

	protected $guarded = ['id'];

	public function user() {
		return $this->morphOne('App\User', 'userable');
	}

	public function classifieds() {
		return $this->hasMany('App\Classified');
	}
}
