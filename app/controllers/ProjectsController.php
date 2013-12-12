<?php

class ProjectsController extends BaseController {

	public function index() {
		/*
		*	if the user isn't a client, they get to see everything
		*/
		if(Auth::user()->usertype != "client") {
			$data = array(
				'projects' => Project::all(), 
				'title' => 'Project Overview', 
				'user' => Auth::user(), 
				'users' => User::all()
				);
			return View::make('projects.index', $data);
	  	}
	  	/*
	  	*	if the user IS a client, they see their project only
	  	*/
	  	else {
	  		//$data = array('projects' => Project::where('client_id', '=', Project::find(1)->user), 'title' => 'Project Overview', 'user' => Auth::user());
	  		$data = array(
	  			'title' => 'Client Projects',
	  			'user' => Auth::user(),
	  			'projects' => DB::table('projects')->where('user_id', Auth::user()->id)->first()
	  			);
	  		return View::make('projects.single', $data);
	  	}
	}

	public function show($id) {
		$data = array('user' => Auth::user(), 'projects' => Project::where('id', '=', $id)->firstOrFail(), 'title' => 'Project View');
		return View::make('projects.single', $data);
	}

	public function create() {
		$data = array(
			'user' => Auth::user(),
			 'title' => 'New Project',
			 'users' => User::all()
			 );
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
		$p->user_id = Input::get('user');
		$p->budget_total = Input::get('budget');
		$p->description = Input::get('description');
		$p->url = "http://" . Input::get('link') . ".icwebdev.com";
		$p->save();

		Redirect::to('projects');
	}
}