<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Rekap Premi Hadir
          </h1><br>
          <p>
            <a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a> &nbsp;>
            <a href="<?php echo base_url(); ?>index.php/rekappremihadir/"> Rekap Premi Hadir</a> &nbsp;
          </p>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <!-- SELECT2 EXAMPLE -->
          <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Rekap Premi Hadir</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            <div id="message">

            </div>
              <!-- form start -->
              <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/rekappremihadir/laporan">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Divisi</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="divisi" required>
                          <?php foreach ($divisi as $ambildivisi) { ?>
                            <option value="<?php echo $ambildivisi['kode_divisi'] ?>"><?php echo $ambildivisi['nama_divisi']; ?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Periode</label>
                      <div class="col-sm-5">
                        <select class="form-control" name="bulan" required>
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
                      <div class="col-sm-5">
                        <input type="text" class="form-control"name="tahun" placeholder="tahun" onkeypress="return isNumberKey(event)" required>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <input type="submit" name="checklaporan" value="Lihat Rekap Premi Hadir" class="btn btn-primary pull-right">
                  </div><!-- /.box-footer -->
                </form>

            </div><!-- /.box-body -->
            </form>
            </div><!-- /.box -->
            </div><!-- /.cols -->
          </div><!-- /.row -->
        </section>

</div>

<script>
      $(function () {
        //Date range picker
        $('#reservation').daterangepicker();

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
