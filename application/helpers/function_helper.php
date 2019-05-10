<?php
//Comman functions
class comman extends CI_Model {


//if(!function_exists('getUserInfo')) {
/***
 SELECT u.users_first_name,u.users_last_name,u1.users_first_name,d.dept_name,b.branch_name FROM users as u JOIN department as d JOIN users_reporting as ur 
 JOIN users as u1 JOIN branch as b ON u.dept_id = d.dept_id AND ur.users_id = u1.users_id AND ur.dept_id = u.dept_id AND u.branch_id = b.branch_id 
 AND u.status='Active' order by u.users_first_name ASC   **/	
  function getUserInfo($users_id) {
  $query = $this->db->query("SELECT u.users_first_name,u.users_last_name,concat(u1.users_first_name,' ',u1.users_last_name) as reporing_manager,d.dept_name,b.branch_name FROM users as u JOIN department as d JOIN users_reporting as ur 
 JOIN users as u1 JOIN branch as b ON u.dept_id = d.dept_id AND ur.users_id = u1.users_id AND ur.dept_id = u.dept_id AND u.branch_id = b.branch_id 
 AND u.status='Active' AND u.users_id='".$users_id."' order by u.users_first_name ASC");  
  //$query = $this->db->get();
  //echo $this->db->last_query();
  if($query->num_rows() > 0) {
	 foreach($query->result() as $row) {
		  
		  $data[] = $row;
	  }
	 return $data;  
   }
 }
 
 function getKraFiles($kra_id,$section) {
  $query = $this->db->query("SELECT document as kra_final_file FROM kra_files WHERE kra_id='".$kra_id."' AND section='".$section."' ORDER BY kra_file_id ASC");  
   //echo $this->db->last_query();
  if($query->num_rows() > 0) {
	 foreach($query->result() as $row) {
		  $data[] = $row;
	  }
	 return $data;  
   }
 }
 
 
  function getTodaysActivity() {
   $query = $this->db->query("SELECT COUNT( kra_id ) AS total FROM  `kra`  WHERE final_application_date >= CURDATE()");  
   if($query->num_rows() > 0) {
   $result = $query->row_array();
   return $result;  
   }
 }
 




} // end of class
