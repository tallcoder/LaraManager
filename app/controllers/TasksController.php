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
			'project' => Project::find($id),
			'projects' => Project::all()
			);
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
			$t->list = Input::get('list');
		}
		else {
			$t->list = 0;
		}
		$t->budget_total = Input::get('budget');
		$t->begin_date = Input::get('begin_date');
		$t->due_date = Input::get('due_date');
		$t->assigned_to = Input::get('assigned_to');
		$t->save();
		$parent = Project::find(Tasklist::find($t->list)->parent_id);
		return Redirect::to('projects/' . $parent);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$t = Task::find($id);
		$data = array(
			'user' => Auth::user(),
			'title' => $t->name,
			'task' => $t,
			'list' => Tasklist::find($t->list),
			'project' => Project::find(Tasklist::find($t->list))
		);
        return View::make('tasks.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
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
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}