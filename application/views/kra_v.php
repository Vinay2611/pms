<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Content Header (Page header) -->
         <section class="content-header">
          <h1>
           Objective Setting
          </h1>
          <ol class="breadcrumb">
            <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Objective Setting</li>
          </ol>
        </section>
        <!-- Main Content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!--/.box -->
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
					  $kra_content = "";
					  if($kra_list) {
						  foreach($kra_list as $k) { 
						  $location = $common->getUserInfo($k->users_id);		
						 //print_r($branch_data);
						  $kra_content .= "<tr class='odd'><td>".$a."</td>
							<td>".$k->users_first_name."&nbsp;".$k->users_last_name."</td>
							<td>".$k->users_employee_id."</td>
							<td>".$location[0]->branch_name."</td>
							<td>".$location[0]->dept_name."</td>
							<td>".$location[0]->reporing_manager."</td>
							<td>".$k->kra_status."</td>
							<td><a href='".base_url()."kra/kra_view/".$k->kra_id."' tittle='Click here to edit'>View</a></td>
							</tr>";					  
						   $a++;
						   } 
					  }
					 echo $kra_content; 
					   ?>
                    </tbody>
                    <tfoot>
                      <tr>
                         <th>Sr.</th>
                        <th>Employee Name</th>
                        <th>Employee Code</th>
						<th>Branch</th>
                        <th>Department</th>
                        <th>Reporting Manager</th>
                        <th>Status</th>
                        <th>Action</th>
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
    
    
     
      

