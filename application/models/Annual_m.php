<?php
Class Annual_m extends CI_Model
{


    function getAllAnnualReview()	 {
	  $report_year = date('Y')-1;
	  $this->db->select('*',false);
	  $this->db->from('kra');
	  $this->db->join('users','kra.users_id = users.users_id AND users.status="Active" AND kra.kra_status="Approved"'."AND YEAR(kra_application_date)="."'".$report_year."'")->join('kra_points','kra.kra_id = kra_points.kra_id','TYPE',false); 
	  $this->db->order_by('users_first_name','ASC',false);
	  $this->db->group_by('kra.users_id',false);
	  $query = $this->db->get();
	  //echo $this->db->last_query();
	  return $query->result();	  
	 }
	
	
	
	
	
	function getAnnualDetails($kra_id) {
	 $this->db->select('*');
	 $this->db->from('kra');
	 $this->db->join('kra_final_review','kra.kra_id = kra_final_review.kra_id AND kra_final_review.kra_id ='.$kra_id);
	 //echo $this->db->last_query();
	 $query = $this->db->get();
	   if($query->num_rows() > 0) {
		foreach($query->result() as $row) {
		$data[] = $row;	
		}
		return $data;		 
	   }
	}

	 
	 
	 function updAnnualReviewDetails($kra_id,$final_review_data) {
	  //Code here.
	  $this->db->where('kra_id',$kra_id);
	  $this->db->update('kra_final_review',$final_review_data);
	  //echo $this->db->last_query(); 	 		  
	  return true;
	 }
	 
	 
	  function updAnnualKraData($kra_id,$kra_data) {
	  //Code here.
	  $this->db->where('kra_id',$kra_id);
	  $this->db->update('kra',$kra_data);
	  //echo $this->db->last_query(); 	 		  
	   return true;
	 }
	 
	
	 function updAnnualReviewPoints($data) {
		for($i=0;$i<$data['counter'][0];$i++) {
	$query = $this->db->query('UPDATE kra_points SET yearly_target="'.$data['yearly_target'][$i].'",final_achievement_number="'.$data['final_achievement_number'][$i].'",final_achievement_words="'.$data['final_achievement_words'][$i].'",actual_achievement_number="'.$data['actual_achievement_number'][$i].'",final_score="'.$data['final_score'][$i].'",hod_final_score="'.$data['hod_final_score'][$i].'" WHERE kra_points_id='.$data['kra_points_id'][$i]);
	    }
	 return true;
	 }
	 
	
	 function count_details() {
	 $currentYear = date('Y')-1;
	 $q = "SELECT count(kra.kra_id) as total FROM kra JOIN users ON users.users_id = kra.users_id AND users.status='Active' AND kra.mtr_application_date >= '".$currentYear."-04-01' AND kra.final_review_status='Processed'";
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
	 
	 
	 function annual_summary($type) {
	 $previousYear = date('Y')-1;
	  $currentYear = date('Y');
	 $q = "SELECT count(kra_id) as total FROM kra JOIN users ON users.users_id = kra.users_id AND users.status='Active' AND kra.final_review_status='".$type."'";
	 if($type == 'Not Updated') {
	 $q .= " AND `kra_application_date` >= '".$previousYear."-04-01'";	 
	 } else {
	 $q .= " AND Year(final_application_date) = '".$currentYear."'";	 
	 }
	 	 
	 $query = $this->db->query($q,false);
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
	 
	//Update Action
	 function updAnnualReviewAction($id,$data) {
	  $status =  "";
	  $this->db->where('kra_id',$id);
	  $this->db->update('kra',$data);
       if($this->db->affected_rows() > 0){
   	   $status =  'success';
       } else {
       $status =  'fail';
       }
	   return $status;
	   
	 } 
	 
	 
	 
}
?>