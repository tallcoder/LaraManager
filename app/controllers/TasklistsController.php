<?php

class TasklistsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array(
			'title' => 'Task Lists Overview',
			'user' => Auth::user()
			);
        return View::make('lists.index', $data);
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
			'projects' => Project::all(),
			'title' => 'Create Task List'
			);
        return View::make('lists.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$l = new Tasklist;
		$l->name = Input::get('name');
		$l->description = Input::get('description');
		$l->parent_id = Input::get('parent');
		$l->save();

		return Redirect::to('projects');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($pid, $lid)
	{
		$data = array(
			'list' => Tasklist::find($lid),
			'project' => Project::find($pid),
			'tasks' => Task::where('list_id', '=', $lid)->get(),
			'user' => Auth::user(),
			'title' => Tasklist::find($lid)->name
			);
        return View::make('lists.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('lists.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$l = Tasklist::find($id);

		$l->save();
		return Redirect::back()->with('flash_message', 'Task List succesfully updated');
	}


	/*
	 * gets the confirm delete page
	 * @param int : tasklist id
	 * @return page : layouts.confirm-delete
	 */
	public function delete($id) {
		$data = array(
			'user' => Auth::user(),
			'title' => 'Confirm Delete',
			'item' => array('type' => 'tasklist', 'object' => Tasklist::find($id))
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
		if(Tasklist::destroy($id)) {
			$data = array(
				'user' => Auth::user(),
				'title' => 'Home'
			);
			return View::make('/')->with('flash_message', 'Task List succesfully deleted');
		}

		else {
			$data = array(
				'user' => Auth::user(),
				'eobj' => Tasklist::find($id),
				'title' => 'Error Deleting Item'
			);
			return View::make('errors.delete', $data);
		}

	}

}
