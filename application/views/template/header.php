<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="<?php echo base_url(); ?>assets/assets/images/logo.png">
	<title>Ujian Online</title>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
	<!-- build:css ../assets/css/app.min.css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/bower/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/core.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/app.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/jquery-ui.css">

  <link href="<?php echo base_url(); ?>assets/datatable/dt/dataTables.bootstrap.css" rel="stylesheet" />
  
  <!-- <script src="<?php echo base_url(); ?>assets/ckeditor/samples/js/sample.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ckeditor/samples/css/samples.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
 -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/libs/misc/datatables/datatables.min.css"> -->
  <!-- endbuild -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">

  <!-- sweetalert -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweetalert-master/dist/sweetalert.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatable/datatables.css"/> -->
  
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatable/dt/dataTables.bootstrap.css"> -->

  <script src="<?php echo base_url();?>assets/sweetalert-master/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-2.2.2.js"></script>
  <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>


  <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatable/datatables.js"></script> -->
<!--   <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatable/dt/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatable/dt/dataTables.bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatable/dt/jquery-1.11.1.min.js"></script>
 -->
  <script src="<?php echo base_url(); ?>assets/libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

<!-- APP NAVBAR ==========-->
<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
  
  <!-- navbar header -->
  <div class="navbar-header">
    <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-box"><span class="hamburger-inner"></span></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-more"></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-search"></span>
    </button>

    <a href="../index.html" class="navbar-brand">
      <!-- <span class="brand-icon"><i class="fa fa-coffee"></i></span> -->
      <span class="brand-icon"><i class="fa fa-gg"></i></span>
      <span class="brand-name">El-fath App</span>
    </a>
  </div><!-- .navbar-header -->
  
  <div class="navbar-container container-fluid">
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
        <li class="hidden-float hidden-menubar-top">
          <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
          </a>
        </li>
        <li>
          <h5 class="page-title hidden-menubar-top hidden-float">
          <?php if($this->session->userdata('id_admin')){ ?>
            Halaman Admin
          <?php }else{ ?>
            Halaman Dosen
          <?php } ?>
          </h5>
        </li>
      </ul>

      <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">

        <li class="dropdown">
          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-settings"></i></a>
          <ul class="dropdown-menu animated flipInY">
            <!-- <li><a href="javascript:void(0)"><i class="zmdi m-r-md zmdi-hc-lg zmdi-account-box"></i>My Profile</a></li> -->
            <li><a href="<?php echo base_url('login/logout'); ?>"><i class="zmdi m-r-md zmdi-hc-lg zmdi-balance-wallet"></i>Log Out</a></li>
            <!-- <li><a href="javascript:void(0)"><i class="zmdi m-r-md zmdi-hc-lg zmdi-phone-msg"></i>Connection<span class="label label-primary">3</span></a></li> -->
            <!-- <li><a href="javascript:void(0)"><i class="zmdi m-r-md zmdi-hc-lg zmdi-info"></i>privacy</a></li> -->
          </ul>
        </li>

      </ul>
    </div>
  </div><!-- navbar-container -->
</nav>
<!--========== END app navbar -->

<!-- APP ASIDE ==========-->
<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)">
          <!-- <img class="img-responsive" src="<?php echo base_url(); ?>assets/assets/images/221.jpg" alt="avatar"/> -->
          <img style="width: 125px;" class="img-responsive" alt="avatar" src="<?php echo base_url(); ?>/gambar/dosen/<?php echo $this->session->userdata("nama")?>/<?php echo $this->session->userdata("foto")?>">
          </a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <h5><a href="javascript:void(0)" class="username">Hello <?php echo $this->session->userdata("nama"); ?></a></h5>
          <ul>
            <li class="dropdown">
                <small>Welcome</small>
              </a>
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
        <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Data</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
          <?php if($this->session->userdata('id_admin')){ ?>
            <li><a href="<?php echo base_url('fakultas'); ?>"><span class="menu-text">Fakultas</span></a></li>
            <li><a href="<?php echo base_url('jurusan'); ?>"><span class="menu-text">Jurusan</span></a></li>
            <li><a href="<?php echo base_url('dosen'); ?>"><span class="menu-text">Dosen</span></a></li>
            <li><a href="<?php echo base_url('mahasiswa'); ?>"><span class="menu-text">Mahasiswa</span></a></li>
            <li><a href="<?php echo base_url('jujian'); ?>"><span class="menu-text">Jenis Ujian</span></a></li>
          <?php } ?>
          <?php if($this->session->userdata('id_dosen')){ ?>
            <li><a href="<?php echo base_url('matkul'); ?>"><span class="menu-text">Mata Kuliah</span></a></li>
            <!-- <li><a href="<?php echo base_url('bab'); ?>"><span class="menu-text">Materi</span></a></li> -->
          <?php } ?>
          </ul>
        </li>

      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>
<!--========== END app aside -->

<!-- navbar search -->
<div id="navbar-search" class="navbar-search collapse">
  <div class="navbar-search-inner">
    <form action="#">
      <span class="search-icon"><i class="fa fa-search"></i></span>
      <input class="search-field" type="search" placeholder="search..."/>
    </form>
    <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <i class="fa fa-close"></i>
    </button>
  </div>
  <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
</div><!-- .navbar-search -->

<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">