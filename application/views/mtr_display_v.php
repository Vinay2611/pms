<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <section class="content-header">
          <h1>
           View MTR 
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url();?>home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=base_url();?>mtr">MTR</a></li>
            <li class="active">View MTR</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
			<?php echo $this->session->flashdata('msg'); ?>
              <div class="box">
                <div class="box-header">   
                 <h4><strong>Employee Name :  <?php echo $user_details[0]->users_first_name;?>  <?php echo $user_details[0]->users_last_name?></strong></h4>
                 <h5><strong>Designation :  <?php echo $user_details[0]->users_designation;?></strong></h5>
                </div>
                <div class="box-body">
                 <form role="form" name="form1" id="form1" action="<?=base_url();?>mtr/mtr_update" method="post">
                  <table class="table">
  <thead class="thead-default">
    <tr>
      <th>Sr.</th>
      <th>KRA</th>
      <th>KPI</th>
      <th>Weightage</th>
      <th>Achievement</th>
      <th>Hod Comments</th>
    </tr>
    <tbody>
    <?php  			$a=1;
					  $counter = 0;  	
					  $mtr_content = "";
					  foreach($mtr_data as $m) { 
					  $counter = 0 + $a;
					  $mtr_content .= "<tr class='odd'><th scope='row'>".$a."</th>
                        <td>".$m->kra."</td>
                        <td>".$m->target."</td>
                        <td>".$m->weightage."</td>
					    <td><textarea name='achievements[]' id='achievements_".$a."'>".$m->achievements."</textarea></td>   
						<td><textarea name='comments[]' id='comments_".$a."'>".$m->mtr_hod_comment."</textarea>
						<input name='kra_points_id[]' type='hidden' id='kra_points_".$a."' value='".$m->kra_points_id."'></td>";
						$mtr_content .="</tr>";
					  $a++;
					   } 
					 echo $mtr_content; 
					   ?>
                       <tr><td colspan="5"></td></tr>
                       <tr><td colspan="5">A) List down factors which are helping you in the process of achieving your objectives</td></tr>
                       <tr><td colspan="5">
                       <textarea class="form-control" name="helping_factors" id="helping_factors" placeholder=""><?php echo $mtr_details[0]->helping_factors;?></textarea></td></tr> 
                       <tr><td colspan="5">B) List down challenges you are facing in the process of achieving your objectives and suggest improvement measures for the same</td></tr>
            <tr><td colspan="5"><textarea class="form-control" name="challenges" id="challenges" placeholder=""><?php echo $mtr_details[0]->challenges;?></textarea></td></tr>           <tr><td colspan="5">C) List down achievements on initiatives taken, if any, which are not mentioned in the objectives above</td></tr>
            <tr><td colspan="5"><textarea class="form-control" name="initiatives" id="initiatives" placeholder=""><?php echo $mtr_details[0]->initiatives;?></textarea></td></tr> 
           <tr><td colspan="5">D) Kindly mention changes if any in points a,b and c above. 
Also mention the plan of action for your team member to help him achieve his/her objectives by year end</td></tr>
           <tr><td colspan="5"><textarea class="form-control" name="plan_of_action" id="plan_of_action" placeholder=""><?php echo $mtr_details[0]->plan_of_action;?></textarea></td></tr> 
            <tr><td colspan="5"><input type="hidden" name="kra_id" id="kra_id" value="<?php echo $mtr_details[0]->kra_id;?>"/>
            <input type="hidden" name="counter" id="counter" value="<?php echo $counter; ?>" />
            <button type="submit" class="btn btn-primary">Submit</button> &nbsp; <a href="<?=base_url();?>mtr" target="_self"><button type="button" class="btn btn-primary">Back</button></a></td></tr>  
  </tbody></thead>
</table> </form>
     
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --> 
        <!-- /.content -->
      </div><!-- /.content-wrapper -->