<script type="text/javascript">
function showFinalScore(id) {
  if(id) {
   var totalScore = $("#final_achievement_number_"+id).val() / $("#yearly_target_"+id).val() * $("#weightage_"+id).val(); 
		if(totalScore > 0) {
		$("#final_score_"+id).val(totalScore);	
	   } else { 
		$("#final_score_"+id).val('');	
	   }	
   } else {
	alert("Something went wrong, Please try after some time.");
	return true;   
   }
}


function showActualScore(id) {
  if(id) {
   var actotalScore = $("#actual_achievement_number_"+id).val() / $("#yearly_target_"+id).val() * $("#weightage_"+id).val(); 
		if(actotalScore > 0) {
		$("#hod_final_score_"+id).val(actotalScore);	
	   } else { 
		$("#hod_final_score_"+id).val('');	
	   }	
   } else {
	alert("Something went wrong, Please try after some time.");
	return true;   
   }
}
</script>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <section class="content-header">
          <h1>
           View Annual Review 
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url();?>home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=base_url();?>annual_review">Annual Review</a></li>
            <li class="active">View Annual Review</li>
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
                 <form role="form" name="form1" id="form1" action="<?=base_url();?>annual_review/annual_review_update" method="post">
                  <table class="table" border="0">
  <thead class="thead-default">
    <tr>
      <th>Sr.</th>
      <th>KRA</th>
      <th>KPI</th>
      <th>Weightage <br /><span style="font-size:10px; text-align:center;">(W)</span></th>     
      <th>MTR <br />Achievement</th>
      <th>MTR <br />Hod Comments</th>
       <th>Annual Target <br /><span style="font-size:10px;">(T)</span></th>
       <th>Achievements <br /><span style="font-size:10px;">(A)</span></th>  
      <th>Achievement figures by HOD <br /><span style="font-size:10px;">(FA)</span></th>
      <th>HOD Remarks on Achievements </th>    
      <th>Details of Achievements</th>
     <th>Final Score</th>
     <th>HOD Final Score</th>
    </tr>
    <tbody>
    <?php  			$a=1;
					  $counter = 0;  	
					  $mtr_content = "";
					  $total_score = "";
					  $total_hod_score = "";
					  foreach($mtr_data as $m) { 
					  $counter = 0 + $a;
					  $mtr_content .= "<tr class='odd'><th scope='row'>".$a."</th>
                        <td>".$m->kra."</td>
                        <td>".$m->target."</td>
                        <td><input type='hidden' name='weightage[]' id='weightage_".$a."' value='".$m->weightage."' size='5'>".$m->weightage."</td>
					    <td>".$m->achievements."</td>
						<td>".$m->mtr_hod_comment."
						<input name='kra_points_id[]' type='hidden' id='kra_points_".$a."' value='".$m->kra_points_id."'></td>
					  	<td><input type='text' name='yearly_target[]' id='yearly_target_".$a."' value='".$m->yearly_target."' size='5'></td>
						<td><input type='text' name='final_achievement_number[]' id='final_achievement_number_".$a."' value='".$m->final_achievement_number."' size='10' onChange='showFinalScore(".$a.");'></td>
						<td><input type='text' name='actual_achievement_number[]' id='actual_achievement_number_".$a."' value='".$m->actual_achievement_number."' size='10' onChange='showActualScore(".$a.");'></td>
						<td>".$m->hod_final_comments."</td>
						<td><textarea class='form-control' name='final_achievement_words[]' id='final_achievement_words_".$a."'>".$m->final_achievement_words."</textarea></td>
						<td><input type='text' name='final_score[]' id='final_score_".$a."' value='".$m->final_score."' size='5'></td>
						<td><input type='text' name='hod_final_score[]' id='hod_final_score_".$a."' value='".$m->hod_final_score."' size='5'></td>";						
						$mtr_content .="</tr>";
						$total_score += $m->final_score;
						$total_hod_score += $m->hod_final_score;
					  $a++;
					   } 
					 echo $mtr_content; 
					 
					 
					 
					 
					 
					 
					   ?>
                       <tr><td colspan="11" align="right">Total Score:  </td><td align="center"><?=round($total_score);?></td><td align="center"><?=round($total_hod_score);?></td><td colspan="2"></td></tr>
                      <tr><td colspan="12" align="right">Rating:  </td><td><input type="text" size="5" name="final_rating" id="final_rating" value="<?php echo $annual_review_details[0]->final_rating;?>"/></td></tr>
                      </tbody></thead></table>
                       
                       
                      
                       <table border="0" cellpadding="0" cellspacing="2" width="100%">
                       <tr><td>A) What do you consider to be your most important achievements of the last year i.e. 2015- 2017?</td></tr>
                       <tr><td>
                       <textarea class="form-control" name="important_achievments" id="important_achievments" placeholder=""><?php echo $annual_review_details[0]->important_achievments;?></textarea></td></tr> 
                       <tr><td>B) What do you consider to be your most important aims and tasks in the next year, i.e. 2016- 2017?</td></tr>
            <tr><td><textarea class="form-control" name="task_next_year" id="task_next_year" placeholder=""><?php echo $annual_review_details[0]->task_next_year;?></textarea></td></tr>           <tr><td>C) What elements of your job interest you the most, and least?</td></tr>
            <tr><td><textarea class="form-control" name="job_interest" id="job_interest" placeholder=""><?php echo $annual_review_details[0]->job_interest;?></textarea></td></tr> 
           <tr><td>D) What action could be taken to improve your performance in your current position by you, and your reporting manager/Unit Head?</td></tr>
           <tr><td><textarea class="form-control" name="improve_performance" id="improve_performance" placeholder=""><?php echo $annual_review_details[0]->improve_performance;?></textarea></td></tr> 
            <tr><td>E) What sort of training/experiences would benefit you in the next year, both functional and behavioral?</td></tr>
           <tr><td><textarea class="form-control" name="functional_training" id="functional_training" placeholder=""><?php echo $annual_review_details[0]->functional_training;?></textarea></td></tr> 
            <tr><td>F) HOD Comments</td></tr>
           <tr><td><textarea class="form-control" name="fr_hod_comments" id="fr_hod_comments" placeholder=""><?php echo $annual_review_details[0]->fr_hod_comments;?></textarea></td></tr>                
           <tr><td>&nbsp;</td></tr>
          
                       </td></tr>
                        <tr><td colspan="6"><input type="hidden" name="kra_id" id="kra_id" value="<?php echo $annual_review_details[0]->kra_id;?>"/>
            <input type="hidden" name="counter" id="counter" value="<?php echo $counter; ?>" />
            <button type="submit" class="btn btn-primary">Submit</button> &nbsp; <a href="<?=base_url();?>annual_review" target="_self"><button type="button" class="btn btn-primary">Back</button></a></td></tr> 
  </tbody></thead>
</table> </form>
     
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --> 
        <!-- /.content -->
      </div><!-- /.content-wrapper -->