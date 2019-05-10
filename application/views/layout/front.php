<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PMS Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--Required -->
    <link rel="stylesheet" href="<?=base_url();?>/assets/bootstrap/css/bootstrap.min.css?v=1.0">
    <link rel="stylesheet" href="<?=base_url();?>/assets/plugins/datatables/dataTables.bootstrap.css?v=1.0">
    <link rel="stylesheet" href="<?=base_url();?>/assets/dist/css/font-awesome.min.css?v=1.0">
    <link rel="stylesheet" href="<?=base_url();?>/assets/dist/css/ionicons.min.css?v=1.0">
    <link rel="stylesheet" href="<?=base_url();?>/assets/dist/css/AdminLTE.min.css?v=1.1">
    <link rel="stylesheet" href="<?=base_url();?>/assets/dist/css/skins/_all-skins.min.css?v=1.0"> 
    
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
       
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <?php 
        if($header) echo $header ;
        if($left)   echo $left;
        if($middle) echo $middle;
        if($footer) echo $footer;
    ?>
   <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url();?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?=base_url();?>/assets/dist/js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="<?=base_url();?>/assets/bootstrap/js/bootstrap.min.js"></script>
     <script src="<?=base_url();?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url();?>/assets/dist/js/app.min.js"></script>
    <script src="<?=base_url();?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url();?>/assets/plugins/fastclick/fastclick.min.js"></script>
    <script src="<?=base_url();?>/assets/dist/js/kra.js"></script>
   </body>
</html>