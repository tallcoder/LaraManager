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
}
