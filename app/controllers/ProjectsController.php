<?php

class ProjectsController extends BaseController {

	protected $user;

	public function __construct() {
		$user = Auth::user();
	}

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
	  		$data = array_add($data, 'projects', Project::where('client_id', '=', Project::find(1)->user));
	  		return View::make('projects/single', $data);
	  	}
	}

	public function single($id) {
		$data = array('user' => $user, 'project', Project::where('id', '=', $id));
		return View::make('projects/single', $data);
	}

	public function create() {
		if($user->usertype != "client") {
			return View::make('projects.create');
		}

		else {
			return View::make('errors.401');
		}
	}

	public function edit($id) {
		if($user->usertype != "client") {
			$data = array('user' => $user, 'project', Project::where('id', '=', $id));
			return View::make('project.edit', $data);
		}
	}

	public function delete($id) {
		if($user->usertype != "client") {
			$data = array('user' => $user, 'project', Project::where('id', '=', $id));
			return View::make('project.delete', $data);
		}
	}
}