<?php

class AjaxController extends BaseController {
	public function subscribe($type, $id)
	{
		if($type === 'project') {
			Project::find($id)->subscribe();
		}
		else if ($type === 'task') {
			Task::find($id)->subscribe();
		}

		else if ($type === 'tasklist') {
			Tasklist::find($id)->subscribe();
		}
		$name = Auth::user()->first_name;
		return "$name been successfully subscribed to $type number $id";
	}

	public function complete($id)
	{
		$t = Task::find($id);
		$t->completed = true;
		$t->save();
		Event::fire('task.complete');
		return "$t->name successfully marked completed!";
	}

	public function deleteTask($id)
	{
		if(Auth::user()->usertype === 'admin' || Auth::user()->usertype === 'staff')
		{
			$t = Task::find($id);
			$t->delete();
			return "Task successfully deleted!";
		}
		else return "Insufficient permissions to delete this task!";
	}

	public function deleteUser($id)
	{
		if(Auth::user()->usertype === 'admin')
		{
			User::destroy($id);
			return "User successfully deleted!";
		}

		else return "Insufficient permissions to delete users!";
	}
} 