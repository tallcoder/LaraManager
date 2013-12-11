<?php

class ProjectsController extends BaseController {

	public function index() {
		$data = array('user' => Auth::user(), 'title' => 'Project Overview');
		/*
		*	if the user isn't a client, they get to see everything
		*/
		//if($user->usertype != "client") {
		if(true) {
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
		//$data = array('user' => $user, 'project', Project::where('id', '=', $id));
		return View::make('projects/single');
	}

	public function create() {
		$data = array('user' => Auth::user(), 'title' => 'New Project');
		if(true) {
			//return View::make('projects.create', $data);
			return "hi";
		}

		else {
			return View::make('errors.401');
		}
	}

	public function edit($id) {
		if($user->usertype != "client") {
			$data = array('user' => $user, 'project' => Project::where('id', '=', $id));
			return View::make('project.edit', $data);
		}
	}

	public function delete($id) {
		if($user->usertype != "client") {
			$data = array('user' => $user, 'project' => Project::where('id', '=', $id));
			return View::make('project.delete', $data);
		}
	}

	public function deleteSelect() {
		if($user->usertype != "client") {
			$data = array('user' => Auth::user(), 'title' => 'Delete Project', 'projects' => Project::all());
			return View::make('project.delete', $data);
		}
	}
}