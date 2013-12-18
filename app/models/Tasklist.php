<?php

class Tasklist extends BaseModel {
	protected $fillabe = array(
		'name', 'description', 'parent_id'
		);

	public static $rules = array(
		'parent_id' => 'integer'
		);

	public function project() {
		return $this->belongsTo('Project', 'id', 'parent_id');
	}

	public function tasks() {
		return $this->hasMany('Task', 'list_id', 'id');
	}
}
