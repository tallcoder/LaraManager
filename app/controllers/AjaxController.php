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
} 