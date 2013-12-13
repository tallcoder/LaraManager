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
			return Redirect::to('/')->with('message', 'Thanks for registering!');
	}

	public function show() {
		$data = array(
			'user' => Auth::user(),
			'title' => 'User Overview'
			);

		if(Auth::user()->usertype == "client") {
			$data = array_add($data, 'projects', Project::where('client_id', '=', Project::find(1)->user));
		}
	}

	public function destroy($id, $confirm = false) {
		if($confirm != true) {
			$data = array(
				'user' => User::find($id),
				'title' => 'Confirm Delete'
				);
			return View::make('users.delete');
		}

		else {
			$u = User::find($id);
			$u->delete();
			return Redirect::to('users')->with('message', "$u->username has been successfully deleted!");
		}
	}
}