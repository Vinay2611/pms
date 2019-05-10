<script type="text/javascript">
function update_status(kra_id,final_review_status) {
$.post('annual_review/hr_action',{kra_id:kra_id,final_review_status:final_review_status}, function(data) {
	var obj = JSON.parse(data);
	if(obj.msg == 'success') {
	 $('.alert').css('display','none');
	 window.location = 'annual_review';			
	} else {
     $('.alert').html('<div class="alert alert-success text-center">Unable to change status of Annual Review!</div>');  
	 $('.alert').css('display','block');
	}
});
}

</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Content Header (Page header) -->
         <section class="content-header">
          <h1>
          Annual Review
          </h1>
          <ol class="breadcrumb">
            <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Annual Review</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->
			<?php echo $this->session->flashdata('msg'); ?>
              <div class="box">
                <div class="box-header">   
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sr.</th>
                          <th>Employee Name</th>
                        <th>Employee Code</th>
						 <th>Branch</th>
                        <th>Department</th>
                         <th>Report Manager</th>
                        <th>Status</th>
                        <th class="sorting_asc_disabled">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
					  $this->load->helper('function_helper');
					  $common = new comman();
					  $a=1;
					  $mtr_content = "";
					  foreach($mtr_list as $m) { 
					   $location = $common->getUserInfo($m->users_id);
					   $fileData = $common->getKraFiles($m->kra_id,'final_review');
//print_r($fileData);
			
		$reset = "";
		$pending = "";
  	    $downloadButton = "";
		$view = "";
		
		if(($m->final_review_status == 'Approved') || ($m->final_review_status == 'Rejected')) {
		 $reset .= ' <a style="cursor:pointer;" onclick="update_status('.$m->kra_id.',\'Not Updated\');" tittle="Click here to change status to Reset"><img src="assets/images/reset.png" border="0"></a>';
		$pending .= ' <a style="cursor:pointer;" onclick="update_status('.$m->kra_id.',\'Pending\');" tittle="Click here to change status to Pending"><img src="assets/images/hod-icon.png" border="0"></a>';
		} else if($m->final_review_status == 'Pending') { 
			$reset .= ' <a style="cursor:pointer;" onclick="update_status('.$m->kra_id.',\'Not Updated\');" tittle="Click here to change status to Reset"><img src="assets/images/reset.png" border="0"></a>';
		} else { }
					   
	if($fileData[0]->kra_final_file !="") {
	 $downloadButton .= ' <a href="../controller/files/kra_final_doc/'.$fileData[0]->kra_final_file.'" style="cursor:pointer;" tittle="Click here to download file"><img src="assets/images/download.png" border="0"></a>';  
	} 
	
	if($m->final_review_status != 'Not Updated') {
	$view .= '<a href='.base_url().'annual_review/annual_view/'.$m->kra_id.' tittle="Click here to view and edit">View</a>';
	}
	
					   
	 $mtr_content .= "<tr class='odd'><td>".$a."</td>
              <td>".$m->users_first_name."&nbsp;".$m->users_last_name."</td>
              <td>".$m->users_employee_id."</td>
              <td>".$location[0]->branch_name."</td>
			  <td>".$location[0]->dept_name."</td>
			  <td>".$location[0]->reporing_manager."</td>
              <td>".$m->final_review_status."</td>
              <td>".$view." ".$reset."  ".$pending." ".$downloadButton."</td>
                        </tr>";					  
					  $a++;
					   } 
					 echo $mtr_content; 
					   ?>
                    </tbody>
                    <tfoot>
                      <tr>
                         <th>Sr.</th>
                         <th>Employee Name</th>
                        <th>Employee Code</th>
						 <th>Branch</th>
                        <th>Department</th>
                         <th>Report Manager</th>
                        <th>Status</th>
                        <th class="sorting_asc_disabled">Action</th>                    
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --> 

        
        <!-- /.content -->
      </div><!-- /.content-wrapper -->
    
    
     
      

