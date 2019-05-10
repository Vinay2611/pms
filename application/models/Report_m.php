<?php
class Report_m extends CI_Model {

	 function kra_report($report_year) {
	  $this->db->select('*',false);
	  $this->db->from('kra');
 $this->db->join('users','kra.users_id = users.users_id AND users.status="Active"')->join('kra_points','kra.kra_id = kra_points.kra_id AND'." YEAR(kra_application_date) ="."'".$report_year."'",'TYPE',false); 
	  $this->db->order_by('users_first_name','ASC',false);
	  $this->db->group_by('kra.users_id',false);
	  $query = $this->db->get();
	  //echo $this->db->last_query();
	  return $query->result();	
	  }

} 
?>