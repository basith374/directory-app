<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classified;
use App\Category;
use App\Member;
use App\Admin;
use App\City;
use App\Settings;
use File;
use DB;

class AdminController extends Controller
{

	protected $classified_rules = [
		'name' => 'required',
		'owner' => 'required',
		'mobile' => 'required',
		'description' => 'required',
		'category_id' => 'required'
	];


	protected $privileges = [
		1 => [
			'desc' => 'Can add and delete new/other administrators, Change website settings',
			'class' => 'progress-bar progress-bar-danger'
		],
		2 => [
			'desc' => 'Add/remove categories, Delete classifieds',
			'class' => 'progress-bar progress-bar-warning'
		],
		3 => [
			'desc' => 'Edit & Approve classifieds',
			'class' => 'progress-bar progress-bar-success'
		]
	];

	protected $admin_roles = [
		3 => 'Editor',
		2 => 'Moderator',
		1 => 'Administrator'
	];

	protected $colors = [
		['hex' => '#1abc9c', 'name' => 'TURQUOISE'],
		['hex' => '#16a085', 'name' => 'GREEN SEA'],
		['hex' => '#2ecc71', 'name' => 'EMERALD'],
		['hex' => '#27ae60', 'name' => 'NEPHRITIS'],
		['hex' => '#3498db', 'name' => 'PETER RIVER'],
		['hex' => '#2980b9', 'name' => 'BELIZE HOLE'],
		['hex' => '#9b59b6', 'name' => 'AMETHYST'],
		['hex' => '#8e44ad', 'name' => 'WISTERIA'],
		['hex' => '#34495e', 'name' => 'WET ASPHALT'],
		['hex' => '#2c3e50', 'name' => 'MIDNIGHT BLUE'],
		['hex' => '#f1c40f', 'name' => 'SUN FLOWER'],
		['hex' => '#f39c12', 'name' => 'ORANGE'],
		['hex' => '#e67e22', 'name' => 'CARROT'],
		['hex' => '#d35400', 'name' => 'PUMPKIN'],
		['hex' => '#e74c3c', 'name' => 'ALIZARIN'],
		['hex' => '#c0392b', 'name' => 'POMEGRANATE'],
		['hex' => '#ecf0f1', 'name' => 'CLOUDS'],
		['hex' => '#bdc3c7', 'name' => 'SILVER'],
		['hex' => '#95a5a6', 'name' => 'CONCRETE'],
		['hex' => '#7f8c8d', 'name' => 'ASBESTOS'],
	];
    
    /*
		Ads
		Admins
		Members
		Categories
    */
	public function dashboard() {
		$classifieds = Classified::count();
		$members = Member::count();
		$admins = Admin::count();
		$categories = Category::count();
		return view('admin.dashboard', compact('classifieds', 'members', 'admins', 'categories'));
	}

	public function classifieds(Request $request) {
		if($request->ajax()) {
            $query = Classified::with('images');
            $count = $query->count();
            if($request->has('search.value')) {
                $query->where(function($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search['value'] . '%');
                    $q->orWhere('owner', 'like', '%' . $request->search['value'] . '%');
                });
            }
            $filtered_count = $query->count();
            $query->orderBy('id', 'desc');
            $data['recordsTotal'] = $count;
            $data['recordsFiltered'] = $filtered_count;
            $data['data'] = $query->skip($request->start)->take($request->length)->get();
            return $data;
		} else {
			return view('admin.classifieds');
		}
	}

	public function createClassified() {
		$categories = Category::root()->with('children')->get();
		$cities = City::all();
		return view('admin.classified_form', compact('categories', 'cities'));
	}

	public function editClassified(Classified $classified) {
		// return response()->json($classified, 200, [], JSON_PRETTY_PRINT);
		$categories = Category::root()->with('children')->get();
		$cities = City::all();
		return view('admin.classified_form', compact('classified', 'categories', 'cities'));
	}

	public function updateClassified(Classified $classified, Request $request) {
		// return response()->json($request->all(), 200, [], JSON_PRETTY_PRINT);
		$this->validate($request, $this->classified_rules);
		$data = $request->except('images');
		$data['description'] = trim($data['description']);
        if(empty($data['price'])) {
            $data['price'] = null;
        }
		$classified->update($data);
		$classified->images()->delete();
		if($request->has('images')) {
			foreach($request->images as $image) {
				$classified->images()->create(['image' => $image]);
				if(!starts_with($image, '/uploads')) {
		    		File::move(public_path() . '/uploads/temp/' . $image, public_path() . '/uploads/' . $image);
		    	}
			}
		}
		return redirect('/admin/classifieds')->with('success', 'Classified updated');
	}

	public function deleteClassified(Classified $classified) {
		$classified->delete();
		return redirect()->back()->with('success', 'Classified Deleted');
	}

	public function members(Request $request) {
		if($request->ajax()) {
            $query = Member::with('user');
            $count = $query->count();
            if($request->has('search.value')) {
                $query->where(function($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search['value'] . '%');
                    // $q->orWhere('owner', 'like', '%' . $request->search['value'] . '%');
                });
            }
            $filtered_count = $query->count();
            $query->orderBy('id', 'desc');
            $data['recordsTotal'] = $count;
            $data['recordsFiltered'] = $filtered_count;
            $data['data'] = $query->skip($request->start)->take($request->length)->get();
            return $data;
		}
		return view('admin.members');
	}

	public function categories(Request $request) {
		if($request->ajax()) {
            $query = Category::with('parent');
            $count = $query->count();
            if($request->has('search.value')) {
                $query->where(function($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search['value'] . '%');
                    // $q->orWhere('owner', 'like', '%' . $request->search['value'] . '%');
                });
            }
            $filtered_count = $query->count();
            $query->orderBy('id', 'desc');
            $data['recordsTotal'] = $count;
            $data['recordsFiltered'] = $filtered_count;
            $data['data'] = $query->skip($request->start)->take($request->length)->get();
            return $data;
		} else {
			return view('admin.categories');
		}
	}

	public function createCategory() {
		$colors = $this->colors;
		$settings = new Settings;
		$icons = array_chunk(json_decode($settings->icons), 6);
		$categories = Category::root()->get();
		// return response()->json($categories, 200, [], JSON_PRETTY_PRINT);
		return view('admin.category_form', compact('categories', 'icons', 'colors'));
	}

	public function storeCategory(Request $request) {
		$data = $request->only('name', 'extra_class', 'color');
		$data['parent_id'] = $request->parent_id ?: null;
		if($request->has('images')) {
			$data['image'] = '/uploads/' . $request->images[0];
			File::move(public_path() . '/uploads/temp/' . $request->images[0], public_path() . $data['image']);
		}
		$category = Category::create($data);
		return redirect('/admin/categories')->with('success', 'Category created');
	}

	public function editCategory(Category $category) {
		$colors = $this->colors;
		$settings = new Settings;
		$icons = array_chunk(json_decode($settings->icons), 6);
		$categories = Category::root()->get();
		return view('admin.category_form', compact('category', 'categories', 'icons', 'colors'));
	}

	public function deleteCategory(Category $category) {
		$category->children()->each(function($cat) {
			$cat->classifieds()->delete();
		});
		$category->children()->delete();
		$category->classifieds()->delete();
		$category->delete();
		return redirect()->back()->with('success', 'Category Deleted');
	}

	public function updateCategory(Category $category, Request $request) {
		// return $request->all();
		$category->update($request->only('name', 'extra_class', 'color'));
		return redirect('/admin/categories')->with('success', 'Category updated');
	}

	public function admins() {
		$admins = Admin::with('user')->where('privilege', '!=', '0')->get();
		$roles = $this->admin_roles;
		return view('admin.admins', compact('roles', 'admins'));
	}

	public function createAdmin() {
		$roles = $this->admin_roles;
		$privileges = $this->privileges;
		return view('admin.admin_form', compact('roles', 'privileges'));
	}

	public function storeAdmin(Request $request) {
		$admin = Admin::create($request->only('privilege'));
		$data = $request->only('email', 'name');
		$data['password'] = bcrypt($request->password);
		$admin->user()->create($data);
		return redirect('/admin/admins')->with('success', 'Admin created');
	}

	public function editAdmin(Admin $admin) {
		$roles = $this->admin_roles;
		$privileges = $this->privileges;
		return view('admin.admin_form', compact('admin', 'roles', 'privileges'));
	}

	public function updateAdmin(Request $request, Admin $admin) {
		$admin->update($request->only('privilege'));
		$data = $request->only('email', 'name');
		$data['password'] = bcrypt($request->password);
		$admin->user()->update($data);
		return redirect('/admin/admins')->with('success', 'Admin updated');
	}

	public function deleteAdmin(Admin $admin) {
		$admin->delete();
		return redirect('/admin/admins')->with('success', 'Admin deleted');
	}

	public function settings() {
		$settings = new Settings;
		return view('admin.settings', compact('settings'));
	}

	public function changeBanner(Request $request) {
		$image = $request->file('image');
		$filename = uniqid() . '.' . $image->getClientOriginalExtension();
		$image->move(public_path() . '/uploads', $filename);
		DB::table('settings')->where('name', 'banner')->update(['value' => '/uploads/' . $filename]);
		return redirect()->back()->with('success', 'Banner Changed');
	}

	public function cities(Request $request) {
		if($request->ajax()) {
			$cities = City::all();
			return $cities;
		} else {
			return view('admin.cities');	
		}
	}

}
