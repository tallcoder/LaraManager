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