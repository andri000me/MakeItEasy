<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Make It Easy</title>
  <!-- Favicon (ini diganti gambar yang sesuai-->
  <link rel="icon" href="<?php echo base_url();?>assets/img/logomie.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> 
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/AdminLTE.min.css">
   <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/inpo-box.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/skins/_all-skins.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!---------------- NOTED ------------------>

</head>
<body>

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
                                <td><input type="text" name="harga_bs[]" class="form-control"></td>
                                <td id="bersih1"><input type="text" name="harga_bersih[]" class="form-control"></td>
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
            url: '<?php echo base_url();?>Serial/submitSerial',
            data: $('#formHargaCabai').serializeArray(),
            success: function (response) {
              alert(response) 
              //{location.reload(true)}
            },
            error: function() {
              alert('Mohon Maaf, ada sedikit error, mohon ulangi');
            }
          });
      e.preventDefault();
    });

    $('.edit_jenis').click(function(){
           var id_cabai = this.id;
           editJenis(id_cabai);
      });

    $('#TombolSimpanCabai').click(function(){
        updateCabai();
    });

  })

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

</script>
</body>
</html>