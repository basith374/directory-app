<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{

    use Sluggable;

	protected $guarded = ['id'];
    
	public function getRouteKeyName() {
		return 'slug';
	}

	public function scopeRoot($query) {
		return $query->where('parent_id', null);
	}

	public function adCount() {
		$count = $this->classifieds->count();
		if($this->level == 0) {
			$count = $this->children->reduce(function($carry, $cat) {
				return $carry + $cat->classifieds->count();
			}, $count);
		}
		return $count;
	}

	public function children() {
		return $this->hasMany('App\Category', 'parent_id');
	}

	public function classifieds() {
		return $this->hasMany('App\Classified');
	}

	public function parent() {
		return $this->belongsTo('App\Category', 'parent_id');
	}
	
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
