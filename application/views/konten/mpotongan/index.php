<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Data Potongan
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">List Data Potongan</li>
          </ol>
        </section>
        <section class="content-header">
          <a href="<?php echo base_url(); ?>index.php/mpotongan/tambah"><button class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah data</button></a>
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
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexmpotongan"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                      echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                      echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                    ?>
                </div>
                <form method="post" id="myform" action="<?php echo base_url();?>index.php/mpotongan/hapus">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:20px;">
                          <input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked">
                        </th>                    
                        <th>NIP</th>
                        <th>Nama Karyawan</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Jumlah Potongan</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      foreach ($gaji as $ambilgaji) {
                    ?>
                      <tr class="record">
                        <td><input type="checkbox" name="check[]" value="<?php echo $ambilgaji['id'];?>"></td>
                        <td>
                          <?php 
                            $x = $ambilgaji['kode_karyawan'];
                            $sql = $this->global_model->find_by('karyawan', array('kode_karyawan' => $x));
                            echo $sql['nip'];
                          ?>
                        </td>
                        <td>
                          <?php 
                            $x = $ambilgaji['kode_karyawan'];
                            $sql = $this->global_model->find_by('karyawan', array('kode_karyawan' => $x));
                            echo $sql['nama'];
                          ?>
                        </td>
                        <td><?php echo $ambilgaji['bulan'];?></td>
                        <td><?php echo $ambilgaji['tahun'];?></td>
                        <td>Rp. 
                          <?php echo $ambilgaji['jumlah'];?>
                        </td>
                        <td class="text-center">
                        <a href="<?php echo base_url(); ?>index.php/mpotongan/ubah/<?php echo $ambilgaji['id'];?>"><button type="button" class="editbutton btn btn-default btn-xs" data-placement="top" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></button></a>
                        </td>                        
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

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