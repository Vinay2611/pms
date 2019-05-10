       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <section class="content-header">
          <h1>
           Update KRA
          </h1>
          <ol class="breadcrumb">
             <li><a href="<?=base_url();?>home"><i class="fa fa-dashboard"></i> Home</a></li>
             <li><a href="<?=base_url();?>kra">KRA</a></li>
             <li><a href="<?=base_url();?>kra/kra_view/<?=$this->uri->segment(3);?>">View KRA</a></li>
             <li class="active">Edit KRA</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->
				
              <div class="box">
                <div class="box-header">   
                <?php echo $this->session->flashdata('msg'); ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="box box-primary">
               
                <!-- form start -->
                <form role="form" name="form1" id="form1" action="<?=base_url();?>kra/kra_update" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">KRA</label>
                      <textarea class="form-control_kra" name="kra" id="exampleInputEmail1" placeholder="KRA"><?php echo $kraArr->kra; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">KPI</label>
                      <textarea class="form-control_kra" name="target" id="exampleInputPassword1" placeholder="Target"><?php echo $kraArr->target; ?></textarea>
                    </div> 
                     <div class="form-group">
                      <label for="exampleInputPassword1">Weightage</label>
                      <textarea class="form-control_kra" name="weightage" id="exampleInputPassword1" placeholder="Weightage"><?php echo $kraArr->weightage; ?></textarea>
                    </div>
                  </div><!-- /.box-body-->
                  <div class="box-footer">  
                  <input type="hidden" name="kra_id" id="kra_id" value="<?=$this->uri->segment(3);?>"/>
                   <input type="hidden" name="kra_points_id" id="kra_points_id" value="<?php echo $kra_points_id;?>" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
                    
                   
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --> 

        
        <!-- /.content -->
      </div><!-- /.content-wrapper -->
    
    
    
      

