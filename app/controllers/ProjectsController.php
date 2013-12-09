<?php

class ProjectsController extends BaseController {

	public function getIndex() {
		$data = array(
			'title' => 'Project Manager'
			);
		return View::make('projects.index', $data);
	}
}