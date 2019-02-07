<section class="content-header">
  <h1>
    Master
    <small>Data</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('index.php/sims/home');?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Master Data</li>
    <li><a href="<?php echo base_url('index.php/sims/level');?>">Data Level</a></li>
    <li class="active">Edit Level</li>
  </ol>
</section>
<section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header with-border">
             <h3 class="box-title">Edit Level</h3>
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
               </button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <form action="<?php echo base_urL('index.php/sims/updatelevel');?>" role="form" method="post">
               <div class="box-body">
                 <div class="form-group">
                    <label>ID Level</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="number" name="id_level" class="form-control" placeholder="Enter NIP" value="<?php echo $level->id_level;?>" required readonly>
                    </div>
                 </div>
                 <div class="form-group">
                    <label>Nama Level</label>
                   <div class="input-group">
                      <span class="input-group-addon">+</span>
                      <input type="text" name="nama_level" class="form-control" placeholder="Enter NIP" value="<?php echo $level->nama_level;?>" required>
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
