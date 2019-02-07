<section class="content-header">
  <h1>
    Master
    <small>Data</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Master Data</li>
    <li><a href="<?php echo base_url('index.php/sims/user');?>">Data User</a></li>
    <li class="active">Edit User</li>
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
             <form action="<?php echo base_urL('index.php/sims/updateuser');?>" role="form" method="post">
               <div class="box-body">
                 <div class="form-group">
                    <label>ID User</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="number" name="id_user" class="form-control" placeholder="Enter NIP" value="<?php echo $user->id_user;?>" required readonly>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>NIP</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="number" name="nip" class="form-control" placeholder="Enter NIP" value="<?php echo $user->nip;?>" required>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Fullname</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="fullname" class="form-control" placeholder="Enter fullname" value="<?php echo $user->fullname;?>" required>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Jabatan</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <select class="form-control" name="jabatan" required>
                        <?php foreach ($jabatan as $j) { ?>
                          <?php if ($user->jabatan == $j['id_jabatan']) { ?>
                            <option value="<?php echo $j['id_jabatan'];?>" selected><?php echo $j['nama_jabatan'];?></option>
                        <?php  } else { ?>
                          <option value="<?php echo $j['id_jabatan'];?>"><?php echo $j['nama_jabatan'];?></option>
                        <?php } }?>
                      </select>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Alamat</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <textarea name="alamat" class="form-control" rows="3" placeholder="Enter your address...." required> <?php echo $user->alamat;?> </textarea>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Email</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="email" name="email" class="form-control" placeholder="example@email.com" value="<?php echo $user->email;?>" required>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Level User</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <select class="form-control" name="level" required>
                        <?php foreach ($level as $j) { ?>
                          <?php if ($user->level == $j['id_level']) { ?>
                            <option value="<?php echo $j['id_level'];?>" selected><?php echo $j['nama_level'];?></option>
                        <?php  } else { ?>
                          <option value="<?php echo $j['id_level'];?>"><?php echo $j['nama_level'];?></option>
                        <?php } }?>
                      </select>
                    </div>
                 </div>
               </div>
               <!-- /.box-body -->

               <div class="box-footer">
                 <button type="submit" class="btn btn-primary pull-right">Save Data</button>
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
