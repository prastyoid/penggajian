<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Data
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/mpotongan/"><i class="fa fa-circle-o"></i> List Data Potongan</a></li>   
            <li class="active">Edit Data</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                  <div id="message">

                  </div>
                  <form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/mpotongan/ubah/<?php echo $this->uri->segment(3); ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">NIP Karyawan</label>
                      <div class="col-sm-7">
                        <select class="form-control select2" style="width: 100%;" name="kode_karyawan" required>
                            <option></option>
                            <?php foreach ($karyawan as $ambilkaryawan) {
                            ?>
                              <option value="<?php echo $ambilkaryawan['kode_karyawan'];?>" <?php if($datas['kode_karyawan'] == $ambilkaryawan['kode_karyawan']){ echo "selected";}?> ><?php echo $ambilkaryawan['nip']." - ".$ambilkaryawan['nama'];?></option>
                            <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Bulan</label>
                      <div class="col-sm-4">
                        <select class="form-control" style="width: 100%;" name="bulan" required>
                            <option value="Januari" <?php if($datas['bulan'] == "Januari"){ echo "selected";}?>>Januari</option>
                            <option value="Februari" <?php if($datas['bulan'] == "Februari"){ echo "selected";}?>>Februari</option>
                            <option value="Maret" <?php if($datas['bulan'] == "Maret"){ echo "selected";}?>>Maret</option>
                            <option value="April" <?php if($datas['bulan'] == "April"){ echo "selected";}?>>April</option>
                            <option value="Mei" <?php if($datas['bulan'] == "Mei"){ echo "selected";}?>>Mei</option>
                            <option value="Juni" <?php if($datas['bulan'] == "Juni"){ echo "selected";}?>>Juni</option>
                            <option value="Juli" <?php if($datas['bulan'] == "Juli"){ echo "selected";}?>>Juli</option>
                            <option value="Agustus" <?php if($datas['bulan'] == "Agustus"){ echo "selected";}?>>Agustus</option>
                            <option value="September" <?php if($datas['bulan'] == "September"){ echo "selected";}?>>September</option>
                            <option value="Oktober" <?php if($datas['bulan'] == "Oktober"){ echo "selected";}?>>Oktober</option>
                            <option value="November" <?php if($datas['bulan'] == "November"){ echo "selected";}?>>November</option>
                            <option value="Desember" <?php if($datas['bulan'] == "Desember"){ echo "selected";}?>>Desember</option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                          <input type="text" name="tahun" class="form-control" onkeypress="return isNumberKey(event)" placeholder="tahun" value="<?php echo $datas['tahun'];?>" required>
                        </select>
                      </div>
                    </div>
                    <?php 
                      $getid = $this->uri->segment(3);
                      foreach ($datamaster as $ambildatamaster) {
                    ?>
                        <div class="form-group">
                          <h4 class="col-sm-3 control-label">
                          <?php 
                            $a = $ambildatamaster['data_master'];
                            $sqla = $this->global_model->find_by('jenispotongan', array('kode_jenispotongan' => $a));

                            echo $sqla['nama_jenispotongan'];
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
                              $carinilai = $this->global_model->find_by('gaji', array('id' => $getid, 'sub_master' => $c, 'data_master' => $a));
                              $sqlc = $this->global_model->find_by('jenissubpotongan', array('kode_jenissubpotongan' => $c));
                              echo $sqlc['nama_jenissubpotongan'];
                            ?>
                          </label>
                          <div class="col-sm-7">
                            <input type="hidden" name="text[]" class="form-control" value="<?php echo $sqlc['kode_jenissubpotongan'];?>">
                            <input type="text" name="nilai[]" class="form-control" placeholder="<?php echo $sqlc['nama_jenissubpotongan'];?>" value="<?php if(!$carinilai){ echo "0"; }else{echo $carinilai['nilai']; }?>" onkeypress="return isNumberKey(event)" required>
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