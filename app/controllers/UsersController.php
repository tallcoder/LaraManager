<?php

class UsersController extends BaseController {

	/*
	 * gets the create user page
	 * @return page : user.new
	 */
	public function create() {
		$data = array (
			'title' => 'Add User',
			);
		return View::make('users.new', $data);
	}

	/*
	 * gets the index user overview if the user is a staff or admin
	 * @return page : users.index
	 */
	public function index() {
		if(Auth::user()->usertype == "admin" || Auth::user()->usertype == "staff") {
			$data = array(
				'users' => User::all(),
				'title' => 'Users Overview'
				);
			return View::make('users.index', $data);
		}

		else {
			return "Access Denied";
		}
	}

	/*
	 * handles the creation of a new user
	 * @return page : home
	 */
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

            $message = "Thanks for registering!";

            $to = $u->first_name . " " . $u->last_name . " " . "<" . $u->email . ">";
            $subject = $u->first_name . " you have been added on LaraManager!";
            $header = "From: Automated Email <auto@laramanager.com>";

            $data = array(
              'user' => $u,
              'password' => Input::get('password')
            );
            Mail::send('emails.welcome', $data, function($msg) {
               $msg->to(Input::get('email'), Input::get('first_name') . " " . Input::get('last_name'))->subject('Welcome to LaraManager');
            });
			return Redirect::to('/')->with('flash_message', $message);
	}

	/*
	 * displays an individual user
	 * @param int : user id
	 * @return page : users.show
	 */
	public function show($id) {
		$data = array(
			'title' => 'User Overview',
			'projects' => User::find($id)->projects,
            'user' => User::find($id)
			);
		return View::make('users.show', $data);
	}

	/*
	 * gets the confirm delete page
	 * @param int : user id
	 * @return page : layouts.confirm-delete
	 */
	public function delete($id) {
		if(Auth::user()->usertype == 'admin') {
			$data = array(
				'user' => Auth::user(),
				'title' => 'Confirm Delete',
				'item' => array('type' => 'user', 'object' => User::find($id))
			);

			return View::make('layouts.confirm-delete', $data);
		}
	}

	/*
	 * handles the actual deletion of the user
	 * @param int : user id
	 * @return page : users
	 */
	public function destroy($id) {
			if(User::destroy($id)) {
				return Redirect::to('users')->with('flash_message', 'User ' . User::find($id)->username . ' successfully
			deleted');
			}
			else {
				$data = array(
					'user' => Auth::user(),
					'title' => 'Error Deleting Item',
					'eobj' => User::find($id)
				);
				return View::make('errors.delete', $data);
			}
	}
}