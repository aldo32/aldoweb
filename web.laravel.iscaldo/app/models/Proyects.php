<?php

class Proyects extends Eloquent {
	
	use SoftDeletingTrait;	
	protected $dates = ['deleted_at'];
	
	public static $rules = array(
		'name'=>'required',
		'description'=>'required',		
		'file'=>'required'
	);		
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'proyects';
	
	protected $primaryKey = "proyectid";
	
	protected $softDelete = true;	
		
	
	/**
	 * Relationships
	 */	

}
