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
        $du = Config::get('app.dev');
        $fr = Config::get('mail.fheader');
        $co = Config::get('app.company.name');
        $ph = Config::get('app.company.contact_phone');
        $em = Config::get('app.company.contact_email');

		$p = new Project;
		$p->name = Input::get('name');
		$p->user_id = Input::get('user');
		$p->budget_total = Input::get('budget');
		$p->description = Input::get('description');
		$p->url = "http://" . Input::get('link') . $du;

		if(Input::get('staffonly')) {
			$p->staffonly = true;
		}

		$p->save();
        Event::fire('project.create', $p);
        $e = User::find($p->user_id);

        $body = "
        Hello, this email is to inform you that $co has created your project $p->name\r\n
        If you would like to visit your project while it is in development, you may find it at $p->url\r\n
        Below is a summary of your project details:\r\n
        Name; $p->name\r\n
        Description: $p->description\r\n
        Budget: \$ $p->budget_total\r\n
        If you have any questions, feel free to contact us at $ph or by email at $em
        ";

        /*Mail::send('emails.new-project', $data, function($message) {
           $message->to($e->email, "$e->first_name $e->last_name")->subject("$co has created $p->name");
        });*/

        mail($e->email, "$co has created $p->name", $body, $fr);

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
						if(Input::get('staffonly')) {
							$p->staffonly = true;
						}
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
            if(Input::get('perm1') != 'all') {
	            $f->staffonly = true;
            }
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
		        if(Input::get('perm2') != 'all') {
			        $f->staffonly = true;
		        }
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
		        if(Input::get('perm3') != 'all') {
			        $f->staffonly = true;
		        }
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
