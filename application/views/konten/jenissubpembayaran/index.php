<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Data Jenis Sub Pembayaran
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">Data Jenis Sub Pembayaran</li>
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
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexjenissubpembayaran"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                      echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                      echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                  ?>
                </div>
                <form method="post" id="myform" action="<?php echo base_url();?>index.php/jenissubpembayaran/hapus">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:20px;">
                          <input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked">
                        </th>                    
                        <th>Kode Jenis Sub Pembayaran</th>
                        <th>Nama Jenis Sub Pembayaran</th>
                        <th>Nama Jenis Pembayaran</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      foreach ($jenissubpembayaran as $ambiljenissubpembayaran) {
                    ?>
                      <tr class="record">
                        <td><input type="checkbox" name="check[]" value="<?php echo $ambiljenissubpembayaran['kode_jenissubpembayaran'];?>"></td>
                        <td id="kode"><?php echo $ambiljenissubpembayaran['kode_jenissubpembayaran'];?></td>
                        <td><?php echo $ambiljenissubpembayaran['nama_jenissubpembayaran'];?></td>
                        <td>
                          <?php 
                            $a = $ambiljenissubpembayaran['kode_jenispembayaran'];
                            $cari = $this->global_model->find_by('jenispembayaran', array('kode_jenispembayaran' => $a));
                            echo $cari['nama_jenispembayaran'];
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
                <div class="modal-dialog modal-sm vertical-align-center">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="<?php echo base_url();?>index.php/jenissubpembayaran/tambah">
                        <div class="form-group">
                            <label>Kode Jenis Sub Pembayaran</label>                          
                            <input type="text" id="kodetambah" name="kode_jenissubpembayaran" class="form-control" placeholder="Kode Jenis Sub Pembayaran" maxlength="5" style="text-transform:uppercase;" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Jenis Sub Pembayaran</label>
                            <input type="text" id="namatambah" name="nama_jenissubpembayaran" class="form-control" placeholder="Nama Jenis Sub Pembayaran" required>
                        </div>
                        <div class="form-group">
                            <label>Nama jenis Pembayaran</label>
                            <select class="form-control" name="kode_jenispembayaran">

                            <?php 
                              foreach ($jenispembayaran as $ambiljenispembayaran) {
                            ?>

                              <option value="<?php echo $ambiljenispembayaran['kode_jenispembayaran'];?>">
                              <?php echo $ambiljenispembayaran['nama_jenispembayaran'];?>
                              </option>

                            <?php } ?>

                            </select>
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

            <div class="modal fade" id="edit">
              <div class="vertical-alignment-helper">
                <div class="modal-dialog modal-sm vertical-align-center">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" id="editform">
                        <div class="form-group">
                            <label>Kode Jenis Sub Pembayaran</label>                          
                            <input type="text" id="kodejenissubpembayaran" name="kode_jenissubpembayaran" class="form-control" placeholder="Kode Jenis Sub Pembayaran" maxlength="5" style="text-transform:uppercase;" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Jenis Sub Pembayaran</label>
                            <input type="text" id="namajenissubpembayaran" name="nama_jenissubpembayaran" class="form-control" placeholder="Nama Jenis Sub Pembayaran" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pembayaran</label>
                            <select class="form-control" name="kode_jenispembayaran">
                            <?php 
                              foreach ($jenispembayaran as $ambiljenispembayaran) {
                            ?>
                              <option value="<?php echo $ambiljenispembayaran['kode_jenispembayaran'];?>">
                              <?php echo $ambiljenispembayaran['nama_jenispembayaran'];?>
                              </option>

                            <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="editdata" value="Edit" />
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

        $.getJSON('<?php echo base_url(); ?>index.php/jenissubpembayaran/tampil/'+record.find('#kode').html(), function(data) {
        $("#kodejenissubpembayaran").val(data.kode_jenissubpembayaran);
        $("#namajenissubpembayaran").val(data.nama_jenissubpembayaran);
        $("#kodejenispembayaran").val(data.kode_jenispembayaran);
        $("#editform").attr("action", "<?php echo base_url(); ?>/index.php/jenissubpembayaran/edit/"+record.find('#kode').html());
    });

        $('#edit').modal('show');
    
    });

    $(".tambahbutton").click(function(event) {
        $("#kodetambah").val('');
        $("#namatambah").val('');
    });
</script>