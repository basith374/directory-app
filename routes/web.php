<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$categories = \App\Category::root()->with('children')->get();
	$classifieds = $categories->where('slug', 'mobiles')->first()->classifieds->take(8)->chunk(4);
	$classifieds->push($categories->where('slug', 'cars')->first()->classifieds->take(4));
	// return response()->json($classifieds, 200, [], JSON_PRETTY_PRINT);
    return view('index', ['categories' => $categories, 'classifieds' => $classifieds]);
});
Route::get('/index',function(){
	return view('home');
});

Route::get('/admin', function() {
	return view('admin.login');
});
Route::get('/login', function() {
	return view('login');
});
Route::get('/single', function() {
	return view('single');
});
Route::get('/index', function(){
   return View('index');
});

Route::get('/classifieds', function(){
   return View('classifieds');
});


Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', function() {
	return view('register');
});

Route::post('/register', 'MemberController@store');
Route::get('/post-ad', 'ClassifiedController@create');
Route::post('/post-ad', 'ClassifiedController@store');
Route::post('/post-ad-images', 'ClassifiedController@tempImages');

Route::get('/categories/{cat?}', 'CategoryController@index');

Route::get('sitemap', 'SearchController@sitemap');

Route::get('/all-classifieds', 'ClassifiedController@index');

Route::get('/classifieds/{classified}', 'ClassifiedController@show');

Route::get('cats', function() {
	$data = \App\Category::root()->with('children')->get();
	return response()->json($data, 200, [], JSON_PRETTY_PRINT);
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('profile', 'MemberController@show');
	Route::post('profile/name', 'MemberController@updateName');
	Route::post('profile/email', 'MemberController@updateEmail');
	Route::post('profile/password', 'MemberController@updatePassword');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
	Route::get('dashboard', 'AdminController@dashboard');
	Route::get('admins', 'AdminController@admins');
	Route::get('admins/create', 'AdminController@createAdmin');
	Route::post('admins', 'AdminController@storeAdmin');
	Route::get('admins/{admin}/edit', 'AdminController@editAdmin');
	Route::delete('admins/{admin}', 'AdminController@deleteAdmin');

	Route::get('members', 'AdminController@members');

	Route::get('categories', 'AdminController@categories');
	Route::get('categories/create', 'AdminController@createCategory');
	Route::post('categories', 'AdminController@storeCategory');
	Route::get('categories/{category}/edit', 'AdminController@editCategory');
	Route::patch('categories/{category}', 'AdminController@updateCategory');
	Route::delete('categories/{category}', 'AdminController@deleteCategory');
	Route::get('classifieds', 'AdminController@classifieds');
	Route::get('classifieds/create', 'AdminController@createClassified');
	Route::get('classifieds/{classified}/edit', 'AdminController@editClassified');
	Route::patch('classifieds/{classified}', 'AdminController@updateClassified');
	Route::delete('classifieds/{classified}', 'AdminController@deleteClassified');

	Route::get('settings', 'AdminController@settings');
	Route::post('settings/banner', 'AdminController@changeBanner');
	Route::get('cities', 'AdminController@cities');

});

Route::get('{search}/{search2?}', 'SearchController@search');