<?php
class HomeController extends AppController {

	var $name = 'Home';
	var $uses = '';    		            

    function beforeFilter() {
        parent::beforeFilter(); 
        $this->layout="default";                              
    }

	function index() {		
		
	}		
	
	function mywork () {		
		
	}
	
	function contact() {
		
	}
}