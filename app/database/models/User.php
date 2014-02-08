<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	public static $rules = array(
		'username' =>'required|unique:users|alpha_dash|min:4',
		'password'=>'required|alpha_num|between:4,8|confirm',
		'password_confirmation'=>'required|alpha_num|between:4,8',
		'first_name' => 'required|alpha|between:4,20',
		'last_name' => 'required|alpha|between:4,20',
		'phone' => 'numeric',
		'expires' => 'date'
		);

	protected $fillable = array('username','email','usertype');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */

	public function scopeStaff($query) {
		return $query->where('usertype', '=', 'staff');
	}

	public function scopeAdmin($query) {
		return $query->where('usertype', '=', 'admin');
	}

	public function scopeClient($query) {
		return $query->where('usertype', '=', 'client');
	}
	
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	public function projects() {
		return $this->hasMany('Project', 'user_id', 'id');
	}

	public function comments() {
		return $this->hasMany('Comment', 'user_id', 'id');
	}

	public function tasksCreated() {
		return $this->hasMany('Task', 'created_by', 'id');
	}

	public function tasksAssigned() {
		return $this->hasMany('Task', 'assigned_to', 'id');
	}

	public function tasksCompleted() {
		return $this->hasMany('Task', 'completed_by', 'id');
	}

	public function subscriptions($type) {
		return $this->hasMany('Subscription', 'user_id', 'id')->where('type', '=', $type);
	}

	public function isSubscribed($type, $id)
	{
		return Subscription::where('user_id', '=', $this->id)->where('type', '=', $type)->where('object_id', '=',
			$id);
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}