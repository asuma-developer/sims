<?php  if($this->session->flashdata('alert')) : ?>
  <?php echo ' <div class="row"> <div class="col-ls-4"> <div class="social-auth-links text-center"> <div class="alert alert-info"> <b> <i>'.$this->session->flashdata('alert').'</i> </b> </div> </div> </div> </div>' ?>
<?php endif;?>
<section class="content-header">
  <h1>
    Data
    <small>Surat</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Data Surat</li>
    <li class="active">Surat Saya</li>
  </ol>
</section>
<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
               <h3 class="box-title">Surat Masuk - Saya</h3> &nbsp &nbsp
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
                 <th>Kode Disposisi</th>
                 <th>Nomor Surat</th>
                 <th>Judul Surat</th>
                 <th>Maksud dan Tujuan Surat</th>
                 <th>Pengirim Surat</th>
                 <th>Sifat</th>
                 <th>Action</th>
               </tr>
               </thead>
               <tbody>
              <?php  $no = 1;
                      foreach ($surat as $s) {?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $s['nomor_agenda'];?></td>
                  <td><?php echo $s['kode_disposisi'];?></td>
                  <td><?php echo $s['nomor_surat'];?></td>
                  <td><?php echo $s['judul_surat'];?></td>
                  <td><?php echo $s['maksud_surat'];?></td>
                  <td><?php echo $s['pengirim_tujuan'];?></td>
                  <td><?php echo $s['keterangan'];?></td>
                  <td>
                    <a href="<?php echo base_urL().$s['file'];?>"><span class="label label-warning" aria-hidden="true"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> File</span></a>
                    <a href="<?php echo base_urL('index.php/sims/get_disposisi_surat_saya/').$s['id_balasan'];?>"><span class="label label-success" aria-hidden="true"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Disposisi</span></a>
                  </td>
                </tr>
              <?php   } ?>
               </tbody>
               <tfoot>
                 <tr>
                   <th>No</th>
                   <th>Nomor Agenda</th>
                   <th>Kode Disposisi</th>
                   <th>Nomor Surat</th>
                   <th>Judul Surat</th>
                   <th>Maksud dan Tujuan Surat</th>
                   <th>Pengirim Surat</th>
                   <th>Sifat</th>
                   <th>Action</th>
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
