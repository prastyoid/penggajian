<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/select2/select2.min.css">
    <!-- loadjs -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">
    <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/admin/bootstrap/js/jquery-1.10.2.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
        $(".select2").select2();
      });
    </script>

    <style type="text/css">
    .modal{
    }
    .vertical-alignment-helper{
      display:table;
      height:100%;
      width:100%;
    }
    .vertical-align-center{
      /* To center vertically*/
      display:table-cell;
      vertical-align:middle;
    }
    .modal-content{
      /* Boostrap sets the size of the modal in the modal dialog class, we need to inherit it*/
      width: inherit;
      height: inherit;
      /* To center horizontally*/
      margin: 0 auto;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>DKB</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Penggajian </b> DKB</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/admin/dist/img/icon-user.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->session->userdata('namalengkap'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/admin/dist/img/icon-user.png" class="img-circle" alt="User Image">
                    <p>
                      <?php
                        echo $this->session->userdata('namalengkap');
                      ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>/index.php/login/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Navigasi Utama</li>
            <li class="active"><a href="<?php echo base_url(); ?>index.php/dash"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <?php if($this->session->userdata('status')== "1"){?>
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url(); ?>index.php/divisi"><i class="fa fa-circle-o"></i> Data Divisi</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/jabatan"><i class="fa fa-circle-o"></i> Data Jabatan</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/golongan"><i class="fa fa-circle-o"></i> Data Golongan</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/statuspekerjaan"><i class="fa fa-circle-o"></i> Data Status Pekerjaan</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/karyawan"><i class="fa fa-circle-o"></i> Data Karyawan</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/jenispotongan"><i class="fa fa-circle-o"></i> Data Jenis Potongan</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/jenissubpotongan"><i class="fa fa-circle-o"></i> Data Jenis Sub Potongan</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/jenispembayaran"><i class="fa fa-circle-o"></i> Data Jenis Pembayaran</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/jenissubpembayaran"><i class="fa fa-circle-o"></i> Data Jenis Sub pembayaran</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/kehadiran"><i class="fa fa-circle-o"></i> Data Kehadiran</a></li>
              </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('status')== "1"){?>
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Absensi</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url(); ?>index.php/absensi"><i class="fa fa-circle-o"></i> Input Data Absensi Karyawan</a></li>
              </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('status')== "1" || $this->session->userdata('status')== "2"){?>
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Potongan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url(); ?>index.php/mpotongan"><i class="fa fa-circle-o"></i> Data Potongan</a></li>
              </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('status')== "1" || $this->session->userdata('status')== "2"){?>
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Pembayaran</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url(); ?>index.php/mpembayaran"><i class="fa fa-circle-o"></i> Data Pembayaran</a></li>
              </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('status')== "1" || $this->session->userdata('status')== "2" || $this->session->userdata('status')== "3"){?>
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url(); ?>index.php/rekappremihadir"><i class="fa fa-circle-o"></i> Rekap Premi Hadir</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/rekappotongan"><i class="fa fa-circle-o"></i> Rekap Potongan Gaji</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/rekappembayaran"><i class="fa fa-circle-o"></i> Rekap Pembayaran Gaji</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/rekapstruk"><i class="fa fa-circle-o"></i> Rekap Struk Gaji</a></li>
              </ul>
            </li>
            <?php } ?>
            <?php if($this->session->userdata('status')== "1"){?>
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Pengaturan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url(); ?>index.php/jamkerja"><i class="fa fa-circle-o"></i> Pengaturan Jam Kerja</a></li>
                <li class=""><a href="<?php echo base_url(); ?>index.php/pengaturaninput"><i class="fa fa-circle-o"></i> Pengaturan Input</a></li>
              </ul>
            </li>
            <?php } ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
