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
        Keuangan Non-Transaksi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Keuangan Non-Transaksi</a></li>
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

      <!-- /.Keuangan NonTransaksi -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header">
              <div class="box-title">
                <b class="text-warning">Pengeluaran</b>
              </div>
              <!-- /.box-title -->
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="box" style="border: 2px solid #f39c12;">
                    <div class="box-body">
                      <form action="<?php echo base_url();?>Perusahaan/Pengeluaran" method="post">

                      <div class="row" style="padding-bottom: 5px">
                        <div class="col-md-4">
                          <label>Tanggal :</label>
                        </div>
                        <div class="col-md-8">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right input-tanggal" name="tanggal" required>
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div> 

                      <div class="row" style="padding-bottom: 5px">
                        <div class="col-md-4">
                          <label>Jenis :</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="jenis" placeholder="Jenis Pengeluaran" required="">
                        </div>
                      </div>
                      
                      <div class="row" style="padding-bottom: 5px">
                        <div class="col-md-4">
                          <label>Harga Satuan :</label>
                        </div>
                        <div class="col-md-8">
                          <input type="number" class="form-control" name="harga" placeholder="Rp xxxxx" id="hargaPengeluaran" required="">
                        </div>
                      </div>

                       <div class="row" style="padding-bottom: 5px">
                        <div class="col-md-4">
                          <label>Jumlah :</label>
                        </div>
                        <div class="col-md-8">
                          <input type="number" class="form-control" name="jumlah" placeholder="Jumlah satuan" id="jumlahPengeluaran" required="">
                        </div>
                      </div>

                       <div class="row" style="padding-bottom: 5px">
                        <div class="col-md-4">
                          <label>Total :</label>
                        </div>
                        <div class="col-md-8">
                          <input type="number" class="form-control" id="totalPengeluaran" placeholder="Total Uang" readonly="">
                        </div>
                      </div>
                    <div class="box-footer pull-right">
                      <button type="submit" class="btn btn-warning"><i class="fa fa-money"></i>Tambahkan rekap</button>
                    </div>
                    </form>  
                    </div> 
                  </div>
                </div>

                <div class="col-md-8 table-responsive">
                  <table class="table table-bordered table-striped datatables" style="font-size: 15px">
                    <thead>
                      <tr class="bg-yellow">
                        <th style="text-align: center; line-height: 50px">No</th>
                        <th style="text-align: center; line-height: 50px">Tanggal</th>
                        <th style="text-align: center; line-height: 50px">Jenis Pemasukan</th>
                        <th style="text-align: center; line-height: 50px">Harga Satuan</th>
                        <th style="text-align: center; line-height: 50px">Jumlah</th>
                        <th style="text-align: center; line-height: 50px">Total</th>
                        <th style="text-align: center; line-height: 50px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($pengeluaran as $key): ?>
                      <tr>
                        <td><?= $no ?> </td>
                        <td><?= $key->tanggal ?></td>
                        <td><?= $key->jenis ?></td>
                        <td><?= $key->harga_satuan ?></td>
                        <td><?= $key->jumlah ?></td>
                        <td><?= $key->harga_satuan * $key->jumlah?></td>
                        <td>
                          <button class="edit_data btn btn-sm btn-info" id="<?php echo 'pengeluaran_edit_'.$key->id ?>" data-toggle="modal" data-target="#editCatatan" ><i class="fa fa-edit" ></i> Edit </button>
                          <button class="delete btn btn-sm btn-danger" id="<?php echo 'pengeluaran_del_'.$key->id ?>"><i class="fa fa-trash-o"></i> Hapus </button>
                        </td>
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
      <!-- /.row -->

      <!-- /.Keuangan NonTransaksi -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <div class="box-title">
                <b class="text-success">Pemasukan</b>
              </div>
              <!-- /.box-title -->
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="box" style="border: 2px solid #f39c12;">
                    <div class="box-body">
                      <form action="<?php echo base_url();?>Perusahaan/Pemasukan" method="post">

                      <div class="row" style="padding-bottom: 5px">
                        <div class="col-md-4">
                          <label>Tanggal :</label>
                        </div>
                        <div class="col-md-8">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right input-tanggal" name="tanggal" required>
                          </div>
                          <!-- /.input group -->
                        </div>
                      </div> 

                      <div class="row" style="padding-bottom: 5px">
                        <div class="col-md-4">
                          <label>Jenis :</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="jenis" placeholder="Jenis Pengeluaran" required="">
                        </div>
                      </div>
                      
                      <div class="row" style="padding-bottom: 5px">
                        <div class="col-md-4">
                          <label>Harga Satuan :</label>
                        </div>
                        <div class="col-md-8">
                          <input type="number" class="form-control" id="hargaPemasukan" name="harga" placeholder="Rp xxxxx" required="">
                        </div>
                      </div>

                       <div class="row" style="padding-bottom: 5px">
                        <div class="col-md-4">
                          <label>Jumlah :</label>
                        </div>
                        <div class="col-md-8">
                          <input type="number" class="form-control" name="jumlah" placeholder="Jumlah satuan" id="jumlahPemasukan" required="">
                        </div>
                      </div>

                       <div class="row" style="padding-bottom: 5px">
                        <div class="col-md-4">
                          <label>Total :</label>
                        </div>
                        <div class="col-md-8">
                          <input type="number" class="form-control" id="totalPemasukan" placeholder="Total Uang" readonly="">
                        </div>
                      </div>
                    <div class="box-footer pull-right">
                      <button type="submit" class="btn btn-success"><i class="fa fa-money"></i>Tambahkan rekap</button>
                    </div>
                    </form>  
                    </div> 
                  </div>
                </div>

                <div class="col-md-8 table-responsive">
                  <table class="table table-bordered table-striped datatables" style="font-size: 15px">
                    <thead>
                      <tr class="bg-green">
                        <th style="text-align: center; line-height: 50px">No</th>
                        <th style="text-align: center; line-height: 50px">Tanggal</th>
                        <th style="text-align: center; line-height: 50px">Jenis Pemasukan</th>
                        <th style="text-align: center; line-height: 50px">Harga Satuan</th>
                        <th style="text-align: center; line-height: 50px">Jumlah</th>
                        <th style="text-align: center; line-height: 50px">Total</th>
                        <th style="text-align: center; line-height: 50px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach ($pemasukan as $key): ?>
                      <tr>
                        <td><?= $no ?> </td>
                        <td><?= $key->tanggal ?></td>
                        <td><?= $key->jenis ?></td>
                        <td><?= $key->harga_satuan ?></td>
                        <td><?= $key->jumlah ?></td>
                        <td><?= $key->harga_satuan * $key->jumlah?></td>
                        <td>  
                          <button class="edit_data btn btn-sm btn-info" id="<?php echo 'pemasukan_edit_'.$key->id ?>" data-toggle="modal" data-target="#editCatatan" ><i class="fa fa-edit" ></i> Edit </button>
                          <button class="delete btn btn-sm btn-danger" id="<?php echo 'pemasukan_del_'.$key->id ?>"><i class="fa fa-trash-o"></i> Hapus </button>
                        </td>
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
      <!-- /.row -->
            </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- modal edit Catatan -->
  <div class="modal fade" id="editCatatan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>Edit <span id="judul"></span></b></h4>
        </div>
        <div class="modal-body">
          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
              <label>Tanggal :</label>
            </div>
            <div class="col-md-8">
              <input type="text" name="id_catatan" id="id_catatan" hidden>
              <input type="text" name="tanggal_catatan" class="form-control input-tanggal" id="tanggal_catatan" required>
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
             <label>Jenis :</label>
            </div>
            <div class="col-md-5">
              <input type="text" name="jenis_catatan" class="form-control" id="jenis_catatan" required>
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
             <label>Harga :</label>
            </div>
            <div class="col-md-5">
              <input type="number" name="harga_catatan" class="form-control" id="harga_catatan" required>
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
             <label>Jumlah :</label>
            </div>
            <div class="col-md-5">
              <input type="number" name="jumlah_catatan" class="form-control" id="jumlah_catatan" required>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn pull-left btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="update_button">Update</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

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
<script type="text/javascript">
  $(document).ready(function(){
    $('.datatables').DataTable()
    $('.input-tanggal').datepicker({
      format : 'yyyy-mm-dd',
      todayHighlight : 'true'
    });

    $('#jumlahPengeluaran').on('change', function() {
      Harga('#hargaPengeluaran','#jumlahPengeluaran', '#totalPengeluaran')
      $('#hargaPengeluaran').on('change', function()  {
      Harga('#hargaPengeluaran','#jumlahPengeluaran', '#totalPengeluaran')
      })
    })
  
    $('#jumlahPemasukan').on('change', function() {
      Harga('#hargaPemasukan','#jumlahPemasukan', '#totalPemasukan')
      $('#hargaPemasukan').on('change', function()  {
      Harga('#hargaPemasukan','#jumlahPemasukan', '#totalPemasukan')
      })
    })

        //menghapus
    $('.delete').click(function(){
        var el = this;
        var id = this.id;
        console.log(id);
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[2];
        var table = splitid[0]
   
          if(confirm('Apakah Anda yakin menghapus transaksi?'))
          {
            // AJAX Request
            $.ajax({
              url: '<?php echo base_url();?>Perusahaan/delete_catatan',
              type: 'POST',
              data: { id:deleteid,
              table: table },
              success: function(response){

                // Removing row from HTML Table
                $(el).closest('tr').css('background','tomato');
                $(el).closest('tr').fadeOut(600, function(){ 
                 $(this).remove();
                });
              },
              error: function(){
                alert('Gagal menghapus');
              }
            });
          }
      });

      $('.edit_data').click(function(){
          var id = this.id;
          var splitid = id.split("_");
          var id_barang = splitid[2];
          var table = splitid[0];
          editCatatan(id_barang, table);
      });

      $('#update_button').click(function(){
          updateCatatan();
      })

  })

  function Harga(elementHarga, elementJumlah, elementTotal)  {
      var harga = $(elementHarga).val()
      var jumlah = $(elementJumlah).val()

      var total = harga*jumlah

      $(elementTotal).val(total)    
  }

  function editCatatan(id, table) {
           $.ajax({  
                url:"<?php echo base_url();?>Perusahaan/edit_catatan",  
                method:"POST",  
                data:{
                  id: id,
                  table: table },
                dataType: "json",
                success:function(data){
                    $('#judul').html(table);
                    $('#id_catatan').val(data.id);
                    $('#tanggal_catatan').val(data.tanggal);
                    $('#jenis_catatan').val(data.jenis);
                    $('#harga_catatan').val(data.harga_satuan);
                    $('#jumlah_catatan').val(data.jumlah);
                }  
           });
  }

function updateCatatan() {
      var table = $('#judul').html()
      var id = $('#id_catatan').val()
      var tanggal = $('#tanggal_catatan').val()
      var jenis = $('#jenis_catatan').val()
      var harga_satuan = $('#harga_catatan').val()
      var jumlah = $('#jumlah_catatan').val()

      $.ajax({
        url:"<?php echo base_url();?>Perusahaan/update_catatan",  
        type:"POST",  
        data:{
          table: table,
          id: id,
          tanggal: tanggal,
          jenis: jenis,
          harga_satuan: harga_satuan,
          jumlah: jumlah },    
        success:function(data){
          if (!alert('Berhasil Merubah Data')) {location.reload(true)}
        },
        error: function() {
          alert('gagal mengedit, coba lagi!')
        }
      })
  }
</script>