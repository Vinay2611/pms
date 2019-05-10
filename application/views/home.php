<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php 
				  if($count) {
				  echo  $count;
				  }
				  ?>/<?php if($emp_count) { echo $emp_count; } else { echo 0; } ?></h3>
                  <p>OS Submitted</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>                
              </div>
              
              <div style="margin-top:75px;" class="table-responsive">
    <div class="list-group">
   <div><a style="cursor:default; font-weight:bold; font-size:15px;" class="list-group-item active">Objective Setting</a> </div>
    <a style="cursor:default;" class="list-group-item" href="">
    <span class="glyphicon glyphicon-hand-up"></span> Pending <span class="badge"><?php if($kra_pending) {
																						    echo  $kra_pending;
				  																			} else { echo 0; }?></span>
    </a>
    <a style="cursor:default;" class="list-group-item" href="">
    <span class="glyphicon glyphicon-hand-right"></span> Partly Approved <span class="badge"><?php if($kra_partly_approved) {
																						    echo  $kra_partly_approved;
				  																			} else { echo 0; }?></span>
    </a>
        <a style="cursor:default;" class="list-group-item" href="">
            <span class="glyphicon glyphicon-thumbs-up"></span> Approved <span class="badge"><?php if($kra_approved) {
																						    echo  $kra_approved;
				  																			} else { echo 0; }?></span>
        </a>
        <a style="cursor:default;" class="list-group-item" href="">
            <span class="glyphicon glyphicon-thumbs-down"></span> Disapproved <span class="badge"><?php if($kra_disapproved) {
																						    echo  $kra_disapproved;
				  																			} else { echo 0; }?></span>
        </a>
    </div>
</div>
              
              
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $mtr_count; ?>/<?php 
				  if($count) {
				  echo  $count;
				  }
				  ?></h3>
                  <p>MTR Submitted</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>                
              </div>
              <div style="margin-top:75px;" class="table-responsive">
    <div class="list-group">
   <div><a style="cursor:default; font-weight:bold; font-size:15px;" class="list-group-item active">Mid Term Review</a> </div>
    <a style="cursor:default;" class="list-group-item" href="">
    <span class="glyphicon glyphicon-hand-up"></span> Not Updated <span class="badge"><?php echo $mtr_not_updated; ?></span>
    </a>
    <a style="cursor:default;" class="list-group-item" href="">
    <span class="glyphicon glyphicon-hand-right"></span> Pending <span class="badge"><?php echo $mtr_pending; ?></span>
    </a>
     <a style="cursor:default;" class="list-group-item" href="">
     <span class="glyphicon glyphicon-thumbs-up"></span> Approved <span class="badge"><?php echo $mtr_approved; ?></span>
     </a>
    </div>
</div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?=$annual_count;?>/<?php if($emp_count) { echo $emp_count; } else { echo 0; } ?></h3>
                  <p>AR Submitted</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>               
              </div>
              <div style="margin-top:75px;" class="table-responsive">
    <div class="list-group">
   <div><a style="cursor:default; font-weight:bold; font-size:15px;" class="list-group-item active">Annual Review</a> </div>
      <a style="cursor:default;" class="list-group-item" href="">
    <span class="glyphicon glyphicon-hand-up"></span> Not Updated <span class="badge"><?php echo $annual_not_updated; ?></span>
    </a>
    <a style="cursor:default;" class="list-group-item" href="">
    <span class="glyphicon glyphicon-hand-up"></span> Pending <span class="badge"><?php echo $annual_pending; ?></span>
    </a>  
    <a style="cursor:default;" class="list-group-item" href="">
    <span class="glyphicon glyphicon-hand-right"></span> Approved <span class="badge"><?php echo $annual_approved; ?></span>
    </a>
    </div>
</div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $todays_activity['total'];?></h3>
                  <p>Today's Active Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          
          <!-- Main row -->
        </section><!-- /.content -->
      </div>