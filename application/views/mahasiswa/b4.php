<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nyobak</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/b4/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/b4/navbar-top-fixed.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/b4/ihover.min.css">
  <script src="<?php echo base_url();?>assets/js/jquery-2.2.2.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap/b4/js/bootstrap.js"></script>
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary fixed-top navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">O.U.T.S</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-md-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Welcome, <?php echo $this->session->userdata("nama"); ?> <span class="sr-only">(current)</span></a>
      </li>
    </ul>
      <a class="btn btn-primary" href="<?php echo base_url('login/logout') ?>">Log Out</a>
  </div>
</nav>

<div class="container">
  <div class="jumbotron">
    <h1>Ujian Online</h1>
    <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser's viewport.</p>
    <!-- <a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View navbar docs &raquo;</a> -->
    
    <div class="row">
    <div class="col-md-4 col-sm-4">
    <!-- colored -->
    <div class="ih-item square colored effect4"><a href="#">
        <div class="img"><img src="<?php echo base_url(); ?>assets/img/hover/1.jpg" alt="img"></div>
        <div class="mask1"></div>
        <div class="mask2"></div>
        <div class="info">
          <h3>Heading here</h3>
          <p>Description goes here</p>
        </div></a></div>
    <!-- end colored -->
    </div>

    <div class="col-md-4 col-sm-4">
    <!-- colored -->
    <div class="ih-item square colored effect4"><a href="#">
        <div class="img"><img src="<?php echo base_url(); ?>assets/img/hover/2.jpg" alt="img"></div>
        <div class="mask1"></div>
        <div class="mask2"></div>
        <div class="info">
          <h3>Heading here</h3>
          <p>Description goes here</p>
        </div></a></div>
    <!-- end colored -->
    </div>
     <div class="col-md-4 col-sm-4">
    <!-- colored -->
    <div class="ih-item square colored effect4"><a href="#">
        <div class="img"><img src="<?php echo base_url(); ?>assets/img/hover/3.jpg" alt="img"></div>
        <div class="mask1"></div>
        <div class="mask2"></div>
        <div class="info">
          <h3>Heading here</h3>
          <p>Description goes here</p>
        </div></a></div>
    <!-- end colored -->
    </div>
    </div>

  </div>
</div>
  
</body>
</html>