<section class="content-header">
  <h1>
    Data
    <small>Surat</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Data Surat</li>
    <li><a href="<?php echo base_url('index.php/sims/surat_saya');?>">Surat Saya</a></li>
    <li class="active">Diposisi Surat Saya</li>
  </ol>
</section>
<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Detail Disposisi - Saya</h3> &nbsp &nbsp
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col-md-6">
                 <?php if($disposisi->keterangan_disposisi==NULL){
                   echo "<b><i>Belum ada balasan</i></b>"; ?>
                 <?php } else {
                   echo $disposisi->keterangan_disposisi;
               } ?>
               </div>
               <div class="col-md-3">
                 <span class="label label-success" aria-hidden="true"><span class="glyphicon glyphicon-ok" aria-hidden="true"> <?php echo $disposisi->tanggal_selesai;?></span>
               </div>
               <div class="col-md-3">
                 <?php if($disposisi->status==2){ ?>
                   <span class="label label-success" aria-hidden="true"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Complate</span>
                 <?php } else if ($disposisi->status==1) { ?>
                   <span class="label label-info" aria-hidden="true"><span class="glyphicon glyphicon-record" aria-hidden="true"></span> Pending</span>
                 <?php } else { ?>
                   <span class="label label-danger" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> No Action</span>
                 <?php } ?>
               </div>
             </div>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>
       <!-- /.col -->

     </div>
     <!-- /.row -->
                 <div class="row">
                   <div class="col-xs-12">

                     <div class="box">
                       <div class="box-header with-border">
                         <h3 class="box-title">Balasan Disposisi - Saya</h3> &nbsp &nbsp
                         <div class="box-tools pull-right">
                           <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                           </button>
                           <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                         </div>
                       </div>

            <div class="box-body">
              <form action="<?php echo base_urL('index.php/sims/updateuserdisposisisaya');?>" role="form" method="post">
                <div class="box-body">
                  <input type="hidden" name="id_balasan" class="form-control"  value="<?php echo $disposisi->id_balasan;?>" required>
              <div class="form-group">
                 <label>ID Pemberitahuan</label>
                <div class="input-group">
                   <span class="input-group-addon">+</span>
                   <input type="text" name="id_pemberitahuan" class="form-control"  value="<?php echo $disposisi->id_pemberitahuan;?>" required readonly>
                 </div>
              </div>
              <div class="form-group">
                 <label>keterangan</label>
                <div class="input-group">
                   <span class="input-group-addon">+</span>
                   <textarea class="form-control" rows="3" placeholder="Masih Kosong" name="keterangan_disposisi"><?php echo $disposisi->keterangan_disposisi;?></textarea>
                 </div>
              </div>
              <div class="form-group">
                 <label>Tanggal Selesai</label>
                <div class="input-group">
                   <span class="input-group-addon">+</span>
                   <input type="date" name="tanggal_selesai" class="form-control" value="<?php echo $disposisi->tanggal_selesai; ?>" required>
                 </div>
              </div>
             <div class="form-group">
               <label>Select Sifat</label>
               <select name="status" class="form-control">
                 <?php if ($disposisi->status==0) { ?>
                   <option value="0" selected>No Action</option>
                   <option value="1">Pending</option>
                   <option value="2">Complate</option>
                <?php  } else if ($disposisi->status==1) { ?>
                  <option value="0">No Action</option>
                  <option value="1" selected>Pending</option>
                  <option value="2">Complate</option>
                 <?php } else { ?>
                   <option value="0">No Action</option>
                   <option value="1">Pending</option>
                   <option value="2" selected>Complate</option>
                 <?php } ?>
               </select>
             </div>
               <button type="submit" class="btn btn-primary pull-right">Update</button>
            </div>
            </form>
            </div>
            <!-- /.box-body -->
            </div>
            </div>
            <!-- /.col -->
            </div>

   </section>
