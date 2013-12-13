<?php

class Task extends Eloquent {
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
	public function scopeAssignedTo($id) {
		return $query->where('assigned_to', '=', $id);
	}

	public function scopeCreatedBy($id) {
		return $query->where('created_by', '=', $id);
	}

	public function scopeCompletedBy($id) {
		return $query->where('completed_by', '=', $id);
	}

	public function scopeTotalBudgetUnder($b) {
		return $query->where('budget_total', '<', $b);
	}

	public function scopeTotalBudgetOver($b) {
		return $query->where('budget_total', '>', $b);
	}

	public function scopeUsedBudgetUnder($b) {
		return $query->where('budget_used', '<', $b);
	}

	public function scopeUsedBudgetOver($b) {
		return $query->where('budget_used', '>', $b);
	}

	public function scopeList($id) {
		return $query->where('list', '=', $id);
	}	
}
