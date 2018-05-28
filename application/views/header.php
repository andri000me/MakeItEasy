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
  <!-- jQuery UI -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/jquery-ui/themes/base/jquery-ui.css'?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> 
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/select2/dist/css/select2.min.css">

  <!-- NOTED Kerjaan Ipeh -> bisa dipilih yang bener2 dipake yang mana, biar gak berat, terus buat datepicker pake jquery-ui saja --> 
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
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index2.html" class="logo">
      <span class="logo-lg"><b>MakeIt</b> Easy</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>/assets/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">ADMIN</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>/assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  Admin
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>/assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>

        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Input Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Transaksi/transpetani"><i class="fa fa-male"></i> Petani</a></li>
            <li><a href="<?php echo base_url();?>Transaksi/transborong"><i class="fa fa-cart-plus"></i> Buyer</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Riwayat Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Riwayat/riwayatpetani"><i class="fa fa-male"></i> Petani</a></li>
            <li><a href="<?php echo base_url();?>Riwayat/riwayatpemborong"><i class="fa fa-cart-plus"></i> Pelanggan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Cabai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Transaksi/transpetani"><i class="fa fa-male"></i>Harga Cabai</a></li>
            <li><a href="<?php echo base_url();?>Transaksi/transborong"><i class="fa fa-cart-plus"></i> Jenis Cabai</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Barang Modal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Transaksi/transpetani"><i class="fa fa-male"></i>Atur Jenis Barang</a></li>
            <li><a href="<?php echo base_url();?>Transaksi/transborong"><i class="fa fa-cart-plus"></i> Atur Harga Barang</a></li>
          </ul>
        </li>
     
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Data Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Transaksi/transpetani"><i class="fa fa-male"></i> Petani</a></li>
            <li><a href="<?php echo base_url();?>Transaksi/transborong"><i class="fa fa-cart-plus"></i> Pelanggan</a></li>
          </ul>
        </li>

        <li>
          <a href="../dashboard_mie.html">
            <i class="fa fa-dashboard"></i> <span>Perusahaan Yumi Putra</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="../dashboard_mie.html">
            <i class="fa fa-dashboard"></i> <span>Neraca Dagang</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
