
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Transaksi Petani
        <small>_</small>Setoran
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
                        <h4> Petani_Setoran</h4>
                        <p>Lihat riwayat setoran cabai dari petani mitra</p>
                      </div>
                    </div>
                  </div>
                </div>

                <form action="<?php echo base_url();?>Riwayat/RiwayatPetani" method="post">
                  <div class="form-group col-md-3">
                    <label>Tanggal Mulai :</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control input-tanggal" name="start" id="start" required value="<?php echo $startdate ?>">
                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <label>Tanggal Selesai :</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control input-tanggal" name="end" id="end" required value="<?php echo $enddate ?>">
                    </div>
                  </div>

                  <div class="col-md-2">
                      <input type="submit" class="btn btn-info" value="Cek Transaksi" style="margin-top: 25px">
                  </div>
                </form>
              </div>

              <div id="successful_edit">
              
              </div>


              <!-- /.form group -->
              <div class="row">
                <div class="col-md-12 table-responsive">
                  <hr>
                  <table id="example2" class="table table-bordered table-striped datatables">
                    <thead>
                  <tr class="bg-gray">
                    <th style="text-align: center; line-height: 50px" rowspan="2">#</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Tanggal </th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">ID</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Nama</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Asal Daerah</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Kode Cabai</th>
                    <th style="text-align: center;" colspan="4">Berat</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Harga</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Jumlah Uang</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Saldo</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Aksi</th>
                  </tr>
                  <tr class="bg-gray">
                    <th>Kotor </th>
                    <th>BS/ MTL </th>
                    <th>Susut </th>
                    <th>Bersih </th>
                  </tr>
                </thead>
                  <tbody>
                    <?php
                      if (!empty($riwayat_transpetani)) {
                        $no=1; foreach ($riwayat_transpetani as $key) {
                            $berat_bersih = $key->berat_kotor-$key->berat_bs-$key->berat_susut;
                            $jumlah_uang = ($key->berat_kotor-$key->berat_bs)*$key->harga_bersih + $key->berat_bs*$key->harga_bs;

                            echo "<tr><td>".$no."</td><td>".$key->tanggal."</td><td>".$key->id_petani."</td><td>".$key->nama."</td><td>".$key->desa."</td><td>".$key->kode_cabai."</td><td id='berat_kotor_".$key->id."'>".number_format($key->berat_kotor,1)."</td><td id='berat_bs_".$key->id."'>".number_format($key->berat_bs,1)."</td><td id='berat_susut_".$key->id."'>".number_format($key->berat_susut,1)."</td><td>".$berat_bersih."</td><td id='berat_bersih_".$key->id."'>Rp".number_format($key->harga_bersih,0,',','.')."</td><td id='jumlah_uang_".$key->id."'>Rp".number_format($jumlah_uang,0,',','.')."</td><td id='saldo_".$key->id."'>Rp".number_format($key->saldo,0,',','.')."</td><td><button id='".$key->id."' class='btn btn-info btn-xs edit_data' data-toggle='modal' data-target='#editSetoran'>edit</button> <button id='del_".$key->id."' class='delete btn btn-danger btn-xs'>Hapus</button></td></tr>";
                          
                            $no++;
                        }
                      }
                      else {
                            echo "<tr><td colspan='12' class='text-center'> Tidak ada data yang ditampilkan </td></tr>";
                      }

                    ?>
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


  <!-- Modal Edit Setoran-->
    <div id="editSetoran" class="modal fade" role="dialog">
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
            <input type="text" name="tanggal" class="form-control input-tanggal" id="tanggal" required readonly>
            <input type="hidden" name="id_transaksi" id="id_transaksi">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Nama Petani :</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="nama_petani" id="nama_petani" class="form-control" style="width: : 100%" readonly required>
            <input type="text" hidden="" name="id_petani" id="id_petani">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Saldo Awal :</label>
          </div>
          <div class="col-md-8">
           <input type="text" name="saldo_trans" readonly="" id="saldo_trans" class="form-control">
           <input type="text" name="saldo_petani" readonly="" id="saldo_petani" hidden="">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
           <label>Kode :</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="cabai" id="cabai" class="form-control" style="width: 100%" readonly required>
            <!-- <select name="cabai" id="cabai" class="form-control" style="width: 100%">
              <option value="" selected>Pilih Jenis Cabai</option>
              <?php
                  //foreach ($dd_cabai as $key) {
                    //echo "<option value=".$key->kode.">".$key->jenis." (".$key->kode.") </option>";
                 // };
              ?>
            </select> -->
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Harga :</label>
          </div>
          <div class="col-md-3">
           <input type="text" name="harga_petani" readonly="" id="harga_bersih" class="form-control">
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
           <input type="text" name="jumlah_uang_awal" id="jumlah_uang_awal" hidden>
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
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js""></script>
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
     $('.input-tanggal').datepicker({
      format : 'yyyy-mm-dd',
      todayHighlight : 'true'
    });

     $('.datatables').DataTable();

     //dropdown jenis cabai
      $(".select2").select2({
          placeholder: "Please Select"
      });


     $('.delete').click(function(){
      var el = this;
      var id = this.id;
      console.log(id);
      var splitid = id.split("_");

      // Delete id
      var deleteid = splitid[1];
 
        if(confirm('Apakah Anda yakin menghapus transaksi?'))
        {
          // AJAX Request
          $.ajax({
            url: '<?php echo base_url();?>Riwayat/delete_transpetani',
            type: 'POST',
            data: { id:deleteid },
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
           var id_transaksi = this.id;
           editSetoran(id_transaksi);
      });

      //Menghitung Berat Bersih dan Jumlah Uang
      $('#berat_kotor').on('change', function()  {
        showJumlahUang();
      }); 
      $('#berat_susut').on('change', function()  {
          showJumlahUang();
      }); 

      $('#berat_bs').on('change', function()  {
        showJumlahUang();
      });

      $('#btn_update').click(function(){
        updateSetoran();
      }); 

  });

  function editSetoran(id_trans)  {
           $.ajax({  
                url:"<?php echo base_url();?>Riwayat/edit_transpetani",  
                method:"POST",  
                data:{id_transaksi:id_trans},  
                dataType:"json",  
                success:function(data){
                    var berat_bersih = data.berat_kotor - data.berat_bs - data.berat_susut;
                    var jumlah_uang = berat_bersih * data.harga_bersih + data.berat_bs * data.harga_bs;
                    //var opt= document.getElementById('cabai').options[0];

                     $('#id_transaksi').val(data.id);
                     $('#tanggal').val(data.tanggal);  
                     $('#nama_petani').val('[' + data.id_petani + '] ' + data.nama + ' (' + data.desa + ')');
                     $('#saldo_trans').val(data.saldo_trans);
                     $('#saldo_petani').val(data.saldo_petani);
                     $('#cabai').val(data.kode_cabai + ' (' + data.jenis + ')');
                     //$('#cabai_selected').attr('value', data.kode_cabai)  
                     //document.getElementById("cabai_selected").innerHTML = "<option value='ER' selected>Mecoba</option>";
                     // opt.value = 'ER';
                     // opt.text = 'berhasil';
                     // document.getElementById("cabai").selectedIndex = "0";
                     $('#harga_bersih').val(data.harga_bersih);
                     $('#harga_bs').val(data.harga_bs);   
                     $('#berat_kotor').val(data.berat_kotor);
                     $('#berat_bs').val(data.berat_bs);
                     $('#berat_bersih').val(berat_bersih);
                     $('#berat_susut').val(data.berat_susut);
                     $('#jumlah_uang').val(jumlah_uang);
                     $('#jumlah_uang_awal').val(jumlah_uang);
                }  
           });
  }

  function showJumlahUang() {
      var harga_bersih = $('#harga_bersih').val()
      var harga_bs = $('#harga_bs').val()
      var kotor = $('#berat_kotor').val()
      var bs = $('#berat_bs').val()
      var susut = $('#berat_susut').val()
      var bersih = kotor - bs - susut

      var jumlah_uang = (bersih * harga_bersih) + (bs * harga_bs)

      $('#berat_bersih').val(bersih)
      $('#jumlah_uang').val(jumlah_uang)
  }

  function updateSetoran() {
      var id_petani = $('#id_petani').val()
      var id_transaksi = $('#id_transaksi').val()
      var berat_kotor = $('#berat_kotor').val()
      var berat_bs = $('#berat_bs').val()
      var berat_susut = $('#berat_susut').val()
      var saldo_trans = $('#saldo_trans').val()
      var saldo_petani = $('#saldo_petani').val()
      var jumlah_uang = $('#jumlah_uang').val()
      var jumlah_uang_awal = $('#jumlah_uang_awal').val()

      var new_saldo = saldo - jumlah_uang_awal + jumlah_uang;

      $.ajax({
        url:"<?php echo base_url();?>Riwayat/updateSetoran",  
        type:"POST",  
        data:{
          id_petani: id_petani,
          id_transaksi: id_transaksi,
          berat_kotor: berat_kotor,
          berat_bs: berat_bs,
          berat_susut: berat_susut,
          saldo_trans: saldo_trans,
          saldo_petani: saldo_petani,
          jumlah_uang: jumlah_uang,
          jumlah_uang_awal: jumlah_uang_awal},    
        success:function(data){
          location.reload(true);
          $('#successful_edit').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Berhasil!</strong>  Setoran Petani berhasil diperbarui</div>');
        }
      })
  }

  
</script>
</body>
</html>
