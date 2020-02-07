  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Harga Cabai
        <small>_</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Cabai</a></li>
        <li class="active">Riwayat Harga Cabai Petani</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Riwayat Harga Cabai</h3>
            </div>

            <div class="box-body">
            <!-- Date range -->
              <div class="row">
                <div class="col-md-4">
                  <div class="callout callout-danger">
                    <div class="row">
                      <div class="col-md-2">
                        <i class="icon fa fa-dollar fa-3x"></i>
                      </div>
                      <div class="col-md-10">
                        <h4> Harga Cabai Petani</h4>
                        <p>Lihat riwayat harga beli cabai</p>
                      </div>
                    </div>
                   
                  </div>
                </div>
                  <div class="form-group col-md-3">
                    <label>Tanggal Mulai :</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control input-tanggal" name="startdate" id="startdate" required>
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <label>Tanggal Selesai :</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control input-tanggal" name="enddate" id="enddate" required>
                    </div>
                  </div>

                  <div class="col-md-2">
                      <input id="btn_date" type="submit" class="btn btn-info" value="Cek Harga" style="margin-top: 25px">
                  </div>
              </div>

              <!-- /.form group -->

              <div class="row">
                <div class="col-md-12 table-responsive">
                  <hr>
                    <table id="tabel_transaksi" class="table table-bordered table-striped datatables" style="font-size: 15px">
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
                          </tbody>
                        </table>
                <!-- ./table -->
              </div>
              </div>
              <!-- ./ row table responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

<!-- modal edit -->
  <div class="modal fade" id="modal_editHarga">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Harga Cabai</h4>
        </div>
        <div class="modal-body">

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
             <label>Tanggal :</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="id_harga" id="id_harga" hidden>
              <input type="text" name="tanggal" class="form-control" id="tanggal" disabled>
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-4">
             <label>Jenis Cabai :</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="jenis_cabai" class="form-control" id="jenis_cabai" disabled>
              <input type="text" name="kode_cabai" id="kode_cabai" hidden="">
              
            </div>
          </div>

          <div class="row" style="padding-bottom: 5px">
            <div class="col-md-3">
             <label>Harga :</label>
            </div> 
              <div class="col-md-4">
                <label>Bersih</label>
                <input type="text" name="harga_bersih" class="form-control" id="harga_bersih">
              </div>
              <div class="col-md-4">
                <label>BS</label>
                <input type="text" name="harga_bs" class="form-control" id="harga_bs">
              </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn pull-left btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="TombolSimpan">Simpan</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- /.modal -->

<!-- modal confirm update -->
  <div class="modal fade" id="modal_confirmUpdate">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Konfirmasi Transaksi yang Berubah</h4>
        </div>
        <div class="modal-body">
          <div style="overflow: auto; height: 400px" >
            <table id="tabel_confirm" class="table table-bordered table-striped datatables " style="font-size: 15px; width: 100%;">
              <thead>
                <tr class="bg-success">
                  <th style="text-align: center; line-height: 50px" rowspan="2">No</th>
                  <th style="text-align: center; line-height: 50px" rowspan="2">Tanggal</th>
                  <th style="text-align: center; line-height: 50px" rowspan="2">Id Petani</th>
                  <th style="text-align: center; line-height: 50px" rowspan="2">Nama Petani</th>
                  <th style="text-align: center; line-height: 50px" rowspan="2">Kode Cabai</th>
                  <th style="text-align: center;" colspan="2">Berat</th>
                  <th style="text-align: center; line-height: 50px" rowspan="2">Jumlah Uang</th>
                  <th style="text-align: center; line-height: 50px" rowspan="2">Saldo Transaksi</th>
                  <th style="text-align: center; line-height: 50px" rowspan="2">Saldo Petani</th>
                </tr>
                <tr class="bg-success">
                  <th>BS/ MTL </th>
                  <th>Bersih </th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        <!-- ./table -->
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn pull-left btn-danger" data-dismiss="modal">Oke</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- /.modal -->


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

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Notify.js -->
<script src="<?php echo base_url();?>assets/js/notify.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/js/demo.js"></script>
<script type="text/javascript">
  var dataTable;
  var table_confirm;

  $(document).ready(function(){
      $('.input-tanggal').datepicker({
      format : 'yyyy-mm-dd',
      todayHighlight : 'true'
    });

    //Datatable ajax
    dataTable = $('#tabel_transaksi').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Cabai/list_riwayat_cabai')?>",
            "type": "POST",
            "data": function(data){
                data.startdate = $('#startdate').val();
                data.enddate = $('#enddate').val()
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1, 0], //last column
            "orderable": false, //set not orderable
        },
        ],
    });

    table_confirm = $('#tabel_confirm').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Cabai/list_transaksi_changed')?>",
            "type": "POST",
            "data": function(data){
                data.tanggal = $('#tanggal').val();
                data.kode_cabai = $('#kode_cabai').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -3, -4, -5, 0], //last column
            "orderable": false, //set not orderable
        },
        ],

        "autowidth": false,
        "responsive": true,
    });

//Filter Tanggal
    $('#btn_date').click(function(){
        dataTable.draw();
    })

    $('#TombolSimpan').click(function(){
        updateHarga();
    })
  })

  function editHarga(id)  {
    $.ajax({  
      url:"<?php echo base_url();?>Cabai/get_harga",  
      method:"POST",  
      data:{id:id},  
      dataType:"json",  
      success:function(data){
        $('#id_harga').val(data.id);
        $('#tanggal').val(data.tanggal);
        $('#jenis_cabai').val(data.jenis + " (" + data.kode_cabai + ")");
        $('#kode_cabai').val(data.kode_cabai);
        $('#harga_bersih').val(data.harga_bersih);
        $('#harga_bs').val(data.harga_bs);
        $('#modal_editHarga').modal('show');
      },
      error: function(){
        alert('error');
      }
    });
  }

  function updateHarga()  {
    var tanggal = $('#tanggal').val();
    var id_harga = $('#id_harga').val();
    var kode_cabai = $('#kode_cabai').val();
    var harga_bs = $('#harga_bs').val();
    var harga_bersih = $('#harga_bersih').val();

    $.ajax({
      url:"<?php echo base_url();?>Cabai/update_harga",
      method:"POST",
      data:{
        id: id_harga,
        kode_cabai: kode_cabai,
        tanggal: tanggal,
        harga_bersih: harga_bersih,
        harga_bs: harga_bs
      },
      success: function(data){
        $('#modal_editHarga').modal('hide');
        $.notify("Berhasil Mengubah Data",
                  {   className: "success",
                      position: "top right" },
                );
        table_confirm.draw();
        $('#modal_confirmUpdate').modal('show');
        dataTable.ajax.reload(null,false); //reload datatable ajax
      },
      error: function(){
        alert('gagal merubah harga')
      }
    })
  }

</script>
</body>
</html>