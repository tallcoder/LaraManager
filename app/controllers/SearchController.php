<?php

class SearchController extends BaseController {
	public function get()
	{
		$q = Input::get('q');
		$data = [
			'projects' => Project::search($q)->get(),
			'tasks' => Task::search($q)->get(),
			'lists' => Tasklist::search($q)->get(),
			'query' => $q,
			'n' => 1,
			'title' => "Search Results"
		];
		return View::make('search.results', $data);
	}
} 