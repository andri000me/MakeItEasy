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
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-leaf"></i><i class="fa fa-long-arrow-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cabai Masuk</span>
              <span class="info-box-number">543<small>kg</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-leaf"></i><i class="fa fa-long-arrow-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cabai Keluar</span>
              <span class="info-box-number">450<small>kg</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Petani</span>
              <span class="info-box-number">1518</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Pembeli</span>
              <span class="info-box-number">122</span>
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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Rekap Transaksi Bulan Ini : 
                <b>
                  <script language="javascript">
                    var now = new Date();
                    document.write(monthNames[now.getMonth()]);
                  </script>
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
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sales: 1 Jan, 2018 - 30 Jul, 2018</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                      <li style="padding: 10px 15px; background: #f0f0f0">Keadaan Perusahaan <span class="pull-right text-green">LABA</span></li>
                      <li style="padding: 10px 15px;">Total Pendapatan <span class="pull-right "> Rp. 531.121</span></li>
                      <li style="padding: 10px 15px;">Total Pengeluaran <span class="pull-right "> Rp. 559.809</span></li>
                      <li style="padding: 10px 15px;">Total Profit <span class="pull-right "> Rp. 512.100</span></li>
                      <li style="padding: 10px 15px;">Pinjaman uang <span class="pull-right "> Rp. 584.212</span></li>
                    </ul>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- tabel harian -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">
                <div class="row">
                  <div class="col-md-2">
                   Rekap harian tanggal : 
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservation">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-title -->
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="rekap_hari" class="table table-bordered table-striped" style="font-size: 15px">
                <thead>
                  <tr class="bg-primary">
                    <th style="text-align: center; line-height: 50px">No</th>
                    <th style="text-align: center; line-height: 50px">Hari, Tanggal</th>
                    <th style="text-align: center; line-height: 50px">Cabai Masuk</th>
                    <th style="text-align: center; line-height: 50px">Pendapatan</th>
                    <th style="text-align: center; line-height: 50px">Pengeluaran</th>
                    <th style="text-align: center; line-height: 50px">Saldo Perusahaan</th>
                  </tr>
                </thead>
                <tbody>
                  <td> 1 </td>
                  <td> Senin, 18 Juli 2018 </td>
                  <td> 109 kg </td>
                  <td> Rp 1.000.000 </td>
                  <td> Rp 2.500.000 </td>
                  <td> Rp 90.000.000 </td>
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




      <!-- row dibawah grafik -->
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <!-- Harga Cabai -->
          <div class="box box-danger" >
            <div class="box-header with-border">
              <h3 class="box-title">Harga Cabai Hari Ini</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                <table class="table table-condensed no-margin">
                  <thead>
                    <tr>
                      <th style="text-align: center; line-height: 50px" rowspan="2">No</th>
                      <th style="text-align: center; line-height: 50px" rowspan="2">Kode</th>
                      <th style="text-align: center; line-height: 50px" rowspan="2">Jenis</th>
                      <th style="text-align: center;" colspan="2">Harga</th>
                    </tr>
                      <tr>
                        <th>BS/ MTL </th>
                        <th>Bersih </th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
            </div>
            <div class="box-footer clearfix" style="border: 1px solid #f0f0f0;">
              <button type="button" class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#editHarga">
                <i class="fa fa-edit"></i> Edit Harga </button>
            </div>
                  <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <div class="col-md-4 col-sm-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Stok Cabai</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Rawit</li>
                    <li><i class="fa fa-circle-o text-green"></i> Kriting</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Merah</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Gading</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Hijau</li>
                    <li><i class="fa fa-circle-o text-gray"></i> BS</li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">United States of America
                  <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->
          <div class="clearfix"></div>
        </div>
        <!-- ./col -->

        <div class="col-md-4 col-sm-12">
        <!-- Harga Bon -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Harga Barang Bon</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                <table class="table table-condensed no-margin">
                  <thead>
                    <tr>
                      <th style="text-align: center; line-height: 50px">No</th>
                      <th style="text-align: center; line-height: 50px">Kode</th>
                      <th style="text-align: center; line-height: 50px">Nama Barang</th>
                      <th style="text-align: center; line-height: 50px">Harga</th>
                      <th style="text-align: center; line-height: 50px">Stok</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
            </div>
            <div class="box-footer clearfix" style="border: 1px solid #f0f0f0;">
              <button type="button" class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#editHarga">
                <i class="fa fa-edit"></i> Edit Harga </button>
            </div>
                  <!-- /.box-body -->
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- END row dibawah grafik -->

      <!-- row grafik periodik -->
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Grafik Bulan Kemarin : 
                <script language="javascript">
                  var monthNames = new Array(
                    "Januari","Februari","Maret","April","Mei","Juni","Juli",
                    "Agustus","September","Oktober","November","Desember");
                  var now = new Date();
                  document.write(monthNames[now.getMonth()-1]);
                </script>
              </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-4">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL PENDAPATAN</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL PENGELUARAN</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          <!-- tabel bulan -->
          <div class="box" style="border-top: 3px solid #39cccc;">
            <div class="box-header">
              <div class="box-title">
                <div class="row">
                  <div class="col-md-3">
                   Rekap bulan :  
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="pickbulan">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-title -->
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="rekap_bulan" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-teal">
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Bulan-Tahun</th>
                    <th style="text-align: center;">Cabai Masuk</th>
                    <th style="text-align: center;">Pendapatan</th>
                    <th style="text-align: center;">Pengeluaran</th>
                    <th style="text-align: center;">Saldo Perusahaan</th>
                  </tr>
                </thead>
                <tbody>
                  <td> 1 </td>
                  <td> Juli 2018 </td>
                  <td> 109 kg </td>
                  <td> Rp 1.000.000 </td>
                  <td> Rp 2.500.000 </td>
                  <td> Rp 90.000.000 </td>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <div class="col-md-6 col-sm-12">
          <!-- solid sales graph -->
          <div class="box box-solid bg-aqua-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Grafik Tahun Ini : 
                <script language="javascript">
                  var now = new Date();
                  document.write(now.getFullYear());
                </script>
              </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-4">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL PENDAPATAN</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL PENGELUARAN</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          <!-- tabel bulan -->
          <div class="box box-info">
            <div class="box-header">
              <div class="box-title">
                <div class="row">
                  <div class="col-md-3">
                   Rekap tahun :  
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="picktahun">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-title -->
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
              <table id="rekap_tahun" class="table table-bordered table-striped">
                <thead>
                  <tr class="bg-aqua">
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Tahun</th>
                    <th style="text-align: center;">Cabai Masuk</th>
                    <th style="text-align: center;">Pendapatan</th>
                    <th style="text-align: center;">Pengeluaran</th>
                    <th style="text-align: center;">Saldo Perusahaan</th>
                  </tr>
                </thead>
                <tbody>
                  <td> 1 </td>
                  <td> Juli 2018 </td>
                  <td> 109 kg </td>
                  <td> Rp 1.000.000 </td>
                  <td> Rp 2.500.000 </td>
                  <td> Rp 90.000.000 </td>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- END row grafik -->
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
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/js/demo.js"></script>

<script>
  //Date range picker
    $('#reservation').daterangepicker()
    $('#pickbulan').daterangepicker()
    $('#picktahun').daterangepicker()
    $('#rekap_hari').DataTable()
    $('#rekap_bulan').DataTable()
    $('#rekap_tahun').DataTable()

  //Date picker
    $('#datepicker').datepicker({
      autoclose: true 
      })
</script>
</body>
</html>
