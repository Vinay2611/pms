 <!-- sidebar: style can be found in sidebar.less -->
  <aside class="main-sidebar">
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?=base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Welcome <?php echo $username; ?>  </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
            
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>PMS</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu menu-open" style="display:block;">
		      <!--<li><a href="<?php //base_url();?>assets/pages/tables/simple.html"><i class="fa fa-circle-o"></i>KRA</a></li>
              ---DATA---assets/pages/tables/data.html              -->
              <li><a href="<?=base_url();?>kra"><i class="fa fa-circle-o"></i>Objective Setting</a></li>
              <li><a href="<?=base_url();?>mtr"><i class="fa fa-circle-o"></i>Mid Term Review</a></li>
              <li><a href="<?=base_url();?>annual_review"><i class="fa fa-circle-o"></i>Annual Review</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Reports</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu menu-open" style="display:block;">
              <li><a href="<?=base_url();?>report"><i class="fa fa-circle-o"></i> OS Report</a></li>
              <li><a href="<?=base_url();?>MtrReport"><i class="fa fa-circle-o"></i> MTR Report</a></li>
              <li><a href="<?=base_url();?>arReport"><i class="fa fa-circle-o"></i> AR Report</a></li>
            </ul>
          </li>
            
          <!--<li>
              <a href="assets/pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="assets/pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>-->
            
            
            
        </ul>
      </section>
      <!-- /.sidebar -->
        </aside>
    