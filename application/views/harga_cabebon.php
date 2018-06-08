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
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#cabai" data-toggle="tab"><i class="fa fa-leaf text-green"></i> Atur Harga Cabai</a></li>
              <li><a href="#bon" data-toggle="tab"><i class="fa fa-cubes text-aqua"></i> Atur Harga Barang Modal</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="cabai">
                <!-- row -->
                <div class="row">
                  <div class="col-md-4 col-sm-12">
                    <!-- Harga cabe -->
                    <div class="box" style="border: 2px solid #00a65a;">
                      <div class="box-header bg-green" >
                        <h3 class="box-title">Harga Cabai Hari Ini <!-- (<?php echo $today ?>) --></h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body bg-success no-padding">
                          <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th style="text-align: center; line-height: 50px;" rowspan="2">Kode</th>
                                <th style="text-align: center; line-height: 50px;" rowspan="2">Jenis</th>
                                <th style="text-align: center;" colspan="2">Harga/kg</th>
                              </tr>
                                <tr>
                                  <th>BS/ MTL </th>
                                  <th>Bersih </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td>A</td>
                                  <td>Cabe Rawit</td>
                                  <td>1000</td>
                                  <td>2000</td>
                                </tr>
                                <tr>
                                  <td>A</td>
                                  <td>Cabe Rawit</td>
                                  <td>1000</td>
                                  <td>2000</td>
                                </tr>
                                <tr>
                                  <td>A</td>
                                  <td>Cabe Rawit</td>
                                  <td>1000</td>
                                  <td>2000</td>
                                </tr>
                            </tbody>
                          </table>
                      </div>
                     <!--  <div class="box-footer clearfix" style="border: 1px solid #f0f0f0;">
                        <button type="button" class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#editHarga">
                          <i class="fa fa-edit"></i> Edit Harga </button>
                      </div> -->
                            <!-- /.box-body -->
                    </div>
                    <!-- END Harga Cabe -->

                    <!-- Add Harga cabe -->
                    <div class="box box-solid" style="border: 2px solid #39cccc">
                      <div class="box-header bg-teal" >
                        <h3 class="box-title">Tambahkan Harga Cabai <!-- (<?php echo $today ?>) --></h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <!-- Tanggal -->
                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Tanggal :</label>
                          </div>
                          <div class="col-md-8">
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker" placeholder="klik untuk memilih tanggal">
                            </div>
                            <!-- /.input group -->
                          </div>
                        </div>
                        <!-- /.Tanggal -->

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Jenis Cabai :</label>
                          </div>
                          <div class="col-md-8">
                            <!-- <input type="text" name="nama_petani" class="form-control"> -->
                            <select id="jenis_cabai" class="form-control select2" style="width: 100%;">
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

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Kode Cabai :</label>
                          </div>
                          <div class="col-md-8">
                           <!-- <input type="text" name="asal_daerah" class="form-control"> -->
                            <select id="kode_cabai" class="form-control select2" style="width: 100%;">
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
                        
                        <div class="row">
                          <div class="col-md-4">      
                            <label class="pull-right">Harga Bersih</label>
                          </div>
                          <div class="col-md-8">
                            <input type="number" name="berat_kotor" placeholder="Rp" step="50">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <label class="pull-right">BS</label>
                          </div>
                          <div class="col-md-8">
                            <input type="number" name="berat_bs" placeholder="Rp" step="50">
                          </div>
                        </div>

                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer clearfix" style="border: 1px solid #f0f0f0;">
                        <button type="button" class="btn btn-flat btn-block bg-teal-gradient" data-target="submit">
                          <i class="fa fa-plus"></i> Tambahkan Harga </button>
                      </div>
                      <!-- /.box-footer -->
                    </div>
                    <!-- END Add Harga Cabe -->
                  </div>
                  <!-- /.col 4 -->

                <!-- tabel -->
                  <div class="col-md-8 col-sm-12">
                    <div class="box box-success bg-solid" style="border: 2px solid #dff0d8;">
                      <div class="box-header bg-success">
                        <h3 class="box-title">Rekap Harga Cabai</h3>
                      </div>
                      <!-- /.box-header -->

                      <div class="box-body table-responsive">
                        <table id="tabel_transaksi" class="table table-bordered table-striped" style="font-size: 15px">
                          <thead>
                            <tr class="bg-success">
                              <th style="text-align: center; line-height: 50px" rowspan="2">No</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Tanggal </th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Jenis Cabai</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Kode Cabai</th>
                              <th style="text-align: center;" colspan="2">Harga</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Edit</th>
                            </tr>
                            <tr class="bg-success">
                              <th>BS/ MTL </th>
                              <th>Bersih </th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- <?php $no=1; foreach ($tb_transaksi as $tb): ?> -->
                              <tr>
                                <!-- <td><?= $no ?></td> -->
                                <!-- <td><?= $tb->id_petani ?></td> -->
                                <!-- <td><?= $tb->nama ?></td> -->
                                <!-- <td><?= $tb->desa ?></td> -->
                                <!-- <td><?= $tb->kode_cabai ?></td> -->
                                <!-- <td><?= $tb->berat_kotor ?></td> -->
                                <!-- <td><?= $tb->berat_bs ?></td> -->
                                <!-- <td><?= $tb->berat_kotor-$tb->berat_bs?></td> -->
                                <td>Harga</td>
                                <td>Jumlah Uang</td>
                                <!-- <td><?= $tb->bon ?></td> -->
                                <!-- <td><?= $tb->saldo ?></td> -->
                              </tr>
                            <!-- <?php $no++; endforeach ?> -->
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
              </div>
              <!-- /.tab-pane cabai -->

              <div class="tab-pane" id="bon">
                <!-- row -->
                <div class="row">
                  <!-- SUNNAH MUAKAD : kalo ga dipake col-md-8 barang modal ditambahi col-md-offset-2-->
                  <div class="col-md-4 col-sm-12">
                    <div class="box" style="border: 2px solid #00c0ef">
                      <div class="box-header">
                        <div class="input-group">
                         <input type="text" class="form-control">
                         <span class="input-group-btn">
                           <button type="button" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                         </span>
                        </div>
                        <!-- /.input-group -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table class="table table-striped">
                          <thead >
                            <tr class="bg-info">
                              <th> Jenis Barang </th>
                              <th> Harga </th>
                              <th> Stok </th>
                            </tr>
                          </thead>                          
                        </table>
                      </div>
                    </div>
                    <!-- /.box -->

                    <!-- Add Stok -->
                    <div class="box box-solid" style="border: 2px solid #605ca8">
                      <div class="box-header bg-purple" >
                        <h3 class="box-title">Tambahkan Stok Barang<!-- (<?php echo $today ?>) --></h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Jenis Barang :</label>
                          </div>
                          <div class="col-md-8">
                            <!-- <input type="text" name="nama_petani" class="form-control"> -->
                            <select id="jenis_cabai" class="form-control select2" style="width: 100%;">
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

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Tambahan Stok :</label>
                          </div>
                          <div class="col-md-8">
                            <input type="number" name="tambahan">
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer clearfix">
                        <button type="button" class="btn btn-flat btn-block bg-purple-gradient" data-target="submit">
                          <i class="fa fa-plus"></i> Tambahkan Stok </button>
                      </div>
                      <!-- /.box-footer -->
                    </div>
                    <!-- END Add Harga Cabe -->
                  </div>
                  <!-- /. SUNNAH MUAKAD -->

                  <div class="col-md-8 col-sm-12">
                    <div class="box bg-solid" style="border: 2px solid #d9edf7;">
                      <div class="box-header">
                        <h3 class="box-title">Daftar Barang Modal : <!-- <?php echo $today; ?> --></h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive">
                        <table class="table" style="margin-bottom: 10px">
                          <tr class="bg-info">
                            <td>#</td>
                            <td><input class="form-control" type="text" placeholder="Nama Barang"></td>
                            <td><input class="form-control" type="text" placeholder="A" disabled> </td>
                            <td><input class="form-control" type="number" placeholder="Harga" step="50"></td>
                            <td><input class="form-control" type="number" placeholder="Stok"></td>
                            <td>
                              <span class="btn btn-primary"><i class="fa fa-plus"></i> Tambahkan </span>
                            </td>
                          </tr>
                        </table>

                        <table id="tabel_bon" class="table table-bordered table-striped" style="font-size: 15px">
                          <thead>
                            <tr class="bg-info">
                              <th style="text-align: center; line-height: 50px">No</th>
                              <th style="text-align: center; line-height: 50px">Nama Barang</th>
                              <th style="text-align: center; line-height: 50px">Kode Barang</th>
                              <th style="text-align: center; line-height: 50px">Harga </th>
                              <th style="text-align: center; line-height: 50px">Stok</th>
                              <th style="text-align: center; line-height: 50px">Satuan</th>
                              <th style="text-align: center; line-height: 50px">_</th>
                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                <td>1</td>
                                <td>Anu</td>
                                <td>A</td>
                                <td><input type="number" style="text-align: right" value="1300" step="50"></td>
                                <td><input type="number" style="text-align: right" value="50"></td>
                                <td>karung</td>
                                <td>
                                  <span class="btn btn-sm btn-success"><i class="fa fa-check"></i> </span>
                                  <span class="btn btn-sm btn-danger"><i class="fa fa-close"></i> </span>
                                </td>
                                <!-- <td><?= $no ?></td> -->
                                <!-- <td><?= $tb->id_petani ?></td> -->
                                <!-- <td><?= $tb->nama ?></td> -->
                                <!-- <td><?= $tb->desa ?></td> -->
                                <!-- <td><?= $tb->kode_cabai ?></td> -->
                                <!-- <td><?= $tb->berat_kotor ?></td> -->
                                <!-- <td><?= $tb->berat_bs ?></td> -->
                                <!-- <td><?= $tb->berat_kotor-$tb->berat_bs?></td> -->
                                <!-- <td><?= $tb->bon ?></td> -->
                              </tr>
                              <tr>
                                <td>1</td>
                                <td>Anu</td>
                                <td>A</td>
                                <td>500</td>
                                <td>500</td>
                                <td>kg</td>
                                <td>
                                  <span class="btn btn-sm btn-info" data-toggle="modal" data-target="#editHarga" ><i class="fa fa-edit"></i> Edit </span>
                                  <span class="btn btn-sm btn-danger"><i class="fa fa-close"></i> </span>
                                </td>
                              </tr>
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
