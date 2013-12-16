<?php

class UsersController extends BaseController {

	public function create() {
		$data = array (
			'title' => 'Add User',
			'user' => Auth::user()
			);
		return View::make('users.new', $data);
	}

	public function index() {
		if(Auth::user()->usertype == "admin" || Auth::user()->usertype == "staff") {
			$data = array(
				'user' => Auth::user(),
				'users' => User::all(),
				'title' => 'Users Overview'
				);
			return View::make('users.index', $data);
		}

		else {
			return "Access Denied";
		}
	}

	public function store() {

			$u = new User;
			$u->username = Input::get('username');
			$u->email = Input::get('email');
			$u->password = Hash::make(Input::get('password'));
			$u->usertype = Input::get('usertype');
			$u->first_name = Input::get('first_name');
			$u->last_name = Input::get('last_name');
			$u->phone = Input::get('phone');
			$u->expires = Input::get('expires');
			if($u->usertype == "client") {
				$u->userperms = "333";
			}

			else if ($u->usertype == "staff") {
				$u->userperms = "555";
			}

			else if ($u->usertype == "admin") {
				$u->userperms = "777";
			}

			else $u->userperms = "111";
			$u->save();
			return Redirect::to('/')->with('flash_message', 'Thanks for registering!');
	}

	public function show($id) {
		$data = array(
			'title' => 'User Overview',
			'me' => Auth::user(),
			'user' => User::find($id),
			'projects' => Project::where('user_id', '=', $id)->get()			
			);
		return View::make('users.show', $data);
	}

	public function destroy($id) {
		if(Auth::user()->usertype == 'admin') {
			if(User::destroy($id)) {
			return Redirect::to('users')->with('flash_message', "$u->username has been successfully deleted!");
			}
		}

		else {
			return Redirect::to('users')->with('flash_message', "You do not have adequate permissions to delete users!");
		}
	}
}