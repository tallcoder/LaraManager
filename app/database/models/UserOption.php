<?php


class UserOption extends BaseModel {
	protected $fillable = array( 'user_id', 'notify', 'notify_frequency');
} 