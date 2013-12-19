<?php

class ProjectsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()) {
	       	if(Auth::user()->usertype == "admin") {
				$data = array(
					'projects' => Project::paginate(10),
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
		  			'title' => 'Overview'
		  			);
		  		return View::make('users.show', $data);
		  	}
		  }
		  else {
		  	$data = array(
		  		'title' => 'Access Denied',
                'projects' => User::find(15)->projects
		  	);
		  	return View::make('users.index', $data);
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
        $p = Project::find($id);
        $data = array(
        	'project' => $p,
        	'comments' => $p->comments,
        	'title' => 'Project View',
        	'lists' => $p->tasklists,
            'tasks' => $p->tasks,
            'uploads' => $p->uploads
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
			'users' => User::all(),
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

        if(Input::get('full')) {
            $p->name = Input::get('name');
            $p->budget_total = Input::get('budget');
            $p->description = Input::get('description');
            $p->user_id = Input::get('user');
            $p->url = Input::get('url');

            if(Input::get('begin_date')) {
                $p->begin_date = Input::get('begin_date');
            }

            if(Input::get('due_date')) {
                $p->due_date = Input::get('due_date');
            }

        }

        if(Input::file('file1')) {
            $f = new Upload;
            $f->name = Input::file('file1')->getClientOriginalName();
            $f->type = Input::file('file1')->getClientOriginalExtension();
            $f->size = Input::file('file1')->getSize();
            $f->created_by = Input::get('user');
            $f->permission = Input::get('perm1');
            $f->parent_type = 'project';
            $f->parent_id = $id;
            $f->save();
            Input::file('file1')->move('./public/uploads', $f->name);
        }

        if(Input::file('file2')) {
            $f = new Upload;
            $f->name = Input::file('file2')->getClientOriginalName();
            $f->type = Input::file('file2')->getClientOriginalExtension();
            $f->size = Input::file('file2')->getSize();
            $f->created_by = Input::get('user');
            $f->permission = Input::get('perm2');
            $f->parent_type = 'project';
            $f->parent_id = $id;
            $f->save();
            Input::file('file2')->move('/public/uploads', $f->name);
        }

        if(Input::file('file3')) {
            $f = new Upload;
            $f->name = Input::file('file3')->getClientOriginalName();
            $f->type = Input::file('file3')->getClientOriginalExtension();
            $f->size = Input::file('file3')->getSize();
            $f->created_by = Input::get('user');
            $f->permission = Input::get('perm3');
            $f->parent_type = 'project';
            $f->parent_id = $id;
            $f->save();
            Input::file('file3')->move('/public/uploads', $f->name);
        }

		$p->save();

		return Redirect::back()->with('flash_message', 'Project Updated Successfully');
	}

	public function delete($id) {
		$data = array(
			'user' => Auth::user(),
			'title' => 'Confirm Delete',
			'item' => array('type' => 'project', 'object' => Project::find($id))
		);
		return View::make('layouts.confirm-delete', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Project::destroy($id)) {
			return View::make('/')->with('flash_message', 'Project deleted successfully');
		}

		else {
			$data = array(
				'user' => Auth::user(),
				'title' => 'Error Deleting Item',
				'eobj' => Project::find($id)
			);
			return View::make('errors.delete', $data);
		}
	}

}
