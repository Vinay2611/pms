<?php
Class Kra_m extends CI_Model
{
	 
     function getAllKra()
	 {
		 
	  $monthArr = array(01,02,03,04);	  
	  $current_month = date('m');
	  if(in_array($current_month,$monthArr)) {
		  $current_year = date('Y')-1 ;
	  } else {
		  $current_year = date('Y');  
	  }
  	  $next_year = date('Y')+ 1;
	  $this->db->select('*');
	  $this->db->from('kra');
	  $this->db->join('users','kra.users_id = users.users_id AND users.status="Active"');
	  $this->db->order_by('users_first_name','ASC');
	  $this->db->where('kra_application_date >=',$current_year.'-04-01');
	  $this->db->where('kra_application_date <=',$next_year.'-03-31');
	  $query = $this->db->get();
      //echo $this->db->last_query();
	  if($query->num_rows() > 0) {
		foreach($query->result() as $row) {
	    $data[] = $row;
		}
		return $data;	
	  }
	  //echo $query->result();
	 }
	 
	 
	 function getEmployee_Kra($kra_id)
	 {
	  $this->db->select('*');
	  $this->db->from('kra');
	  $this->db->join('kra_points','kra.kra_id = kra_points.kra_id AND kra.kra_id = "'.$kra_id.'"');
	  $this->db->order_by('kra_points_id','ASC');
	   //echo $this->db->last_query();
	  $query = $this->db->get();
	  if($query->num_rows() > 0) {
	    foreach($query->result() as $row) {
	    $data[] = $row;	  
		}
		return $data;
	  }
	 }
	 
	 
	 function getKraDetails($kra_points_id) {
	 $this->db->select('*');
	 $this->db->from('kra');
	 $this->db->join("users","kra.users_id = users.users_id")->join("kra_points","kra.kra_id = kra_points.kra_id AND kra_points.kra_points_id =".$kra_points_id);   
	 //$this->db->where(array('kra_points_id' =>$kra_points_id));
	 $query = $this->db->get();	 
	  //echo $this->db->last_query();	  
	   if($query->num_rows() > 0) {
		foreach($query->result() as $row) {
		$data[] = $row;	
		}
		return $data;		 
	   }
	 }
	 
	 function updKraDetails($kra_points_id,$data) {
	  //Code here.
	  $this->db->where('kra_points_id',$kra_points_id);
	  $this->db->update('kra_points',$data);
	  //echo $this->db->last_query(); 	 		  
	  return true;
	 }
	 
	 //Add addtional kra
	 function addKra($data) {
	 $this->db->insert('kra_points',$data);	 
	 }
	 
	 
	 //Delete KRA Point
	 function delete_kra_point($kra_points_id) {
	  $this->db->where('kra_points_id',$kra_points_id);
	  $this->db->delete('kra_points');	  
	 }
	 
	 
	 function count_details() {
	 //$currentYear = date('Y');
	  $monthArr = array(01,02,03);	  
	  $current_month = date('m');
	  if(in_array($current_month,$monthArr)) {
		  $current_year = date('Y')-1 ;
	  } else {
		  $current_year = date('Y');  
	  }
	 $q = "SELECT count(kra_id) as total FROM kra JOIN users ON users.users_id = kra.users_id AND users.status='Active' AND `kra_application_date` >= '".$current_year."-04-01'";
	 $query = $this->db->query($q);
	 if($query->num_rows() > 0)
     {
	    foreach ($query->result() as $row)
		{
		 $count = $row->total;
		}
      } 
	   return $count;
	 }
	 
	 //Total Employee Count
	 function emp_count_details() {
	 $q = "SELECT count(users_id) as emp_count FROM users WHERE users.status='Active'";
	 $query = $this->db->query($q);
	 if($query->num_rows() > 0)
     {
	    foreach ($query->result() as $row)
		{
		 $emp_count = $row->emp_count;
		}
      } 
	   return $emp_count;
	 }
	 
	 
	 
	 function kra_summary($type) {
	 $currentYear = date('Y');
	 $q = "SELECT count(kra_id) as total FROM kra JOIN users ON users.users_id = kra.users_id AND users.status='Active' AND kra_status='".$type."' AND `kra_application_date` >= '".$currentYear."-04-01'";
	 $query = $this->db->query($q);
	 //echo $this->db->last_query();
	 if($query->num_rows() > 0)
     {
	    foreach ($query->result() as $row)
		{
		 $count = $row->total;
		}
      } 
	   return $count;
	 }
	 

	 
}
?>