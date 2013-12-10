<?php

class ProjectsController extends BaseController {

	public function index() {
		$data = array(
			'title' => 'ProMan',
			'up' => Auth::user()->userperm
			);
		if(Auth::user()->usertype != "client") {
		return View::make('projects.index', $data);
	  }
	  	else return View::make('projects.single', $data);
	}
}