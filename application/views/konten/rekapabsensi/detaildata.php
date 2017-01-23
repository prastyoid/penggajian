<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Detail Rekap Absensi
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/rekapabsensi/"> Rekap Absensi</a></li>  
            <li class="active">List Detail Rekap Absensi</li>
          </ol>
        </section>
        <section class="content-header">
          <button class="tambahbutton btn btn-primary"><i class="fa fa-print"></i> Cetak Rekap Absensi</button>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                <div id="message">
                  
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>                
                        <th>Divisi / Karyawan</th>
                        <th>Jumlah Kehadiran</th>
                        <th>Presentase</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1190190 - Gugun</td>
                        <td>80</td>
                        <td>70%</td>
                        <td class="text-center">
                        	<button type="button" class="btn btn-default btn-xs" data-placement="top" data-toggle="tooltip" title="Lihat"><span class="fa fa-eye"></span></button>
                        </td>                        
                      </tr>
                    
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div>
          </div>
        </section>  
</div>        