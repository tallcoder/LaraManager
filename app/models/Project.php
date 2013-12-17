<?php

class Project extends BaseModel {
	protected $table = 'projects';

	protected $fillable = array('name, client_id, budget_used, budget_total, completed, description');

	protected $rules = array(
		'name' => 'required|unique:projects',
		'client_id' => 'required|exists:users',
		'description' => 'required|min:10',
		'budget_used' => 'min:0|numeric',
		'budget_total' => 'min:0|numeric'
		);

	public function getProjects() {
		return Project::all();
	}

	public function user() {
		return $this->hasOne('User', 'id', 'user_id');
	}

	public function tasklists() {
		return $this->hasMany('Tasklist', 'parent_id', 'id');
	}
	
	public function getBudgetRemaining() {
		return $this->budget_total - $this->budget_used;
	}
}
