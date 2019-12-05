<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Import Data Petani dari Excel
      <small>_</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Daftar data</a></li>
      <li >Petani</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <!-- /.col -->
      <div class="col-md-12">
        <div class="box" style="border: 2px solid #dff0d8;">
          <div class="box-header">
            <h3 class="box-title">Masukkan Data Petani melalui Excel </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <form method="post" action="" enctype="multipart/form-data">
                  <a href="<?php echo base_url();?>/assets/FormatImportPetani.xlsx" class="btn btn-app">
                    <span class="fa fa-download"></span>
                    Download Template File Excel
                  </a><br><br>
                </form>
              </div>
              <div class="col-md-6">
                Upload file excel 
                <form method="post" id="import_form" enctype="multipart/form-data" >
                  <p> <label> Pilih File: </label>
                    <input name="file" type="file" id="file" required accept=".xls, .xlsx" /> 
                  </p>
                    <input name="import" type="submit" value="Import" class="btn btn-info"/>
                </form>
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

    <!-- Main content -->
    <div class="row">

      <div class="col-md-12">
        <div class="box" style="border: 2px solid #dff0d8;">
          <div class="box-header">
            <h3 class="box-title">Daftar petani </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive" id="example1">
            <!-- <h3 align="center"><?php //echo $jumlah_petani; ?> </h3> -->
            <!-- <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr class="bg-success">
                  <th style="text-align: center; line-height: 50px">#</th>
                  <th style="text-align: center; line-height: 50px">ID</th>
                  <th style="text-align: center; line-height: 50px">Nama Lengkap</th>
                  <th style="text-align: center; line-height: 50px">Nama Panggil</th>
                  <th style="text-align: center; line-height: 50px">Status</th>
                  <th style="text-align: center; line-height: 50px">Asal Daerah</th>
                  <th style="text-align: center; line-height: 50px">No Telp/HP</th>
                  <th style="text-align: center; line-height: 50px">Saldo</th>
                  <th style="text-align: center; line-height: 50px">Hutang </th>
                  <th style="text-align: center; line-height: 50px">Jaminan </th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table> -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
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
  </footer>>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
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
    
    load_data();

    function load_data()
    {
        $.ajax({
          url:"<?php echo base_url(); ?>Excel_import/fetch",
          method:"POST",
          success:function(data){
            $('#example1').html(data);
          }
        })
    }

    $('#import_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
        url:"<?php echo base_url(); ?>Excel_import/import",
        method :"POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
          $('#file').val('');
          load_data();
          alert(data);
        }
      })
    });

});

</script>

</body>
</html>

