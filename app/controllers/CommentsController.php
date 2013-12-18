<?php

class CommentsController extends BaseController {

	/*
	 * handles the creation of new comments
	 * @return page: back
	 */
	public function store() {
		$c = new Comment;
		$c->type = Input::get('type');
		$c->parent = Input::get('parent');
		$c->description = Input::get('comment');
		$c->user_id = Input::get('user');
		$c->save();

		return Redirect::back();
	}

	/*
	 *  takes the initial delete request and returns confirmation page
	 *  @param int : comment id
	 *  @return page : confirmation
	 */
	public function delete($id) {
		$data = array(
			'title' => 'Confirm Delete',
			'user' => Auth::user(),
			'item' => array('type' => 'comment', 'object' => Comment::find($id))
		);
		return View::make('layouts.confirm-delete', $data);
	}

	/*
	 * processes the comment deletion
	 * @param int : comment id
	 * @return page : back
	 */
	public function destroy($id) {
			if(Comment::destroy($id)) {
				return Redirect::to('projects')->with('flash_message', 'Comment Successfully Deleted');
			}
			else {
				$data = array(
					'user' => Auth::user(),
					'title' => 'Error Deleting Item',
					'eobj' => Comment::find($id)
				);
				return View::make('layouts.error-delete', $data);
			}
	}
}