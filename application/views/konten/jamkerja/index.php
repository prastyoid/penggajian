<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Pengaturan Jam Kerja
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">Pengaturan Jam Kerja</li>
          </ol>
        </section>
        <section class="content-header">
          <button class="tambahbutton btn btn-primary" onclick="openmodal('tambah')"><i class="fa fa-plus-square"></i> Tambah Event</button>
          <button class="btn btn-danger" onclick="openmodal('hapus')"><i class="fa fa-trash"></i> Hapus Event</button>
          <button class="jamkerja btn btn-primary pull-right" onclick="openmodal('jamkerja')"><i class="fa fa-clock-o"></i> Jam Kerja</button>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                <div id="message">
                  <?php 
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexjamkerja"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                      echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                      echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                  ?>
                </div>
                <form method="post" id="myform" action="<?php echo base_url();?>index.php/jamkerja/hapus">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:20px;">
                          <input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked">
                        </th>
                        <th>Kode Event</th>                    
                        <th>Nama Event</th>
                        <th>Durasi</th>
                        <th>Keterangan</th>
                        <th>Denda</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      foreach ($eventkehadiran as $ambilevent) {
                    ?>
                      <tr class="record">
                        <td><input type="checkbox" name="check[]" value="<?php echo $ambilevent['kode_event'];?>"></td>
                        <td id="kode"><?php echo $ambilevent['kode_event'];?></td>
                        <td>
                          <?php 
                            $khr = $ambilevent['kode_kehadiran'];
                            $sql = $this->global_model->find_by('kehadiran', array('kode_kehadiran' => $khr));
                            echo $sql['nama_kehadiran'];
                          ?>
                        </td>
                        <td><?php echo $ambilevent['batasan']." ".$ambilevent['satuan'];?></td>
                        <td><?php echo $ambilevent['keterangan'];?></td>
                        <td>Rp.<?php echo $ambilevent['denda'];?></td>
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
                      <h4 class="modal-title">Tambah Event Kehadiran</h4>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="<?php echo base_url();?>index.php/jamkerja/tambah">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Nama Event</label>                          
                                <select class="form-control" name="kode_kehadiran">

                                <?php 
                                  foreach ($kehadiran as $ambilkehadiran) {
                                ?>
                                  <option value="<?php echo $ambilkehadiran['kode_kehadiran'];?>">
                                  <?php echo $ambilkehadiran['nama_kehadiran'];?>
                                  </option>

                                <?php } ?>

                                </select>
                            </div>
                            <div class="form-group">
                              <label>Satuan</label>
                              <select class="form-control" name="satuan">
                                <option value="Menit">Menit</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label>Batasan</label>
                                <input type="number" id="tambahbatasan" name="batasan" class="form-control" placeholder="Batasan" onkeypress="return isNumberKey(event)" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                  <label>Keterangan</label>
                                  <input type="text" id="tambahketerangan" name="keterangan" class="form-control" placeholder="Keterangan" required>
                              </div>
                            <div class="form-group">
                                  <label>Denda</label>
                                  <input type="number" id="tambahdenda" name="denda" class="form-control" placeholder="Denda" onkeypress="return isNumberKey(event)" required>
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
                      <h4 class="modal-title">Edit Event Kehadiran</h4>
                    </div>
                    <div class="modal-body">
                      <form method="post" id="editform">
                       <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Nama Event</label>                          
                                <select class="form-control" id="kodekehadiran" name="kode_kehadiran">

                                <?php 
                                  foreach ($kehadiran as $ambilkehadiran) {
                                ?>
                                
                                  <option value="<?php echo $ambilkehadiran['kode_kehadiran'];?>">
                                  <?php echo $ambilkehadiran['nama_kehadiran'];?>
                                  </option>

                                <?php } ?>

                                </select>
                            </div>
                            <div class="form-group">
                              <label>Satuan</label>
                              <select class="form-control" id="satuan" name="satuan">
                                <option value="Menit">Menit</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label>Batasan</label>
                                <input type="number" id="batasan" name="batasan" class="form-control" placeholder="Batasan" onkeypress="return isNumberKey(event)" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" required>
                              </div>
                            <div class="form-group">
                                <label>Denda</label>
                                <input type="number" id="denda" name="denda" class="form-control" placeholder="Denda" onkeypress="return isNumberKey(event)" required>
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

            <div class="modal fade" id="jamkerja">
              <div class="vertical-alignment-helper">
                <div class="modal-dialog modal-sm vertical-align-center">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Jam Kerja</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" id="editjamkerja">
                      <div class="bootstrap-timepicker">
                        <div class="form-group">
                          <label>Jam Masuk Kerja</label>
                          <div class="input-group">
                            <input type="text" id="masukkerja" name="masukkerja" class="form-control timepicker" required>
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->
                      </div>
                      <div class="bootstrap-timepicker">
                        <div class="form-group">
                          <label>Jam Pulang Kerja</label>
                          <div class="input-group">
                            <input type="text" id="pulangkerja" name="pulangkerja" class="form-control timepicker" required>
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="editjamkerja" value="Simpan"/>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.Vertically -->
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
  $(document).ready(function() {
    $(".jamkerja").click(function(event) {
        var record = $(this).parents('.record');

        $.getJSON('<?php echo base_url(); ?>index.php/jamkerja/tampiljamkerja', function(data) {
        $("#masukkerja").val(data.masukkerja);
        $("#pulangkerja").val(data.pulangkerja);
        $("#editjamkerja").attr("action", "<?php echo base_url(); ?>/index.php/jamkerja/editjamkerja");
    });

        $('#jamkerja').modal('show');
    
    });
    //Timepicker
    $(".timepicker").timepicker({
        showInputs: false
    });
  });
</script>

<script type="text/javascript">
    $(".editbutton").click(function(event) {
        var record = $(this).parents('.record');

        $.getJSON('<?php echo base_url(); ?>index.php/jamkerja/tampil/'+record.find('#kode').html(), function(data) {
        $("#kodekehadiran").val(data.kode_kehadiran);
        $("#satuan").val(data.satuan);
        $("#batasan").val(data.batasan);
        $("#keterangan").val(data.keterangan);
        $("#denda").val(data.denda);
        $("#editform").attr("action", "<?php echo base_url(); ?>/index.php/jamkerja/edit/"+record.find('#kode').html());
    });

        $('#edit').modal('show');
    
    });

    $(".tambahbutton").click(function(event) {
        $("#tambahevent").val('');
        $("#tambahbatasan").val('');
        $("#tambahketerangan").val('');
        $("#tambahdenda").val('');
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