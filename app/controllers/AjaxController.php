<?php

class AjaxController extends BaseController {
	public function subscribe($type, $id)
	{
		$u = Auth::user();
		Subscription::create(['user_id' => $u->id, 'object_id' => $id, 'type' => $type]);
		return "$u->first_name been successfully subscribed to $type number $id";
	}
} 