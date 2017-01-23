<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Data Golongan
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">Data Golongan</li>
          </ol>
        </section>
        <section class="content-header">
          <button class="tambahbutton btn btn-primary" onclick="openmodal('tambah')"><i class="fa fa-plus-square"></i> Tambah data</button>
          <button class="btn btn-danger" onclick="openmodal('hapus')"><i class="fa fa-trash"></i> Hapus data</button>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                <div id="message">
                  <?php 
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexgolongan"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                      echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                      echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                  ?>
                </div>
                <form method="post" id="myform" action="<?php echo base_url();?>index.php/golongan/hapus">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:20px;">
                          <input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked">
                        </th>                    
                        <th>Kode Golongan</th>
                        <th>Jangkauan</th>
                        <th>Nama Golongan</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      foreach ($golongan as $ambilgolongan) {
                        $pisah = explode('-', $ambilgolongan['kode_golongan']);
                        $gettingkat = $pisah[0];
                        $getletter = substr($pisah[1], 0,1);
                    ?>
                      <tr class="record">
                        <td><input type="checkbox" name="check[]" value="<?php echo $gettingkat.'-'.$getletter;?>">
                        </td>
                        <td id="kode"><?php echo $gettingkat.'-'.$getletter;?></td>
                        <td>
                          <?php
                            $checkjumlah = count($this->global_model->query("select *from golongan where kode_golongan like '".$gettingkat.'-'.$getletter."%'"));
                            $banyak = $checkjumlah-1;
                            if($checkjumlah >= 1 && $checkjumlah <= 9){
                              $banyak = "0".intval($checkjumlah-1);
                            }

                            echo $pisah[1]." sampai ".$getletter.$banyak;
                          ?>
                        </td>
                        <td><?php echo $ambilgolongan['nama_golongan'];?></td>
                        <td class="text-center">
                        <button type="button" class="editbutton btn btn-default btn-xs" data-placement="top" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></button>
                        </td>                        
                      </tr>

                    <?php } ?>

                    </tbody>
                  </table>
                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            <div class="modal fade" id="tambah">
              <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>index.php/golongan/tambah">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Tingkatan</label>
                              <input type="text" id="tingkatan" name="tingkatan" class="form-control" placeholder="Contoh : I" maxlength="10" style="text-transform:uppercase;" required>
                          </div>
                          <div class="form-group">
                              <label>Jenis Tingkatan</label>
                              <input type="text" id="jenistingkatan" name="jenistingkatan" class="form-control" placeholder="Contoh : A" required>
                          </div>
                          <div class="form-group">
                              <label>Banyaknya Tingkatan</label>
                              <input type="text" id="banyaktingkatan" name="banyak" class="form-control" placeholder="Contoh : 10" onkeypress="return isNumberKey(event)" required>
                          </div>
                          <div class="form-group">
                              <label>Nama Golongan</label>
                              <input type="text" id="namatambah" name="nama_golongan" class="form-control" placeholder="Nama Golongan" required>
                          </div>
                          <div class="form-group">
                              <label>Gaji Pokok</label>
                              <input type="text" id="gajipokok" name="gajipokok" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Tunjangan Perumahan</label>
                              <input type="text" id="tperumahan" name="tperumahan" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                          <div class="form-group">
                              <label>Tunjangan Kesehatan</label>
                              <input type="text" id="tkesehatan" name="tkesehatan" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                          <div class="form-group">
                              <label>Tunjangan Transport</label>
                              <input type="text" id="ttransport" name="ttransport" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                          <div class="form-group">
                              <label>Uang Makan</label>
                              <input type="text" id="uangmakan" name="uangmakan" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="simpandata" value="Simpan"/>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.Vertically -->
            </div><!-- /.modal -->

            <div class="modal fade" id="edit">
              <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" id="editform">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Tingkatan</label>
                              <input type="text" id="tingkatanedit" name="tingkatan" class="form-control" placeholder="Contoh : I" maxlength="10" style="text-transform:uppercase;" required>
                          </div>
                          <div class="form-group">
                              <label>Jenis Tingkatan</label>
                              <input type="text" id="jenistingkatanedit" name="jenistingkatan" class="form-control" placeholder="Contoh : A" required>
                          </div>
                          <div class="form-group">
                              <label>Banyaknya Tingkatan</label>
                              <input type="text" id="banyaktingkatanedit" name="banyak" class="form-control" placeholder="Contoh : 10" onkeypress="return isNumberKey(event)" required>
                          </div>
                          <div class="form-group">
                              <label>Nama Golongan</label>
                              <input type="text" id="namaedit" name="nama_golongan" class="form-control" placeholder="Nama Golongan" required>
                          </div>
                          <div class="form-group">
                              <label>Gaji Pokok</label>
                              <input type="text" id="gajipokokedit" name="gajipokok" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Tunjangan Perumahan</label>
                              <input type="text" id="tperumahanedit" name="tperumahan" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                          <div class="form-group">
                              <label>Tunjangan Kesehatan</label>
                              <input type="text" id="tkesehatanedit" name="tkesehatan" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                          <div class="form-group">
                              <label>Tunjangan Transport</label>
                              <input type="text" id="ttransportedit" name="ttransport" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                          <div class="form-group">
                              <label>Uang Makan</label>
                              <input type="text" id="uangmakanedit" name="uangmakan" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="editdata" value="Edit"/>
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
<script type="text/javascript">
function openmodal(id){
  $('#'+id).modal('show');
}
</script>

<script type="text/javascript">
    $(".editbutton").click(function(event) {
        var record = $(this).parents('.record');

        $.getJSON('<?php echo base_url(); ?>index.php/golongan/tampil/'+record.find('#kode').html(), function(data) {
        $("#tingkatanedit").val(data.tingkatan);
        $("#jenistingkatanedit").val(data.jenistingkatan);
        $("#banyaktingkatanedit").val(data.banyak);
        $("#namaedit").val(data.nama);
        $("#gajipokokedit").val(data.gajipokok);
        $("#tperumahanedit").val(data.tperumahan);
        $("#tkesehatanedit").val(data.tkesehatan);
        $("#ttransportedit").val(data.ttransport);
        $("#uangmakanedit").val(data.uangmakan);
        $("#editform").attr("action", "<?php echo base_url(); ?>/index.php/golongan/edit/"+record.find('#kode').html());
    });

        $('#edit').modal('show');
    
    });

    $(".tambahbutton").click(function(event) {
        $("#tingkatan").val('');
        $("#jenistingkatan").val('');
        $("#banyaktingkatan").val('');
        $("#namatambah").val('');
        $("#gajipokok").val('');
        $("#tperumahan").val('');
        $("#tkesehatan").val('');
        $("#ttransport").val('');
        $("#uangmakan").val('');
    });
</script>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>