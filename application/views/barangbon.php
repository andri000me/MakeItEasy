<!-- array hari dan bulan -->
  <SCRIPT LANGUAGE="Javascript">

    // Array of day names
    var dayNames = new Array("Minggu","Senin","Selasa","Rabu",
            "Kamis","Jumat","Sabtu");

    // Array of month Names
    var monthNames = new Array(
    "Januari","Februari","Maret","April","Mei","Juni","Juli",
    "Agustus","September","Oktober","November","Desember");
  </SCRIPT>
<!-- END array hari dan bulan -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengaturan Harga
        <small>Cabai dan Bon</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Daftar Harga</a></li>
        <li class="active">Harga Cabai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <b><h3 class="pull-left" style="padding-left: 5px">
                <i class="fa fa-clock-o"></i>
                <?php
                echo "" . date("h:i a");
                ?>
              </h3></b>
              <h3 class="pull-right" style="text-transform: uppercase;">
                <i class="fa fa-calendar">  </i>
                <script language="javascript">
                  var now = new Date();
                  document.write(dayNames[now.getDay()]);
                </script>,  
                <b><script language="javascript">
                  var now = new Date();
                  document.write(now.getDate());
                </script></b>
                <script language="javascript">
                  var now = new Date();
                  document.write(monthNames[now.getMonth()]);
                </script>
                <script language="javascript">
                  var now = new Date();
                  document.write(now.getFullYear());
                </script>
              </h3>
            </div>
            <!-- /.box-header -->
          </div>
          <!-- /.box -->
          <div class="row">
                  <!-- SUNNAH MUAKAD : kalo ga dipake col-md-8 barang modal ditambahi col-md-offset-2-->

                  <div class="col-md-12 col-sm-12">
                    <div class="box bg-solid" style="border: 2px solid #d9edf7;">
                      <div class="box-header">
                        <h3 class="box-title">Daftar Barang Modal : <!-- <?php echo $today; ?> --></h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive">
                        <form action="<?php echo base_url();?>Barang/submitBarang" method="post">
                          <table class="table" style="margin-bottom: 10px">
                            <tr class="bg-info">
                              <td>#</td>
                              <td><input class="form-control" type="text" placeholder="Tanggal" name="tanggal"></td>
                              <td><input class="form-control" type="text" placeholder="Nama Barang" name="barang"></td>
                              <td><input class="form-control" type="number" placeholder="Beli" step="50" name="harga_beli"></td>
                              <td><input class="form-control" type="number" placeholder="Jual" step="50" name="harga_jual"></td>
                              <td><input class="form-control" type="number" placeholder="Stok" name="stok"></td>
                              <td><input class="form-control" type="text" placeholder="Jumlah Bayar" readonly name="jumlah_bayar"></td>
                              <td>
                                <span class="btn btn-primary"><i class="fa fa-plus"></i> Tambahkan </span>
                              </td>
                            </tr>
                          </table>
                        </form>

                        <table id="tabel_bon" class="table table-bordered table-striped" style="font-size: 15px">
                          <thead>
                            <tr class="bg-info">
                              <th rowspan="2" style="text-align: center; line-height: 50px">No</th>
                              <th rowspan="2" style="text-align: center; line-height: 50px">Tanggal</th>
                              <th rowspan="2" style="text-align: center; line-height: 50px">Barang</th>
                              <th colspan="2" style="text-align: center; line-height: 50px">Harga </th>
                              <th rowspan="2" style="text-align: center; line-height: 50px">Stok</th>
                              <th rowspan="2" style="text-align: center; line-height: 50px">Jumlah Bayar</th>
                              <th rowspan="2" style="text-align: center; line-height: 50px">Bayar</th>
                              <th rowspan="2" style="text-align: center; line-height: 50px">Edit</th>
                            </tr>
                            <tr class="bg-info">
                              <th style="text-align: center; line-height: 50px">Beli</th>
                              <th style="text-align: center; line-height: 50px">Jual</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $no=1;
                              foreach ($tb_barang as $tb) {
                                $no=1;
                                echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$tb->tanggal.'</td>
                                <td>'.$tb->barang.'</td>
                                <td>'.$tb->harga_beli.'</td>
                                <td>'.$tb->harga_jual.'</td>';

                                  if ($tb->bayar == 1) {
                                    $checked = 'checked="checked"';
                                  }
                                  else {
                                    $checked = '';
                                  }

                                echo '<td>'.$tb->stok.'</td>
                                      <td>'.$tb->jumlah_bayar.'</td>
                                      <td><input class="form-check-input" type="checkbox" value="" id="aktif"'.$checked.'>
                                      <label class="form-check-label" for="aktif">
                                        Aktif/tidak
                                      </label>
                                </td>
                                <td>
                                  <span class="btn btn-sm btn-info" data-toggle="modal" data-target="#editHarga" ><i class="fa fa-edit"></i> Edit </span>
                                </td>
                                </tr>';

                                $no++;
                              }

                              ?>

                          </tbody>
                        </table>


                        <div class="modal fade" id="editHarga">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Barang Modal</h4>
                              </div>
                              <div class="modal-body">
                                <div class="row" style="padding-bottom: 5px">
                                  <div class="col-md-4">
                                    <label>Jenis Cabai :</label>
                                  </div>
                                  <div class="col-md-8">
                                   <input type="text" name="jenis_cabai" class="form-control" value="Anu">
                                   <!-- <?php
                                        // $dd_cabai_attribute = 'class="form-control"';
                                        // echo form_dropdown('cabai', $dd_cabai, $cabai_selected, $dd_cabai_attribute);
                                        ?> -->
                                  </div>
                                </div>

                                <div class="row" style="padding-bottom: 5px">
                                  <div class="col-md-4">
                                   <label>Kode Cabai :</label>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" name="kode_cabai" class="form-control" disabled value="A">
                                    
                                  </div>
                                </div>

                                <div class="row" style="padding-bottom: 5px">
                                  <div class="col-md-4">
                                   <label>Harga :</label>
                                  </div>
                                  <div class="col-md-5">
                                    <input type="number" name="harga" class="form-control" value="500" step="50">
                                    
                                  </div>
                                </div>

                                <div class="row" style="padding-bottom: 5px">
                                  <div class="col-md-4">
                                   <label>Stok :</label>
                                  </div>
                                  <div class="col-md-5">
                                    <input type="number" name="stok" class="form-control" value="500">
                                  </div>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn pull-left btn-danger" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info">Simpan</button>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.col -->

                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.tab-pane bon -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
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



<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();?>/assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/js/demo.js"></script>

<script>
  $(function () {
    $('#tabel_transaksi').DataTable()
    $('#tabel_bon').DataTable()
  })

  $(function () {
    $('.jenis_cabai').select2()
    $('.kode_cabai').select2()
    $('.jenis_bon').select2()
  })

</script>

</body>
</html>