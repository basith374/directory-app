<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classified extends Model
{
    
	protected $guarded = ['id'];

	public function city() {
		return $this->belongsTo('App\City');
	}

	public function category() {
		return $this->belongsTo('App\Category');
	}

	public function images() {
		return $this->hasMany('App\Image');
	}

}
