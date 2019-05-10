<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArReport extends MY_Controller {

     
	  function __construct() {
		  parent::__construct();
		  //Load models
		  //$this->load->model('report_m');
		  $this->load->model('report_m');
		   $this->load->helper('function_helper');
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
		   $this->middle = 'arReport_v'; 
		   $this->layout();	  
		  }  else   {
		  //If no session, redirect to login page
		   redirect('login', 'refresh');
		  }				
		
   }
	
	
	function arReportProcess()
	 {
	  
	   $this->form_validation->set_rules('report_year', 'report_year', 'trim|required|xss_clean');
	  
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 $this->load->view('arReport_v');		 
	   }
	   else
	   {
	  $this->load->helper('php-excel');      
	  $this->db->select('*',false);
	  $this->db->from('kra');
 $this->db->join('users','kra.users_id = users.users_id AND users.status="Active"')->join('kra_points','kra.kra_id = kra_points.kra_id AND'." YEAR(kra_application_date) ="."'".$this->input->post('report_year')."'",'TYPE',false)->join('kra_final_review','kra.kra_id = kra_final_review.kra_id'); 
	  $this->db->order_by('users_first_name','ASC',false);
	  $query = $this->db->get();
      
	  //echo $this->db->last_query();
$data_array[] = array('Employee Name','Reporting Manager','KRA','KPI','Weightage','Achievement','MTR Hod Comment','Target','Final Achievement Numbers','Actual Achievement Number','Actual Achievement Words','Final Score','Hod Final Score','Important achievments','Task next year','Job Interest','Improve performance','Functional Behavioral','Final Hod Comments','Final Review Status');
      if($query->num_rows() > 0)
      {
		foreach ($query->result() as $row)
        {
        $common = new comman();
		$userData = $common->getUserInfo($row->users_id);
	   		
		
		$userData = $common->getUserInfo($row->users_id);
      $data_array[] = array($row->users_first_name.' '.$row->users_last_name,$userData[0]->reporing_manager, $row->kra,$row->target,$row->weightage,$row->achievements,$row->mtr_hod_comment,$row->yearly_target,$row->final_achievement_number,$row->actual_achievement_number,$row->final_achievement_words,$row->final_score,$row->hod_final_score,$row->important_achievments,$row->task_next_year,$row->job_interest,$row->improve_performance,$row->functional_training,$row->fr_hod_comments,$row->final_review_status);
        }
	  
	  } else {
	
   	   $data_array[] = 'Data is not available.';	  
	  
	  }
	  	  
	  $xls = new Excel_XML;
	  if($data_array) {
      $xls->addArray($data_array);
	  }
	  $date = date_format(date_create(date('d-m-y')),'d F Y');
	  $date = date('d-m-y');
      $xls->generateXML("Annual_report_".$date);
	  }
	
	 }
	
}