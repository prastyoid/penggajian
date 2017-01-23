<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Data
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/mpembayaran/"><i class="fa fa-circle-o"></i> List Data Pembayaran</a></li>
            <li class="active">Tambah Data</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                  <div id="message">
                    <?php
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexmpembayarantambah"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                      echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                      echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                    ?>
                  </div>

                  <form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/mpembayaran/tambah">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">NIP Karyawan</label>
                      <div class="col-sm-7">
                        <select class="form-control select2" style="width: 100%;" name="kode_karyawan" onchange="showtampil(this.value)" required>
                            <option></option>
                            <?php foreach ($karyawan as $ambilkaryawan) {
                            ?>
                              <option value="<?php echo $ambilkaryawan['kode_karyawan'];?>"><?php echo $ambilkaryawan['nip']." - ".$ambilkaryawan['nama'];?></option>

                            <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Bulan</label>
                      <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" name="bulan" required>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                          <input type="text" name="tahun" class="form-control" onkeypress="return isNumberKey(event)" placeholder="tahun" required>
                        </select>
                      </div>
                    </div>
                     <div class="form-group">
                          <label class="col-sm-3 control-label">Gaji Pokok</label>
                          <div class="col-sm-7">
                            <input type="text" id="gajipokok" class="form-control" onkeypress="return isNumberKey(event)" disabled="">
                          </div>
                     </div>
                     <div class="form-group">
                          <label class="col-sm-3 control-label">Tunjangan Perumahan</label>
                          <div class="col-sm-7">
                            <input type="text" id="tperumahan" class="form-control" disabled="">
                          </div>
                     </div>
                     <div class="form-group">
                          <label class="col-sm-3 control-label">Tunjangan Kesehatan</label>
                          <div class="col-sm-7">
                            <input type="text"id="tkesehatan" class="form-control" disabled="">
                          </div>
                     </div>
                     <div class="form-group">
                          <label class="col-sm-3 control-label">Tunjangan Transportasi</label>
                          <div class="col-sm-7">
                            <input type="text" id="ttransport" class="form-control" disabled="">
                          </div>
                     </div>
                     <div class="form-group">
                          <label class="col-sm-3 control-label">Instansi Jabatan</label>
                          <div class="col-sm-7">
                            <input type="text" id="insjabatan" class="form-control" disabled="">
                          </div>
                     </div>
                     <div class="form-group">
                          <label class="col-sm-3 control-label">Tunjangan Jabatan</label>
                          <div class="col-sm-7">
                            <input type="text" id="tjabatan" class="form-control" disabled="">
                          </div>
                     </div>
                     <div class="form-group">
                          <label class="col-sm-3 control-label">Uang Makan</label>
                          <div class="col-sm-7">
                            <input type="text" id="uangmakan" class="form-control" disabled="">
                          </div>
                     </div>
                    <?php foreach ($datamaster as $ambildatamaster) {
                    ?>
                        <div class="form-group">
                          <h4 class="col-sm-3 control-label">
                          <?php
                            $a = $ambildatamaster['data_master'];
                            $sqla = $this->global_model->find_by('jenispembayaran', array('kode_jenispembayaran' => $a));

                            echo $sqla['nama_jenispembayaran'];
                          ?>
                          </h4>
                        </div>

                        <?php
                          $sqlb = $this->global_model->find_all_by('pengaturaninput', array('data_master' => $a),'kode_pengaturan ASC');
                          foreach ($sqlb as $ambildataform) {
                        ?>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">
                            <?php
                              $c = $ambildataform['sub_master'];
                              $sqlc = $this->global_model->find_by('jenissubpembayaran', array('kode_jenissubpembayaran' => $c));
                              echo $sqlc['nama_jenissubpembayaran'];
                            ?>
                          </label>
                          <div class="col-sm-7">
                            <input type="hidden" name="text[]" class="form-control" value="<?php echo $sqlc['kode_jenissubpembayaran'];?>">
                            <input type="text" name="nilai[]" class="form-control" placeholder="<?php echo $sqlc['nama_jenissubpembayaran'];?>" onkeypress="return isNumberKey(event)" required>
                          </div>
                        </div>
                        <?php }?>

                    <?php }?>

                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-7">
                        <input type="submit" class="btn btn-primary" name="simpandata" value="Simpan" />
                        <input type="reset" class="btn btn-default" value="Cancel"/>
                      </div>
                    </div>

                  </div><!-- /.box-body -->
                </form>

                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div>
          </div>
        </section>
</div>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
<script type="text/javascript">
  function showtampil(str) {
    if(str != ""){
        $.getJSON('<?php echo base_url(); ?>index.php/mpembayaran/tampilstatis/'+str, function(data) {
          $("#gajipokok").val(data.gajipokok);
          $("#tperumahan").val(data.tperumahan);
          $("#tkesehatan").val(data.tkesehatan);
          $("#ttransport").val(data.ttransport);
          $("#insjabatan").val(data.insjabatan);
          $("#tjabatan").val(data.tjabatan);
          $("#uangmakan").val(data.uangmakan);
        });
    }else{
          $("#gajipokok").val('');
          $("#tperumahan").val('');
          $("#tkesehatan").val('');
          $("#ttransport").val('');
          $("#insjabatan").val('');
          $("#tjabatan").val('');
          $("#uangmakan").val('');
    }
  }
</script>
