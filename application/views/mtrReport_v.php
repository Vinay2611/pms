<!-- Content Wrapper. Contains page content -->
<style>
#cnt1 {
    background-color: rgba(215, 212, 212, 0.88);
    margin-bottom: 70px;
}

#panel1 {
    padding:20px;
}

.panel-body:not(.two-col) {
    padding: 0px;
}

.panel-body .radio, .panel-body .checkbox {
    margin-top: 0px;
    margin-bottom: 0px;
}

.panel-body .list-group {
    margin-bottom: 0;
}

.margin-bottom-none {
    margin-bottom: 0;
}
</style>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
 <section class="content-header">
          <h1>
           MTR Reports
          </h1>
          <ol class="breadcrumb">
            <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">MTR Report</li>
          </ol>
        </section>
        <!-- Main Content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!--/.box -->
			<?php //echo $this->session->flashdata('msg'); ?>
              <div class="box">
                <div class="box-header">   
                </div><!-- /.box-header -->
                <div class="box-body">
		<div class="col-md-6" id="panel1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
             <span class="fa fa-question-circle"></span> Download MTR Report</h3>
            </div>
            <form class="form-signin" action="MtrReport/mtrReportProcess" name="form1" id="form1" method="post">
            <div class="panel-body two-col">
                <div class="row">
                      <div class="col-md-6">
                        <div class="well well-sm">
                            <div class="checkbox">
                                <select name="report_year" class="form-control" id="report_year">
                                    <option value="2018">2018</option>
                                    <option value="2017" selected="selected">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                      <input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm btn-block">
                    </div>
                   
                </div>
            </div>
            </form>
        </div>
    </div>
       </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->         
        <!-- /.content -->
      </div><!-- /.content-wrapper -->