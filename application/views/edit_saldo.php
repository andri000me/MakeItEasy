<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Make It Easy</title>
  <!-- Favicon (ini diganti gambar yang sesuai-->
  <link rel="icon" href="<?php echo base_url();?>assets/img/logomie.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> 
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/AdminLTE.min.css">
   <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/inpo-box.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/skins/_all-skins.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!---------------- NOTED ------------------>

</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>Transaksi/transpetani" class="logo">
      <span class="logo-lg"><b>Make It</b> Easy</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>/assets/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">ADMIN</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>/assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  Admin
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url()?>Login/ubah_password" class="btn btn-default btn-flat">Ubah Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>Login/logout" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Petani <small>_</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Data Profil</a></li>
      <li class="active">Petani</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-success">
          <div class="box-body box-profile">

            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/img/avatar5.png" alt="User profile picture">

            <h4 class="text-center text-primary">ID <?= $profil->id ?></h4>
            <input type="text" name="petaniID" id="petaniID" hidden value="<?= $profil->id?>">

            <h3 class="profile-username text-center"><?= $profil->nama ?></h3>

            <p class="text-muted text-center"><?= $profil->desa ?></p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Nama Panggil </b><span class="pull-right"><?= $profil->nama_panggil ?></span> 
              </li>
              <li class="list-group-item">
                <b>Saldo <span class="pull-right text-success"><?= $profil->saldo ?></span> </b>
              </li>
              <li class="list-group-item">
                <b>Alamat</b>
                <p class="text-right"><?= $profil->alamat ?></p>
              </li>
              <li class="list-group-item">
                <b>No Telp/HP</b> <span class="pull-right"><?= $profil->no_telp ?></span>
              </li>
              <li class="list-group-item">
                <b>Jaminan </b> <br>
                <p class="text-right"><?= $profil->jaminan ?></p>
                <button id="editButton" class="btn btn-default btn-block" data-toggle="modal" data-target="#editPetani" ><i class="fa fa-edit"></i>  <b>Edit Profil</b></button> 
              </li>
            </ul>

            <div class="btn-group btn-block">
              <a href="<?php echo base_url();?>Transaksi/transpetani"><button type="button" class="btn bg-green-gradient" style="width: 100%"><i class="fa fa-leaf"></i> Input Setoran</button></a>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="box" style="border: 2px solid #dff0d8;">
        <div class="box-header">
          <h3 class="box-title">Riwayat Transaksi</h3>
          <div class="box-tools">
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-hover" style="font-size: 15px">
            <thead>
              <tr class="bg-success">
                <th style="text-align: center; line-height: 50px" rowspan="2">No</th>
                <th style="text-align: center; line-height: 50px" rowspan="2">Tanggal</th>
                <th style="text-align: center; line-height: 50px" rowspan="2">Jenis Cabai</th>
                <th style="text-align: center; line-height: 50px" rowspan="2">Harga Bersih</th>
                <th style="text-align: center; line-height: 50px" rowspan="2">Harga BS</th>
                <th style="text-align: center;" colspan="4">Berat</th>
                <th style="text-align: center; line-height: 50px" rowspan="2">Jumlah Uang</th>
                <th style="text-align: center; line-height: 50px" rowspan="2">Bon</th>
                <th style="text-align: center; line-height: 50px" rowspan="2">Saldo</th>
              </tr>
              <tr class="bg-success">
                <th>Kotor </th>
                <th>BS/ MTL </th>
                <th>Susut </th>
                <th>Bersih </th>
              </tr>
            </thead>

            <tbody>
            <?php $no=1; foreach ($tb_transaksi as $tb): ?>
              <tr>
                <td><?= $no ?></td>
                <td><?= $tb->tanggal ?></td>
                <td><?= $tb->kode_cabai ?></td>
                <td><?php if(!is_null($tb->berat_kotor)) {echo 'Rp'.number_format($tb->harga_bersih,0,',','.');} ?></td>
                <td><?php if(!is_null($tb->berat_kotor)){echo "Rp".number_format($tb->harga_bs,0,',','.');} ?></td>
                <td><?= $tb->berat_kotor ?></td>
                <td><?= $tb->berat_bs ?></td>
                <td><?= $tb->berat_susut ?></td>
                <td><?php if(!is_null($tb->berat_kotor)){echo $tb->berat_kotor - $tb->berat_bs - $tb->berat_susut;} ?></td>
                <td><?php if(!is_null($tb->berat_kotor)){echo "Rp".number_format($tb->harga_bs * $tb->berat_bs + $tb->harga_bersih * ($tb->berat_kotor - $tb->berat_bs - $tb->berat_susut ),0,'.',',');} ?></td>
                <td><?php if(!is_null($tb->bon)){echo "Rp".number_format($tb->bon,0,',','.');} ?></td>
                <td><?php echo "Rp".number_format($tb->saldo,0,',','.'); ?></td>
              </tr>
              <?php $no++; endforeach ?>
            </tbody>

          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-user bg-yellow"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

              <p>New phone +1(800)555-1234</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

              <p>nora@example.com</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-file-code-o bg-green"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

              <p>Execution time 5 seconds</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="label label-danger pull-right">70%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Update Resume
              <span class="label label-success pull-right">95%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-success" style="width: 95%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Laravel Integration
              <span class="label label-warning pull-right">50%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Back End Framework
              <span class="label label-primary pull-right">68%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

    </div>
    <!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Some information about this general settings option
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Allow mail redirect
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Other sets of options are available
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Expose author name in posts
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Allow the user to show his name in blog posts
          </p>
        </div>
        <!-- /.form-group -->

        <h3 class="control-sidebar-heading">Chat Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Show me as online
            <input type="checkbox" class="pull-right" checked>
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Turn off notifications
            <input type="checkbox" class="pull-right">
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Delete chat history
            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
          </label>
        </div>
        <!-- /.form-group -->
      </form>
    </div>
    <!-- /.tab-pane -->
  </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- Modal add Petani -->
<div class="modal fade" id="editPetani">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambahkan Petani Mitra</h4>
      </div>

        <!-- One "tab" for each step in the form: -->
        <div class="modal-body">

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>ID :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="id_petani" id="id_petani" class="form-control nama_petani" required readonly>
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Status Mitra :</label>
            </div>
            <div class="col-md-8">
              <select name="kemitraan" class="form-control" id="kemitraan">
                <option value="1">Mitra</option>
                <option value="0">Non-Mitra</option>
              </select>
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Nama Petani :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="nama_petani" id="nama_petani" class="form-control nama_petani" required="">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Nama Panggilan Petani :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="nama_panggil" id="nama_panggil" class="form-control nama_petani" required="">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Asal Daerah :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="desa" id="desa" class="form-control" required="">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Alamat :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="alamat" id="alamat" class="form-control" required="">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Nomer HP :</label>
            </div>
            <div class="col-md-8">
              <input type="number" name="no_telp" id="no_telp" class="form-control" required="">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Jaminan :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="jaminan" id="jaminan" class="form-control">
            </div>
          </div>
        </div>
      
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning" id="simpanButton"><i class="fa fa-user-plus"></i>Simpan</button>
        </div>
        <!-- /.modal-footer -->
    </div>
  </div>
</div>
<!-- END Modal edit Petani -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/js/demo.js"></script>

<script>
  $(document).ready(function(){
    $('#example1').DataTable();

    $('#editButton').click(function(){
      var id = $('#petaniID').val();

      $.ajax({
        url:"<?php echo base_url();?>DataProfil/edit_profil_petani",
        method:"POST",
        data:
          {id: id},
        dataType: "json",
        success: function(data){
          $('#id_petani').val(data.id);
          $('#kemitraan').val(data.kemitraan);
          $('#nama_petani').val(data.nama);
          $('#nama_panggil').val(data.nama_panggil);
          $('#desa').val(data.desa);
          $('#alamat').val(data.alamat);
          $('#no_telp').val(data.no_telp);
          $('#jaminan').val(data.jaminan);
        },
        error: function(data){
          alert('Terjadi Kesalahan');
        }
      })
    });

    $('#simpanButton').click(function(){
      var id_petani = $('#id_petani').val()
      var kemitraan = $('#kemitraan').val()
      var nama = $('#nama_petani').val()
      var nama_panggil = $('#nama_panggil').val()
      var desa = $('#desa').val()
      var alamat = $('#alamat').val()
      var no_telp = $('#no_telp').val()
      var jaminan = $('#jaminan').val()

      $.ajax({
        url:"<?php echo base_url();?>DataProfil/update_profil_petani",
        method:"POST",
        data: {
          id: id_petani,
          kemitraan: kemitraan,
          nama: nama,
          nama_panggil: nama_panggil,
          desa: desa,
          alamat: alamat,
          no_telp: no_telp,
          jaminan: jaminan
        },
        success: function() {
          if (!alert('Data berhasil diubah')) {location.reload(true)}
        },
        error: function() {
          alert('Gagal merubah data')
        }
      })

    })


  })

</script>

</body>
</html>