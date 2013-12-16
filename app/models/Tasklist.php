<?php

class Tasklist extends BaseModel {
	protected $fillabe = array(
		'name', 'description', 'parent_id'
		);

	public static $rules = array(
		'parent_id' => 'integer'
		);
}
