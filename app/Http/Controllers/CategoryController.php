<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Classified;
use App\City;

class CategoryController extends Controller
    {
    	public function search(Request $request, $slug, $slug2 = null) {
		$category = Category::where('slug', $slug)->first();
		if($category) {
			return $this->show($request,$category,$slug2);
		}
		$city = City::where('slug', $slug)->first();
		if($city) {
			return $this->searchCity($request, $city);
		}
		abort(404);
	}
	/* shared */
		
    public function index($cat = null) {
		$categories = \App\Category::root()->with('children')->get();
		$category = $cat ?: $categories->first()->slug;
		return view('categories', compact('category', 'categories'));
    }

	/*
	 * url : {category}/{subcategory?}
	 * view : classifieds
	 */
	 public function searchCity($request, $city) {
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
	public function show(Request $request, Category $category, Category $subcategory = null) {
		$breadcrumbs = [];
		/* shared */
		if($subcategory != null && $subcategory->id == null) {
			abort(404);
		}
		if($request->has('category') && $request->category != $category->slug) {
			return redirect()->action('CategoryController@show', array_merge($request->except('category'), ['category' => $request->category]));
		}
		/* end shared */
		$cat = $subcategory ?: $category;
		$cats = [];
		if($category->id) $cats[] = $cat->id;
		if($subcategory) {
			if($subcategory->parent_id != $category->id) {
				abort(404);
			}
			$breadcrumbs[] = ['name' => $category->name, 'href' => $category->slug];
			} else {
			$cat->load('children');
			$cats = array_merge($cats, $cat->children->pluck('id')->all());
		}
		$breadcrumbs[] = ['name' => $cat->name];
		/* shared */
		$categories = Category::root()->get();
		$cities = \DB::table('cities')->get();
		$query = Classified::query();
		$query->orderBy('id', 'desc');
		if(count($cats)) {
			$query->whereIn('category_id', $cats);
		}
			if($request->has('q')) {
			$query->where('name', 'like', '%' . $request->q . '%');
		}
		$data = [];
		if($request->has('city')) {
			$tokens = explode(' ', $request->city);
			$query->where(function($q) use ($tokens) {
				foreach($tokens as $token) {
					if(ctype_alpha($token)) $q->orWhere('city', 'like', '%' . $token . '%');
				}
			});
		}
		
		/* end shared */
		if($request->has('price_range')) {
			$prices = explode(',', $request->price_range);
			$query->where('price', '>=', $prices[0]);
			$query->where('price', '<=', $prices[1]);
		}
		 if($request->has('sortby')) {
		 	switch($request->sortby) {
		 		case 'lth':
		 			$query->orderBy('price');
		 			break;
		 		case 'htl':
		 			$query->orderBy('price', 'desc');
		 			break;
		 		default:
		 			$query->orderBy('id', 'desc');
		 	}
		 }
	
		$classifieds = $query->paginate(12);
		/*end shared*/
		$data = array_merge($data, compact('breadcrumbs', 'categories', 'cities', 'classifieds'));
		$data['category'] = $cat;
		return view('classifieds', $data);
	}

}
