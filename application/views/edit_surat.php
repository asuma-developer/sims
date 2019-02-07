<section class="content-header">
  <h1>
    Data
    <small>Surat</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Data Surat</li>
    <?php if ($this->uri->segment(4)==1){ ?>
    <li><a href="<?php echo base_url('index.php/sims/surat/1');?>">Surat Masuk</a></li>
    <?php } else { ?> <li><a href="<?php echo base_url('index.php/sims/surat/2');?>">Surat Keluar</a></li> <?php } ?>
    <?php if ($this->uri->segment(4)==1){ ?>
    <li class="active">Edit Surat Masuk</li>
    <?php } else { ?> <li class="active">Edit Surat Keluar</li> <?php } ?>
  </ol>
</section>

<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Edit User</h3>
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <form action="<?php echo base_urL('index.php/sims/updatesurat');?>" role="form" method="post" enctype="multipart/form-data">
               <div class="box-body">
                 <div class="form-group">
                    <label>ID Surat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="id_surat" class="form-control" placeholder="Enter Nomor Surat" value="<?php echo $surat->id_surat;?>" required readonly>
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
                    <label>Tanggal Masuk Surat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="date" name="tanggal_masuk_surat" class="form-control" placeholder="Enter Tanggal"  value="<?php echo $surat->tanggal_masuk_surat;?>" required>
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
                    <label>Lampiran Surat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="lampiran_surat" class="form-control" placeholder="Enter Lampiran" value="<?php echo $surat->lampiran_surat;?>" required>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Tujuan/Pengirim</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="pengirim_tujuan" class="form-control" placeholder="Enter Tujuan/Pengirim" value="<?php echo $surat->pengirim_tujuan;?>" required>
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
                    <label>Kategori Surat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                        <select name="id_kategori" class="form-control">
                          <?php foreach ($kategori as $s) { ?>
                            <?php if ($surat->id_kategori == $s['id_kategori']){ ?>
                            <option value="<?php echo $s['id_kategori'];?>" selected><?php echo $s['nama_kategori'];?></option>
                            <?php } else { ?>
                              <option value="<?php echo $s['id_kategori'];?>"><?php echo $s['nama_kategori'];?></option>
                          <?php } } ?>
                        </select>
                    </div>
                 </div>
                 <?php if ($surat->id_kategori==1){ ?>
                 <div class="form-group">
                    <label>Kode Disposisi</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                        <select name="id_kode_disposisi" class="form-control">
                          <?php foreach ($kode_disposisi as $k) { ?>
                            <?php if ($surat->id_kode_disposisi == $k['id_kode_disposisi']) { ?>
                            <option value="<?php echo $k['id_kode_disposisi'];?>" selected><?php echo $k['nama_kode_disposisi'];?></option>
                            <?php } else {?>
                              <option value="<?php echo $k['id_kode_disposisi'];?>"><?php echo $k['nama_kode_disposisi'];?></option>
                          <?php } }?>
                        </select>
                    </div>
                 </div>
                 <?php } else { } ?>
                 <div class="form-group">
                    <label>File Surat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="file" name="file" class="form-control" value="<?php echo $surat->file;?>"><a href="<?php echo base_urL();?><?php echo $surat->file;?>">File Surat</a>
                    </div>
                 </div>
               <!-- /.box-body -->
             </div>
               <div class="box-footer">
                 <button type="submit" name="submit" value="upload" class="btn btn-primary pull-right">Add Data</button>
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
