<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/dist/img/user2-160x160.png');?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['fullname'];?></p>
        <a><span class="glyphicon glyphicon-off"></span> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="<?php echo base_urL('index.php/sims/home');?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

       <?php if($_SESSION['level']==1) { ?>
          <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i></span>
            <span>Master Data</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">></span>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_urL('index.php/sims/tahun');?>"><i class="fa fa-circle-o"></i> Tahun Ajaran</a></li>
          <li><a href="<?php echo base_urL('index.php/sims/jabatan');?>"><i class="fa fa-circle-o"></i> Jabatan</a></li>
          <!-- <li><a href="<?php echo base_urL('index.php/sims/kategori');?>"><i class="fa fa-circle-o"></i> Kategori</a></li> -->
          <li><a href="<?php echo base_urL('index.php/sims/kode_disposisi');?>"><i class="fa fa-circle-o"></i> Kode Agenda</a></li>
          <li><a href="<?php echo base_urL('index.php/sims/sifat');?>"><i class="fa fa-circle-o"></i> Sifat Disposisi</a></li>
          <li><a href="<?php echo base_urL('index.php/sims/user');?>"><i class="fa fa-circle-o"></i> User</a></li>
          <li><a href="<?php echo base_urL('index.php/sims/level');?>"><i class="fa fa-circle-o"></i> Level User</a></li>
          </ul>
          </li>
        <?php } else if ($_SESSION['level']==2) { ?>
          <li class="treeview">
            <a href="#">
            <i class="fa fa-laptop"></i></span>
            <span>Master Data</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">></span>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_urL('index.php/sims/kode_disposisi');?>"><i class="fa fa-circle-o"></i> Kode Agenda</a></li>
          </ul>
          </li>
        <?php } else { ?>
        <?php } ?>

      <li class="treeview">
        <a href="#">
          <i class=" fa fa-files-o"></i>
          <span>Persuratan</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">></span>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2) { ?>
            <li><a href="<?php echo base_urL('index.php/sims/surat/1');?>"><i class="fa fa-circle-o"></i> Surat Masuk</a></li>
            <li><a href="<?php echo base_urL('index.php/sims/surat/2');?>"><i class="fa fa-circle-o"></i> Surat Keluar</a></li>
            <li><a href="<?php echo base_urL('index.php/sims/pemberitahuan');?>"><i class="fa fa-circle-o"></i> Disposisi</a></li>
          <?php } else { ?>
          <?php } ?>
            <li><a href="<?php echo base_urL('index.php/sims/surat_saya');?>"><i class="fa fa-circle-o"></i> Surat Saya</a></li>
        </ul>
      </li>

       

      <?php if($_SESSION['level']==1 || $_SESSION['level']==2) { ?>
        <li class="treeview">
            <a href="<?php echo base_urL('index.php/sims/laporan');?>">
              <i class="fa fa-book"></i> <span>Laporan</span>
              <span class="pull-right-container">
              </span>
            </a>
        </li>
      <?php } else { ?>
      <?php } ?>

      <!-- <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
