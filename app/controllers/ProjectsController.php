<?php

class ProjectsController extends BaseController {

	public function index() {
		/*
		*	if the user isn't a client, they get to see everything
		*/
		if(Auth::user()->usertype != "client") {
			$data = array('projects' => Project::all(), 'title' => 'Project Overview', 'user' => Auth::user());
			return View::make('projects.index', $data);
	  	}
	  	/*
	  	*	if the user IS a client, they see their project only
	  	*/
	  	else {
	  		$data = array('projects' => Project::where('client_id', '=', Project::find(1)->user), 'title' => 'Project Overview', 'user' => Auth::user());
	  		return View::make('projects.single', $data);
	  	}
	}

	public function show($id) {
		$data = array('user' => $user, 'project', Project::where('id', '=', $id));
		return View::make('projects.single');
	}

	public function create() {
		$data = array('user' => Auth::user(), 'title' => 'New Project');
		if(true) {
			return View::make('projects.create', $data);
		}

		else {
			$data = array(
				'title' => 'ProMan - Access Denied',
				'user' => Auth::user()
				);
			return View::make('errors.401', $data);
		}
	}

	public function store() {
		$p = new Project;
		$p->name = Input::get('name');
		$p->client_name = Input::get('client_name');
		$p->budget_total = Input::get('budget');
		$p->description = Input::get('description');
		$p->save();

		Redirect::to('projects');
	}
}