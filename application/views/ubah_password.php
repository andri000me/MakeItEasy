<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Make It Easy</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/AdminLTE.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../dashboard_mie.html"><b>Make It </b>Easy</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h4 class="login-box-msg">
      <span class="glyphicon glyphicon-lock"></span>
    Ubah Password</h4>

    <form action="<?php echo base_url();?>Login/update_password" method="post">
      <p id="error_oldpass" class="text-red"></p>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="old_password" placeholder="Password Lama" name="old_password" required>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="new_password" placeholder="Password Baru" name="new_password" required>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="conf_password" placeholder="Ulang Password Baru" name="conf_password">
      </div>
      <p id="error_confPass" class="text-red"></p>
      <div class="row">
        <div class="col-xs-6 pull-right">
          <button type="submit" id="submit_pass" class="btn btn-primary btn-block btn-flat">Ganti Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(document).ready(function(){
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

    $('#old_password').change(function(){
        var old_password = $('#old_password').val();

        $.ajax({
          url:"<?php echo base_url();?>Login/check_password",
          method:"POST",
          dataType: "json",
          data:{old_password: old_password},
          success: function(data){
            $('#submit_pass').prop('disabled', data);
            if (data == true) {
              $('#error_oldpass').html('Password lama tidak sesuai');
            } else {
              $('#error_oldpass').html('');
            }
            
          },
          error: function(){
            alert('Error');
          }
        })

    });

    $('#conf_password').change(function(){
      var newPass = $('#new_password').val();
      var conf = $('#conf_password').val();

      if (newPass == conf) {
        document.getElementById('submit_pass').disabled = false;
        $('#error_confPass').html('');
      } else{
        document.getElementById('submit_pass').disabled = true;
        $('#error_confPass').html('Konfirmasi password tidak sesuai');
      }
    });

  });

</script>
</body>
</html>
