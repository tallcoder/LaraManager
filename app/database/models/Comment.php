<?php

class Comment extends BaseModel {
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

	public function scopeProjectComments($query, $p) {
		return $query->where('type', '=', 'p_comment')->where('parent', '=', $p);
	}

    public function scopeTaskComments($query, $t) {
        return $query->where('type', '=', 't_comment')->where('parent', '=', $t);
    }

    public function scopeListComments($query, $l) {
        return $query->where('type', '=', 'l_comment')->where('parent', '=', $l);
    }

	public function scopeCommentsByUser($query, $u) {
		return $query->where('user_id', '=', $u);
	}

	public function scopeCommentsByParent($query, $p) {
		return $query->where('parent', '=', $p);
	}

	public function scopeCommentsByType($query, $t = 'comment') {
		return $query->where('type', '=', $t);
	}

	public function user() {
		return $this->hasOne('User', 'id', 'user_id');
	}
}
