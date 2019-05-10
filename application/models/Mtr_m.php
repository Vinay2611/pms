<?php
Class Mtr_m extends CI_Model
{
	 function getAllMtr()
	 {
	  $monthArr = array(01,02,03,04);	  
	  $current_month = date('m');
	  if(in_array($current_month,$monthArr)) {
		  $current_year = date('Y')-1 ;
	  } else {
		  $current_year = date('Y');  
	  }
  	  $next_year = date('Y')+ 1;
	 
	 /* $this->db->select('*');
	  $this->db->from('kra');
	  $this->db->join('users','kra.users_id = users.users_id AND users.status="Active" AND kra.kra_status="Approved"')->join('kra_mtr','kra.kra_id = kra_mtr.kra_id');*/	  
	  $query = "SELECT kra.*,kra_mtr.*,users.* FROM kra JOIN users JOIN kra_mtr ON users.users_id = kra.users_id AND users.status='Active' AND kra.kra_status='Approved' AND kra.kra_id = kra_mtr.kra_id AND kra.mtr_application_date >= '".$current_year."-04-01' AND kra.mtr_application_date <= '".$next_year."-03-31' group by kra.users_id";
	 //echo $query;
	 $query = $this->db->query($query);	   
	  //$this->db->order_by('users_first_name','ASC');
	  //$this->db->group_by('kra.users_id');
	  //$query = $this->db->get();
	  //echo $this->db->last_query();
	  return $query->result();	  
	 }
	 
	 
	 function getEmployee_Mtr($kra_id)
	 {
	  $this->db->select('*');
	  $this->db->from('kra');
	  $this->db->join('kra_points','kra.kra_id = kra_points.kra_id AND kra.kra_id = "'.$kra_id.'"');
	  $this->db->order_by('kra_points_id','ASC');
	  $query = $this->db->get();
	   //echo $this->db->last_query();
	  return $query->result();	 
	 }
	 
	 
	 function getMtrDetails($kra_id) {
	 $this->db->select('*');
	 $this->db->from('kra');
	 $this->db->join('kra_mtr','kra.kra_id = kra_mtr.kra_id AND kra_mtr.kra_id ='.$kra_id);
	 $query = $this->db->get();
	   if($query->num_rows() > 0) {
		foreach($query->result() as $row) {
		$data[] = $row;	
		}
		return $data;		 
	   }
	 }
	 
	 
	 function updMtrDetails($kra_id,$mtr_data) {
	  //Code here.
	  $this->db->where('kra_id',$kra_id);
	  $this->db->update('kra_mtr',$mtr_data);
	  //echo $this->db->last_query(); 	 		  
	  return true;
	 }
	 
	
	 function updMtrPoints($data) {
		for($i=0;$i<$data['counter'][0];$i++) {
	$query = $this->db->query('UPDATE kra_points set achievements="'.$data['achievements'][$i].'",mtr_hod_comment="'.$data['comments'][$i].'" WHERE kra_points_id='.$data['kra_points_id'][$i]);
	    }
	 return true;
	 }
	 
	
	 function count_details() {
	 $currentYear = date('Y');
	 $q = "SELECT count(kra.kra_id) as total FROM kra JOIN users ON users.users_id = kra.users_id AND users.status='Active' AND kra.mtr_application_date >= '".$currentYear."-04-01'";
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
	 
	 
	 function mtr_summary($type) {
	 $currentYear = date('Y');
	 $q = "SELECT count(kra_id) as total FROM kra JOIN users ON users.users_id = kra.users_id AND users.status='Active' AND kra.mtr_status='".$type."'";
	 if($type == 'Not Updated') {
	 $q .= " AND `kra_application_date` >= '".$currentYear."-04-01'";	 
	 } else {
	 $q .= " AND `mtr_application_date` >= '".$currentYear."-04-01'";	 
	 }
	 	 
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