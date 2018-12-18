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
        Transaksi Petani
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Transaksi Harian</a></li>
        <li class="active">Transaksi Petani</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
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
              <li class="active"><a href="#tab_cabai" data-toggle="tab"><i class="fa fa-leaf text-green"></i> Transaksi Cabai</a></li>
              <li><a href="#tab_bon" data-toggle="tab"><i class="fa fa-cubes text-aqua"></i> Transaksi Barang Modal</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_cabai">
                <!-- row -->
                <div class="row">
                  <!-- Harga cabe -->
                  <div class="col-md-5">
                    <div class="box" style="border: 2px solid #f0f0f0;">
                      <div class="box-header with-border" style="background-color: #f0f0f0;">
                        <h3 class="box-title">Input Harga Cabai Terakhir </h3>
                        <h5 class="text-aqua"><b>Tanggal : <?php echo $max_tanggal ?></b></h5>
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
                              <?php if (!empty($harga_tanggal)) {
                                $no=1 ;foreach ($harga_tanggal as $tb) 
                                {
                                  echo "<tr>
                                  <td>".$no."</td>
                                  <td>".$tb->kode."</td>
                                  <td>".$tb->jenis."</td><td> Rp";
                                  echo number_format($tb->harga_bs, 0,',', '.');
                                  echo "</td>
                                  <td> Rp".number_format($tb->harga_bersih, 0, ',', '.')."</td>
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
                        <a href="<?php echo base_url();?>Cabai/hargaJenis" class="btn btn-sm btn-default pull-right">
                          <i class="fa fa-edit"></i> Tambah Harga </a>
                      </div>
                            <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- END Harga Cabe -->

                  <!-- Action Button -->
                  <div class="col-md-3">
                    <div class="box box-solid" style="border: 2px solid #f0f0f0;">
                      <div class="box-header">
                        <h3 class="box-title">Masukkan Transaksi</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body" style="text-align: center;">
                        <div class="btn-group-vertical btn-block">
                          <button type="button" class="btn btn-setor-ver bg-green-gradient" data-toggle="modal" data-target="#inputSetoran"> <i class="fa fa-plus"></i> Inputkan Setoran</button>
                          <button type="button" class="btn btn-setor-ver bg-yellow-gradient" data-toggle="modal" data-target="#addPetani"> <i class="fa fa-user-plus"></i> Tambah petani</button>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- END Action Button -->

                  <!--tanggal dan info -->
<!--                   <div class="col-md-4">             
                    <div class="row">
                      <div class="col-sm-6 col-xs-6" style="padding-left: 0px!important; border: 2px">
                        <div class="description-block border-right bg-green" style="padding:2px; border-radius: 2px">
                          <h4 style="background: rgba(0,0,0,0.2); line-height: 2; margin-top: 0px;"><i class="fa fa-download"></i></h4>
                          <h3 class="description-header">$35,210.43</h3>
                          <p class="description-text">CABAI MASUK</p>
                        </div>
                        <!-- /.description-block -->
                      <!-- </div> -->
                      <!-- /.col -->
                      <!-- <div class="col-sm-6 col-xs-6" style="padding-left: 0px!important; border: 2px">
                        <div class="description-block border-right bg-red" style="padding:2px; border-radius: 2px">
                          <h4 style="background: rgba(0,0,0,0.2); line-height: 2; margin-top: 0px;"><i class="fa fa-upload"></i></h4>
                          <h3 class="description-header">$10,390.90</h3>
                          <p class="description-text">CABAI TERJUAL</p>
                        </div> -->
                        <!-- /.description-block -->
                      <!-- </div> -->
                      <!-- /.col -->
                      <!-- <div class="col-sm-6 col-xs-6" style="padding-left: 0px!important; border: 2px">
                        <div class="description-block border-right bg-yellow" style="padding:2px; border-radius: 2px">
                          <h4 style="background: rgba(0,0,0,0.2); line-height: 2; margin-top: 0px;"><i class="fa fa-caret-down"></i> <i class="fa fa-money"></i></h4>
                          <h3 class="description-header">$24,813.53</h3>
                          <p class="description-text">UANG MASUK</p>
                        </div> -->
                        <!-- /.description-block -->
                      <!-- </div> -->
                      <!-- /.col -->
                      <!-- <div class="col-sm-6 col-xs-6" style="padding-left: 0px!important; border: 2px">
                        <div class="description-block border-right bg-aqua" style="padding:2px; border-radius: 2px">
                          <h4 style="background: rgba(0,0,0,0.2); line-height: 2; margin-top: 0px;"><i class="fa fa-caret-up"></i> <i class="fa fa-money"></i></h4>
                          <h3 class="description-header">$24,813.53</h3>
                          <p class="description-text">UANG KELUAR</p>
                        </div> -->
                        <!-- /.description-block -->
                      <!-- </div> -->
                      <!-- /.col -->
                    <!-- </div> -->
                    <!-- /.row -->
                  <!-- </div> -->
                  <!-- END tanggal dan info -->
                </div>
                <!-- row -->

                <!-- tabel -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="box bg-solid" style="border: 2px solid #dff0d8;">
                      <div class="box-header">
                        <h3 class="box-title text-aqua">50 Catatan Terakhir</h3>
                      </div>
                      <!-- /.box-header -->

                      <div class="box-body table-responsive">
                        <table id="tabel_transaksi" class="table table-bordered table-striped DataTable" style="font-size: 15px">
                          <thead>
                            <tr class="bg-success">
                              <th style="text-align: center; line-height: 50px" rowspan="2">#</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Tanggal</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">ID</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Nama</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Asal Daerah</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Kode Cabai</th>
                              <th style="text-align: center;" colspan="4">Berat</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Harga</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Jumlah Uang</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Bon</th>
                              <th style="text-align: center; line-height: 50px" rowspan="2">Saldo</th>
                              <!-- <th style="text-align: center; line-height: 50px" rowspan="2">Action</th> -->
                            </tr>
                            <tr class="bg-success">
                              <th>Kotor </th>
                              <th>BS/ MTL </th>
                              <th>Susut</th>
                              <th>Bersih </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; foreach ($tb_transaksi as $tb): ?>
                              <tr>
                                <td><?= $no ?></td>
                                <td><?= $tb->tanggal ?></td>
                                <td><?= $tb->id_petani ?></td>
                                <td><?= $tb->nama ?></td>
                                <td><?= $tb->desa ?></td>
                                <td><?= $tb->kode_cabai ?></td>
                                <td><?= number_format($tb->berat_kotor,1) ?></td>
                                <td><?= number_format($tb->berat_bs,1) ?></td>
                                <td><?= number_format($tb->berat_susut,1) ?></td>
                                <td><?= $tb->berat_kotor-$tb->berat_bs-$tb->berat_susut ?></td>
                                <td>Rp<?= number_format($tb->harga_bersih,0,',','.') ?></td>
                                <td>Rp<?= number_format(($tb->berat_kotor-$tb->berat_bs)*$tb->harga_bersih + $tb->berat_bs*$tb->harga_bs,0,',','.') ?></td>
                                <td>Rp<?= number_format($tb->bon,0,',','.') ?></td>
                                <td>Rp<?= number_format($tb->saldo,0,',','.') ?></td>
                                <!-- <td><button id="<?= $tb->id ?>" type="button" class="btn btn-info btn-xs edit_data" data-toggle="modal" data-target="#editSetoran">edit</button> <a href="<?php //echo base_url();?>Transaksi/delete_petani/<?= $tb->id ?>" class="btn btn-danger btn-xs">Hapus</a></td> -->
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

              <div class="tab-pane" id="tab_bon">
                <!-- row -->
                <div class="row">

                  <!-- Action Button -->
                  <div class="col-md-3">
                    <div class="box box-solid" style="border: 2px solid #f0f0f0;">
                      <div class="box-header">
                        <h3 class="box-title">Masukkan Transaksi</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body" style="text-align: center;">
                        <div class="btn-group-vertical btn-block">
                          <button type="button" class="btn btn-setor-ver bg-aqua-gradient" data-toggle="modal" data-target="#inputBon"> <i class="fa fa-plus"></i> Inputkan Bon</button>
                          <button type="button" class="btn btn-setor-ver bg-yellow-gradient" data-toggle="modal" data-target="#addPetani"> <i class="fa fa-user-plus"></i> Tambah petani</button>
                        </div>
                      </div> <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- END Action Button -->
                </div>
                <!-- row -->

                <!-- tabel -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="box bg-solid" style="border: 2px solid #d9edf7;">
                      <div class="box-header">
                        <h3 class="box-title text-aqua">100 catatan bon terakhir</h3>
                      </div>
                      <!-- /.box-header -->

                      <div class="box-body table-responsive">
                        <table id="tabel_bon" class="table table-bordered table-striped DataTable" style="font-size: 15px">
                          <thead>
                            <tr class="bg-info">
                              <th style="text-align: center; line-height: 50px">#</th>
                              <th style="text-align: center; line-height: 50px">Tanggal</th>
                              <th style="text-align: center; line-height: 50px">ID</th>
                              <th style="text-align: center; line-height: 50px">Nama</th>
                              <th style="text-align: center; line-height: 50px">Asal Daerah</th>
                              <th style="text-align: center; line-height: 50px">Nama Barang </th>
                              <th style="text-align: center; line-height: 50px">Harga </th>
                              <th style="text-align: center; line-height: 50px">Kuantitas</th>
                              <th style="text-align: center; line-height: 50px">Total</th>
                              <th style="text-align: center; line-height: 50px">Ambil Uang</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; foreach ($trans_bon as $tb): ?>
                              <tr>
                                <td><?= $no ?></td>
                                <td><?= $tb->tanggal ?></td>
                                <td><?= $tb->id_petani ?></td>
                                <td><?= $tb->nama ?></td>
                                <td><?= $tb->desa ?></td>
                                <td><?= $tb->barang ?></td>
                                <td><?= $tb->harga ?></td>
                                <td><?= $tb->kuantitas ?></td>
                                <td><?= $tb->harga*$tb->kuantitas ?></td>
                                <td><?= $tb->ambil_uang ?></td>
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

<!-- Modal Input Setoran-->
<div id="inputSetoran" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masukkan Setoran</h4>
      </div>
      <form action="<?php echo base_url();?>Transaksi/tambah_transpetani" method="post">
      <div class="modal-body">

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Tanggal :</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="tanggal" class="form-control input-tanggal" id="tanggal" required>
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Nama Petani :</label>
          </div>
          <div class="col-md-8">
            <select type="text" name="nama_petani" id="nama_petani" class="form-control" style="
            width: 100%" required></select>
            <input type="text" hidden="" name="id_petani" id="id_petani">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Saldo Awal :</label>
          </div>
          <div class="col-md-8">
           <input type="text" name="saldo_petani" readonly="" id="saldo_petani" class="form-control saldo_petani">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
           <label>Kode :</label>
          </div>
          <div class="col-md-8">
            <?php
                $dd_cabai_attribute = 'id="cabai" class="form-control select2" style="width:100%" required';
                echo form_dropdown('cabai', $dd_cabai, $cabai_selected, $dd_cabai_attribute);
              ?>
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Harga :</label>
          </div>
          <div class="col-md-3">
           <input type="text" name="harga_petani" readonly="" id="harga_petani" class="form-control">
          </div>
          <div class="col-md-2">
            <label>BS/MTD :</label>
          </div>
          <div class="col-md-3">
           <input type="text" name="harga_bs" readonly="" id="harga_bs" class="form-control">
          </div>
        </div>
              
        <div class="col-md-12" style="text-align: center; padding-bottom: 5px; padding-top: 10px">    
          <b>Berat</b>
        </div>
        <div class="row">
            <div class="col-md-3">
              <label>Kotor</label>
              <input type="number" step="0.01" name="berat_kotor" id="berat_kotor" class="form-control" required="">kg
            </div>
            <div class="col-md-3">
              <label>BS/MTD </label>
              <input type="number" step="0.01" name="berat_bs" id="berat_bs" class="form-control" required="">kg
            </div>
            <div class="col-md-3">
              <label>Susut </label>
              <input type="number" step="0.01" name="berat_susut" id="berat_susut" class="form-control" required="">kg
            </div>
            <div class="col-md-3">
              <label>Bersih </label>
              <input type="number" step="0.01" readonly name="berat_bersih" id="berat_bersih" class="form-control">kg
            </div>
        </div>

        <div class="row" style="margin-top: 20px">
          <div class="col-md-4">
            <label>Jumlah Uang :</label>
          </div>
          <div class="col-md-8">
           <input type="text" name="jumlah_uang" id="jumlah_uang" class="form-control" readonly="">
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

<!-- Modal Edit Setoran-->
<div id="editSetoran" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masukkan Setoran</h4>
      </div>
      <form action="<?php echo base_url();?>Transaksi/update_transpetani" method="post">
      <div class="modal-body">

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Tanggal :</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="tanggal" class="form-control input-tanggal" id="tanggal_edit" required>
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Nama Petani :</label>
          </div>
          <div class="col-md-8">
            <select type="text" name="nama_petani" id="nama_petani_edit" class="form-control" style="width: 100%" disabled>
              <option id="nama_petani_selected" value="" selected=""></option>
            </select>
            <input type="text" hidden="" name="id_petani" id="id_petani_edit">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
           <label>Kode :</label>
          </div>
          <div class="col-md-8">
            <?php
                $dd_cabai_attribute = 'id="cabai" class="form-control select2" style="width:100%" required';
                echo form_dropdown('cabai_edit', $dd_cabai, $cabai_selected, $dd_cabai_attribute);
              ?>
          </div>
        </div>
              
        <div class="col-md-12" style="text-align: center; padding-bottom: 5px; padding-top: 10px">    
          <b>Berat</b>
        </div>
        <div class="row">
            <div class="col-md-4">
              <label>Kotor</label>
              <input type="text" name="berat_kotor" id="berat_kotor_edit" class="form-control" required="">kg
            </div>
            <div class="col-md-4">
              <label>BS/MTD </label>
              <input type="text" name="berat_bs" id="berat_bs_edit" class="form-control" required="">kg
            </div>
            <div class="col-md-4">
              <label>Bersih </label>
              <input type="text" readonly name="berat_bersih" id="berat_bersih_edit" class="form-control">kg
            </div>
        </div>

      </div>

      <div class="modal-footer">
        <input type="submit" class="btn btn-info" value="Update">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </form>
    </div>

  </div>
</div>
<!-- END Modal Input Setoran -->

<!-- Modal Input BON-->
<div id="inputBon" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Input Setoran</h4>
      </div>
      <form action="<?php echo base_url();?>Transaksi/submitBon" method="post">
        <div class="modal-body">

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Tanggal :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="tanggal" class="form-control input-tanggal" required="">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Nama Petani :</label>
            </div>
            <div class="col-md-8">
              <select type="text" name="nama_petani" class="form-control" id="nama_petaniMitra" style="width: 100%" required=""></select>
              <input type="text" name="id_petani" id="id_petaniMitra" hidden="hidden">
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Saldo :</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" id="saldo_petaniMitra" disabled name="saldo_petani">
            </div>
          </div>
          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Status :</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" id="status_petaniMitra" disabled name="status">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
            <label> Masukkan barang bon </label>
              <div id="fields">
                <div class="controls form-inline" id="profs"> 
                    <div id="field1" class="form-group" style="margin-bottom: 5px">
                        <select class="input form-control" id="barang1" name="barang[]" style="width: 30%"></select>
                        <input autocomplete="off" class="input form-control" id="price1" name="price[]" type="number" placeholder="Harga" disabled style="width: 20%" />
                        <input autocomplete="off" class="input form-control" id="qty1" name="qty[]" type="number" placeholder="Kuantitas" style="width: 13%" />
                        <input autocomplete="off" class="input form-control" id="total1" name="total[]" type="number" placeholder="Total" style="width: 13%" disabled />
                        <button id="add1" onclick="addField()" class="btn btn-info add-more" type="button" style="">+</button>
                        <button id="remove1" class="btn btn-danger remove-me" type="button" style="display: none;">-</button><br>
                    </div>
                </div>
                <small>Tekan + untuk menambahkan kolom :)</small>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <br>

          <div class="row" style="padding : 10px 0px">
              <div class="col-md-4"> 
                <label>Ambil uang:</label>
              </div>
              <div class="col-md-8">
                <input type="number" class="form-control" step ="50" id="ambil_uang" name="ambil_uang">
              </div>
            <br>
          </div>

          <div class="row" style="padding : 10px 0px">
              <div class="col-md-4"> 
                <label>Tenggat Waktu Pembayaran BON:</label>
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control input-tanggal" id="tenggat" name="tenggat">
              </div>
            <br>
          </div>

        <div class="modal-footer">
          <input type="submit" class="btn btn-info" value="Submit">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>

</div>
</div>
<!-- END Modal Input BON -->

<!-- Modal add Petani -->
<div class="modal fade" id="addPetani">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambahkan Petani Mitra</h4>
      </div>

        <!-- One "tab" for each step in the form: -->
      <form action="<?php echo base_url();?>Transaksi/addPetani" method="post">
        <div class="modal-body">

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Status Mitra :</label>
            </div>
            <div class="col-md-8">
              <select name="kemitraan" class="form-control">
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
              <label>Saldo Awal :</label>
            </div>
            <div class="col-md-8">
              <input type="number" name="saldo" id="saldo_awal" class="form-control" required="">
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
          <button type="submit" class="btn btn-warning"><i class="fa fa-user-plus"></i>Tambahkan Petani</button>
        </div>
      </form>
        <!-- /.modal-footer -->
    </div>
  </div>
</div>
<!-- END Modal add Petani -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js""></script>
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
    $('.DataTable').DataTable();

    $('.input-tanggal').datepicker({
      format : 'yyyy-mm-dd',
      todayHighlight : 'true'
    });

    //dropdown jenis cabai
    $(".select2").select2({
        placeholder: "Please Select"
    });

    //select2 nama petani mitra
    getPetani('<?php echo base_url();?>Transaksi/get_petani', $('#nama_petani'));

    //select2 nama petani non mitra
    getPetani('<?php echo base_url();?>Transaksi/get_petani', $('#nama_petaniMitra'));

    //memunculkan saldo dari petani
    showSaldo($('#nama_petani'), $('#id_petani'), $('#saldo_petani'));
    showSaldo($('#nama_petaniMitra'), $('#id_petaniMitra'), $('#saldo_petaniMitra'), $('#status_petaniMitra'));

    //select2 barang bon
    getBarang($('#barang1'));

    //mengambil nilai harga cabai
    $('#cabai').on('change', function() {
       showHargaCabai();

       $('#tanggal').on('change', function() {
          showHargaCabai();
       });
    });

    //Menghitung Berat Bersih dan Jumlah Uang
    $('#berat_susut').on('change', function()  {
      showJumlahUang(); 

      $('#berat_bs').on('change', function()  {
      showJumlahUang(); 

          $('#berat_kotor').on('change', function() {
            showJumlahUang();
            });
            $('#tanggal').on('change', function()   {
              resetJumlahUang()
            });
            $('#cabai').on('change', function()   {
              resetJumlahUang()
            });
      });
    });

      //edit Setoran
      $(".edit_data").click(function(){
        editSetoran();
      });

      showHargaBarang($('#barang1'), $('#price1'));
      showTotalBarang($('#qty1'), $('#price1'), $('#total1')); 

  });

    //membuat modal input bon

  //klik tambah barang
  var next = 1;
  function addField() {
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" class="form-group" style="margin-bottom: 5px"><select class="input form-control" id="barang'+ next +'" name="barang[]" style="width: 30%"></select><input autocomplete="off" class="input form-control" id="price'+ next +'" name="price[]" type="number" placeholder="Harga" disabled style="width: 20%" /><input autocomplete="off" class="input form-control" id="qty'+ next +'" name="qty[]" type="number" placeholder="Kuantitas" style="width: 13%" /><input autocomplete="off" class="input form-control" id="total'+ next +'" name="total[]" type="number" placeholder="Total" style="width: 13%" /><button id="add'+ next +'" onclick="addField()" class="btn btn-info add-more" type="button" style="">+</button><button id="remove'+ next +'" class="btn btn-danger remove-me" type="button" style="display: none;">-</button></div>';
        var newInput = $(newIn);
        var removeBtn = '<br id="br'+ next +'">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        //$(addRemove).after(removeButton);
        $('#add'+ (next-1) +'').attr('style', "display: none");
        $('#remove'+ (next-1) +'').attr('style', "display: inline");

        getBarang($('#barang' + next));
        showHargaBarang($('#barang' + next), $('#price' + next));
        showTotalBarang($('#qty' + next), $('#price' + next), $('#total' + next));   
        
        $('.remove-me').click(function(e){
            e.preventDefault();
            var fieldNum = this.id.charAt(this.id.length-1);
            var fieldID = "#field" + fieldNum;
            var brID = "#br" + fieldNum;
            //$(this).remove();
            $(fieldID).remove();
            //$(brID).remove();
        });
  }

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

  function getPetani(url, objectElement)  {
    objectElement.select2({
    placeholder: 'Pilih Petani',
    ajax: {
      url: url,
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
            alamat: item.desa,
            kemitraan: item.kemitraan
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
  }

  function showJumlahUang() {
      var harga_bersih = $('#harga_petani').val()
      var harga_bs = $('#harga_bs').val()
      var kotor = $('#berat_kotor').val()
      var bs = $('#berat_bs').val()
      var susut = $('#berat_susut').val()
      var bersih = kotor - bs - susut

      var jumlah_uang = (bersih * harga_bersih) + (bs * harga_bs)

      $('#berat_bersih').val(bersih)
      $('#jumlah_uang').val(jumlah_uang)
  }

  function showHargaCabai() {
     $.ajax({
           url: '<?php echo base_url();?>Transaksi/get_hargaPetani', //This is the current doc
           type: "POST",
           dataType: "json",
           data: {tanggal: $('#tanggal').val(), kode_cabai: $('#cabai').val()  },
           success: function(harga){
              if (!harga) {
                $('#harga_petani').val("")
                $('#harga_bs').val("") 
              }
              else {
              $('#harga_petani').val(harga.harga_bersih)
              $('#harga_bs').val(harga.harga_bs)
              }
           },
           error: function(){
              alert('Gagal');
           }
        })
  }

  function resetJumlahUang()    {
    $('#berat_kotor').val("")
    $('#berat_bs').val("")
    $('#berat_bersih').val("")
    $('#jumlah_uang').val("")
  }

  function showSaldo(element1, element2, element3, element4)  {
      $(element1).on('change', function()  {
            var data = $(element1).select2('data');
            $(element2).val(data[0].id)
            $(element3).val(data[0].saldo)
            if (data[0].kemitraan == 1) {
              var statusPetani = "Mitra";
              $('#field1').attr("style","");
              $('#tenggat').attr("style","");
              $('#ambil_uang').attr("max", "");
            }
            else if (data[0].kemitraan == 0) {
              var statusPetani = "Non-Mitra";
              $('#field1').attr("style","display: none");
              $('#tenggat').attr("style","display: none");
              $('#ambil_uang').attr("max", data[0].saldo);
            }
            else {
              var statusPetani = "Maaf, terjadi kesalahan"
            }
            $(element4).val(statusPetani)
        });
  }

  function getBarang(objectElement)  {
    objectElement.select2({
      placeholder: 'Pilih Jenis Barang',
      ajax: {
        url: "<?php echo base_url();?>Barang/get_barang",
        dataType: "json",
        delay: 250,
        data: function(params){
          return{
            barang : params.term
          };
        },
        processResults: function (data) {
          var results = [];

          $.each(data, function(index, item){
            results.push({
              id: item.id,
              text: item.barang,
              harga: item.harga
            });
          });
          return{
            results: results
          };
        },
      },
      escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
      minimumInputLength: 1,
      });
    }

    function editSetoran()  {
           var id_transaksi = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url();?>Transaksi/edit_transpetani",  
                method:"POST",  
                data:{id_transaksi:id_transaksi},  
                dataType:"json",  
                success:function(data){
                     $('#id_transaksi').val(data.id);
                     $('#tanggal_edit').val(data.tanggal);  
                     $('#nama_petani_selected').attr("value", data.nama);  
                     $('#cabai_edit').val(data.kode);   
                     $('#berat_kotor_edit').val(data.berat_kotor);
                     $('#berat_bersih_edit').val(data.berat_bersih);
                }  
           });
    }

    function showHargaBarang(barang, price)  {
      barang.on('change', function()  {
              var data = barang.select2('data');
              price.val(data[0].harga)
          });
    }

    function showTotalBarang(qty, price, total)  {
      qty.on('change', function()  {
              var kuantitas = qty.val()
              var harga = price.val()
              var ttl = kuantitas * harga
              total.val(ttl)
          });
    }

</script>

</body>
</html>
