<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Make It Easy</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url();?>assets/img/logomie.png">
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
<body class="hold-transition lockscreen" style="height:500px!important">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>Make It</b>Easy</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">UD. Yumi Putra</div>

  <!-- START LOCK SCREEN ITEM -->
    <!-- lockscreen image -->
    <div style="position:relative; margin: 10px auto 30px auto; width:290px">
    <div class="lockscreen-image" >
      <img src="<?php echo base_url();?>assets/img/logomie.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" action="<?php echo base_url()?>Login/Auth" style="margin-left: 50px!important">
    <div style="background: #fff; padding-left: 20px">
      <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="password" required>
        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </div>
      <b class="text-red" style="padding-left: 30px"><?php echo $this->session->flashdata('msg') ?></b>
    </form>
    <!-- /.lockscreen credentials -->
    </div> 
    <!-- div style -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Masukkan password untuk masuk ke dalam aplikasi
  </div>
  <div class="text-center">
    <!-- <a href="login.html">Or sign in as a different user</a> -->
  </div>
  <div class="lockscreen-footer text-center" style="margin-top: 80px" >
    Copyright &copy; 2018 <b><a href="https://adminlte.io" class="text-black">Make It Easy Team</a></b><br>
    Yogyakarta
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
