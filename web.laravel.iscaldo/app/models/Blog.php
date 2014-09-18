<?php

class Blog extends Eloquent {
	
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
	protected $table = 'blog';
	
	protected $primaryKey = "blogid";
	
	protected $softDelete = true;	
		
	
	/**
	 * Relationships
	 */	
}
