<?php

class CommentsController extends BaseController {

	public function store() {
		$c = new Comment;
		$c->type = "comment";
		$c->parent = Input::get('parent');
		$c->description = Input::get('comment');
		$c->user_id = Input::get('user');
		$c->save;

		return Redirect::back();
	}
}