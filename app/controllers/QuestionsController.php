<?php

class QuestionsController extends BaseController {

	public function getIndex() {
		$data = array(
			'title' => 'Make It Snappy'
			);
		return View::make('questions.index', $data);
	}
}