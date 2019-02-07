<section class="content-header">
  <h1>
    Data
    <small>Surat</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Data Surat</li>
    <li><a href="<?php echo base_url('index.php/sims/surat/1');?>">Surat Masuk</a></li>
    <li class="active">Disposisi</li>
  </ol>
</section>
<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Disposisi Surat</h3>
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <form action="<?php echo base_urL('index.php/sims/adddisposisi');?>" role="form" method="post" enctype="multipart/form-data">
               <div class="box-body">
                 <div class="form-group">
                    <label>ID Surat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="id_surat" class="form-control" placeholder="Enter Nomor Surat" value="<?php echo $surat->id_surat;?>" required readonly>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Nomor Agenda</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="nomor_agenda" class="form-control" placeholder="Enter Nomor Surat" value="<?php echo $nomor_agenda->nomor_agenda;?>" required readonly>
                    </div>
                 </div>
                 <div class="form-group" hidden>
                    <label>ID Nomor Agenda</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="id_nomor_agenda" class="form-control" placeholder="Enter Nomor Surat" value="<?php echo $nomor_agenda->id_nomor_agenda;?>" required readonly>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Kode Disposisi</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="id_kode_disposisi" class="form-control" placeholder="Enter Nomor Surat" value="<?php echo $surat->kode_disposisi;?>" required readonly>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Nomor Surat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="nomor_surat" class="form-control" placeholder="Enter Nomor Surat" value="<?php echo $surat->nomor_surat;?>" required>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Judul Surat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="judul_surat" class="form-control" placeholder="Enter Judul Surat"  value="<?php echo $surat->judul_surat;?>" required>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Perihal Surat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="perihal_surat" class="form-control" placeholder="Enter Perihal" value="<?php echo $surat->perihal_surat;?>" required>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Maksud dan Tujuan Surat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <textarea class="form-control" rows="3" placeholder="Maksud Surat" name="maksud_surat" required><?php echo $surat->maksud_surat;?></textarea>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Tanggal Disposisi</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" required readonly>
                    </div>
                 </div>
                 <div class="form-group">
                  <label>Select Disposisi</label>
                  <select name="user[]" multiple class="form-control">
                    <?php foreach ($user as $u) { ?>
                      <?php if($u['id_user'] == $_SESSION['id_user']){

                      } else {?>
                      <option value="<?php echo $u['id_user'];?>"><?php echo $u['fullname'];?> - [<?php echo $u['nama_jabatan'];?>]</option>
                    <?php } }?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Select Sifat</label>
                  <select name="id_sifat" class="form-control">
                    <?php foreach ($sifat as $s) { ?>
                      <option value="<?php echo $s['id_sifat'];?>"><?php echo $s['keterangan'];?></option>
                    <?php } ?>
                  </select>
                </div>
               <!-- /.box-body -->
             </div>
               <div class="box-footer">
                 <button type="submit" name="submit" value="upload" class="btn btn-primary pull-right">Disposisi</button>
               </div>
             </form>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </section>
