<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kra extends MY_Controller {

     
	  function __construct() {
	  
	  parent::__construct();
	  //Load models
	  $this->load->model('kra_m');
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
	   $kra_list = $this->kra_m->getAllKra();
	   $this->data["kra_list"] = $kra_list;
	   $this->middle = 'kra_v'; 
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
	  if(isset($kra_details)) {
	    foreach($kra_details as $kra) {	
		$this->data['kraArr'] = $kra;
	    }
	  }
	  
	  $this->middle = 'kra_update_v'; 
      $this->layout();
		
	}
	
	//Edit kra
	public function kra_view()
	{
	   //KRA 
	   $this->data['kra_id'] = $this->uri->segment(3);
	  
	  //Get Kra data
	  $kra_details = $this->kra_m->getEmployee_Kra($this->data['kra_id']);
	  $this->data['kra_details'] = $kra_details;	  
	  
	  $session_data = $this->session->userdata('logged_in');
	  $this->data['username'] = $session_data['username'];   
	  
	  
	  $user_details = $this->user_m->getEmployee_data($this->data['kra_details'][0]->users_id);	  
	  $this->data['user_details'] = $user_details;
	  $this->middle = 'kra_display_v'; 
      $this->layout();		
	}
	
	
	//Update KRA
	public function kra_update()
	{
	  $session_data = $this->session->userdata('logged_in');
	  $this->data['username'] = $session_data['username'];  
	  $this->data['kra_points_id'] =  $this->uri->segment(3);
	  $data = array('kra' => $this->input->post('kra'),'target' => $this->input->post('target'),'weightage' => $this->input->post('weightage'));
	  $result = $this->kra_m->updKraDetails($this->input->post('kra_points_id'),$data);
	  //$u = $this->kra_m->getKraDetails($this->input->post('kra_points_id')); 

	   $message = "";
	  if($result) {
	    
	   
	   //Fetch email id	 
	   $kra_point_details = $this->kra_m->getKraDetails($this->input->post('kra_points_id'));  
	   $to = $kra_point_details[0]->users_email_id;
	   $subject = 'Your below KRA has been updated by HR department.';
	   //Send KRA Point data in EMAIL	   
	   $message .= '<table cellpadding="0" cellspacing="0" border="0" align="center" style="background:#FBFBFB; width:100%; padding:20px; font-family:Arial, Helvetica, sans-serif; "><tr><td align="left"><img src="https://www.shobizxtrac.com/images/logo.png"></td></tr>
   <tr><td><h2 style="color:#ED2F59; font-size:16px;">Your below KRA has been updated by HR department.</h2></td></tr><tr><td>
   		<table cellpadding="0" cellspacing="0" border="1px" style="width:100%; text-align:center; font-family:Arial, Helvetica, sans-serif; line-height:20px; font-size:14px; background:#FFFFFF;"><tr><td style="font-weight:bold; font-size:16px; padding:10px;">Key Result Areas<br> 
(KRA)</td><td style="font-weight:bold; font-size:16px; padding:10px;">Key Performance Indicator<br>(KPI)</td><td style="font-weight:bold; font-size:16px; padding:10px;">Weightage (%)<br>(W)</td></tr>';    

     $message .='<tr style="background:#eeeeef;">
        	<td style="padding:10px;">'.$kra_point_details[0]->kra.'</td>
            <td style="padding:10px;">'.$kra_point_details[0]->target.'</td>
            <td style="padding:10px;">'.$kra_point_details[0]->weightage.'</td></tr>';
      
	$message .='</table></td></tr><tr><td><p>To check please visit below link and check KRA Submission in HR & Admin: </p>
        <p><a href="https://www.shobizxtrac.com/ " target="_blank">https://www.shobizxtrac.com/ </a></p>
        <p>If you are unable to visit this link, please copy and paste it in your browser </p></td></tr></table>';
	
		
	   $this->sendmail($to,$subject,$message);
	   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">KRA details updated sucessfully!</div>');
	   redirect('kra/kra_view/'.$this->input->post('kra_id'));
	   }
	  //echo $this->db->last_query();	
	  $this->middle = 'kra_update_v'; 
      $this->layout();
	}
	
	
	public function kra_add_row() {
	
	$data = array('kra_id'=>$this->uri->segment(3),'kra_hod_status'=>'Pending');
	$this->kra_m->addKra($data);
	$this->session->set_flashdata('msg','<div class="alert alert-success text-center">KRA Point is added successfully.</div>');
	redirect('kra/kra_view/'.$this->uri->segment(3));	
	$this->middle = 'kra_display_v';
	$this->layout();
	}
	
	
	//Delete KRA
	public function del_kra_point()
	{
	   
	$session_data = $this->session->userdata('logged_in');
	$this->data['username'] = $session_data['username'];  
	$kra_id =  $this->uri->segment(3);	  
	$kra_point_id =  $this->uri->segment(4);	 
	$this->session->set_flashdata('msg','<div class="alert alert-success text-center">KRA Point is deleted successfully.</div>'); 
	   
	//Get Kra data
	$kra_details = $this->kra_m->delete_kra_point($kra_point_id);
	redirect('kra/kra_view/'.$kra_id);
    $this->middle = 'kra_display_v';
	$this->layout();
	}
	
	
	
	function sendmail($to,$subject,$message)
    {
    $this->load->library('email'); // load email library
    $this->email->from('support@shobizxtrac.com', 'HRKONNECT');
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);
    if($this->email->send())
    echo "Mail Sent!";
    else
    echo "There is error in sending mail!";
    }
	
	
	
}
