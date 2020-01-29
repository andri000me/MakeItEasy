
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Transaksi Pembeli
        <small>_</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Riwayat Transaksi</a></li>
        <li class="active">Pembeli</li>
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
                  <div class="callout callout-danger">
                    <div class="row">
                      <div class="col-md-2">
                        <i class="icon fa fa-cart-plus fa-3x"></i>
                      </div>
                      <div class="col-md-10">
                         <h4> Pembeli Mitra</h4>
                      <p>Lihat riwayat transaksi dengan pembeli mitra</p>
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
                      <input type="text" class="form-control input-tanggal" name="startdate" id="startdate" required >
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <label>Tanggal Selesai :</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control input-tanggal" name="enddate" id="enddate" required >
                    </div>
                  </div>

                  <div class="col-md-2">
                      <input id="btn_date" type="submit" class="btn btn-info" value="Cek Transaksi" style="margin-top: 25px">
                  </div>
              </div>

              <!-- /.form group -->

              <div class="row">
                <div class="col-md-12 table-responsive">
                  <hr>
                  <table id="tb_transaksi" class="table table-bordered table-striped datatables">
                   <thead>
                      <tr class="bg-gray">
                        <th style="text-align: center; line-height: 10px" rowspan="2">#</th>
                        <th style="text-align: center; line-height: 10px" rowspan="2">Tanggal</th>
                        <th style="text-align: center; line-height: 30px" rowspan="2">ID</th>
                        <th style="text-align: center; line-height: 50px" rowspan="2">Nama</th>
                        <th style="text-align: center; line-height: 50px" rowspan="2">Asal Daerah</th>
                        <th style="text-align: center;" colspan="3">Berat</th>
                        <th style="text-align: center; line-height: 50px" rowspan="2">Harga</th>
                        <th style="text-align: center; line-height: 50px" rowspan="2">Jumlah Uang</th>
                        <th style="text-align: center; line-height: 50px" rowspan="2">Transferan </th>
                        <th style="text-align: center; line-height: 50px" rowspan="2">Saldo</th>
                        <th style="text-align: center; line-height: 50px" rowspan="2">Edit</th>
                      </tr>
                      <tr class="bg-gray">
                        <th>Colly </th>
                        <th>Kode </th>
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

  <!-- Modal Input Setoran-->
    <div id="modal_editPembelian" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Masukkan Setoran</h4>
          </div>
          <div class="modal-body">

            <div class="row" style="padding-bottom: 5px">
              <div class="col-md-4">
                <label>Tanggal :</label>
              </div>
              <div class="col-md-8">
                <input type="text" hidden name="id_transaksi" id="id_transaksi">
                <input type="text" name="tanggal" class="form-control input-tanggal" id="tanggal">
              </div>
            </div>

            <div class="row" style="padding-bottom: 5px">
              <div class="col-md-4">
                <label>Nama Pembeli :</label>
              </div>
              <div class="col-md-8">
                <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" style="width: : 100%" readonly required>
                <input type="text" hidden="" name="id_pembeli" id="id_pembeli">
              </div>
            </div>

            <div class="row" style="padding-bottom: 5px">
              <div class="col-md-4">
                <label>Saldo Awal :</label>
              </div>
              <div class="col-md-8">
               <input type="text" name="saldo_pembeli" hidden="" readonly="" id="saldo_pembeli">
               <input type="text" name="saldo_trans" id="saldo_trans" class="form-control">
              </div>
            </div>

            <div class="row" style="padding-bottom: 5px">
              <div class="col-md-4">
               <label>Kode :</label>
              </div>
              <div class="col-md-8">
                <input type="text" name="cabai" id="cabai" class="form-control" style="width: 100%" readonly required>
              </div>
            </div>

            <div class="row" style="padding-bottom: 5px">
              <div class="col-md-4">
                <label>Harga  :</label>
              </div>
              <div class="col-md-8">
               <input type="text" name="harga_pembeli" id="harga_pembeli" class="form-control">
              </div>
            </div>
                  
            <div class="col-md-12" style="text-align: center; padding-bottom: 5px; padding-top: 10px">    
              <b>Berat</b>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <label>Colly</label>
                  <input type="text" name="colly" id="colly"> colly
                </div>
                <div class="col-md-6">
                  <label>Bersih </label>
                  <input type="text" name="bersih" id="bersih"> kg
                </div>
            </div>

            <div class="row" style="margin-top: 20px">
              <div class="col-md-4">
                <label>Jumlah Uang :</label>
              </div>
              <div class="col-md-8">
               <input type="text" name="jumlah_uang" id="jumlah_uang" readonly class="form-control">
               <input type="text" hidden="" name="jumlah_uang_awal" id="jumlah_uang_awal">
              </div>
            </div>

            <div class="row" style="padding-top: 5px">
              <div class="col-md-4">
                <label>Transferan  :</label>
              </div>
              <div class="col-md-8">
               <input type="text" name="transferan" id="transferan" class="form-control">
               <input type="text" name="transferan_awal" id="transferan_awal" hidden="">
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button class="btn btn-info" id="btn_update">Update</button>
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
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Notify.js -->
<script src="<?php echo base_url();?>assets/js/notify.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
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
    dataTable = $('#tb_transaksi').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Riwayat/list_riwayat_pembeli')?>",
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

    $('.edit_data').click(function(){
         var id_transaksi = this.id;
         editPembelian(id_transaksi);
    });

    //Menghitung jumlah uang
    $('#bersih').on('change', function()  {
      showJumlahUang();
    })
    $('#harga_pembeli').on('change', function()  {
      showJumlahUang();
    })

    //update transaksi pembeli
    $('#btn_update').click(function(){
      updatePembelian();
    });

  })

  function reload_table()
  {
      dataTable.ajax.reload(null,false); //reload datatable ajax 
  }

  function editPembelian(id_trans)  {
     $.ajax({  
          url:"<?php echo base_url();?>Transaksi/edit_transborong",  
          method:"POST",  
          data:{id_transaksi:id_trans},  
          dataType:"json",  
          success:function(data){
              var jumlah_uang = data.bersih * data.harga;
              //var opt= document.getElementById('cabai').options[0];

               $('#id_transaksi').val(data.id);
               $('#tanggal').val(data.tanggal);  
               $('#nama_pembeli').val('[' + data.id_pembeli + '] ' + data.nama);
               $('#id_pembeli').val(data.id_pembeli)
               $('#saldo_pembeli').val(data.saldo_pembeli);
               $('#saldo_trans').val(data.saldo_trans);
               $('#cabai').val(data.kode + ' (' + data.jenis + ')');
               $('#harga_pembeli').val(data.harga);   
               $('#colly').val(data.colly);
               $('#bersih').val(data.bersih);
               $('#jumlah_uang').val(jumlah_uang);
               $('#jumlah_uang_awal').val(jumlah_uang);
               $('#transferan').val(data.transferan);
               $('#transferan_awal').val(data.transferan);
               $('#modal_editPembelian').modal('show');
          }  
     });
  }

  function showJumlahUang() {
        var harga = $('#harga_pembeli').val()
        var jumlah = $('#bersih').val()
        var jumlah_uang = harga * jumlah

        $('#jumlah_uang').val(jumlah_uang)
  }

  function updatePembelian() {
      var id_pembeli = $('#id_pembeli').val()
      var id_transaksi = $('#id_transaksi').val()
      var tanggal = $('#tanggal').val()
      var colly = $('#colly').val()
      var bersih = $('#bersih').val()
      var harga = $('#harga_pembeli').val()
      var saldo_pembeli = $('#saldo_pembeli').val()
      var saldo_trans = $('#saldo_trans').val()
      var jumlah_uang = $('#jumlah_uang').val()
      var jumlah_uang_awal = $('#jumlah_uang_awal').val()
      var transferan = $('#transferan').val()
      var transferan_awal = $('#transferan_awal').val()

      $.ajax({
        url:"<?php echo base_url();?>Riwayat/updatePembelian",  
        type:"POST",  
        data:{
          id_pembeli: id_pembeli,
          id_transaksi: id_transaksi,
          tanggal: tanggal,
          colly: colly,
          bersih: bersih,
          harga: harga,
          saldo_pembeli: saldo_pembeli,
          saldo_trans: saldo_trans,
          jumlah_uang_awal: jumlah_uang_awal,
          transferan: transferan,
          transferan_awal: transferan_awal},    
        success:function(data){
          $('#modal_editPembelian').modal('hide');
          $.notify('Berhasil mengubah data',
          {
            className: 'success',
            position: 'top right'
          });
          reload_table();
        }
      })
  }

  function deleteTransaksi(deleteid)
  {
    if(confirm('Apakah Anda yakin menghapus transaksi?'))
      {
        // AJAX Request
        $.ajax({
          url: '<?php echo base_url();?>Riwayat/delete_transpemborong',
          type: 'POST',
          data: { id:deleteid },
          success: function(response){
            $('#modal_editPembelian').modal('hide');
            $.notify('Berhasil menghapus data',
            {
              className: 'warning',
              position: 'top right'
            });
            reload_table();
          },
          error: function(){
            alert('Gagal menghapus');
          }
        });
      }
  }

</script>
</body>
</html>

