<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MtrReport extends MY_Controller {

     
	  function __construct() {
		  parent::__construct();
		  //Load models
		  //$this->load->model('report_m');
		  $this->load->model('report_m');
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
		   $this->middle = 'mtrReport_v'; 
		   $this->layout();	  
		  }  else   {
		  //If no session, redirect to login page
		  redirect('login', 'refresh');
		  }				
		
   }
	
	
	function mtrReportProcess()
	 {
	  
	   $this->form_validation->set_rules('report_year', 'report_year', 'trim|required|xss_clean');
	  
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 $this->load->view('mtrReport_v');		 
	   }
	   else
	   {
		 
	  $this->load->helper('php-excel');      
	  $this->db->select('*',false);
	  $this->db->from('kra');
 $this->db->join('users','kra.users_id = users.users_id AND users.status="Active"')->join('kra_points','kra.kra_id = kra_points.kra_id AND'." YEAR(kra_application_date) ="."'".$this->input->post('report_year')."'",'TYPE',false)->join('kra_mtr','kra.kra_id = kra_mtr.kra_id'); 
	  $this->db->order_by('users_first_name','ASC',false);
	  //$this->db->group_by('kra.users_id',false);
	  $query = $this->db->get();
 echo $this->db->last_query();
$data_array[] = array('Employee Name','KRA','KPI','Weightage','KRA Status','KRA Hod Comment','KRA Application Date','KRA Approved Date','Achievements','MTR Status','MTR Hod Comment','MTR Application Date','MTR Approved Date','Helping Factors','Challenges','Initiatives','Plan of action','Last Update');	  
	  foreach ($query->result() as $row)
      {
      $data_array[] = array($row->users_first_name.' '.$row->users_last_name, $row->kra,$row->target,$row->weightage,$row->kra_status,$row->kra_hod_comment,$row->kra_application_date,$row->approved_date,$row->achievements,$row->mtr_status,$row->mtr_hod_comment,$row->mtr_application_date,$row->mtr_hod_date,$row->helping_factors,$row->challenges,$row->initiatives,$row->plan_of_action,$row->last_update_date);
      }
	  	  
      $xls = new Excel_XML;
      $xls->addArray ($data_array);
	  $date = date_format(date_create(date('d-m-y')),'d F Y');
	  $date = date('d-m-y');
      $xls->generateXML("mtr_report_".$date);
	  }
	
	 }
	
	
}
