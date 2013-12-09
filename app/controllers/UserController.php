<?php

class UserController extends BaseController {

	public function getNew() {
		$data = array (
			'title' => 'Snappy - Register'
			);
		return View::make('users.new', $data);
	}

	public function getIndex() {
		return "user index";
	}

	public function postCreate() {
		$validation = User::validate(Input::all());

		if($validation->passes()) {
			User::create(array(
				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password'))
				));

			return Redirect::to_route('home')->with('message', 'Thanks for registering!');
		}

		else {
			return Redirect::to_route('register')->with_errors($validation)->with_input();
		}
	}
}