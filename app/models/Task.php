<?php

class Task extends BaseModel {
	protected $fillable = array(
		'name','list','created_by','assigned_to','completed_by','budget_total','description'
		);

	public static $rules = array(
		'name' => 'required',
		'description' => 'required|min:10'
		);

	/*
	*	some scopes for filtering users, budgets, and lists
	*/
	public function scopeAssignedTo($query, $id) {
		return $query->where('assigned_to', '=', $id);
	}

	public function scopeCreatedBy($query, $id) {
		return $query->where('created_by', '=', $id);
	}

	public function scopeCompletedBy($query, $id) {
		return $query->where('completed_by', '=', $id);
	}

	public function scopeTotalBudgetUnder($query, $b) {
		return $query->where('budget_total', '<', $b);
	}

	public function scopeTotalBudgetOver($query, $b) {
		return $query->where('budget_total', '>', $b);
	}

	public function scopeUsedBudgetUnder($query, $b) {
		return $query->where('budget_used', '<', $b);
	}

	public function scopeUsedBudgetOver($query, $b) {
		return $query->where('budget_used', '>', $b);
	}

	public function scopeList($query, $id) {
		return $query->where('list', '=', $id);
	}

	/*
	*	ORM mappings
	*/

	public function tasklist() {
		return $this->belongsTo('Tasklist', 'list_id', 'id');
	}

	public function createdBy() {
		return $this->belongsTo('User', 'id', 'created_by');
	}

	public function assignedTo() {
		return $this->belongsTo('User', 'id', 'assigned_to');
	}

	public function completedBy() {
		return $this->belongsTo('User', 'id', 'completed_by');
	}

	public function comments() {
		return $this->hasMany('Comment', 'parent', 'id')->where('type', '=', 'tcomment');
	}

    public function project() {
        return $this->belongsTo('Project', 'project_id', 'id');
    }
}
