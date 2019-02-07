<?php  if($this->session->flashdata('alert')) : ?>
  <?php echo ' <div class="row"> <div class="col-ls-4"> <div class="social-auth-links text-center"> <div class="alert alert-info"> <b> <i>'.$this->session->flashdata('alert').'</i> </b> </div> </div> </div> </div>' ?>
<?php endif;?>
<section class="content-header">
  <h1>
    Master
    <small>Data</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Master Data</li>
    <li class="active">Kode Agenda</li>
  </ol>
</section>
<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Kode Agenda Table</h3> &nbsp &nbsp
             <?php if($_SESSION['level']==1) { ?>
               <a href="" data-toggle="modal" data-target="#tambah_user"><span class="label label-primary" aria-hidden="true"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Data</span></a>
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
                 <th>Kode Agenda</th>
                 <th>Keterangan</th>
                 <th>Action</th>
               </tr>
               </thead>
               <tbody>
              <?php  $no = 1;
                      foreach ($kode_disposisi as $k) {?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $k['kode_disposisi'];?></td>
                  <td><?php echo $k['nama_kode_disposisi'];?></td>
                  <td>
                    <?php if($_SESSION['level']==2) { ?>
                    <?php } else { ?>
                      <a href="<?php echo base_urL('index.php/sims/editkode_disposisi/').$k['id_kode_disposisi'];?>"><span class="label label-primary" aria-hidden="true"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</span></a>
                      <a onclick="javascript: return confirm('Are you sure you want to delete this data ?')" href="<?php echo base_urL('index.php/sims/delkode_disposisi/').$k['id_kode_disposisi'];?>"><span class="label label-danger" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</span></a>
                    <?php } ?>
                    <a href="<?php echo base_urL('index.php/sims/nomor_agenda/').$k['id_kode_disposisi'];?>"><span class="label label-success" aria-hidden="true"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Nomor Agenda</span></a>
                  </td>
                </tr>
              <?php   } ?>
               </tbody>
               <tfoot>
               <tr>
                 <th>No</th>
                 <th>Kode Agenda</th>
                 <th>Keterangan</th>
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
              <h3 class="box-title">Add Data</h3>
              <button type="button" class="close" data-disimss="modal">&times;</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_urL('index.php/sims/addkode_disposisi');?>" role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label>Masukan Kode Agenda</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <input type="text" name="kode_disposisi" class="form-control" placeholder="Enter kode agenda" required>
                   </div>
                </div>
                <div class="form-group">
                  <label>Masukan Nama Kode Agenda</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <input type="text" name="nama_kode_disposisi" class="form-control" placeholder="Enter nama kode agenda" required>
                   </div>
                </div>
              <!-- /.box-body -->
            </div>
              <div class="box-footer">
                <button type="button" class="btn btn-danger pull-left" data-disimss="modal">Close</button>
                <button type="submit" class="btn btn-primary pull-right">Add Data</button>
              </div>
            </form>
          </div>
    		</div>
    	</div>
