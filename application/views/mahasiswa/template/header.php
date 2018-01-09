<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ujian Online</title>
    <link href="<?php echo base_url(); ?>assets/assets-user/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets-user/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets-user/css/font-awesome-animation.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets-user/css/prettyPhoto.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/assets-user/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.0.2/jquery.countdown.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweetalert-master/dist/sweetalert.css">

    <script src="<?php echo base_url();?>assets/js/jquery-2.2.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets-user/plugins/jquery-1.10.2.js"></script>

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
                <a class="navbar-brand" href="#">Welcome, <?php echo $this->session->userdata("nama"); ?></a>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url('login/logout') ?>">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div>