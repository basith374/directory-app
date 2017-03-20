<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Classified;
use File;

class ClassifiedController extends Controller
{
	protected $rules = [
		'name' => 'required',
		'price' => 'required',
		'owner' => 'required',
		'email' => 'required',
		'mobile' => 'required',
		'description' => 'required',
		'category_id' => 'required',
		'city_id' => 'required'
	];

	/*
	 * url : all-classifieds
	 * view : classifieds
	 */
    public function index(Request $request) {
		/* shared */
		if($request->has('category')) {
			return redirect()->action('CategoryController@show', array_merge($request->except('category'), ['category' => $request->category]));
		}
		/* end shared */
		$categories = Category::root()->with('children')->orderBy('id', 'desc')->get();
		$cities = \DB::table('cities')->get();
		$query = Classified::with('city', 'category');
		/* shared */
		if($request->has('q')) {
			$query->where('name', 'like', '%' . $request->q . '%');
		}
		if($request->has('city')) {
			$query->whereHas('city', function($q) use ($request) {
				$q->where('slug', $request->city);
			});
		}
		/* end shared */
		$classifieds = $query->paginate(12);
		return view('classifieds', compact('categories', 'cities', 'classifieds'));
    }

    public function create() {
		$categories = Category::root()->with('children')->get();
		$cities = \DB::table('cities')->get();
    	return view('post-ad', compact('categories', 'cities'));
    }

    public function store(Request $request) {
    	// return response()->json($request->all(), 200, [], JSON_PRETTY_PRINT);
    	$this->validate($request, $this->rules);
    	$data = $request->only('name', 'price', 'owner', 'email', 'mobile', 'description', 'category_id', 'city_id');
    	if(auth()->check() && auth()->user()->userable_type == 'App\Member') {
    		$data['member_id'] = auth()->user()->userable_id;
    	}
    	$classified = Classified::create($data);
    	foreach($request->images as $image) {
	    	$classified->images()->create(['image' => '/uploads/' . $image]);
	    	File::move(public_path() . '/uploads/temp/' . $image, public_path() . '/uploads/' . $image);
    	}
    	return redirect('/post-ad')->with('success', 'Your ad has been posted');
    }

    public function show(Classified $classified) {
    	$classified->increment('views');
		$breadcrumbs = [];
		$classified->load('city', 'category');
		$category = $classified->category;
		if($category->parent_id) {
			$parent = Category::find($category->parent_id);
			$breadcrumbs[] = ['name' => $parent->name, 'href' => $parent->slug];
		}
		$breadcrumbs[] = ['name' => $category->name];
    	return view('single', compact('classified', 'breadcrumbs'));
    }

    public function tempImages(Request $request) {
    	$image = $request->file('file');
    	$filename = uniqid() . '.' . $image->getClientOriginalExtension();
    	$upload_dir = public_path() . '/uploads/temp/';
    	if(!File::exists($upload_dir)) File::makeDirectory($upload_dir);
    	File::copy($image, $upload_dir . $filename);
    	return ['image' => $filename];
    }
}
