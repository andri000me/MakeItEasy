  <style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#setoranForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 5px;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Petani
        <small>_</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Transaksi Harian</a></li>
        <li class="active">Transaksi Petani</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
    <!-- Harga cabe -->
      <div class="col-md-5">
        <div class="box box-solid">
          <div class="box-header with-border">
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
                  <?php $no=1; foreach ($harga_today as $tb): ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $tb->kode ?></td>
                      <td><?= $tb->jenis ?></td>
                      <td><?= $tb->harga_bs ?></td>
                      <td><?= $tb->harga_bersih ?></td>
                    </tr>
                  <?php $no++; endforeach ?>
                </tbody>
              </table>
          </div>
          <div class="box-footer clearfix">
            <button type="button" class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#editHarga">
              <i class="fa fa-edit"></i> Edit Harga </button>
          </div>
                <!-- /.box-body -->
        </div>
      </div>
    <!-- END Harga Cabe -->

    <!-- Action Button -->
    <div class="col-md-3">
        <div class="box box-solid">
          <div class="box-header">
            <h3 class="box-title">Masukkan Transaksi</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="text-align: center;">
             <div class="btn-group-vertical">
                <button type="button" class="btn btn-block btn-setor-ver bg-green" data-toggle="modal" data-target="#inputSetoran"> <i class="fa fa-plus"></i> Inputkan Setoran</button>
                <button type="button" class="btn btn-block btn-setor-ver bg-yellow" data-toggle="modal" data-target="#addPetani"> <i class="fa fa-user-plus"></i> Tambah petani</button>
            </div>
          </div>
          <div class="box-footer clearfix">
            <h5 class="pull-left">
              Jumlah transaksi hari ini
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


<!-- tabel -->
 <div class="row">
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Catatan harian tanggal : <?php echo $today; ?></h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

              <table id="tabel_transaksi" class="table table-bordered table-striped" style="font-size: 15px">
                <thead>
                  <tr class="bg-gray">
                    <th style="text-align: center; line-height: 10px" rowspan="2">#</th>
                    <th style="text-align: center; line-height: 30px" rowspan="2">ID</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Nama</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Asal Daerah</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Kode Cabai</th>
                    <th style="text-align: center;" colspan="3">Berat</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Harga</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Jumlah Uang</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Bon</th>
                    <th style="text-align: center; line-height: 50px" rowspan="2">Saldo</th>
                  </tr>
                  <tr class="bg-gray">
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
                      <td><?= $tb->bon ?></td>
                      <td><?= $tb->saldo ?></td>
                    </tr>
                  <?php $no++; endforeach ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->

    <!-- Modal input Setoran -->
    <div class="modal fade" id="inputSetoran" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
      <form id="setoranForm">
        <h1>Input Setoran</h1>

        <!-- One "tab" for each step in the form: -->
        <div class="tab">
          <h4>Setoran Cabai</h4>

          <label for="tanggal_setor">Tanggal</label>
          <p><input placeholder="Tanggal..." class="input-tanggal required" oninput="this.className = ''" name="tanggal_setor" id="tanggal_setor"></p>

          <label for="nama_setor">Nama</label>
          <p><select type="text" name="nama_setor" class="nama_setor form-control required" id="nama_setor" oninput="this.className = ''" ></select></p>

          <label for="cabai_setor">Jenis Cabai</label>
          <p><?php
                $dd_cabai_attribute = 'id="cabai" class="form-control select2"';
                echo form_dropdown('cabai', $dd_cabai, $cabai_selected, $dd_cabai_attribute);
              ?></p>

          <label for="cabai_setor">Harga</label>
          <p><input oninput="this.className = ''" name="cabai_setor"><input type="text" name="cobacoba" id="cobacoba"></p>

          <label for="berat_kotor">Berat Kotor</label>
          <input oninput="this.className = ''" name="berat_kotor">
          <label for="berat_bs">Berat BS</label>
          <input oninput="this.className = ''" name="berat_bs">
          <label for="berat_bersih">Berat Bersih</label>
          <input oninput="this.className = ''" name="berat_bersih">
        
        </div>

        <!-- tab 2 -->
        <div class="tab">
          <p class="pull-right" id="nama_petani"></p><br>
          <input type="text" readonly name="saldo_petani" id="saldo_petani">

          <p>Total Uang Cabai ...</p>
          <h4>BON</h4>
          <p><input oninput="this.className = ''" name="uang_bon"></p>
        </div>

        <!-- Buttons -->
        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
          </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
        </div>

      </form>
      </div>
    </div>
    <!-- END Modal Input Setoran -->

    <!-- Modal add Petani -->
    <div class="modal fade" id="#addPEtani">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <h1>Tambahkan Petani Mitra</h1>

            <!-- One "tab" for each step in the form: -->
            <div class="modal-body">
              <h4>Data Petani</h4>

              <label for="ID_setor">ID</label>
              <input type="text" name="ID_setor" readonly="">
              
              <label for="nama_setor">Nama</label>
              <input type="text" name="nama_setor">

              <label for="asal">Asal Daerah</label>
              <input type="text" name="asal">

              <label for="no_HP">No HP</label>
              <input type="text" name="no_HP">

              <label for="photo">Foto </label>
              <input type="file" name="photo">
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-warning"><i class="fa fa-user-plus"></i>Tambahkan Petani</button>
            </div>
            <!-- /.modal-footer -->
        </div>
      </div>
    </div>
    <!-- END Modal add Petani -->
     <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>asaasas body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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
<!-- jQuery-UI -->
<script src="<?php echo base_url().'assets/bower_components/jquery-ui/jquery-ui.js'?>" type="text/javascript"></script>
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
    $('.input-tanggal').datepicker({
      dateFormat : 'yy-mm-dd'
    });
    $('#tabel_transaksi').DataTable();

    //dropdown jenis cabai
    $(".select2").select2({
        placeholder: "Please Select"
    });

    //select2 autocomplete nama petani
    $('#nama_setor').select2({
    placeholder: '--- Select Item ---',
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
            desa: item.desa
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
    $('#nama_setor').on('change', function()  {
            var data = $('#nama_setor').select2('data');
            $("#saldo_petani").val(data[0].saldo);
        });

    //mengambil nilai harga cabai
    $('#cabai').on('change', function() {
        $.ajax({
           url: '<?php echo base_url();?>Transaksi/get_hargaCabai', //This is the current doc
           type: "POST",
           dataType: "json",
           data: {tanggal: $('#tanggal_setor').val(), kode_cabai: $('#cabai').val()  },
           success: function(harga){
               alert(harga.harga_bersih)
           },
           error: function(){
              alert('gagal cuk');
           }
        })
    })

});

  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByClassName("required");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var markup = "<div class='select2-result-repository clearfix'>" +
    "[" + repo.id + "]" +
    "<b> " + repo.text + " </b>" +
    "(" + repo.desa + ")"+
    "</div>";
  return markup;
  }

</script>

</body>
</html>
