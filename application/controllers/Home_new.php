<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Home_new extends MY_controller {
        public function index() {
	        $name = array('amit','mayur','pashte');
		   	$this->data['p'] = $name;
		    $this->middle = 'home_new'; // its your view name, change for as per requirement.
            $this->layout();
        }
		
		
		
    }
?>