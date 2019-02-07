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
    <li class="active">Data User</li>
  </ol>
</section>
<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">User Table</h3> &nbsp &nbsp
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
                 <th>NIP</th>
                 <th>Fullname</th>
                 <th>Jabatan</th>
                 <th>Email</th>
                 <th>Level</th>
                 <th>Action</th>
               </tr>
               </thead>
               <tbody>
              <?php  $no = 1;
                      foreach ($user as $u) {?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $u['nip'];?></td>
                  <td><?php echo $u['fullname'];?></td>
                  <td><?php echo $u['nama_jabatan'];?></td>
                  <td><?php echo $u['email'];?></td>
                  <td><?php echo $u['nama_level'];?></td>
                  <td>
                    <a href="<?php echo base_urL('index.php/sims/edituser/').$u['id_user'];?>"><span class="label label-primary" aria-hidden="true"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</span></a>
                    <?php if ($_SESSION['id_user'] != 1) { ?> 
                       <a onclick="javascript: return confirm('Are you sure you want to delete this data ?')" href="<?php echo base_urL('index.php/sims/deluser/').$u['id_user'];?>"><span class="label label-danger" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</span></a>
                    <?php } else { } ?>
                  </td>
                </tr>
              <?php   } ?>
               </tbody>
               <tfoot>
               <tr>
                 <th>No</th>
                 <th>NIP</th>
                 <th>Fullname</th>
                 <th>Jabatan</th>
                 <th>Email</th>
                 <th>Level</th>
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
              <h3 class="box-title">Add Data User</h3>
              <button type="button" class="close" data-disimss="modal">&times;</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_urL('index.php/sims/adduser');?>" role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label>Masukan NIP</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <input type="number" name="nip" class="form-control" placeholder="Enter NIP" required>
                   </div>
                </div>
                <div class="form-group">
                  <label>Masukan fullname</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <input type="text" name="fullname" class="form-control" placeholder="Enter fullname" required>
                   </div>
                </div>
                <div class="form-group">
                  <label>Masukan Password</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                   </div>
                </div>
                <div class="form-group">
                  <label>Pilihlah Jabatan</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <select class="form-control" name="jabatan" required>
                       <?php foreach ($jabatan as $j) { ?>
                         <option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
                       <?php } ?>
                     </select>
                   </div>
                </div>
                <div class="form-group">
                  <label>Masukan Alamat</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <textarea name="alamat" class="form-control" rows="3" placeholder="Enter your address...." required></textarea>
                   </div>
                </div>
                <div class="form-group">
                  <label>Masukan Email</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <input type="email" name="email" class="form-control" placeholder="example@email.com" required>
                   </div>
                </div>
                <div class="form-group">
                  <label>Pilihlah Level User</label>
                  <div class="input-group">
                     <span class="input-group-addon">+</span>
                     <select class="form-control" name="level" required>
                       <?php foreach ($level as $l) { ?>
                          <option value="<?php echo $l['id_level'];?>"><?php echo $l['nama_level'];?></option>
                       <?php } ?>
                     </select>
                   </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" class="btn btn-danger pull-left" data-disimss="modal">Close</button>
                <button type="submit" class="btn btn-primary pull-right">Add Data</button>
              </div>
            </form>
          </div>
    		</div>
    	</div>
