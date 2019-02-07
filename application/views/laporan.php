<section class="content-header">
  <h1>
    Rekap
    <small>Laporan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Rekap Laporan</li>
    <li class="active">Laporan</li>
  </ol>
</section>
<section class="content">
     <div class="row">
       <div class="col-xs-4">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Laporan Surat</h3> &nbsp &nbsp
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <form action="<?php echo base_urL('index.php/sims/laporan_surat');?>" role="form" method="post" target="_blank">
            <div class="form-group">
              <label>Kategori Surat</label>
              <div class="input-group">
              <span class="input-group-addon">+</span>
               <select name="id_kategori" class="form-control">
                 <?php foreach ($kategori as $k) { ?>
                    <option value="<?php echo $k['id_kategori'];?>"><?php echo $k['nama_kategori'];?></option>
                 <?php } ?>
               </select>
             </div>
           </div>

           <div class="form-group">
             <label>Tahun</label>
             <div class="input-group">
             <span class="input-group-addon">+</span>
               <select name="id_tahun" class="form-control">
                 <?php foreach ($tahun as $t) {
                   if ($t['tahun']==$_SESSION['tahun']) { ?>
                     <option value="<?php echo $t['id_tahun'];?>" selected><?php echo $t['nama_tahun'];?></option>
                  <?php } else { ?>
                    <option value="<?php echo $t['id_tahun'];?>"><?php echo $t['nama_tahun'];?></option>
                  <?php } ?>
                 <?php } ?>
               </select>
             </div>
           </div>

           <div class="form-group">
             <label>Bulan</label>
             <div class="input-group">
             <span class="input-group-addon">+</span>
               <select name="bulan" class="form-control">
                 <<option value="0" selected>ALL</option>
                 <option value="01">Januari</option>
                 <option value="02">Febuari</option>
                 <option value="03">Maret</option>
                 <option value="04">April</option>
                 <option value="05">Mei</option>
                 <option value="06">Juni</option>
                 <option value="07">Juli</option>
                 <option value="08">Agustus</option>
                 <option value="09">September</option>
                 <option value="10">Oktober</option>
                 <option value="11">November</option>
                 <option value="12">Desember</option>
               </select>
             </div>
           </div>

           <div class="form-group">
             <label>Urutan Berdasarkan Date</label>
             <div class="radio">
                    <label>
                      <input type="radio" name="urutan" id="optionsRadios1" value="ASC" checked>
                      Ascending
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="urutan" id="optionsRadios2" value="DESC">
                      Descending
                    </label>
                  </div>
           </div>

           <button type="submit" class="btn btn-primary pull-right">Cetak</button>
             </form>

           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>
       <!-- /.col -->

       <div class="col-xs-4">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Laporan Nomor Agenda</h3> &nbsp &nbsp
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <form action="<?php echo base_urL('index.php/sims/laporan_nomor_agenda');?>" role="form" method="post" target="_blank">
            <div class="form-group">
              <label>Kode Disposisi</label>
              <div class="input-group">
              <span class="input-group-addon">+</span>
               <select name="id_kode_disposisi" class="form-control">
                 <?php foreach ($kode_disposisi as $k) { ?>
                    <option value="<?php echo $k['id_kode_disposisi'];?>"><?php echo $k['nama_kode_disposisi'];?></option>
                 <?php } ?>
               </select>
             </div>
           </div>

           <div class="form-group">
             <label>Tahun</label>
             <div class="input-group">
             <span class="input-group-addon">+</span>
               <select name="id_tahun" class="form-control">
                 <?php foreach ($tahun as $t) {
                   if ($t['tahun']==$_SESSION['tahun']) { ?>
                     <option value="<?php echo $t['id_tahun'];?>" selected><?php echo $t['nama_tahun'];?></option>
                  <?php } else { ?>
                    <option value="<?php echo $t['id_tahun'];?>"><?php echo $t['nama_tahun'];?></option>
                  <?php } ?>
                 <?php } ?>
               </select>
             </div>
           </div>

           <button type="submit" class="btn btn-primary pull-right">Cetak</button>
             </form>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>

     </div>
     <!-- /.row -->

   </section>
