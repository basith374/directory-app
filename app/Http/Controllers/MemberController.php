<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    
	public function store(Request $request) {
		$member = Member::create([]);
		$data = $request->only('email');
		$data['name'] = '';
		$data['password'] = bcrypt($request->password);
		$member->user()->create($data);
		return redirect('/profile')->with('success', 'Please confirm your email by clicking on the link sent to your inbox');
	}

	public function show() {
		$data = [];
		$member = auth()->user()->userable;
		if(!$member->confirmed) {
			$data['message'] = 'Your email is not confirmed yet. Please check your inbox.';
		}
		$data['classifieds'] = $member->classifieds;
		return view('profile', $data);
	}

	public function updateName(Request $request) {
		auth()->user()->update(['name' => $request->name]);
		return redirect()->back()->with('name', 'Name updated');
	}

	public function updateEmail(Request $request) {
		auth()->user()->update(['email' => $request->email]);
		return redirect()->back()->with('name', 'Email updated');
	}

	public function updatePassword(Request $request) {
		auth()->user()->update(['password' => bcrypt($request->password)]);
		return redirect()->back()->with('password', 'Password updated');
	}

}
