<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Ujian Online Tingkat Sarjana</title>
    <!--REQUIRED STYLE SHEETS-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="<?php echo base_url(); ?>assets/assets-user/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets-user/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets-user/css/font-awesome-animation.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets-user/css/prettyPhoto.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets-user/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.0.2/jquery.countdown.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweetalert-master/dist/sweetalert.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/jquery-ui.css">
    
    <script src="<?php echo base_url();?>assets/sweetalert-master/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-2.2.2.js"></script>

    <!-- <script src="<?php echo base_url();?>assets/js/jquery-2.2.2.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/assets-user/plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/bower/jquery/dist/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/bower/jquery-ui/jquery-ui.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.0.2/jquery.plugin.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.0.2/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.0.2/jquery.countdown-id.min.js"></script>
    
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo(base_url('mahasiswa/user')); ?>" style="padding-top: 0px;">
                    <img src="<?php echo base_url(); ?>assets/assets-user/img/logo-untag.png" alt="Good News from Indonesia" style="height: 50px;">
                </a>
                <a class="navbar-brand" href="<?php echo(base_url('mahasiswa/user')); ?>">UOTS</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="#port-sec">Daftar Menu</a></li> -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->session->userdata("nama"); ?><span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li><a href="#" data-toggle="modal" data-target=".edit_biodata">Edit Biodata</a></li>
                            <li><a href="<?php echo base_url('login/logout') ?>">Log out</a></li>
                        </ul>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>
    