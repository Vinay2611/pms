<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	 }

	 function index()
	 {
		 if($this->session->userdata('logged_in'))
		  {
		   //Add session data 	   
		   $session_data = $this->session->userdata('logged_in');
		   $this->data['username'] = $session_data['username'];
		   $this->load->helper(array('form'));
		   $this->load->view('home');
		  }  else {
			  
		  $this->load->view('login_v');
		  }
		 
		 
	
	
	 }

}
?>