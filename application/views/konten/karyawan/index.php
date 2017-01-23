<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Data Karyawan
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">Data Karyawan</li>
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
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexkaryawan"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                      echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                      echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                  ?>
                </div>
                <form method="post" id="myform" action="<?php echo base_url();?>index.php/karyawan/hapus">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:20px;">
                          <input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked">
                        </th>                    
                        <th>Kode Karyawan</th>
                        <th>NIP</th>
                        <th>Nama Karyawan</th>
                        <th>Nama Jabatan</th>
                        <th>Status Pekerjaan</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    	foreach ($karyawan as $ambilkaryawan) {
                    ?>
                      <tr class="record">
                        <td><input type="checkbox" name="check[]" value="<?php echo $ambilkaryawan['kode_karyawan'];?>"></td>
                        <td id="kode"><?php echo $ambilkaryawan['kode_karyawan'];?></td>
                        <td><?php echo $ambilkaryawan['nip'];?></td>
                        <td><?php echo $ambilkaryawan['nama'];?></td>
                        <td>
                        	<?php
                        		$a = $ambilkaryawan['kode_jabatan'];
                        		$cari = $this->global_model->find_by('jabatan', array('kode_jabatan' => $a));
                        		if($a == ""){
                        			echo "";
                        		}else{
                        			echo $cari['nama_jabatan'];
                        		}
                        	?>
                        </td>
                        <td>
                        	<?php
                        		$a = $ambilkaryawan['kode_statuskerja'];
                        		$cari = $this->global_model->find_by('statuspekerjaan', array('kode_statuskerja' => $a));
                        		if($a == ""){
                        			echo "";
                        		}else{
                        			echo $cari['nama_statuskerja'];
                        		}
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
                <div class="modal-dialog modal-lg vertical-align-center">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                   		<form method="post" action="<?php echo base_url();?>index.php/karyawan/tambah">
                   		 <div class="row">
                			<div class="col-md-4">
		                        <div class="form-group">
		                            <label>NIP</label>                          
		                            <input type="text" id="niptambah" name="nip" class="form-control" placeholder="NIP" maxlength="20" style="text-transform:uppercase;" onkeypress="return isNumberKey(event)" required>
		                        </div>
		                        <div class="form-group">
		                            <label>Nama Karyawan</label>
		                            <input type="text" id="namatambah" name="nama" class="form-control" placeholder="Nama Karyawan" required>
		                        </div>
		                        <div class="form-group">
		                            <label>Tempat Lahir</label>
		                            <input type="text" id="tempatlahirtambah" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
		                        </div>
		                        <div class="form-group">
		                            <label>Tanggal Lahir</label>
		                            <div class="input-group">
		                              <div class="input-group-addon">
		                                <i class="fa fa-calendar"></i>
		                              </div>
		                              <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="tanggal_lahir">
		                            </div><!-- /.input group -->
		                        </div>
		                        <div class="form-group">
		                            <label>Nomer KTP</label>
		                            <input type="text" id="noktptambah" name="no_ktp" class="form-control" placeholder="Nomer KTP" onkeypress="return isNumberKey(event)">
		                        </div>
		                    </div>

		                    <div class="col-md-4">
		                    	<div class="form-group">
		                            <label>Jenis Kelamin</label>
		                            <select class="form-control" name="jk">
		                              <option value="l">Laki-laki</option>
		                              <option value="p">Perempuan</option>
		                            </select>
		                        </div>
		                    	<div class="form-group">
		                            <label>Agama</label>
		                            <select class="form-control" name="agama">
		                              <option value="is">Islam</option>
		                              <option value="bd">Buddha</option>
		                              <option value="hd">Hindu</option>
		                              <option value="kt">Katolik</option>
		                              <option value="kp">Kristen Protestan</option>
		                            </select>
		                        </div>
		                        <div class="form-group">
		                            <label>Status Perkawinan</label>
		                            <select class="form-control" name="status_kawin" onchange="checkkawin(this.value)">
		                              <option value="kw">Kawin</option>
		                              <option value="bk">Belum Kawin</option>
		                            </select>
		                        </div>
		                        <div class="form-group">
				                    <label>Jumlah Anak</label>
				                    <input type="text" id="jumlahanaktambah" name="jumlah_anak" class="form-control" onkeypress="return isNumberKey(event)">
				                </div>
		                        <div class="form-group">
		                            <label>Alamat</label>
		                            <input type="text" id="alamattambah" name="alamat" class="form-control" placeholder="Alamat">
		                        </div>
		                    </div>
		                    <div class="col-md-4">
		                    	<div class="form-group">
		                            <label>Nomer Telpon</label>
		                            <input type="text" id="nomortelpontambah" name="nomor_telpon" class="form-control" placeholder="Nomer Telpon" onkeypress="return isNumberKey(event)">
		                        </div>
		                    	<div class="form-group">
		                            <label>Negara</label>
		                            <input type="text" id="negaratambah" name="negara" class="form-control" placeholder="Negara">
		                        </div>
		                        <div class="form-group">
		                            <label>Jabatan</label>                          
				                    <select class="form-control" name="kode_jabatan">

				                    <?php 
				                    	foreach ($jabatan as $ambiljabatan) {
				                    ?>

		                              <option value="<?php echo $ambiljabatan['kode_jabatan'];?>">
		                              <?php echo $ambiljabatan['nama_jabatan'];?>
		                              </option>

		                             <?php } ?>

		                            </select>
		                        </div>
		                        <div class="form-group">
		                            <label>Golongan</label>
		                            <select class="form-control" name="kode_golongan">

		                            <?php 
		                            	foreach ($golongan as $ambilgolongan) {
		                            ?>

		                              <option value="<?php echo $ambilgolongan['kode_golongan'];?>">
		                              	<?php echo $ambilgolongan['kode_golongan'];?>
		                              </option>

		                            <?php } ?>
		                            
		                            </select>
		                        </div>
		                        <div class="form-group">
		                            <label>Status Pekerjaan</label>
		                            <select class="form-control" name="kode_statuskerja">

		                            <?php
		                            	foreach ($statuspekerjaan as $ambilstatuskerja) {
		                            ?>
		                              <option value="<?php echo $ambilstatuskerja['kode_statuskerja'];?>">
		                              <?php echo $ambilstatuskerja['nama_statuskerja'];?>
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

            <div class="modal fade" id="edit">
              <div class="vertical-alignment-helper">
                <div class="modal-dialog modal-lg vertical-align-center">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                   	<form method="post" id="editform">
                   		 <div class="row">
                			<div class="col-md-4">
		                        <div class="form-group">
		                            <label>NIP</label>                          
		                            <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP Karyawan" maxlength="20" style="text-transform:uppercase;" required>
		                        </div>
		                        <div class="form-group">
		                            <label>Nama Karyawan</label>
		                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Karyawan" required>
		                        </div>
		                        <div class="form-group">
		                            <label>Tempat Lahir</label>
		                            <input type="text" id="tempatlahir" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
		                        </div>
		                        <div class="form-group">
		                            <label>Tanggal Lahir</label>
		                            <div class="input-group">
		                              <div class="input-group-addon">
		                                <i class="fa fa-calendar"></i>
		                              </div>
		                              <input type="text" class="form-control" id="tanggallahir" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="tanggal_lahir">
		                            </div><!-- /.input group -->
		                        </div>
		                        <div class="form-group">
		                            <label>Nomer KTP</label>
		                            <input type="text" id="noktp" name="no_ktp" class="form-control" placeholder="Nomer KTP" onkeypress="return isNumberKey(event)" required>
		                        </div>
		                    </div>

		                    <div class="col-md-4">
		                    	<div class="form-group">
		                            <label>Jenis Kelamin</label>
		                            <select class="form-control" id="jk" name="jk">
		                              <option value="l">Laki-laki</option>
		                              <option value="p">Perempuan</option>
		                            </select>
		                        </div>
		                    	<div class="form-group">
		                            <label>Agama</label>
		                            <select class="form-control" id="agama" name="agama">
		                              <option value="is">Islam</option>
		                              <option value="bd">Buddha</option>
		                              <option value="hd">Hindu</option>
		                              <option value="kt">Katolik</option>
		                              <option value="kp">Kristen Protestan</option>
		                            </select>
		                        </div>
		                        <div class="form-group">
		                            <label>Status Perkawinan</label>
		                            <select class="form-control" id="statuskawin" name="status_kawin" onchange="checkkawin(this.value)">
		                              <option value="kw">Kawin</option>
		                              <option value="bk">Belum Kawin</option>
		                            </select>
		                        </div>
		                        <div class="form-group">
				                    <label>Jumlah Anak</label>
				                    <input type="number" id="jumlahanak" name="jumlah_anak" class="form-control" onkeypress="return isNumberKey(event)" required>
				                </div>
		                        <div class="form-group">
		                            <label>Alamat</label>
		                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" required>
		                        </div>
		                    </div>
		                    <div class="col-md-4">
		                    	<div class="form-group">
		                            <label>Nomer Telpon</label>
		                            <input type="text" id="nomortelpon" name="nomor_telpon" class="form-control" placeholder="Nomer Telpon" onkeypress="return isNumberKey(event)" required>
		                        </div>
		                    	<div class="form-group">
		                            <label>Negara</label>
		                            <input type="text" id="negara" name="negara" class="form-control" placeholder="Negara" required>
		                        </div>
		                        <div class="form-group">
		                            <label>Jabatan</label>                          
				                    <select class="form-control" id="kodejabatan" name="kode_jabatan">

				                    <?php 
				                    	foreach ($jabatan as $ambiljabatan) {
				                    ?>

		                              <option value="<?php echo $ambiljabatan['kode_jabatan'];?>">
		                              <?php echo $ambiljabatan['nama_jabatan'];?>
		                              </option>

		                             <?php } ?>

		                            </select>
		                        </div>
		                        <div class="form-group">
		                            <label>Golongan</label>
		                            <select class="form-control" id="kodegolongan" name="kode_golongan">

		                            <?php 
		                            	foreach ($golongan as $ambilgolongan) {
		                            ?>

		                              <option value="<?php echo $ambilgolongan['kode_golongan'];?>">
		                              	<?php echo $ambilgolongan['kode_golongan'];?>
		                              </option>

		                            <?php } ?>
		                            
		                            </select>
		                        </div>
		                        <div class="form-group">
		                            <label>Status Pekerjaan</label>
		                            <select class="form-control" id="kodestatuskerja" name="kode_statuskerja">

		                            <?php
		                            	foreach ($statuspekerjaan as $ambilstatuskerja) {
		                            ?>
		                              <option value="<?php echo $ambilstatuskerja['kode_statuskerja'];?>">
		                              <?php echo $ambilstatuskerja['nama_statuskerja'];?>
		                              </option>

		                            <?php } ?>
		                            
		                            </select>
		                        </div>
		                    </div>
		                </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="editdata" value="Edit">
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

        $.getJSON('<?php echo base_url(); ?>index.php/karyawan/tampil/'+record.find('#kode').html(), function(data) {
        $("#nip").val(data.nip);
        $("#nama").val(data.nama);
        $("#tempatlahir").val(data.tempat_lahir);
        $("#tanggallahir").val(data.tanggal_lahir);
        $("#noktp").val(data.no_ktp);
        $("#jk").val(data.jk);
        $("#agama").val(data.agama);
        $("#statuskawin").val(data.status_kawin);
        $("#jumlahanak").val(data.jumlah_anak);
        if(data.status_kawin == "kw"){
        	document.getElementById("jumlahanak").disabled = false;
        }else if(data.status_kawin == "bk"){
        	document.getElementById("jumlahanak").disabled = true;
        }
        $("#alamat").val(data.alamat);
        $("#nomortelpon").val(data.nomor_telpon);
        $("#negara").val(data.negara);
        $("#kodejabatan").val(data.kode_jabatan);
        $("#kodegolongan").val(data.kode_golongan);
        $("#kodestatuskerja").val(data.kode_statuskerja);
        $("#editform").attr("action", "<?php echo base_url(); ?>index.php/karyawan/edit/"+record.find('#kode').html());
    });

        $('#edit').modal('show');
    
    });

    $(".tambahbutton").click(function(event) {
        $("#niptambah").val('');
        $("#namatambah").val('');
        $("#tempatlahirtambah").val('');
        $("#tanggallahirtambah").val('');
        $("#noktptambah").val('');
        $("#jumlahanaktambah").val('');
        $("#alamattambah").val('');
        $("#nomortelpontambah").val('');
        $("#negaratambah").val('');
    });

</script>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function checkkawin(str){
	if(str == "bk"){
		document.getElementById("jumlahanaktambah").disabled = true;
		document.getElementById("jumlahanak").disabled = true;
	}else{
		document.getElementById("jumlahanaktambah").disabled = false;
		document.getElementById("jumlahanak").disabled = false;
	}
}
</script>