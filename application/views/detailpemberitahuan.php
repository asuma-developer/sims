<section class="content-header">
  <h1>
    Data
    <small>Surat</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Data Surat</li>
    <li><a href="<?php echo base_url('index.php/sims/pemberitahuan');?>">Disposisi</a></li>
    <li class="active">Detail Disposisi</li>
  </ol>
</section>
<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Balasan Disposisi</h3> &nbsp &nbsp
             <a href="" data-toggle="modal" data-target="#tambah_user"><span class="label label-primary" aria-hidden="true"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Data</span></a>

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
                 <th>Penerima Disposisi</th>
                 <th>Keterangan Disposisi</th>
                 <th>Status Disposisi</th>
                 <th>Tanggal Selesai</th>
                 <th>Action</th>
               </tr>
               </thead>
               <tbody>
              <?php  $no = 1;
                      foreach ($detail as $d) {?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $d['fullname'];?></td>
                  <td>
                    <?php if($d['keterangan_disposisi']==NULL){
                      echo "<b><i>Belum ada balasan</i></b>"; ?>
                    <?php } else {
                      echo $d['keterangan_disposisi'];
                  } ?>
                  </td>
                  <td>
                    <?php if($d['status']==2){ ?>
                      <span class="label label-success" aria-hidden="true"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Complate</span>
                    <?php } else if ($d['status']==1) { ?>
                      <span class="label label-info" aria-hidden="true"><span class="glyphicon glyphicon-record" aria-hidden="true"></span> Pending</span>
                    <?php } else { ?>
                      <span class="label label-danger" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> No Action</span>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if($d['tanggal_selesai']==NULL){
                      echo "<b><i>No Complate</i></b>"; ?>
                    <?php } else {
                      echo $d['tanggal_selesai'];
                  } ?>
                  </td>
                  <td>
                    <?php if($_SESSION['level']==2) { ?>
                    <?php } else { ?>
                      <a href="<?php echo base_urL('index.php/sims/edituserdisposisi/').$d['id_balasan']."/".$d['id_pemberitahuan'];?>"><span class="label label-primary" aria-hidden="true"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</span></a>
                    <?php } ?>
                    <a onclick="javascript: return confirm('Are you sure you want to delete this data ?')" href="<?php echo base_urL('index.php/sims/deluserdisposisi/').$d['id_balasan']."/".$d['id_pemberitahuan'];?>"><span class="label label-danger" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</span></a>
                  </td>

                </tr>
              <?php   } ?>
               </tbody>
               <tfoot>
               <tr>
                 <th>No</th>
                 <th>Penerima Disposisi</th>
                 <th>Keterangan</th>
                 <th>Status Disposisi</th>
                 <th>Tanggal Selesai</th>
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


   <div class="modal fade" id="tambah_user" role="dialog">
       <div class="modal-dialog modal-md">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pilih Surat Terlebih Dahulu</h3>
              <button type="button" class="close" data-disimss="modal">&times;</button>
            </div>
            <form action="<?php echo base_urL('index.php/sims/adduserdisposisi');?>" role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label>ID Pemberitahuan</label>
                 <div class="input-group">
                    <span class="input-group-addon">+</span>
                    <input type="tex" name="id_pemberitahuan" class="form-control" value="<?php echo $this->uri->segment(3);?>" required readonly>
                  </div>
                  <label>Pilihlah User</label>
                  <select name="user[]" multiple class="form-control">
                    <?php foreach ($user_disposisi as $ud) {
                        if ($ud['id_user']==$_SESSION['id_user']) {  } else {
                      ?>
                            <option value="<?php echo $ud['id_user'];?>"><?php echo $ud['fullname'];?> - [<?php echo $ud['nama_jabatan'];?>]</option>
                    <?php } }?>
                  </select>
            </div>
          </div>
              <div class="box-footer">
                <button type="button" class="btn btn-danger pull-left" data-disimss="modal">Close</button>
                <button type="submit" class="btn btn-primary pull-right">Add</button>
              </div>
            </form>
          </div>
       </div>
     </div>
