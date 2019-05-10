<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <section class="content-header">
          <h1>
           View Objective Setting
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url();?>home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=base_url();?>kra">Objective Setting</a></li>
            <li class="active">View Objective Setting</li>
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
                 <h4><strong>  <?php 
				 if($user_details) {
				 echo 'Employee Name :'.$user_details[0]->users_first_name;?>  <?php echo $user_details[0]->users_last_name?></strong></h4>
                 <h5><strong><?php echo 'Designation : '.$user_details[0]->users_designation;
				  }?></strong></h5>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <!-- KRA points --> 
                    <thead>
                      <tr>
                        <th>Sr.</th>
                        <th>KRA</th>
                        <th>KPI</th>
                        <th>Weightage</th>
                        <th class="sorting_asc_disabled">HOD Comments</th>
                        <th>Status</th>
                        <th class="sorting_asc_disabled">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
					  $a=1;
					  $kra_content = "";
					  if($kra_details) {
						  foreach($kra_details as $k) { 
						  $kra_content .= "<tr class='odd'><td>".$a."</td>
							<td>".$k->kra."</td>
							<td>".$k->target."</td>
							<td>".$k->weightage."</td>
							<td>".$k->kra_hod_comment."</td>
							<td>".$k->kra_hod_status."</td>
							<td><a href='".base_url()."kra/kra_edit/".$this->uri->segment(3)."/".$k->kra_points_id."' tittle='Click here to edit'>
							<i class='glyphicon glyphicon-edit'></i></a>";
							
			if(($k->kra_hod_status == 'Pending') || (trim($k->kra) == "")) {				
			$kra_content .= "&nbsp;&nbsp;<a href='".base_url()."kra/del_kra_point/".$this->uri->segment(3)."/".$k->kra_points_id."' onClick='javascript:return confirm(\"Are you sure to Delete?\")' tittle='Click here to edit'><i class='glyphicon glyphicon-remove'></i></a>";
			}
			$kra_content .="</td></tr>";
							  
						  $a++;
						   } 
					  }
						 echo $kra_content; 
					 ?>
                    </tbody>
                    <tfoot>
                      <tr>
                         <th>Sr.</th>
                        <th>KRA</th>
                        <th>KPI</th>
                        <th>Weightage</th>
                        <th>HOD Comments</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                   <a href="<?=base_url();?>kra/kra_add_row/<?=$this->uri->segment(3);?>"><button type="button" class="btn btn-success">Add One Row</button></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --> 

        
        <!-- /.content -->
      </div><!-- /.content-wrapper -->
    
    
     
      

