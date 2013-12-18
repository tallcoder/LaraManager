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
			'user' => Auth::user(),
			'tasks' => Task::all()
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
			'user' => Auth::user(),
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

		$t->budget_total = Input::get('budget');
		$t->begin_date = Input::get('begin_date');
		$t->due_date = Input::get('due_date');
		$t->assigned_to = Input::get('assigned_to');
        $t->type = Input::get('type');
        $t->description = Input::get('description');
		$t->save();
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
			'user' => Auth::user(),
			'title' => $t->name,
			'task' => $t,
			'list' => Tasklist::find($t->list),
			'project' => Task::find($id)->project,
            'comments' => Comment::taskComments($id)->get()
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
			'user' => Auth::user(),
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
        if(Input::get('completed')) {
            $t->completed = true;
            $t->completed_by = Input::get('user');
            $t->end_date = date('Y-m-d');
        }

        if(Input::file('file1')) {
            $f = new Upload;
            $f->name = Input::file('file1')->getClientOriginalName();
            $f->type = Input::file('file1')->getClientOriginalExtension();
            $f->size = Input::file('file1')->getSize();
            $f->created_by = Input::get('user');
            $f->permission = Input::get('perm1');
            $f->parent_type = 'task';
            $f->parent_id = $pid;
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
            $f->parent_id = $pid;
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
            $f->parent_id = $pid;
            $f->save();
            Input::file('file3')->move('/public/uploads', $f->name);
        }

		$t->save();


		return Redirect::back()->with('flash_message', 'Task updated');
	}

	public function delete($id) {
			$data = array(
				'title' => 'Confirm Delete',
				'user' => Auth::user(),
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
	public function destroy($id)
	{
		if(Task::destroy($id)) {
		return Redirect::back()->with('flash_message', 'Task succesfully deleted');
		}
		else {
			$data = array(
				'user' => Auth::user(),
				'title' => 'Error Deleting Item',
				'eobj' => Task::find($id)
			);
			return View::make('errors.delete', $data);
		}
	}
}