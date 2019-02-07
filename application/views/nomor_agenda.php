<section class="content-header">
  <h1>
    Master
    <small>Data</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Master Data</li>
    <li><a href="<?php echo base_url('index.php/sims/kode_disposisi');?>">Kode Disposisi</a></li>
    <li class="active">Nomor Agenda</li>
  </ol>
</section>
<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Nomor Agenda</h3>
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>No</th>
                 <th>Nomor Agenda</th>
                 <th>Nomor Surat</th>
                 <th>Tanggal</th>
                 <th>Perihal</th>
               </tr>
               </thead>
               <tbody>
              <?php  $no = 1;
                      foreach ($nomor_agenda as $l) {?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $l['nomor_agenda'];?></td>
                  <td><?php echo $l['nomor_surat'];?></td>
                  <td><?php echo $l['tanggal_masuk_surat'];?></td>
                  <td><?php echo $l['perihal_surat'];?></td>
                </tr>
              <?php   } ?>
               </tbody>
               <tfoot>
                 <tr>
                   <th>No</th>
                   <th>Nomor Agenda</th>
                   <th>Nomor Surat</th>
                   <th>Tanggal</th>
                   <th>Perihal</th>
                 </tr>
               </tfoot>
             </table>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </section>
