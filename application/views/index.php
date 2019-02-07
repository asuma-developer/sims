<?php if(COUNT($this->session->userdata('nip'))==0) { redirect('sims/index');?>

<?php } else { ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Manajemen Surat</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_urL('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_urL('assets/plugins/datatables/dataTables.bootstrap.css');?>">

    <link rel="stylesheet" href="<?php echo base_urL('assets/dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_urL('assets/dist/css/skins/_all-skins.min.css');?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <div class="modal fade" id="chpassword" role="dialog">
        <div class="modal-dialog modal-md">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
              <button type="button" class="close" data-disimss="modal">&times;</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_urL('index.php/sims/chpassword');?>" role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label>New Password</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <input type="password" name="new_password" id="txtPassword" class="form-control" placeholder="Enter Old Password" required>
                   </div>
                </div>
                <div class="form-group">
                  <label>Confirm New Password</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <input type="password" name="c_new_password" id="txtConfirmPassword" class="form-control" placeholder="Enter Old Password"  onkeyup="check()" required>
                   </div>
                   <span id='message'></span>
                </div>
              <!-- /.box-body -->
            </div>
              <div class="box-footer">
                <button type="button" class="btn btn-danger pull-left" data-disimss="modal">Close</button>
                <button type="submit" id="btnSubmit" class="btn btn-primary pull-right">Change</button>
              </div>
            </form>
          </div>
        </div>
      </div>

  <body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('plus/navbar.php');?>
    <!-- Left side column. contains the logo and sidebar -->

    <?php $this->load->view('plus/menu.php');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <?php echo $contents;?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Full Version</b>
      </div>
      <strong>Copyright &copy; 2019 <a href="#">Anggi</a>.</strong> Sistem Informasi UAD
    </footer>

    <!-- Control Sidebar -->

    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
         
          <!-- /.control-sidebar-menu -->

          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        
        <!-- /.tab-pane -->
      </div>




    </aside>

  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->


            <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"> </script>
            <script type="text/javascript">
             function check() {
                if (document.getElementById('txtPassword').value ==
                  document.getElementById('txtConfirmPassword').value) {
                  document.getElementById('message').style.color = 'green';
                  document.getElementById('message').innerHTML = 'Password Matching';
                  document.getElementById('btnSubmit').style.display = 'block';
                } else {
                  document.getElementById('message').style.color = 'red';
                  document.getElementById('message').innerHTML = 'Password Not Matching';
                  document.getElementById('btnSubmit').style.display = 'none';
                }
              }
            </script>

  <script src="<?php echo base_urL('assets/plugins/sparkline/jquery.sparkline.min.js');?>"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_urL('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
  <script src="<?php echo base_urL('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="<?php echo base_urL('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
  <!-- ChartJS 1.0.1 -->
  <script src="<?php echo base_urL('assets/plugins/chartjs/Chart.min.js');?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_urL('assets/dist/js/pages/dashboard2.js');?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_urL('assets/dist/js/demo.js');?>"></script>
  <script src="<?php echo base_urL('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_urL('assets/bootstrap/js/bootstrap.min.js');?>"></script>
  <!-- DataTables -->
  <script src="<?php echo base_urL('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo base_urL('assets/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_urL('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_urL('assets/plugins/fastclick/fastclick.js');?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_urL('assets/dist/js/app.min.js');?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_urL('assets/dist/js/demo.js');?>"></script>
  <!-- page script -->
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

  </body>
  </html>

<?php } ?>

