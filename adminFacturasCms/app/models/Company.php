<?php

class Company extends Eloquent {
	
	use SoftDeletingTrait;	
	protected $dates = ['deleted_at'];
	
	public static $rules = array(
		'name'=>'required',
		'description'=>'required',		
	);		
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'company';
	
	protected $primaryKey = "idcompany";
	
	protected $softDelete = true;	
		
	
	/**
	 * Relationships
	 */		
	public function user() {
		return $this->hasOne('User', 'iduser');
	}

}
