<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Rekap Absensi
          </h1><br>
          <p>
            <a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a> &nbsp;>  
            <a href="<?php echo base_url(); ?>index.php/rekapabsensi/"> Rekap Absensi</a> &nbsp;
          </p>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <!-- SELECT2 EXAMPLE -->
          <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Rekap Absensi</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            <div id="message">
              
            </div>
              <!-- form start -->
              <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-5">
                        <select class="form-control" required>
                            <option>Divisi</option>
                            <option>Karyawan</option>
                        </select>
                      </div>
                      <div class="col-sm-5">
                        <select class="form-control" required>
                            <option></option>
                            <option></option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Kehadiran</label>
                      <div class="col-sm-10">
                        <select class="form-control" required>
                            <option>Sakit</option>
                            <option>Ijin</option>
                            <option>Terlambat</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Periode</label>
                      <div class="col-sm-10">
                      	<div class="input-group">
	                      <div class="input-group-addon">
	                        <i class="fa fa-calendar"></i>
	                      </div>
	                      <input type="text" class="form-control pull-right" id="reservation">
	                    </div><!-- /.input group -->
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <a href="<?php echo base_url();?>index.php/rekapabsensi/detaildata" class="btn btn-primary pull-right">Lihat Rekap Absensi</a>
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