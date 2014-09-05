<?php

class Info extends Eloquent {
	
	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];
	
	public static $rules = array(
		'title'=>'required',
		'description'=>'required',
	);		
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'info';
	
	protected $primaryKey = "infoid";
	
	protected $softDelete = true;	
		
	
	/**
	 * Relationships
	 */	

}
