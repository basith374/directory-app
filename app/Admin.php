<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

	protected $guarded = ['id'];

	public function user() {
		return $this->morphOne('App\User', 'userable');
	}
}
