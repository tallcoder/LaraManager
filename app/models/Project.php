<?php

class Project extends BaseModel {
	protected $fillable = array('name, client_id, budget_used, budget_total, completed, description');

	protected $rules = array(
		'name' => 'required|unique:projects',
		'client_id' => 'required|exists:users',
		'description' => 'required|min:10',
		'budget_used' => 'min:0|numeric',
		'budget_total' => 'min:0|numeric'
		);

	protected $table = 'projects';
	
	public function getProjectName() {
		return $this->name;
	}

	
	public function getClientId($p) {
		return $this->client_id;
	}

	public function getBudgetUsed() {
		return $this->budget_used;
	}


	public function getBudgetTotal() {
		return $this->budget_total;
	}

	public function isCompleted() {
		return $this->completed;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getBudgetRemaining() {
		return $this->budget_total - $this->budget_used;
	}
}
