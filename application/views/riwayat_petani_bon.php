
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Transaksi Petani
        <small>_</small>BON
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Riwayat Transaksi</a></li>
        <li class="active">Petani</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Riwayat Transaksi berdasarkan Tanggal</h3>
            </div>
            <div class="box-body">
            

              <!-- Date range -->
              <div class="row">
                <div class="col-md-4">
                  <div class="callout callout-success">
                    <div class="row">
                      <div class="col-md-2">
                        <i class="icon fa fa-leaf fa-3x"></i>
                      </div>
                      <div class="col-md-10">
                        <h4> Petani_BON</h4>
                        <p>Lihat riwayat BON dari petani mitra</p>
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
                      <input id="btn_date" type="submit" class="btn btn-info" value="Cek Transaksi" style="margin-top: 25px">
                  </div>
              </div>

              <div id="successful_edit">
              
              </div>


              <!-- /.form group -->
              <div class="row">
                <div class="col-md-12 table-responsive">
                  <hr>
                  <table id="tb_bon" class="table table-bordered table-striped datatables">
                    <thead>
                  <tr class="bg-gray">
                    <th style="text-align: center; line-height: 50px">#</th>
                    <th style="text-align: center; line-height: 50px" >Tanggal </th>
                    <th style="text-align: center; line-height: 50px" >ID</th>
                    <th style="text-align: center; line-height: 50px" >Nama</th>
                    <th style="text-align: center; line-height: 50px" >Asal Daerah</th>
                    <th style="text-align: center; line-height: 50px" >BON</th>
                    <th style="text-align: center; line-height: 50px" >Saldo</th>
                    <th style="text-align: center; line-height: 50px" >Aksi</th>
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

  <!-- Modal Detail BON-->
    <div id="modal_bon" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail Bon</h4>
          </div>
      <div class="modal-body">

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Tanggal :</label>
          </div>
          <div class="col-md-8">
            <p id="tanggal">2018-09-10</p>
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Nama Petani :</label>
          </div>
          <div class="col-md-8">
            <p id="nama_petani">Siapa</p>
          </div>
        </div>

        <table id="tb_detail" class="table table-bordered table-striped">
          <thead>
            <tr id="tb_detail_judul">
              <th>No</th>
              <th>Jenis BON</th>
              <th>Harga</th>
              <th>Kuantitas</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody id="tb_body_detail">
            
          </tbody>
        </table>

      </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

        </div>

      </div>
    </div>
    <!-- END Modal Input Setoran -->


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
<!-- Notify.js -->
<script src="<?php echo base_url();?>assets/js/notify.min.js"></script>
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
  var dataTable;

  $(document).ready(function(){
     $('.input-tanggal').datepicker({
      format : 'yyyy-mm-dd',
      todayHighlight : 'true'
    });

//Datatable ajax
  dataTable = $('#tb_bon').DataTable({ 
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.

      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('Riwayat/list_riwayat_bon_petani')?>",
          "type": "POST",
          "data": function(data){
              data.startdate = $('#startdate').val();
              data.enddate = $('#enddate').val()
          }
      },

      //Set column definition initialisation properties.
      "columnDefs": [
      { 
          "targets": [ -1, 0, -3 ], //last column
          "orderable": false, //set not orderable
      },
      ],

  });

//Filter Tanggal
  $('#btn_date').click(function(){
      dataTable.draw();
  })

//dropdown jenis cabai
  $(".select2").select2({
      placeholder: "Please Select"
  });

});

function getDetailBon(id_transaksi) {
    var no=1;

    $.ajax({
      url: '<?php echo base_url();?>Riwayat/getDetailBon',
      type: 'POST',
      data: {id_transaksi:id_transaksi},
      dataType: 'json',
      success: function(response){
        var row = '';
        var total = 0;

        for(var i=0; i<response.length; i++)
        {
          var jumlah = response[i].harga * response[i].kuantitas;
          var no = i + 1;
          row += '<tr>';
          row += '<td>'+ no +'</td>';
          row += '<td>'+ response[i].barang +'</td>';
          row += '<td>Rp'+ response[i].harga +'</td>';
          row += '<td>'+ response[i].kuantitas +'</td>';
          row += '<td>Rp'+ jumlah +'</td></tr>';

          total += jumlah;
        }

        row += '<tr><td align="center" colspan="4"><b> Total <b></td>';
        row += '<td><b>Rp'+ total +'</b></td></tr>';
        $('#tanggal').html(response[0].tanggal);
        $('#nama_petani').html(response[0].nama);
        $('#tb_body_detail').html(row);

        $('#modal_bon').modal('show');
      }
  
    })
  }

  function deleteBon(id){
    if(confirm('Apakah Anda yakin menghapus transaksi?'))
        {
          // AJAX Request
          $.ajax({
            url: '<?php echo base_url();?>Riwayat/delete_transpetanibon',
            type: 'POST',
            data: { id:id },
            success: function(response){
                $('#modal_bon').modal('hide');
                $.notify("Berhasil Menghapus Data",
                  {   className: "warning",
                      position: "top right" },
                );
                dataTable.ajax.reload(null,false);
            },
            error: function(){
              alert('Gagal menghapus');
            }
          });
        }
      };

  
</script>
</body>
</html>
