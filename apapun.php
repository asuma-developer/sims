

<?php } if ($this->uri->segment(3) == 'info') {?>
<div class="col-md-7">
<?php echo $header;?>

  <div class="row">
    <div class="col-md-2">
      <b>Profesional</b>
    </div>
    <div class="col-md-10">
      <?php echo $data->profesional;?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <b>Address</b>
    </div>
    <div class="col-md-10">
      <?php echo $data->address;?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <b>Filosopy</b>
    </div>
    <div class="col-md-10">
      <?php echo $data->filosopy;?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <b>No. Phone</b>
    </div>
    <div class="col-md-10">
      <?php echo $data->no_hp;?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <b>About Me</b>
    </div>
    <div class="col-md-10">
      <?php echo $data->about;?>
    </div>
  </div>
</div>


<?php } if ($this->uri->segment(3) == 'service') {?>
  <div class="col-md-7">
    <?php echo $header;?>

    <div class="row">
      <?php foreach ($data2 as $d) { ?>
        <div class="col-md-3" style="text-align:center;">
          <img class="img-circle" src="<?php echo base_url().$d['images'];?>" width="150px" height="150px">
        </br><label style="color: #d9534f; font-size : 20px;"><?php echo $d['genre'];?></label></br>
        Rp. <?php echo $d['price'];?> </br>
        <a href="<?php echo base_url('index.php/raliferC/detail/order/').$d['id_artist'].'/'.$d['id_service'];?>"><button type="button" class="btn btn-danger btn-md">Order >> </button></a>
        </div>
      <?php } ?>
    </div>
  </div>

<?php } if ($this->uri->segment(3) == 'order') {?>
  <div class="col-md-7">
    <div class="row">
      <div class="col-md-3">
        <img src="<?php echo base_url().$data4->images;?>" class="img-rounded" width="150px" height="150px"></br>
      </div>
      <div class="col-md-6">
        <label style="color: #f95959; font-size:20px"><?php echo $data4->genre;?></label></br>
        <p><?php echo $data4->descrip;?></p>
        <b>Rp. <?php echo $data4->price;?></b>
      </div>
      <div class="col-md-3">
        <?php if (ISSET($_SESSION['id'])) { ?>
        <a href="" data-toggle="modal" data-target="#verify"><button style="margin-left: 8px; margin-top:10px;" type="button" class="btn btn-danger btn-md" > Verification </button></a>
        <?php } else { ?>
          <a href="" data-toggle="modal" data-target="#login"><button style="margin-left: 8px; margin-top:10px;" type="button" class="btn btn-danger btn-md" > Login </button></a>
        <?php } ?>
      </div>
    </div>
</div>


<?php } if ($this->uri->segment(3) == 'portofolio')  {?>
  <div class="col-md-7">
      <?php echo $header;?>

      <div class="row">
        <?php foreach ($data3 as $d) { ?>
          <div class="col-md-4 text-center fh5co-project animate-box" data-animate-effect="fadeIn">
          <a style="width:220px;" href=""><img src="<?php echo base_url().$d['images'];?>" class="img-rounded" width="220px" height="150px"></a>
          </div>
        <?php } ?>
      </div>
  </div>
