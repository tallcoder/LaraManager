<?php

class ProjectsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
       	if(Auth::user()->usertype != "client") {
			$data = array(
				'projects' => Project::all(), 
				'title' => 'Project Overview', 
				'user' => Auth::user()
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
	  			'project' => DB::table('projects')->where('user_id', Auth::user()->id)->first()
	  			);
	  		return View::make('projects.single', $data);
	  	}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id = null)
	{
		$p = new Project;
		$p->name = Input::get('name');
		$p->user_id = Input::get('user');
		$p->budget_total = Input::get('budget');
		$p->description = Input::get('description');
		$p->url = "http://" . Input::get('link') . ".icwebdev.com";
		$p->save();
		return Redirect::to('projects');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $data = array(
        	'user' => Auth::user(),
        	'project' => Project::where('id', '=', $id)->firstOrFail(),
        	'comments' => Comment::commentsByParent($id),
        	'title' => 'Project View'
        	);
		return View::make('projects.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    $p = Project::find($id);
		$data = array(
			'title' => 'Edit Project',
			'user' => Auth::user(),
			'project' => $p
			);
		return View::make('projects.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		$p = Project::find($id);
		$p->name = Input::get('name');
		$p->budget_total = Input::get('budget');
		$p->description = Input::get('description');
		$p->save();

		return View::make('projects');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//Project::destroy($id);
		return "destroy";
		//return View::make('projects');
	}

}
