<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Pengaturan Input
            <small>Potongan dan Pembayaran</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dash/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">List Pengaturan Input</li>
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
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "indexpengaturaninput"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                      echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                      echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                  ?>
                </div>
                <form method="post" id="myform" action="<?php echo base_url();?>index.php/pengaturaninput/hapus">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:20px;">
                          <input type="checkbox" onclick="for(c in document.getElementsByName('check[]')) document.getElementsByName('check[]').item(c).checked =  this.checked">
                        </th>                    
                        <th>Master</th>
                        <th>Data Master</th>
                        <th>Sub Data Master</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      foreach ($pengaturaninput as $ambilpengaturan) {
                    ?>
                      <tr class="record">
                        <td id="kode"><input type="checkbox" name="check[]" value="<?php echo $ambilpengaturan['kode_pengaturan'];?>"></td>
                        <td>
                        <?php
                          $data = $ambilpengaturan['master'];
                          if($data == "POG"){
                            echo "Potongan";
                          }else if($data == "PEG"){
                            echo "Pembayaran";
                          }
                        ?>
                        </td>
                        <td>
                        <?php
                          $getmaster = $ambilpengaturan['data_master'];

                          $sqlmaster = $this->global_model->find_by('jenispotongan', array('kode_jenispotongan' => $getmaster));

                          if(!$sqlmaster){
                            $sqlmaster = $this->global_model->find_by('jenispembayaran', array('kode_jenispembayaran' => $getmaster));
                            echo $sqlmaster['nama_jenispembayaran'];
                          }else{
                            echo $sqlmaster['nama_jenispotongan'];
                          }
                        ?>
                        </td>
                        <td>
                          <?php
                          $getsub = $ambilpengaturan['sub_master'];

                          $sqlsub = $this->global_model->find_by('jenissubpotongan', array('kode_jenissubpotongan' => $getsub));

                          if(!$sqlsub){
                            $sqlsub = $this->global_model->find_by('jenissubpembayaran', array('kode_jenissubpembayaran' => $getsub));
                            echo $sqlsub['nama_jenissubpembayaran'];
                          }else{
                            echo $sqlsub['nama_jenissubpotongan'];
                          }
                        ?>
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
                    <form method="post" action="<?php echo base_url();?>index.php/pengaturaninput/tambah">
                        <div class="form-group">
                            <label>Master</label>
                            <select class="form-control" name="master" onchange="showmaster(this.value)" required>
                              <option></option>
                              <option value="POG">Potongan</option>
                              <option value="PEG">Pembayaran</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Data Master</label>
                            <select class="form-control" name="data_master" id="txtmaster" onchange="showdata(this.value)" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sub Data Master</label>
                            <select class="form-control" name="sub_master" id="txtdata" required>
                            </select>
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

        $.getJSON('<?php echo base_url(); ?>index.php/pengaturaninput/tampil/'+record.find('#kode').html(), function(data) {
        $("#master").val(data.master);
        $("#txtmaster2").val(data.data_master);
        $("#txtdata2").val(data.sub_master);
        $("#ubahform").attr("action", "<?php echo base_url(); ?>/index.php/pengaturaninput/ubah/"+record.find('#kode').html());
    });

        $('#ubah').modal('show');
    
    });

    $(".tambahbutton").click(function(event) {
        $("#kodetambah").val('');
        $("#namatambah").val('');
    }); 
</script>
<script type="text/javascript">
  function showmaster(str) {
        document.getElementById("txtmaster").value = "";
        document.getElementById("txtdata").value = "";

        //sebelum master dipilih data kosong
        document.getElementById("txtdata").innerHTML = "";

        var xhttp;    
        if (str == "") {
          document.getElementById("txtmaster").innerHTML = "";
          return;
        }
        var url="http://localhost/penggajian/index.php/pengaturaninput/ajaxshowmaster/"


        url=url+str
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("txtmaster").innerHTML = xhttp.responseText
            document.getElementById("txtmaster").value = xhttp.responseText
          }
        };
        xhttp.open("GET",url, true);
        xhttp.send(null);

      }

  function showdata(str) {
        document.getElementById("txtdata").value = "";

        var xhttp;    
        if (str == "") {
          document.getElementById("txtdata").innerHTML = "";
          return;
        }
        var url="http://localhost/penggajian/index.php/pengaturaninput/ajaxshowdata/"


        url=url+str
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("txtdata").innerHTML = xhttp.responseText
            document.getElementById("txtdata").value = xhttp.responseText
          }
        };
        xhttp.open("GET",url, true);
        xhttp.send(null);

      }
</script>