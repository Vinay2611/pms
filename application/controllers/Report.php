<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

     
	  function __construct() {
		  parent::__construct();
		  //Load models
		  //$this->load->model('report_m');
		  $this->load->model('user_m');
	  }
	  
	  
	  public function index()
	  {
		
		  if($this->session->userdata('logged_in'))
		  {
		   //Add session data 	   
		   $session_data = $this->session->userdata('logged_in');
		   $this->data['username'] = $session_data['username'];
		   //Add KRA Data
		   //$this->load->model('report_m');
		   //$kra_list = $this->kra_m->getAllKra();
		   //$this->data["kra_list"] = $kra_list;
		   $this->middle = 'report_v'; 
		   $this->layout();	  
		  }  else   {
		  //If no session, redirect to login page
		  redirect('login', 'refresh');
		  }				
		
   }
	
	//Report kra
	
	/*public function reports_logs() {
	
	$data = array('kra_id'=>$this->uri->segment(3),'kra_hod_status'=>'Pending');
	$this->kra_m->addKra($data);
	$this->session->set_flashdata('msg','<div class="alert alert-success text-center">KRA Point is added successfully.</div>');
	redirect('kra/kra_view/'.$this->uri->segment(3));	
	$this->middle = 'kra_display_v';
	$this->layout();
	}*/
	
	
}
