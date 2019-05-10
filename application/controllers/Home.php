<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends MY_Controller {

		function __construct() {
		    parent::__construct();
		    //Load models
	  	    $this->load->model('kra_m');
            $this->load->model('mtr_m');
		    $this->load->model('annual_m');
		    $this->load->helper('function_helper');
		}
		
		public function index() {
			
			$common = new comman();
           
		    if($this->session->userdata('logged_in'))  {
	        //Add session data 	   
            $session_data = $this->session->userdata('logged_in');
		    $this->data['username'] = $session_data['username'];
			//Employee Count
			$this->data['emp_count'] = $this->kra_m->emp_count_details(); 
			
			$this->data['count'] = $this->kra_m->count_details(); 
			$this->data['kra_pending'] = $this->kra_m->kra_summary('Pending'); 
			$this->data['kra_approved'] = $this->kra_m->kra_summary('Approved');   
			$this->data['kra_partly_approved'] = $this->kra_m->kra_summary('Partly Approved'); 
			$this->data['kra_disapproved'] = $this->kra_m->kra_summary('Rejected'); 
			//Get MTR status
			$this->data['mtr_count'] = $this->mtr_m->count_details();
			$this->data['mtr_not_updated'] = $this->mtr_m->mtr_summary('Not Updated');
			$this->data['mtr_pending'] = $this->mtr_m->mtr_summary('Pending');
			$this->data['mtr_approved'] = $this->mtr_m->mtr_summary('Approved');
			
			//Get Annual App
			//Get MTR status
			$this->data['annual_count'] = $this->annual_m->count_details();
			$this->data['annual_pending'] = $this->annual_m->annual_summary('Pending');
			$this->data['annual_not_updated'] = $this->annual_m->annual_summary('Not Updated');
			$this->data['annual_approved'] = $this->annual_m->annual_summary('Approved');

			//Find today's activity
			$this->data['todays_activity'] = $common->getTodaysActivity();
			$this->middle = 'home'; // its your view name, change for as per requirement.
            $this->layout();		

		   } else {
			 redirect('login', 'refresh');  
		   }
        }

		public function logout() {
            $this->session->unset_userdata('logged_in');
            session_destroy();
            redirect('login', 'refresh');
 		}

		
    }
?>