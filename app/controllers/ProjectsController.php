<?php

class ProjectsController extends BaseController {

	protected $user = Auth::user();
	public function index() {
		$data = array('user' => $user);
		/*
		*	if the user isn't a client, they get to see everything
		*/
		if($user->usertype != "client") {
			$data = array_add($data, 'projects', Project::all());
			return View::make('projects.index', $data);
	  	}
	  	/*
	  	*	if the user IS a client, they see their project only
	  	*/
	  	else {
	  		$data = array_add($data, 'projects', Project::where('client_id', '=', Project::find(1)->user);
	  		return View::make('projects/single', $data);
	  	}
	}
}