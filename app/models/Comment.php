<?php

class Comment extends Eloquent {
	protected $fillabe = array(
		'parent', 'description', 'user_id'
		);

	public static $rules = array(
		'user_id' => 'integer',
		'parent' => 'integer'
		);

	public function getComments() {
		return Comment::all();
	}

	public function scopeCommentsByUser($u) {
		return $query->where('user_id', '=', $u);
	}

	public function scopeCommentsByParent($p) {
		return $query->where('parent', '=', $p);
	}

	public function scopeCommentsByType($t = 'comment') {
		return $query->where('type', '=', $t);
	}
}
