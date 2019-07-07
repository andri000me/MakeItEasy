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
              <li class="active"><a href="#tab_cabai" data-toggle="tab"><i class="fa fa-dollar text-red"></i> Atur Harga Cabai</a></li>
              <li><a href="#tab_bon" data-toggle="tab"><i class="fa fa-gears text-yellow"></i> Atur Jenis Cabai</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_cabai">
                <!-- row -->
                <div class="row">

                  <div class="col-md-10 col-sm-12">

                   <!-- Add Harga cabe -->                                   
                   <div class="box box-solid" style="border: 2px solid #39cccc">
                      <div class="box-header bg-teal" >
                        <h3 class="box-title">Tambahkan Harga Cabai</h3><span class="fa fa-male fa-3x pull-right">  Petani</span>
                      </div>

                      <form id="formHargaCabai">
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
                                <input type="text" class="form-control pull-right input-tanggal" placeholder="klik untuk memilih tanggal" name="tanggal" required="">
                                <input hidden="" type="text" id="counter" name="counter" value=1>
                              </div>
                              <!-- /.input group -->
                            </div>
                          </div>
                          <!-- /.Tanggal -->
                          
                          <div class="box-body table-responsive">
                          <table class="table table-striped" style="font-size: 15px">
                            <thead>
                              <tr class="bg-success">
                                <th style="text-align: center; line-height: 50px" rowspan="2">Jenis Cabai</th>
                                <th style="text-align: center;" colspan="2">Harga</th>
                                <th style="text-align: center;" rowspan="2">Action</th>
                              </tr>
                              <tr class="bg-success">
                                <th class="text-center">BS/ MTL </th>
                                <th class="text-center">Bersih </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr id="field1">
                                <td><?php
                                    $dd_cabai_attribute = 'id="cabai" class="form-control select2" style="width:100%" required';
                                    echo form_dropdown('cabai[]', $dd_cabai, $cabai_selected, $dd_cabai_attribute);
                                  ?></td>
                                <td><input type="text" name="harga_bs[]" class="form-control" required></td>
                                <td id="bersih1"><input type="text" name="harga_bersih[]" class="form-control" required></td>
                                <td>
                                  <button id="add1" onclick="addField()" class="btn btn-info add-more" type="button" style="">+</button>
                                  <button id="remove1" class="btn btn-danger remove-me" type="button" style="display: none;">-</button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix" style="border: 1px solid #f0f0f0;">
                          <button type="submit" class="btn btn-flat btn-block bg-teal-gradient" id="submitHargaCabai">
                            <i class="fa fa-plus"></i> Tambahkan Harga </button>
                        </div>
                      </form>
                      <!-- /.box-footer -->
                    </div>
                    <!-- END Add Harga Cabe -->

                  </div>
                  <!-- /.col 4 -->

                  <!-- tabel -->
                </div>
                <!-- /.row -->

                <!-- row -->
                <div class="row">

                  <!-- tabel -->
                  <div class="col-md-6 col-sm-12">
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

                  <div class="col-md-12 col-sm-12">
                    <div class="box bg-solid" style="border: 2px solid #d9edf7;">
                      <div class="box-header">
                        <h3 class="box-title">Daftar Jenis Cabai</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive">
                        <table class="table" style="margin-bottom: 10px">
                          <form id="formJenisCabai">
                              <td>#</td>
                              <td><input class="form-control" type="text" placeholder="Kode Cabai" name="kode_cabai" required=""></td>
                              <td><input class="form-control" type="text" placeholder="Jenis Cabai" name="jenis_cabai" required=""> </td>
                              <td>
                                <button type="submit" class="btn btn-primary" id="tambahCabai"><i class="fa fa-plus"></i> Tambahkan </button>
                              </td>
                            </tr>
                          </form>
                        </table>

                        <table id="tabel_bon" class="table table-bordered table-striped" style="font-size: 15px">
                          <thead>
                            <tr class="bg-info">
                              <th style="text-align: center; line-height: 50px">No</th>
                              <th style="text-align: center; line-height: 50px">Kode Cabai</th>
                              <th style="text-align: center; line-height: 50px">Jenis Cabai</th>
                              <th style="text-align: center; line-height: 50px">Edit</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php 
                                $no=1; foreach ($tb_cabai as $tb) {
                                  echo '<tr>
                                    <td>'.$no.'</td>
                                    <td>'.$tb->kode.'</td>
                                    <td>'.$tb->jenis.'</td>
                                    <td>
                                      <button class="btn btn-sm btn-info edit_jenis" data-toggle="modal" data-target="#editJenis" id="'.$tb->kode.'"><i class="fa fa-edit"></i> Edit </button>
                                    </td>
                                  </tr>';

                                  $no++;
                                }
                            ?>
                          </tbody>
                        </table>


                      <!-- modal edit -->
                        <div class="modal fade" id="editJenis">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Jenis Cabai</h4>
                              </div>
                              <div class="modal-body">

                                <div class="row" style="padding-bottom: 5px">
                                  <div class="col-md-4">
                                   <label>Kode Cabai :</label>
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" name="kode_cabai" class="form-control" id="kode_cabai" disabled>
                                    
                                  </div>
                                </div>

                                <div class="row" style="padding-bottom: 5px">
                                  <div class="col-md-4">
                                   <label>Jenis :</label>
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" name="jenis" class="form-control" id="jenis">
                                  </div>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn pull-left btn-danger" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info" id="TombolSimpanCabai">Simpan</button>
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
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js""></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
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
  $(document).ready(function(){
    $('.DataTable').DataTable()

    $('.select2').select2()

    $('.input-tanggal').datepicker({
      format : 'yyyy-mm-dd',
      todayHighlight : 'true'
    });

    $('#formHargaCabai').on('submit', function(e) {

      console.log($('#formHargaCabai').serializeArray());
      $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>Cabai/submitHargaPetani',
            data: $('#formHargaCabai').serializeArray(),
            success: function (response) {
              if (!alert(response)) {window.location.reload();}
            },
            error: function() {
              alert('Mohon Maaf, ada sedikit error, mohon ulangi');
            }
          });
      e.preventDefault();
    });

    $('#formJenisCabai').on('submit', function(e) {
      $.ajax({
            type: 'POST',
            url: '<?php echo base_url();?>Cabai/tambahCabai',
            data: $('#formJenisCabai').serialize(),
            success: function (response) {
              if (!alert('berhasil ditambahkan')) {window.location.reload();}
            },
            error: function() {
              alert('Mohon Maaf, kode cabai sudah terpakai');
            }
          });
      e.preventDefault();
    })

    $('.edit_jenis').click(function(){
           var id_cabai = this.id;
           editJenis(id_cabai);
      });

    $('#TombolSimpanCabai').click(function(){
        updateCabai();
    })



  });

  <?php $counter = 1; ?>
  var next = 1;
  function addField(e)    {
        <?php
          $counter = $counter + 1;
          $dd_cabai_attribute = 'id="cabai" class="form-control select2" style="width:100%" required';

          $dropdown = form_dropdown('cabai[]', $dd_cabai, $cabai_selected, $dd_cabai_attribute);
        ?>

        var dropdown = <?php echo json_encode($dropdown); ?>;

        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<tr id="field' + next +'"><td>' + dropdown +'</td><td><input type="text" name="harga_bs[]" class="form-control" required></td><td class="bersih'+ next +'"><input type="text" name="harga_bersih[]" class="form-control" required></td><td><button id="add'+ next +'" onclick="addField()" class="btn btn-info add-more" type="button" style="">+</button><button id="remove' + next + '" class="btn btn-danger remove-me" style="display: none;">-</button></td></tr></tr>';
        var newInput = $(newIn);
        var removeBtn = '<td><button id="remove' + (next-1) + '" class="btn btn-danger remove-me">-</button></td></tr>';
        var removeButton = $(removeBtn);
        $('#counter').val(next);
        $(addto).after(newInput);
        $('#add'+ (next-1) +'').attr('style', "display: none");
        $('#remove'+ (next-1) +'').attr('style', "display: inline");

         $('.select2').select2()
        
        $('.remove-me').click(function(e){
            e.preventDefault();
            
            var fieldNum = this.id.charAt(this.id.length-1);
            var fieldID = "#field" + fieldNum;
            //$(this).remove();
            $(fieldID).remove();
        });
  };

  function editJenis(id)  {
    $.ajax({  
      url:"<?php echo base_url();?>Cabai/get_jenis",  
      method:"POST",  
      data:{id:id},  
      dataType:"json",  
      success:function(data){
        $('#kode_cabai').val(data.kode);
        $('#jenis').val(data.jenis);
      },
      error: function(){
        alert('error');
      }
    });
  }

  function updateCabai()  {
    var kode_cabai = $('#kode_cabai').val();
    var jenis = $('#jenis').val();

    $.ajax({
      url:"<?php echo base_url();?>Cabai/update_jenis",
      method:"POST",
      data:{
        kode: kode_cabai,
        jenis: jenis
      },
      dataType: "json",
      success: function(){
        if (!alert('data berhasil diubah')){location.reload(true)}
      }
    })
  }

</script>

</body>
</html>
