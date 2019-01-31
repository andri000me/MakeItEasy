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
        Dashboard
        <small>Penjualan dan Pembelian</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-leaf"></i><i class="fa fa-long-arrow-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cabai Masuk</span>
              <span class="info-box-number">543<small>kg</small></span>
            </div>
            /.info-box-content
          </div>
          /.info-box 
        </div> -->
        <!-- /.col -->
        <!-- <div class="col-md-3 col-sm-6 col-xs-12"> -->
          <!-- <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-leaf"></i><i class="fa fa-long-arrow-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cabai Keluar</span>
              <span class="info-box-number">450<small>kg</small></span>
            </div>
            
          </div> -->
          <!-- /.info-box -->
        <!-- </div> -->
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Petani</span>
              <span class="info-box-number"><?= $jumlah_petani ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Pembeli</span>
              <span class="info-box-number"><?= $jumlah_pembeli ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

       <div class="row">
        <div class="col-md-12">
        <!--  <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Rekap Transaksi Tahun : 
                <b>
                  <?php //echo date('Y', strtotime($today_month)) ?>
                </b>
              </h3> 

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div> -->
            <!-- /.box-header -->
            <!-- <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sales: 1 Jan, 2018 - 30 Jul, 2018</strong>
                  </p>

                  <div class="chart"> -->
                    <!-- Sales Chart Canvas -->
                    <!-- <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div> -->
                  <!-- /.chart-responsive -->
                <!-- </div> -->
                <!-- /.col -->
                <!-- <div class="col-md-4">
                  <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                      <li style="padding: 10px 15px; background: #f0f0f0">Keadaan Perusahaan <span class="pull-right text-green">LABA</span></li>
                      <li style="padding: 10px 15px;">Total Pendapatan <span class="pull-right "> Rp. 531.121</span></li>
                      <li style="padding: 10px 15px;">Total Pengeluaran <span class="pull-right "> Rp. 559.809</span></li>
                      <li style="padding: 10px 15px;">Total Profit <span class="pull-right "> Rp. 512.100</span></li>
                      <li style="padding: 10px 15px;">Pinjaman uang <span class="pull-right "> Rp. 584.212</span></li>
                    </ul>
                  </div>
                </div> -->
                <!-- /.col -->
              <!-- </div> -->
              <!-- /.row -->
            <!-- </div> -->
            <!-- ./box-body -->
            
          <!-- </div> -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="panel bg-blue">
        <div class="row">
          <form method="post" action="<?php echo base_url();?>Perusahaan/DashboardDate">
          <div class="col-md-3">
            <h3 class="text-white" style="margin-bottom: 20px; margin-left: 15px">Lihat Rekap Bulan</h3>
          </div>
          <div class="col-md-2">
            <h3><i>
              <?php echo date('F Y', strtotime($today_month)) ?>
            </i></h3>
          </div>
            <div class="col-md-4" style="margin-top: 20px; margin-left: 15px">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input required type="text" class="form-control pull-right" value="<?php echo $today_month; ?>" id="monthly_date" name="lihatTanggal">
                </div>
              </div>
          </div>
          <div class="col-md-2" style="margin-top: 20px">
            <button class="btn btn-default">Lihat</button>
          </div>
          </form>
        </div>

      </div>

      <!-- tabel harian -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">
                <div class="row">
                  <div class="col-lg-6 col-xs-6 col-md-6" style="width: 100%">
                   Rekap harian Bulan: 
                  <?php echo date('F Y', strtotime($today_month)) ?>
                </div>
              </div>
              <!-- /.box-title -->
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-12">
                  <h3 class="text-blue"><i class="fa fa-group"></i><b>  PETANI</b></h3>
                  <table class="table table-bordered table-striped rekap_hari" style="font-size: 15px">
                    <thead>
                      <tr class="bg-primary">
                        <th style="text-align: center; line-height: 50px">No</th>
                        <th style="text-align: center; line-height: 50px">Hari, Tanggal</th>
                        <th style="text-align: center; line-height: 50px">Cabai Masuk</th>
                        <th style="text-align: center; line-height: 50px">Uang Petani</th>
                        <th style="text-align: center; line-height: 50px">Total Bon</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($rekap_petani_harian as $tb): ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $tb->tanggal ?></td>
                          <td><?= $tb->berat_kotor ?></td>
                          <td><?= $tb->jumlah_uang ?></td>
                          <td><?= $tb->bon ?></td>
                        </tr>
                      <?php $no++; endforeach ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12">
                  <h3 class="text-blue"><i class="fa fa-shopping-cart"></i><b>  PEMBELI</b></h3>
                  <table class="table table-bordered table-striped rekap_hari" style="font-size: 15px">
                    <thead>
                      <tr class="bg-primary">
                        <th style="text-align: center; line-height: 50px">No</th>
                        <th style="text-align: center; line-height: 50px">Hari, Tanggal</th>
                        <th style="text-align: center; line-height: 50px">Cabai Terjual</th>
                        <th style="text-align: center; line-height: 50px">Uang Pembeli</th>
                        <th style="text-align: center; line-height: 50px">Total Transferan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($rekap_pembeli_harian as $tb): ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $tb->tanggal ?></td>
                          <td><?= $tb->bersih ?></td>
                          <td><?= $tb->jumlah_uang ?></td>
                          <td><?= $tb->transferan ?></td>
                        </tr>
                      <?php $no++; endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </div>
      <!-- /.row -->




      <!-- row dibawah grafik -->
      <div class="row">
        <!-- Table pendapatan dan pengeluaran -->
        <div class="col-md-6 col-sm-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Rekap Pemasukan & Pengeluaran Lain</h3>
            </div>

            <div class="box-body table-responsive" style="margin-right: 10px">
              <table class="table table-bordered table-striped rekap_hari" style="font-size: 15px">
                    <thead>
                      <tr class="bg-primary">
                        <th style="text-align: center; line-height: 50px">No</th>
                        <th style="text-align: center; line-height: 50px">Hari, Tanggal</th>
                        <th style="text-align: center; line-height: 50px">Pendapatan</th>
                        <th style="text-align: center; line-height: 50px">Pengeluaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($rekap_pemasukan_pengeluaran as $tb): ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $tb->tanggal ?></td>
                          <td><?= $tb->pemasukan ?></td>
                          <td><?= $tb->pengeluaran ?></td>
                        </tr>
                      <?php $no++; endforeach ?>
                    </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-sm-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Cabai Terjual (kg)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="chart-responsive">
                <canvas id="ringkasan_cabai" height="150"></canvas>
              </div>
                  <!-- ./chart-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->
          <div class="clearfix"></div>
        </div>
        <!-- ./col -->
      </div>
      <!-- END row dibawah grafik -->
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

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url();?>assets/js/pages/dashboard2.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/js/demo.js"></script>

<script>
  //Date range picker
  $(document).ready(function() {
      var month = $('#monthly_date').val();
      $.ajax({
        url : "http://localhost/MakeItEasy/Perusahaan/rekap_cabai",
        type : "POST",
        dataType: "JSON",
        data: 
          {bulan: month},
        success : function(data){
          console.log(data);

          var jenis = [];
          var berat = [];

          for (var i in data) {
            jenis.push(data[i].jenis);
            berat.push(data[i].bersih);
          }

          var config = {
            type: 'doughnut',
            data: {
              datasets: [{
                data: berat,
                backgroundColor: [
                  'rgba(255, 51, 51, 1)',
                  'rgba(255, 153, 51, 1)',
                  'rgba(255, 255, 51, 1)',
                  'rgba(153, 255, 51, 1)',
                  'rgba(0, 204, 0, 1)',
                  'rgba(51, 255, 153, 1)',
                  'rgba(0, 204, 204, 1)',
                  'rgba(51, 153, 255, 1)',
                  'rgba(153, 153, 255, 1)',
                  'rgba(178, 102, 255, 1)',
                  'rgba(255, 102, 255, 1)',
                  'rgba(160, 160, 160, 1)',
                ],
                label: 'Dataset 1'
              }],
              labels: jenis,
            },
            options: {
              responsive: true,
              legend: {
                position: 'right',
              },
              title: {
                display: false
              },
              animation: {
                animateScale: true,
                animateRotate: true
              }
            }
          };

          var ctx = document.getElementById('ringkasan_cabai').getContext('2d');
          window.myDoughnut = new Chart(ctx, config);
        }
      });

    $('#monthly_date').datepicker({
      format : "yyyy-mm",
      todayHighlight : 'true',
      startView : "months",
      minViewMode : "months"
    });
    //$('#pickbulan').daterangepicker()
    //$('#picktahun').daterangepicker()
    $('.rekap_hari').DataTable()
    $('#rekap_bulan').DataTable()
    $('#rekap_tahun').DataTable()

  //Date picker
    $('#datepicker').datepicker({
      autoclose: true 
      })

  });
</script>
</body>
</html>
