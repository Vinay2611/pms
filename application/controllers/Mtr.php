<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtr extends MY_controller {
     
	  function __construct() {

	  parent::__construct();
	  //Load models
	  $this->load->model('mtr_m');
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
	   $this->load->model('kra_m');
	   $mtr_list = $this->mtr_m->getAllMtr();
	   $this->data["mtr_list"] = $mtr_list;
       $this->middle = 'mtr_v'; 
       $this->layout();	  
	  }  else   {
      //If no session, redirect to login page
      redirect('login', 'refresh');
   	  }
				
		
	}
	
	
	//Edit kra
	public function kra_edit()
	{
	   
	   $session_data = $this->session->userdata('logged_in');
	  $this->data['username'] = $session_data['username'];  
	  $this->data['kra_points_id'] =  $this->uri->segment(4);
	  
	   
	   //Get Kra data
	  $kra_details = $this->kra_m->getKraDetails($this->data['kra_points_id']);
	  $this->data['kra_details'] = $kra_details;
	   foreach($kra_details as $kra) {	
		$this->data['kraArr'] = $kra;
	   }
	  
	  $this->middle = 'kra_update_v'; 
      $this->layout();
		
	}
	
	//Edit kra
	public function mtr_view()
	{
	   //KRA 
	   $this->data['kra_id'] = $this->uri->segment(3);
	  
	  //Get Kra data
	  $mtr_data = $this->mtr_m->getEmployee_Mtr($this->data['kra_id']);
	  $this->data['mtr_data'] = $mtr_data;
	  $mtr_details = $this->mtr_m->getMtrDetails($this->data['kra_id']);
	  $this->data['mtr_details'] = $mtr_details;
	  $session_data = $this->session->userdata('logged_in');
	  $this->data['username'] = $session_data['username'];   	  
	  $user_details = $this->user_m->getEmployee_data($this->data['mtr_details'][0]->users_id);	  
	  $this->data['user_details'] = $user_details;
	  $this->middle = 'mtr_display_v'; 
      $this->layout();		
	}
	
	
	//Update MTR CALL model
	public function mtr_update()
	{
	  $session_data = $this->session->userdata('logged_in');
	  $this->data['username'] = $session_data['username'];  
	  $this->data['kra_points_id'] =  $this->uri->segment(3);
	  //Update MTR Points
	  $data = array('achievements' => $this->input->post('achievements'),'comments' => $this->input->post('comments'),'kra_points_id' => $this->input->post('kra_points_id'),'counter' => $this->input->post('counter'));
	  $this->mtr_m->updMtrPoints($data);
	  //Update Mtr Data
	  $mtr_data = array('helping_factors' => $this->input->post('helping_factors'),'challenges' => $this->input->post('challenges'),'initiatives' => $this->input->post('initiatives'),'plan_of_action' => $this->input->post('plan_of_action'));
	  $this->mtr_m->updMtrDetails($this->input->post('kra_id'),$mtr_data);
	  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">MTR details updated sucessfully!</div>');
	  redirect('mtr');	
	  $this->middle = 'kra_display_v'; 
      $this->layout();
	}
	
	
	
	
	
	
	
	
	
	
	
}
