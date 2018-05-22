
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Pembeli
        <small>_</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Widgets</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

  <div class="row">
        <!-- Action Button -->
    <div class="col-md-3">
        <div class="box box-solid">
          <div class="box-header">
            <h3 class="box-title">Masukkan Transaksi</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="text-align: center;">
             <div class="btn-group-vertical">
                <button type="button" class="btn btn-block btn-setor-ver bg-maroon" data-toggle="modal" data-target="#inputSetoran"> <i class="fa fa-plus"></i> Masukkan Transaksi</button>
                <button type="button" class="btn btn-block btn-setor-ver bg-purple"> <i class="fa fa-user-plus"></i> Tambah pemborong</button>
            </div>
          </div>
          <div class="box-footer clearfix">
            <h5 class="pull-left">
              Jumlah pembelian hari ini
            </h5>
            <h4 class="pull-right" style="font-weight: bold">
              64
            </h4>
          </div>
                <!-- /.box-body -->
        </div>
    </div>
    <!-- END Action Button -->

    <!--tanggal dan info -->
    <div class="col-md-4">
      <div class="box">
        <div class="box-header bg-gray">
          <b><h4 class="pull-right">
            <?php
            echo "" . date("h:i:sa");
            ?>
          </h4> </b>
        </div>
        <div class="box-body" style="text-align: center">
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

          <!-- tampilan tanggal hari ini -->
          <table class="table-responsive table-condensed">
            <tr style="width: 100%; text-align: center">
              <td style="text-align: center; padding: 0px 10px 0px 10px; width: 25%">
                <span style="font-size:50px; font-weight: bold">
                  <script language="javascript">
                    var now = new Date();
                    document.write(now.getDate());
                  </script>
                </span> 
                <span style="font-size:20px; text-transform: uppercase;">
                  <script language="javascript">
                    var now = new Date();
                    document.write(monthNames[now.getMonth()]);
                  </script>
                </span>
              </td>
              <td style="text-align: center; padding: 0px 10px 0px 10px; width: 65%">
                <span style="font-size:40px; font-weight: bold; text-transform: uppercase;">
                  <script language="javascript">
                    var now = new Date();
                    document.write(dayNames[now.getDay()]);
                  </script>
                </span> 
              </td>
              <td style="text-align: center; padding: 0px 10px 0px 10px; width: 10%">
                <span style="font-size:20px;">
                  <script language="javascript">
                    var now = new Date();
                    document.write(now.getFullYear());
                  </script>
                </span> 
              </td>
            </tr>
          </table>
          <!-- tampilan tanggal hari ini -->
        </div>
        <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-download"></i></span>
                    <h3 class="description-header">$35,210.43</h3>
                    <p class="description-text">CABAI MASUK</p>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <span class="text-red"><i class="fa fa-upload"></i></span>
                    <h3 class="description-header">$10,390.90</h3>
                    <p class="description-text">CABAI TERJUAL</p>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-blue"><i class="fa fa-money"></i></span>
                    <h3 class="description-header">$24,813.53</h3>
                    <p class="description-text">UANG KELUAR</p>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
      </div>
    </div>
  </div>
    <!-- END tanggal dan info -->

    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Catatan harian tanggal : </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                 <thead>
                  <tr class="bg-gray">
                    <th style="text-align: center; line-height: 10px" rowspan="2">#</th>
                    <th style="text-align: center; line-height: 30px" rowspan="2">ID</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Nama</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Asal Daerah</th>
                    <th style="text-align: center;" colspan="3">Berat</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Harga</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Jumlah Uang</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Transferan </th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Saldo</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Modal</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Edit</th>
                  </tr>
                  <tr class="bg-gray">
                    <th>Colly </th>
                    <th>Kode </th>
                    <th>Bersih </th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>10</td>
                  <td>Ana Budi</td>
                  <td>Muntilan</td>
                  <td>10</td>
                  <td>300</td>
                  <td>1000</td>
                  <td>Rp. 300.000</td>
                  <td>3.000.000</td>
                  <td>5.000.000</td>
                  <td>10.000.000</td>
                  <td>10.000.000</td>
                  <td><button type="button" class="btn btn-info btn-xs data-toggle="modal" data-target="#modal-info"">edit</button></td>
                </tr>
                 <tr>
                  <td>2</td>
                  <td>10</td>
                  <td>Tina Toon</td>
                  <td>Muntilan</td>
                  <td>10</td>
                  <td>300</td>
                  <td>1000</td>
                  <td>Rp. 300.000</td>
                  <td>3.000.000</td>
                  <td>5.000.000</td>
                  <td>10.000.000</td>
                  <td>10.000.000</td>
                  <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-info">edit</button></td>
                </tr>
                </tbody>
<!--                 <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<!-- modal edit -->
       <div class="modal fade" id="modal-info">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-red">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Transaksi</h4>
              </div>
              <div class="modal-body bg-danger">
                <p>Edit Transaksi ini</p>
            <form class="form-horizontal">
              <!-- form -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">ID</label>

                    <div class="col-sm-3">
                      <input type="text" class="form-control" placeholder="1" disabled>
                    </div>
                  </div>
                  <!-- ./ID -->

                  <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-8">
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                </div>
                <!-- ./Nama -->

                <div class="form-group">
                  <label class="col-sm-3 control-label">Asal Daerah</label>

                  <div class="col-sm-8">
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                </div>
                <!-- ./Asal Daerah -->
                </div>
                <!-- ./col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Harga</label>

                    <div class="col-sm-7">
                      <input type="number" step="100" class="form-control" placeholder="300.000">
                    </div>
                  </div>
                  <!-- ./Harga -->

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Jumlah Uang</label>

                    <div class="col-sm-7">
                      <input type="number" step="100" class="form-control" placeholder="3.000.000">
                    </div>
                  </div>
                  <!-- ./Jumlah Uang -->

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Modal</label>

                    <div class="col-sm-7">
                      <input type="number" step="100" class="form-control" placeholder="300.000">
                    </div>
                  </div>
                  <!-- ./Modal duit -->
                
                </div>  
                <!-- ./col -->
              </div>
              <!-- ./row --> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Berat</label>
                    <label class="col-sm-1 control-label">Colly</label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" placeholder="23">
                      </div>

                    <label class="col-sm-1 control-label">Kode</label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" placeholder="AB">
                      </div>

                    <label class="col-sm-1 control-label">Bersih</label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" placeholder="12">
                      </div>   
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- ./row -->
              </div>
              <!-- ./modal body -->
                <div class="modal-footer bg-danger">
                  <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-info">Save changes</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    
    <!-- ./modal edit -->


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
</div>
<!-- ./wrapper -->

<!-- Modal Input Setoran-->
<div id="inputSetoran" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masukkan Setoran</h4>
      </div>
      <form action="" method="post">
      <div class="modal-body">

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Tanggal :</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="tanggal" class="form-control input-tanggal datepicker">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Nama Pembeli :</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="nama_petani" class="form-control select2">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Asal  :</label>
          </div>
          <div class="col-md-8">
           <input type="text" name="asal_daerah" class="form-control select2">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
           <label>Kode :</label>
          </div>
          <div class="col-md-8">
          
          </div>
        </div>
              
        <div class="col-md-12" style="text-align: center; padding-bottom: 5px; padding-top: 10px">      
          <b>Berat</b>
        </div>
        <div class="row">
            <div class="col-md-6">
              <label>Colly</label>
              <input type="text" name="berat_kotor">colly
            </div>
            <div class="col-md-6">
              <label>Bersih </label>
              <input type="text" name="berat_bs">kg
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <input type="submit" class="btn btn-info" value="Submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </form>
    </div>

  </div>
</div>
<!-- END Modal Input Setoran -->



