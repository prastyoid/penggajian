<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Data Absensi Karyawan
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">List Data Absensi Karyawan</li>
          </ol>
        </section>
        <section class="content-header">
          <button class="tambahbutton btn btn-primary" onclick="openmodal('tambah')"><i class="fa fa-plus-square"></i> Absen</button>
          <button class="btn btn-danger" onclick="openmodal('hapus')"><i class="fa fa-trash"></i> Hapus data</button>
          <button class="btn btn-success" onclick="refresh()"><i class="fa fa-refresh"></i> Refresh(<label id="jumlah">0</label>)</button>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                <div id="message">
                  <?php
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexabsensi"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                      echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                      echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                  ?>
                </div>
                <form method="post" id="myform" action="<?php echo base_url();?>index.php/absensi/hapus">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:20px;">
                          <input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked">
                        </th>
                        <th>NIP</th>
                        <th>Nama Karyawan</th>
                        <th>Kehadiran</th>
                        <th>Tanggal</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($absensi as $ambilabsensi) {
                    ?>
                      <tr class="record">
                        <td><input type="checkbox" name="check[]" value="<?php echo $ambilabsensi['kode_absensi']?>"></td>
                        <td>
                          <?php
                            $z = $ambilabsensi['kode_karyawan'];
                            $cariz = $this->global_model->find_by('karyawan', array('kode_karyawan' => $z));
                            echo $cariz['nip'];
                          ?>
                        </td>
                        <td>
                          <?php
                            $a = $ambilabsensi['kode_karyawan'];
                            $cari = $this->global_model->find_by('karyawan', array('kode_karyawan' => $a));
                            echo $cari['nama'];
                          ?>
                        </td>
                        <td>
                          <?php
                            $khr = $ambilabsensi['kode_kehadiran'];
                            $sql = $this->global_model->find_by('kehadiran', array('kode_kehadiran' =>$khr));
                            if($khr == "MSK"){
                              echo "Masuk";
                            }else{
                              echo $sql['nama_kehadiran'];
                            }
                          ?>
                        </td>
                        <td><?php echo $ambilabsensi['tanggal'];?></td>
                        <td><?php echo $ambilabsensi['masuk'];?></td>
                        <td><?php echo $ambilabsensi['pulang'];?></td>
                      </tr>

                    <?php } ?>
                    </tbody>
                  </table>
                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="modal fade" id="tambah">
              <div class="vertical-alignment-helper">
                <div class="modal-dialog modal-sm vertical-align-center">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Absensi Karyawan</h4>
                    </div>
                    <div class="modal-body">
                   		<form method="post" action="<?php echo base_url();?>index.php/absensi/tambah">
                   		 <div class="row">
                			<div class="col-md-12">
		                        <div class="form-group">
		                            <label for="inputNamaDevisi">NIP Karyawan</label>
                                <input type="text" class="form-control" name="nip" placeholder="NIP Karyawan" onkeypress="return isNumberKey(event)">
		                        </div>
		                        <div class="form-group">
		                            <label for="inputNamaDevisi">Keterangan Kehadiran</label>
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
		                  </div>
		                </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="simpandata" value="Simpan">
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.Vertically -->
            </div><!-- /.modal -->

            <div class="modal fade modal-danger" id="hapus">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Hapus Data</h4>
                    </div>
                    <div class="modal-body">
                      <p>Apa anda yakin ingin menghapus data tersebut?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <button type="submit" form="myform" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            </div>
          </div>
        </section>
</div>
<input type="hidden" id="jumlahload" value="<?php echo $jumlahdata;?>">
<script type="text/javascript">
function openmodal(id){
  $('#'+id).modal('show');
}
function refresh(){
  location.reload();
}
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".tambahbutton").click(function(event) {
        $("#kodekaryawan").val('');
    });

    ambildata();
  });

  function ambildata(){
    var bla = $('#jumlahload').val();

    setInterval(
    function () {
       $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>index.php/absensi/dataload",
        success: function(response){

         $("#jumlah").text(""+response-bla+"");
        }

       });

    }, 10000); // refresh setiap 10000 milliseconds
  }
</script>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
