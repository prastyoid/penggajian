<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Data Jabatan
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">Data Jabatan</li>
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
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexjabatan"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                      echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                      echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                  ?>
                </div>
                <form method="post" id="myform" action="<?php echo base_url();?>index.php/jabatan/hapus">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:20px;">
                          <input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked">
                        </th>                    
                        <th>Kode Jabatan</th>
                        <th>Nama Jabatan</th>
                        <th>Nama Divisi</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      foreach ($jabatan as $ambiljabatan) {
                    ?>
                      <tr class="record">
                        <td><input type="checkbox" name="check[]" value="<?php echo $ambiljabatan['kode_jabatan'];?>"></td>
                        <td id="kode"><?php echo $ambiljabatan['kode_jabatan'];?></td>
                        <td><?php echo $ambiljabatan['nama_jabatan'];?></td>
                        <td>
                          <?php 
                            $a = $ambiljabatan['kode_divisi'];
                            $cari = $this->global_model->find_by('divisi', array('kode_divisi' => $a));
                            echo $cari['nama_divisi'];
                          ?>
                        </td>
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
                    <form method="post" action="<?php echo base_url();?>index.php/jabatan/tambah">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Kode Jabatan</label>                          
                              <input type="text" id="kodetambah" name="kode_jabatan" class="form-control" placeholder="Kode Jabatan" maxlength="5" style="text-transform:uppercase;" required>
                          </div>
                          <div class="form-group">
                              <label>Nama Jabatan</label>
                              <input type="text" id="namatambah" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" required>
                          </div>
                          <div class="form-group">
                              <label>Nama Divisi</label>
                              <select class="form-control" name="kode_divisi">
                                <?php 
                                  foreach ($divisi as $ambildivisi) {
                                ?>

                                <option value="<?php echo $ambildivisi['kode_divisi'];?>">
                                  <?php echo $ambildivisi['nama_divisi'];?>
                                </option>

                                <?php } ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Instansi Jabatan</label>
                              <input type="text" id="insjabatan" name="insjabatan" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                          <div class="form-group">
                              <label>Tunjangan Jabatan</label>                          
                              <input type="text" id="tjabatan" name="tjabatan" class="form-control" onkeypress="return isNumberKey(event)" required>
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
                              <label>Kode Jabatan</label>                          
                              <input type="text" id="kodejabatan" name="kode_jabatan" class="form-control" placeholder="Kode Jabatan" maxlength="5" style="text-transform:uppercase;" required>
                          </div>
                          <div class="form-group">
                              <label>Nama Jabatan</label>
                              <input type="text" id="namajabatan" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" required>
                          </div>
                          <div class="form-group">
                              <label>Nama Divisi</label>
                              <select class="form-control" id="kodedivisi" name="kode_divisi">
                                <?php 
                                  foreach ($divisi as $ambildivisi) {
                                ?>

                                <option value="<?php echo $ambildivisi['kode_divisi'];?>">
                                  <?php echo $ambildivisi['nama_divisi'];?>
                                </option>

                                <?php } ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Instansi Jabatan</label>
                              <input type="text" id="insjabatanedit" name="insjabatan" class="form-control" onkeypress="return isNumberKey(event)" required>
                          </div>
                          <div class="form-group">
                              <label>Tunjangan Jabatan</label>                          
                              <input type="text" id="tjabatanedit" name="tjabatan" class="form-control" onkeypress="return isNumberKey(event)" required>
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

        $.getJSON('<?php echo base_url(); ?>index.php/jabatan/tampil/'+record.find('#kode').html(), function(data) {
        $("#kodejabatan").val(data.kode_jabatan);
        $("#namajabatan").val(data.nama_jabatan);
        $("#kodedivisi").val(data.kode_divisi);
        $("#insjabatanedit").val(data.insjabatan);
        $("#tjabatanedit").val(data.tjabatan);
        $("#editform").attr("action", "<?php echo base_url(); ?>/index.php/jabatan/edit/"+record.find('#kode').html());
    });

        $('#edit').modal('show');
    
    });

    $(".tambahbutton").click(function(event) {
        $("#kodetambah").val('');
        $("#namatambah").val('');
        $("#insjabatan").val('');
        $("#tjabatan").val('');
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