<?php

class SessionsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array(
			'title' => 'LaraManager',
			);
        return View::make('sessions.index', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();
		$user = User::where('username', '=', $input['username']);
		//if(getMdy(date('m-d-Y')) < getMdy($user->expires)) {
		if(false) {
			return View::make('users.expired');
		}
		else {

			$login = Auth::attempt([
			'username' => $input['username'],
			'password' => $input['password']
			]);

			if($login) {
				return Redirect::intended('/')->with('flash_message', 'ProMan has successfully logged you in!');
			}
			else {
			return Redirect::back()->with('flash_message', 'Invalid Login Credentials')->withInput();
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('sessions.show');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::home()->with('flash_message','ProMan has logged you out successfully!');
	}

}
