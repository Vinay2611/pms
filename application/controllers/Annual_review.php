<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Annual_review extends MY_controller {
     
	  function __construct() {

	  parent::__construct();
	  //Load models
	  $this->load->model('mtr_m');
      $this->load->model('annual_m');
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
	   $mtr_list = $this->annual_m->getAllAnnualReview();
	   $this->data["mtr_list"] = $mtr_list;
       $this->middle = 'annual_review_v'; 
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
	public function annual_view()
	{
	   //KRA 
	   $this->data['kra_id'] = $this->uri->segment(3);
	  
	  //Get Kra data
	  $mtr_data = $this->mtr_m->getEmployee_Mtr($this->data['kra_id']);
	  $this->data['mtr_data'] = $mtr_data;
	  $annual_review_details = $this->annual_m->getAnnualDetails($this->data['kra_id']);
	  $this->data['annual_review_details'] = $annual_review_details;
	  $session_data = $this->session->userdata('logged_in');
	  $this->data['username'] = $session_data['username'];   	  
	  $user_details = $this->user_m->getEmployee_data($this->data['annual_review_details'][0]->users_id);	  
	  $this->data['user_details'] = $user_details;
	  $this->middle = 'annual_review_display_v'; 
      $this->layout();		
	}
	
	
	//Update MTR CALL model
	public function annual_review_update()
	{
	  $session_data = $this->session->userdata('logged_in');
	  $this->data['username'] = $session_data['username'];  
	  $this->data['kra_points_id'] =  $this->uri->segment(3);
	  //Update KRA Points
	  $data = array('final_achievement_words' => $this->input->post('final_achievement_words'),'final_achievement_number' => $this->input->post('final_achievement_number'),'actual_achievement_number' => $this->input->post('actual_achievement_number'),'self_rating' => $this->input->post('self_rating'),'yearly_target' => $this->input->post('yearly_target'),'final_score' => $this->input->post('final_score'),'hod_final_score' => $this->input->post('hod_final_score'),'hod_final_comments' => $this->input->post('hod_final_comments'),'kra_points_id' => $this->input->post('kra_points_id'),'counter' => $this->input->post('counter'));
	  $this->annual_m->updAnnualReviewPoints($data);
	  //Update Final Review Details
	  $final_review_data = array('important_achievments' => $this->input->post('important_achievments'),'task_next_year' => $this->input->post('task_next_year'),'job_interest' => $this->input->post('job_interest'),'improve_performance' => $this->input->post('improve_performance'),'functional_training' => $this->input->post('functional_training'),'fr_hod_comments' => $this->input->post('fr_hod_comments'));
	  $this->annual_m->updAnnualReviewDetails($this->input->post('kra_id'),$final_review_data);
	  
	  $kra_data = array('final_rating' => $this->input->post('final_rating'));
	  $this->annual_m->updAnnualKraData($this->input->post('kra_id'),$kra_data);
	  
	  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Annual Review details updated sucessfully!</div>');
	  redirect('annual_review');	
	  $this->middle = 'annual_review_display_v'; 
      $this->layout();
	}
	
	
	
	public function hr_action()
	{
   	  $session_data = $this->session->userdata('logged_in');	
	  $data = array('final_review_status' => $this->input->post('final_review_status'));
	  $msgData['msg'] = $this->annual_m->updAnnualReviewAction($this->input->post('kra_id'),$data);	 
	  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Annual Review status changed sucessfully!</div>');
	  echo json_encode($msgData); 		
	}
	
	
	
	
}
