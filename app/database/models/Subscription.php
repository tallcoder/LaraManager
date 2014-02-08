<?php


class Subscription extends BaseModel {
	protected $fillable = [
		'user_id', 'object_id', 'type'
	];

	public $timestamps = false;

	public function scopeProjects($query)
	{
		return $query->where('type', '=', 'project');
	}

	public function scopeTasks($query)
	{
		return $query->where('type', '=', 'task');
	}

	public function scopeTasklists($query)
	{
		return $query->where('type', '=', 'tasklist');
	}

} 