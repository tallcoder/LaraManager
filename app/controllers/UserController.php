<?php

class UserController extends BaseController {

	public function getNew() {
		$data = array (
			'title' => 'Add User',
			'user' => Auth::user()
			);
		return View::make('users.new', $data);
	}

	public function getIndex() {
		return "user index";
	}

	public function postCreate() {

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
}