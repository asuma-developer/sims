<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Edit Balasan</h3> &nbsp &nbsp
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <form action="<?php echo base_urL('index.php/sims/updateuserdisposisi');?>" role="form" method="post">
               <div class="box-body">
                 <input type="hidden" name="id_balasan" class="form-control"  value="<?php echo $detail->id_balasan;?>" required>
             <div class="form-group">
                <label>ID Pemberitahuan</label>
               <div class="input-group">
                  <span class="input-group-addon">+</span>
                  <input type="text" name="id_pemberitahuan" class="form-control"  value="<?php echo $detail->id_pemberitahuan;?>" required readonly>
                </div>
             </div>
             <div class="form-group">
                <label>Penerima</label>
               <div class="input-group">
                  <span class="input-group-addon">+</span>
                  <input type="text" name="id_penerima" class="form-control"  value="<?php echo $detail->fullname;?>" required readonly>
                </div>
             </div>
             <div class="form-group">
                <label>Keterangan</label>
               <div class="input-group">
                  <span class="input-group-addon">+</span>
                  <textarea class="form-control" rows="3" placeholder="Masih Kosong" name="keterangan_disposisi"><?php echo $detail->keterangan_disposisi;?></textarea>
                </div>
             </div>
             <div class="form-group">
                <label>Tanggal Selesai</label>
               <div class="input-group">
                  <span class="input-group-addon">+</span>
                  <input type="date" name="tanggal_selesai" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
             </div>
            <div class="form-group">
              <label>Select Sifat</label>
              <select name="status" class="form-control">
                <?php if ($detail->status==0) { ?>
                  <option value="0" selected>No Action</option>
                  <option value="1">Pending</option>
                  <option value="2">Complate</option>
               <?php  } else if ($detail->status==1) { ?>
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
         <!-- /.box -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </section>
