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
        Transaksi Non-Mitra
        <small>_</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Transaksi Harian</a></li>
        <li class="active">Transaksi Non-Mitra</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid bg-aqua-gradient">
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
              <li class="active"><a href="#tab_petani" data-toggle="tab"><i class="fa fa-male text-green"></i> Transaksi Cabai Non-Mitra</a></li>
              <li><a href="#tab_pembeli" data-toggle="tab"><i class="fa fa-shopping-cart text-red"></i> Transaksi Pembeli Non-Mitra</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_petani">
                <!-- row -->
                <div class="row">
                  <!-- Input setoran -->
                  <div class="col-md-7">
                    <div class="box" style="border: 2px solid #00a65a;">
                      <div class="box-header with-border bg-green" >
                        <h3 class="box-title">Masukkan Setoran Petani Non Mitra</h3>
                      </div>
                      <!-- /.box-header -->
                    <form action="<?php echo base_url();?>Transaksi/tambah_transpetani" method="post">
                      <div class="box-body">

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Tanggal :</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="tanggal" class="form-control input-tanggal" id="tanggal">
                          </div>
                        </div>

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Nama Petani :</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control"  name="id_petani" id="id_petani">
                          </div>
                        </div>


                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                           <label>Kode :</label>
                          </div>
                          <div class="col-md-8">
                            <?php
                                $dd_cabai_attribute = 'id="cabai" class="form-control select2" style="width:100%"';
                                echo form_dropdown('cabai', $dd_cabai, $cabai_selected, $dd_cabai_attribute);
                              ?>
                          </div>
                        </div>

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Harga :</label>
                          </div>
                          <div class="col-md-3">
                           <input type="text" name="harga_petani" id="harga_petani" class="form-control">
                          </div>
                          <div class="col-md-2">
                            <label>BS/MTD :</label>
                          </div>
                          <div class="col-md-3">
                           <input type="text" name="harga_bs" id="harga_bs" class="form-control">
                          </div>
                        </div>
                              
                        <div class="col-md-12" style="text-align: center; padding-bottom: 5px; padding-top: 10px">    
                          <b>Berat</b>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                              <label>Kotor</label>
                              <input type="text" name="berat_kotor" id="berat_kotor" class="form-control">kg
                            </div>
                            <div class="col-md-4">
                              <label>BS/MTD </label>
                              <input type="text" name="berat_bs" id="berat_bs" class="form-control">kg
                            </div>
                            <div class="col-md-4">
                              <label>Bersih </label>
                              <input type="text" id="berat_bersih" class="form-control">kg
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px">
                          <div class="col-md-4">
                            <label>Jumlah Uang :</label>
                          </div>
                          <div class="col-md-8">
                           <input type="text" name="jumlah_uang" id="jumlah_uang" class="form-control">
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer clearfix" style="border: 1px solid #f0f0f0;">
                        <input type="submit" class="btn btn-success pull-right" value="Submit">
                      </div>

                    </form>
                    </div>
                  </div>
                  <!-- END Input Setoran -->

                  <!-- Harga cabe -->
                  <div class="col-md-5">
                    <div class="box" style="border: 2px solid #f0f0f0;">
                      <div class="box-header with-border" style="background-color: #f0f0f0;">
                        <h3 class="box-title">Harga Cabai Hari Ini (<?php echo $today ?>)</h3>
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
                              <?php if (!empty($harga_today)) {
                                $no=1 ;foreach ($harga_today as $tb) 
                                {
                                  echo "<tr>
                                  <td>".$no."</td>
                                  <td>".$tb->kode."</td>
                                  <td>".$tb->jenis."</td>
                                  <td>".$tb->harga_bs."</td>
                                  <td>".$tb->harga_bersih."</td>
                                </tr>";

                                $no++;
                                }
                              }
                              
                              else {
                                echo "<tr><td colspan='12' class='text-center text-danger'> Isi dahulu harga cabai hari ini!! </td></tr>";
                              }
                            ?>
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
                  <!-- END Harga Cabe -->

                </div>
                <!-- row -->

                <!-- tabel -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="box bg-solid" style="border: 2px solid #dff0d8;">
                      <div class="box-header">
                        <h3 class="box-title">Catatan harian tanggal : <?php echo $today; ?></h3>
                      </div>
                      <!-- /.box-header -->

                      <div class="box-body table-responsive">
                        <table id="tabel_transaksi" class="table table-bordered table-striped DataTable" style="font-size: 15px">
                          <thead>
                            <tr class="bg-success">
                              <th style="text-align: center; line-height: 50px" rowspan="2">#</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">ID</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Nama</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Asal Daerah</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Kode Cabai</th>
                              <th style="text-align: center;" colspan="3">Berat</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Harga</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Jumlah Uang</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Action</th>
                            </tr>
                            <tr class="bg-success">
                              <th>Kotor </th>
                              <th>BS/ MTL </th>
                              <th>Bersih </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; foreach ($tb_transaksi as $tb): ?>
                              <tr>
                                <td><?= $no ?></td>
                                <td><?= $tb->id_petani ?></td>
                                <td><?= $tb->nama ?></td>
                                <td><?= $tb->desa ?></td>
                                <td><?= $tb->kode_cabai ?></td>
                                <td><?= $tb->berat_kotor ?></td>
                                <td><?= $tb->berat_bs ?></td>
                                <td><?= $tb->berat_kotor-$tb->berat_bs?></td>
                                <td>Harga</td>
                                <td>Jumlah Uang</td>
                                <td><button id="<?= $tb->id ?>" type="button" class="btn btn-info btn-xs edit_data" data-toggle="modal" data-target="#inputSetoran">edit</button> <a href="<?php echo base_url();?>Transaksi/delete_petani/<?= $tb->id ?>" class="btn btn-danger btn-xs">Hapus</a></td>
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

              </div>
              <!-- /.tab-pane cabai -->

              <div class="tab-pane" id="tab_pembeli">
                <!-- row -->
                <div class="row">
                  <!-- Input setoran -->
                  <div class="col-md-7">
                    <div class="box" style="border: 2px solid #d81b60 ;">
                      <div class="box-header with-border bg-maroon" >
                        <h3 class="box-title">Masukkan Transaksi Pembeli Non Mitra</h3>
                      </div>
                      <!-- /.box-header -->
                    <form action="<?php echo base_url();?>Transaksi/tambah_transpetani" method="post">
                      <div class="box-body">

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Tanggal :</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" name="tanggal" class="form-control input-tanggal" id="tanggal">
                          </div>
                        </div>

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Nama Pembeli :</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control"  name="id_petani" id="id_petani">
                          </div>
                        </div>

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Asal Daerah :</label>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control"  name="id_petani" id="id_petani">
                          </div>
                        </div>

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                           <label>Kode :</label>
                          </div>
                          <div class="col-md-8">
                            <?php
                                $dd_cabai_attribute = 'id="cabai" class="form-control select2" style="width:100%"';
                                echo form_dropdown('cabai', $dd_cabai, $cabai_selected, $dd_cabai_attribute);
                              ?>
                          </div>
                        </div>

                        <div class="row" style="padding-bottom: 5px">
                          <div class="col-md-4">
                            <label>Berat :</label>
                          </div>
                          <div class="col-md-3">
                           <input type="text" name="harga_petani" id="harga_petani" class="form-control">
                          </div>
                          <div class="col-md-2">
                            <label>Harga :</label>
                          </div>
                          <div class="col-md-3">
                           <input type="text" name="harga_bs" id="harga_bs" class="form-control">
                          </div>
                        </div>

                        <div class="row" style="margin-top: 20px">
                          <div class="col-md-4">
                            <label>Jumlah Uang :</label>
                          </div>
                          <div class="col-md-8">
                           <input type="text" name="jumlah_uang" id="jumlah_uang" class="form-control">
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer clearfix" style="border: 1px solid #f0f0f0;">
                        <input type="submit" class="btn btn-danger pull-right" value="Submit">
                      </div>

                    </form>
                    </div>
                  </div>
                  <!-- END Input Setoran -->
                  <!-- Harga cabe -->
                  <div class="col-md-5">
                    <div class="box" style="border: 2px solid #f0f0f0;">
                      <div class="box-header with-border" style="background-color: #f0f0f0;">
                        <h3 class="box-title">Harga Cabai Hari Ini (<?php echo $today ?>)</h3>
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
                              <?php if (!empty($harga_today)) {
                                $no=1 ;foreach ($harga_today as $tb) 
                                {
                                  echo "<tr>
                                  <td>".$no."</td>
                                  <td>".$tb->kode."</td>
                                  <td>".$tb->jenis."</td>
                                  <td>".$tb->harga_bs."</td>
                                  <td>".$tb->harga_bersih."</td>
                                </tr>";

                                $no++;
                                }
                              }
                              
                              else {
                                echo "<tr><td colspan='12' class='text-center text-danger'> Isi dahulu harga cabai hari ini!! </td></tr>";
                              }
                            ?>
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
                  <!-- END Harga Cabe -->
                </div>
                <!-- row -->

                <!-- Tabel -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="box" style="border: 2px solid #f2dede;">
                      <div class="box-header">
                        <h3 class="box-title">Catatan harian tanggal : </h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr class="bg-danger">
                              <th style="text-align: center; line-height: 50px" rowspan="2">#</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Tanggal</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">ID</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Nama</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Asal Daerah</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Berat</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Harga</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Jumlah Uang</th>
                            </tr>
                          </thead>
                          <tbody>
                              <!-- <?php $no
                              // =1; foreach ($tb_transaksi as $tb): ?> -->
                            <tr>
                              <!-- <td><?= $no ?></td> -->
                              <!-- <td><?= $tb->tanggal ?></td> -->
                              <!-- <td><?= $tb->id_pembeli ?></td> -->
                              <!-- <td><?= $tb->nama ?></td> -->
                              <!-- <td><?= $tb->alamat ?></td> -->
                              <!-- <td><?= $tb->colly ?></td> -->
                              <!-- <td><?= $tb->kode ?></td> -->
                              <!-- <td><?= $tb->bersih ?></td> -->
                              <!-- <td><?= $tb->harga_bersih ?></td> -->
                              <!-- <td><?= $tb->bersih*$tb->harga_bersih ?></td> -->
                              <!-- <td><?= $tb->transferan ?></td> -->
                              <!-- <td><?= $tb->saldo ?></td> -->
                            </tr>
                            <!-- <?php $no
                            // ++; endforeach; ?> -->

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

<!-- Modal edit harga-->
<div id="editHarga" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Harga</h4>
      </div>

      <form action="<?php echo base_url().'Transaksi/edit_harga'; ?>" method="post">
        <div class="modal-body">
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
              
            <!-- <?php $no
            // =1; foreach ($tb_cabai as $tb): ?> -->
              <tr>
                <!-- <td><?= $no ?></td> -->
                <!-- <td><?= $tb->kode ?></td> -->
                <!-- <td><?= $tb->jenis ?></td> -->
                <!-- <input type="hidden" name="kode<?= $tb->kode ?>" value="<?= $tb->kode ?>">
                <td><input type="text" name="harga_bs<?= $tb->kode ?>" value="<?= $tb->harga_bs ?>"></td>
                <td><input type="text" name="harga_bersih<?= $tb->kode ?>" value="<?= $tb->harga_bersih ?>"></td> -->
              </tr>
              <<!-- ?php $no++; endforeach; ? -->>
            </tbody>
          </table>
        </div>

      <div class="modal-footer">
        <input type="submit" class="btn btn-info" value="Submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- END Modal Edit Harga -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery-UI -->
<script src="<?php echo base_url().'assets/bower_components/jquery-ui/jquery-ui.js'?>" type="text/javascript"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
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
    $('.DataTable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    $('.input-tanggal').datepicker({
      dateFormat : 'yy-mm-dd'
    });

    //dropdown jenis cabai
    $(".select2").select2({
        placeholder: "Please Select"
    });

    $('#nama_petani').select2({
    placeholder: 't ooo ---',
    ajax: {
      url: "<?php echo base_url();?>Transaksi/get_petani",
      dataType: "json",
      delay: 250,
      data: function(params){
        return{
          nama : params.term
        };
      },
      processResults: function (data) {
        var results = [];

        $.each(data, function(index, item){
          results.push({
            id: item.id,
            text: item.nama,
            saldo: item.saldo,
            alamat: item.desa
          });
        });
        return{
          results: results
        };
      }
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: formatRepo
    });

    //memunculkan saldo dari petani
    $('#nama_petani').on('change', function()  {
            var data = $('#nama_petani').select2('data');
            $('#id_petani').val(data[0].id)
            $("#saldo_petani").val(data[0].saldo)
        });

    //mengambil nilai harga cabai
    $('#cabai').on('change', function() {
        $.ajax({
           url: '<?php echo base_url();?>Transaksi/get_hargaPetani', //This is the current doc
           type: "POST",
           dataType: "json",
           data: {tanggal: $('#tanggal').val(), kode_cabai: $('#cabai').val()  },
           success: function(harga){
               $('#harga_petani').val(harga.harga_bersih)
               $('#harga_bs').val(harga.harga_bs)
           },
           error: function(){
              alert('Harga Cabai Belum diinputkan');
           }
        })
    });

    //Menghitung Berat Bersih dan Jumlah Uang
    $('#berat_bs').on('change', function()  {
      var harga_bersih = $('#harga_petani').val()
      var harga_bs = $('#harga_bs').val()
      var kotor = $('#berat_kotor').val()
      var bs = $('#berat_bs').val()
      var bersih = kotor - bs

      var jumlah_uang = (bersih * harga_bersih) + (bs * harga_bs)

      $('#berat_bersih').val(bersih)
      $('#jumlah_uang').val(jumlah_uang)
      
      $('#berat_kotor').on('change', function() {
        var harga_bersih = $('#harga_petani').val()
        var harga_bs = $('#harga_bs').val()
        var kotor = $('#berat_kotor').val()
        var bs = $('#berat_bs').val()
        var bersih = kotor - bs

        var jumlah_uang = (bersih * harga_bersih) + (bs * harga_bs)

        $('#berat_bersih').val(bersih)
        $('#jumlah_uang').val(jumlah_uang)
      })
    })
      
  });

  function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var markup = "<div class='select2-result-repository clearfix'>" +
    "[" + repo.id + "]" +
    "<b> " + repo.text + " </b>" +
    "(" + repo.alamat + ")"+
    "</div>";
  return markup;
  }

</script>

</body>
</html>
