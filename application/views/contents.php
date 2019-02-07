<?php  if($this->session->flashdata('alert')) : ?>
  <?php echo ' <div class="row"> <div class="col-ls-4"> <div class="social-auth-links text-center"> <div class="alert alert-info"> <b> <i>'.$this->session->flashdata('alert').'</i> </b> </div> </div> </div> </div>' ?>
<?php endif;?>
<section class="content-header">
  <h1>
    Dashboard
    <small>Awal</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Surat Masuk</span>
          <span class="info-box-number"><?php echo COUNT($surat_masuk);?>
        </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-paper-plane-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Surat Keluar</span>
          <span class="info-box-number"><?php echo COUNT($surat_keluar);?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Disposisi</span>
          <span class="info-box-number"><?php echo COUNT($disposisi);?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">User</span>
          <span class="info-box-number"><?php echo COUNT($user);?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><b>Visi Misi Sekolah</b></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <img src="<?php echo base_urL('assets/dist/img/user2-160x160.png');?>" class="img-rounded" width="70%" style="padding:1%;margin:20%;">
              </div>
              <div class="col-md-8">
                <p style="background-color:#222d32;padding:2%;color:white;">VISI SEKOLAH</p>
                <p style="padding:2%;">Madrasah Mu’allimin Muhammadiyah Yogyakarta sebagai institusi pendidikan Muhammadiyah tingkat menengah yang unggul dan mampu menghasilkan kader ulama, pemimpin, dan pendidik sebagai pembawa misi gerakan Muhammadiyah</p>
                <p style="background-color:#222d32;padding:2%;margin-top:3%;color:white;">MISI SEKOLAH</p>
                <p style="padding:1%;padding-left:2%;"> 1.	Menyelenggarakan dan mengembangkan pendidikan Islam guna membangun kompetensi dan keunggulan siswa di bidang ilmu-ilmu dasar keislaman, ilmu pengetahuan, teknologi, seni, dan budaya.</p>
                <p style="padding:1%;padding-left:2%;"> 2.	Menyelenggarakan dan mengembangkan pendidikan bahasa Arab dan bahasa Inggris sebagai alat komunikasi untuk mendalami agama dan ilmu pengetahuan.</p>
                <p style="padding:1%;padding-left:2%;"> 3.	Menyelenggarakan dan mengembangkan pendidikan kepemimpinan guna membangun kompetensi dan keunggulan siswa di bidang akhlak dan kepribadian.</p>
                <p style="padding:1%;padding-left:2%;"> 4.	Menyelenggarakan dan mengembangkan pendidikan keguruan guna membangun kompetensi dan keunggulan siswa di bidang kependidikan.</p>
                <p style="padding:1%;padding-left:2%;"> 5.	Menyelenggarakan dan mengembangkan pendidikan keterampilan guna membangun kompetensi dan keunggulan siswa di bidang Wirausaha.</p>
                <p style="padding:1%;padding-left:2%;"> 6.  Menyelenggarakan dan mengembangkan pendidikan kader Muhammadiyah guna membangun kompetensi dan keunggulan siswa di bidang organisasi dan perjuangan Muhammadiyah.</p>
              </div>
            </div>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <!-- /.row -->
</section>
