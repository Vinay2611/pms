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
            <li class="active">
              <a href="home">
                <i class="fa fa-th"></i> <span>Dashboard</span> 
              </a>
            </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>PMS</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu menu-open" style="display:block;">
		      <li><a href="<?=base_url();?>kra"><i class="fa fa-circle-o"></i>Objective Setting</a></li>
              <li><a href="<?=base_url();?>mtr"><i class="fa fa-circle-o"></i>Mid Term Review</a></li>
              <li><a href="<?=base_url();?>annual_review"><i class="fa fa-circle-o"></i>Annual Review</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>Inactive Employees</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu menu-open" style="display:block;">
              <li><a href="#"><i class="fa fa-circle-o"></i>Annual Review</a></li>
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
          
          
            
         
            
            
            
        </ul>
      </section>
      <!-- /.sidebar -->
        </aside>
    