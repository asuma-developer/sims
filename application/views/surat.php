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
    <?php if ($this->uri->segment(3)==1){ ?>
    <li class="active">Surat Masuk</li>
    <?php } else { ?> <li class="active">Surat Keluar</li> <?php } ?>
  </ol>
</section>
<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
             <?php if ($this->uri->segment(3)==1){ ?>
               <h3 class="box-title">Surat Masuk</h3> &nbsp &nbsp
              <?php } else { ?> <h3 class="box-title">Surat Keluar</h3> &nbsp &nbsp <?php } ?>
              <?php if($_SESSION['level']==1) { ?>
                <a href="" data-toggle="modal" data-target="#tambah_data"><span class="label label-primary" aria-hidden="true"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Data</span></a>
              <?php } else { ?>
              <?php } ?>
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
                 <th>Nomor Surat</th>
                 <th>Judul Surat</th>
                 <th>Tanggal</th>
                 <th>Tujuan Surat</th>
                 <?php if ($this->uri->segment(3)==1){ ?>
                   <th>Kode Disposisi</th>
                <?php } else { } ?>
                 <th>Action</th>
               </tr>
               </thead>
               <tbody>
              <?php  $no = 1;
                      foreach ($surat as $s) {?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $s['nomor_surat'];?></td>
                  <td><?php echo $s['judul_surat'];?></td>
                  <td><?php echo $s['tanggal_masuk_surat'];?></td>
                  <td><?php echo $s['pengirim_tujuan'];?></td>
                  <?php if ($this->uri->segment(3)==1){ ?>
                  <td><?php echo $s['kode_disposisi'];?></td>
                  <?php } else { } ?>
                  <td>
                  <?php if($_SESSION['level']==2) { ?>
                  <?php } else { ?>
                    <a href="<?php echo base_urL('index.php/sims/editsurat/').$s['id_surat'].'/'.$s['id_kategori'];?>"><span class="label label-primary" aria-hidden="true"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</span></a>
                    <a onclick="javascript: return confirm('Are you sure you want to delete this data ?')" href="<?php echo base_urL('index.php/sims/delsurat/').$s['id_surat'].'/'.$this->uri->segment(3);?>"><span class="label label-danger" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</span></a>

                  <?php } ?>
                    <a href="<?php echo base_urL().$s['file'];?>"><span class="label label-warning" aria-hidden="true"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> File</span></a>
                    <?php if ($this->uri->segment(3)==1){ ?>
                      <?php if ($s['status']==0) { ?>
                        <a href="<?php echo base_urL('index.php/sims/disposisi/').$s['id_surat'];?>"><span class="label label-success" aria-hidden="true"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Disposisi</span></a>
                      <?php } else { ?>
                        <span class="label label-info" aria-hidden="true"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Sudah Terdisposisi</span>
                      <?php } ?>
                    <?php } else { } ?>
                  </td>
                </tr>
              <?php   } ?>
               </tbody>
               <tfoot>
                 <tr>
                   <th>No</th>
                   <th>Nomor Surat</th>
                   <th>Judul Surat</th>
                   <th>Tanggal</th>
                   <th>Tujuan Surat</th>
                   <?php if ($this->uri->segment(3)==1){ ?>
                   <th>Kode Disposisi</th>
                   <?php } else { } ?>
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



      <div class="modal fade" id="tambah_data" role="dialog">
       		<div class="modal-dialog modal-md">

             <div class="box box-primary">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Data</h3>
                 <button type="button" class="close" data-disimss="modal">&times;</button>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form action="<?php echo base_urL('index.php/sims/addsurat');?>" role="form" method="post" enctype="multipart/form-data">
                 <div class="box-body">
                   <div class="form-group">
                     <label>Masukan Nomor Surat</label>
                     <div class="input-group">
                        <span class="input-group-addon">+</span>
                        <input type="text" name="nomor_surat" class="form-control" placeholder="Enter Nomor Surat" required>
                      </div>
                   </div>
                   <div class="form-group">
                     <label>Masukan Judul Surat</label>
                     <div class="input-group">
                        <span class="input-group-addon">+</span>
                        <input type="text" name="judul_surat" class="form-control" placeholder="Enter Judul Surat" required>
                      </div>
                   </div>
                   <div class="form-group">
                     <label>Masukan Tanggal Surat</label>
                     <div class="input-group">
                        <span class="input-group-addon">+</span>
                        <input type="date" name="tanggal_masuk_surat" class="form-control" placeholder="Enter Tanggal" value="<?php echo date('Y-m-d'); ?>" required readonly>
                      </div>
                   </div>
                   <div class="form-group">
                     <label>Masukan Perihal</label>
                     <div class="input-group">
                        <span class="input-group-addon">+</span>
                        <input type="text" name="perihal_surat" class="form-control" placeholder="Enter Perihal" required>
                      </div>
                   </div>
                   <div class="form-group">
                     <label>Masukan Jumlah/Ringkasan Lampiran</label>
                     <div class="input-group">
                        <span class="input-group-addon">+</span>
                        <input type="text" name="lampiran_surat" class="form-control" placeholder="Enter Lampiran" required>
                      </div>
                   </div>
                   <div class="form-group">
                     <?php if ($this->uri->segment(3)==1) { ?>
                       <label>Masukan Pengirim Surat</label>
                       <div class="input-group">
                          <span class="input-group-addon">+</span>
                          <input type="text" name="pengirim_tujuan" class="form-control" placeholder="Enter Pengirim" required>
                        </div>
                     <?php } else { ?>
                       <label>Masukan Tujuan Surat</label>
                       <div class="input-group">
                          <span class="input-group-addon">+</span>
                          <input type="text" name="pengirim_tujuan" class="form-control" placeholder="Enter Tujuan" required>
                        </div>
                     <?php } ?>
                   </div>
                   <div class="form-group">
                     <label>Masukan Maksud Surat</label>
                     <div class="input-group">
                        <span class="input-group-addon">+</span>
                        <textarea class="form-control" rows="3" placeholder="Maksud Surat" name="maksud_surat" required></textarea>
                      </div>
                   </div>
                   <div class="form-group">
                     <label>Pilih Kategori Surat</label>
                     <div class="input-group">
                        <span class="input-group-addon">+</span>
                          <select name="id_kategori" class="form-control">
                            <?php foreach ($kategori as $s) { ?>
                              <?php if ($this->uri->segment(3) == $s['id_kategori']){ ?>
                              <option value="<?php echo $s['id_kategori'];?>" selected><?php echo $s['nama_kategori'];?></option>
                              <?php } else { ?>
                                <option value="<?php echo $s['id_kategori'];?>"><?php echo $s['nama_kategori'];?></option>
                            <?php } } ?>
                          </select>
                      </div>
                   </div>
                   <?php if ($this->uri->segment(3)==1){ ?>
                   <div class="form-group">
                     <label>Pilih Kode Disposisi</label>
                     <div class="input-group">
                        <span class="input-group-addon">+</span>
                          <select name="id_kode_disposisi" class="form-control">
                            <?php foreach ($kode_disposisi as $k) { ?>
                              <option value="<?php echo $k['id_kode_disposisi'];?>"><?php echo $k['nama_kode_disposisi'];?></option>
                            <?php } ?>
                          </select>
                      </div>
                   </div>
                   <?php } else { } ?>
                   <div class="form-group">
                     <label>Pilih File Surat</label>
                     <div class="input-group">
                        <span class="input-group-addon">+</span>
                        <input type="file" name="file" class="form-control" required>
                      </div>
                   </div>
                 <!-- /.box-body -->
               </div>
                 <div class="box-footer">
                   <button type="button" class="btn btn-danger pull-left" data-disimss="modal">Close</button>
                   <button type="submit" name="submit" value="upload" class="btn btn-primary pull-right">Add Data</button>
                 </div>
               </form>
             </div>
       		</div>
       	</div>
