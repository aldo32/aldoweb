<?php

class Role extends Eloquent {
	
	use SoftDeletingTrait;	
	protected $dates = ['deleted_at'];
	
	public static $rules = array(
		'name'=>'required',				
	);		
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';
	
	protected $primaryKey = "idrol";
	
	protected $softDelete = true;	
		
	
	/**
	 * Relationships
	 */		
	public function user() {
		return $this->belongsTo('User', 'iduser');
	}

}
