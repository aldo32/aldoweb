<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];
	
	public static $rules = array(
		'name'=>'required',				
		'lastname'=>'required',
		'phone'=>'numeric|min:10|max:10',
		'email'=>'required|email|unique:users,email',				
		'password'=>'required|confirmed',
		'password_confirmation'=>'required',
	);		
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	protected $primaryKey = "userid";
	
	protected $softDelete = true;	
	
	public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password;
    }    
		
    public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}
	
	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
	
	public function getReminderEmail() {
		return $this->email;
	}
	
	/**
	 * Relationships
	 */	

}
