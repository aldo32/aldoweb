<?php

class Bill extends Eloquent {
	
	use SoftDeletingTrait;	
	protected $dates = ['deleted_at'];
	
	public static $rules = array(
		'filepdf'=>'required|max:10000|mimes:pdf',
		'filexml'=>'required|max:10000|mimes:xml',
		'message'=>'',
	);		
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bills';
	
	protected $primaryKey = "idbill";
	
	protected $softDelete = true;	
		
	
	/**
	 * Relationships
	 */		
	public function user() {
		return $this->hasMany('User', 'iduser');
	}
	
	public function role() {
		return $this->hasMany('Role', 'idrol');
	}
	
	public function company() {
		return $this->hasMany('Company', 'idcompany');
	}

}
