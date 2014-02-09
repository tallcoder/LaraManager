<?php

class TasksController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array(
			'title' => 'Tasks Overview',
			'tasks' => Task::paginate(10)
			);
    return View::make('tasks.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$data = array(
			'title' => 'Create New Task',
			'staff' => User::where('usertype', '=', 'staff')->orWhere('usertype','=','admin')->get(),
			'lists' => Tasklist::all(),
			'projects' => Project::all()
			);
        if(isset($id)) { array_add($data, 'project', Project::find($id));}
        return View::make('tasks.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$t = new Task;
		$t->name = Input::get('name');
		if(Input::get('list')) {
			$t->list_id = Input::get('list');
		}
		else {$t->list_id = 0;}

        if(Input::get('project')) {
            $t->project_id = Input::get('project');
        }
        else {$t->project_id = 0;}
		if(Input::get('staffonly')) {
			$t->staffonly = true;
		}
		$t->budget_total = Input::get('budget');
		$t->begin_date = Input::get('begin_date');
		$t->due_date = Input::get('due_date');
		$t->assigned_to = Input::get('assigned_to');
        $t->type = Input::get('type');
        $t->description = Input::get('description');
        $t->created_by = Input::get('user');
		$t->save();

        $created = User::find($t->created_by);
        $assigned = User::find($t->assigned_to);
        $p = Project::find($t->project_id);
        $fh = Config::get('mail.fheader');
        $fh .= "MIME-Version: 1.0\r\n";
        $fh .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $start = getMdy($t->begin_date);
        $finish = getMdy($t->due_date);


        $turl = Config::get('app.url') . "/projects/$p->id/tasks/$t->id";

        $body = "<html><head><title>New Task Assigned</title><style>p {font-family: arial, font-size:16px;} h3 {font-size:24px;}</style></head><body>
        <h3>New Task</h3>
        <p>This is an automated message to inform you that a new task on LaraManager has been assigned to you.</p>
        <p>The task <strong>$t->name</strong> belongs to <strong>$p->name</strong> , located at <a href=\"$p->url\">$p->url</a></p>
        <p>Task Description: <em>$t->description</em></p>
        <p>You can visit the task and start or edit it  <a href=\"$turl\">here</a></p>
        <p>This task was created by $created->first_name $created->last_name ( $created->email )</p>
        <p>This task should be started on $start , and finished by $finish , and has a budget of \$ $t->budget_total</p>
        </body></html>
        ";

        mail($assigned->email, 'You have been assigned a new task', $body, $fh);

		Event::fire('task.store');
		return Redirect::to('projects');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($pid, $id)
	{	
		$t = Task::find($id);
		$data = array(
			'title' => $t->name,
			'task' => $t,
			'list' => Tasklist::find($t->list),
			'project' => Task::find($id)->project,
            'comments' => Comment::taskComments($id)->get(),
            'uploads' => $t->uploads
		);
        return View::make('tasks.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($pid, $id)
	{
		$data = array(
			'title' => 'Edit Task',
			'task' => Task::find($id)
			);
        return View::make('tasks.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($pid, $tid)
	{   $t = Task::find(Input::get('task'));
        if(Input::get('iscompleted')) {
            $t->completed = 1;
            $t->commpleted_by = Input::get('user');
            $t->end_date = date('m-d-Y');
            return Redirect::back()->with('flash_message', 'Task updated');
        }
        $t->name = Input::get('name');
        $t->description = Input::get('description');
        $t->budget_total = Input::get('budget_total');
        $t->time += Input::get('time');
				if(Input::get('staffonly')) {
					$t->staffonly = true;
				}
        if($t->type == 'design') {
            $t->budget_used = $t->time / 60 * 110;
        }

        else if ($t->type == 'programming') {
            $t->budget_used = $t->time / 60 * 135;
        }

        if(Input::get('completed')) {
            $t->completed = true;
            $t->completed_by = Input::get('user');
            $t->end_date = date('Y-m-d');
	          Event::fire('task.complete');
        }

        if(Input::file('file1')) {
            $f = new Upload;
            $f->name = Input::file('file1')->getClientOriginalName();
            $f->type = Input::file('file1')->getClientOriginalExtension();
            $f->size = Input::file('file1')->getSize();
            $f->created_by = Input::get('user');
            $f->permission = Input::get('perm1');
            $f->parent_type = 'task';
            $f->parent_id = $tid;
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
            $f->parent_type = 'task';
            $f->parent_id = $tid;
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
            $f->parent_type = 'task';
            $f->parent_id = $tid;
            $f->save();
            Input::file('file3')->move('/public/uploads', $f->name);
        }

		$t->save();

		Event::fire('task.update');
		return Redirect::back()->with('flash_message', 'Task updated');
	}

	public function complete($pid, $tid) {
		$t = Task::find($tid);
		$t->completed = 1;
		$t->save();

		return Redirect::back()->with('flash_message',"Task marked completed");
	}

	public function delete($id) {
			$data = array(
				'title' => 'Confirm Delete',
				'item' => array('type' => 'task', 'object' => Task::find($id))
			);
			return View::make('layouts.confirm-delete', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($pid, $id)
	{
		if(Task::destroy($id)) {
			Event::fire('task.delete');
			return Redirect::to('projects')->with('flash_message', 'Task successfully deleted');
		}
		else {
			$data = array(
				'title' => 'Error Deleting Item',
				'eobj' => Task::find($id)
			);
			return View::make('errors.delete', $data);
		}
	}
}