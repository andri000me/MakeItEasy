<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Daftar Pembeli
      <small>_</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Daftar data</a></li>
      <li >Pembeli</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <!-- /.col -->
      <div class="col-md-4 col-sm-6 col-xs-6">
        <div class="info-box bg-maroon">
          <span class="info-box-icon" style="height: 100px!important"><i class="fa fa-cart-plus"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jumlah Pembeli</span>
            <span class="info-box-number"><?= $jumlah_pembeli ?></span>
            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
              <button class="btn btn-block bg-purple pull-right" data-toggle="modal" data-target="#addPembeli"><i class="fa fa-user-plus"></i>Tambah Pembeli</button> 
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-2 col-sm-2 col-xs-6 ">
        <a href="<?php echo base_url();?>Import_Pembeli"><button class="btn-app btn-block bg-purple-gradient" style="font-size:16px; height: 100px"><i class="fa fa-file-excel-o" style="font-size:43px"></i>Import data dari Excel</button></a>
      </div>
    </div>
    <!-- /.row -->

    <!-- Main content -->
    <div class="row">
      <div class="col-md-12">
      </div>
      <div class="col-md-12">
        <div class="box" style="border: 2px solid #f2dede;">
          <div class="box-header">
            <h3 class="box-title">Daftar Pembeli </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr class="bg-danger">
                  <th style="text-align: center; line-height: 50px">#</th>
                  <th style="text-align: center; line-height: 50px">ID</th>
                  <th style="text-align: center; line-height: 50px">Nama</th>
                  <th style="text-align: center; line-height: 50px">Alamat</th>
                  <th style="text-align: center; line-height: 50px">No Telp/HP</th>
                  <th style="text-align: center; line-height: 50px">Saldo </th>
                  <th style="text-align: center; line-height: 50px">detail </th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($tb_pembeli as $key): ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $key->id ?></td>
                  <td><?= $key->nama ?></td>
                  <td><?= $key->alamat ?></td>
                  <td><?= $key->no_telp ?></td>
                  <td><?= $key->saldo ?></td>
                  <td><a href="<?php echo base_url();?>DataProfil/detailPembeli/<?= $key->id ?>" type="button" class="btn btn-info btn-xs">lihat</a></td>
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

<!-- Modal add Pembeli -->
<div class="modal fade" id="addPembeli">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambahkan Pembeli Mitra</h4>
      </div>

        <!-- One "tab" for each step in the form: -->
      <form action="<?php echo base_url();?>Transaksi/addPembeli" method="post">
        <div class="modal-body">

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Nama Pembeli :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="nama_pembeli" class="form-control nama_petani" required="">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Alamat :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="alamat" class="form-control" required="">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Nomer HP :</label>
            </div>
            <div class="col-md-8">
              <input type="number" name="no_telp" class="form-control" required="">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Nomer Rekening :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="no_rek" class="form-control" required="">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Saldo Awal :</label>
            </div>
            <div class="col-md-8">
              <input type="number" name="saldo" class="form-control" required="">
            </div>
          </div>

<!--           <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Foto :</label>
            </div>
            <div class="col-md-8">
              <input type="file" name="foto_petani" id="foto_petani" class="form-control">
            </div>
          </div> -->
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn bg-purple"><i class="fa fa-user-plus"></i>Tambahkan Pembeli</button>
        </div>

      </form>
        <!-- /.modal-footer -->
    </div>
  </div>
</div>
<!-- END Modal add Pembeli -->
       
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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
    $('#example1').DataTable()
  })

</script>

</body>
</html>

