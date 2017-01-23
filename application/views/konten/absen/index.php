<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Absensi</b> Karyawan</a>
  </div><!-- /.login-logo -->
  <div id="message">
    <?php 
      if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexabsen"){
        echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
        echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
        echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
        echo "</div>";
      }
    ?>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Absensi</p>
    <form method="post" action="<?php echo base_url();?>index.php/absen/masuk">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nip" placeholder="NIP Karyawan" onkeypress="return isNumberKey(event)">
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" name="kode_kehadiran">
          <option value="MSK">Masuk</option>
          <option value="PLG">Pulang</option>
        <?php
          foreach ($kehadiran as $ambilkehadiran) {
        ?>
  		    <option value="<?php echo $ambilkehadiran['kode_kehadiran'];?>">
           <?php echo $ambilkehadiran['nama_kehadiran'];?>
          </option>
        <?php } ?>
  		  </select>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div><!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Absen" name="masuk" />
        </div><!-- /.col -->
      </div>
    </form>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>