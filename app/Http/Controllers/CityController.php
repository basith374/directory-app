<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Category;
use App\Classified;

class CityController extends Controller
{
    
	public function show(City $city, Request $request) {
		$categories = Category::root()->get();
		$cities = City::all();
		$query = Classified::query();
		$query->whereHas('city', function($q) use ($city) {
			$q->where('slug', $city->slug);
		});
		$query->orderBy('id', 'desc');
		if($request->has('q')) {
			$query->where('name', 'like', '%' . $request->q . '%');
		}
		$classifieds = $query->paginate(12);
		$data = compact('categories', 'cities', 'classifieds', 'city');
		return view('classifieds', $data);
	}

}
