<?php

class QuestionsController extends BaseController {
	public $restful = true;

	public function getIndex() {
		return View::make('questions.index')
			->with('title', 'Make It Snappy - Home');
	}
}