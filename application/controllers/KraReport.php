<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KraReport extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('report_m','',TRUE);
	 }

	 function index()
	 {
	  
	   $this->form_validation->set_rules('report_year', 'report_year', 'trim|required|xss_clean');
	  
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 $this->load->view('report_v');
		 
	   }
	   else
	   {
		 
	  $this->load->helper('php-excel');      
	  $this->db->select('*',false);
	  $this->db->from('kra');
 $this->db->join('users','kra.users_id = users.users_id AND users.status="Active"')->join('kra_points','kra.kra_id = kra_points.kra_id AND'." YEAR(kra_application_date) ="."'".$this->input->post('report_year')."'",'TYPE',false); 
	  $this->db->order_by('users_first_name','ASC',false);
	  //$this->db->group_by('kra.users_id',false);
	  $query = $this->db->get();
	  //echo $this->db->last_query();
	  $data_array[] = array('Employee Name','KRA','KPI','Weightage','KRA Status','Hod Comment','Application Date');	  
	  foreach ($query->result() as $row)
      {
      $data_array[] = array($row->users_first_name.' '.$row->users_last_name, $row->kra,$row->target,$row->weightage,$row->kra_status,$row->kra_hod_comment,$row->kra_application_date);
      }
	  

	  
      $xls = new Excel_XML;
      $xls->addArray ($data_array);
	  $date = date_format(date_create(date('d-m-y')),'d F Y');
	  $date = date('d-m-y');
      $xls->generateXML("kra_report_".$date);
	  }
	
	 }

}
?>