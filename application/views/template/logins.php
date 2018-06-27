<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600|Lato:700,900,400|Raleway' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/bower/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/misc/owl-carousel/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/bower/animate.css/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/landing-page.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweetalert-master/dist/sweetalert.css">

  <title>Ujian Online S1</title>
</head>
<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="60">
<div class="modal fade" id="modal_dosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 align="center">Login Sebagai Dosen</h2>
      </div>
      <form id="login_dsn" action="<?php echo base_url('login/aksi_login_dosen') ?>" method="POST">
      <div class="modal-body">
      <input type="text" class="form-control" required="" placeholder="Username" name="username">
      </div>
      <div class="modal-body">
      <input type="password" class="form-control" required="" placeholder="Password" name="pass">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-block btn-primary">Sign in</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_mahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 align="center">Login Sebagai Mahasiswa</h2>
      </div>
      <form id="frm_mhs" action="<?php echo base_url('login/aksi_login_mahasiswa') ?>" method="POST">
      <div class="modal-body">
      <input type="number" class="form-control" required="" placeholder="NBI" name="nbi">
      </div>
      <div class="modal-body">
      <input type="password" class="form-control" required="" placeholder="Password" name="pass">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-block btn-primary">Sign in</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 align="center">Login Sebagai Admin</h2>
      </div>
      <form id="login_adm" action="<?php echo base_url('login/aksi_login_admin') ?>" method="POST">
      <div class="modal-body">
      <input type="text" class="form-control" required="" placeholder="Username" name="username">
      </div>
      <div class="modal-body">
      <input type="password" class="form-control" required="" placeholder="Password" name="pass">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-block btn-primary">Sign in</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <div class="wrapper">

<!--     <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#page-menu-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand animated" href="#">
            <i class="brand-icon fa fa-gg"></i>
            <span class="brand-name">U.O.T.S</span>
          </a>
        </div>

        <div class="navbar-collapse collapse" id="page-menu-collapse">
          <div class="navbar-right">
            <ul class="nav navbar-nav">
              <li><a data-scroll href="#header">Home</a></li>
              <li><a data-scroll href="#brief">Login</a></li>
              <li><a data-scroll href="#reviews">Reviews</a></li>
            </ul>
          </div>
        </div>

      </div>
    </nav>

    <header id="header">
      <div class="container">
        
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="intro-text">
              <h2 class="section-heading animated">Aplikasi Ujian Online Tingkat Sarjana</h2>
              <p class="section-paragraph">Silahkan Kerjakan kuis dari dosen anda kapanpun dan dimanapun</p>
            </div>
          </div>  
        </div>

      </div>
    </header> -->

    <section id="brief">
      <div id="brief-img">
        <img src="<?php echo base_url(); ?>assets/assets/images/landing-page/img-1.jpg" alt="">
      </div><!-- #brief-img -->

      <div class="container">
        <div id="brief-text">
          <h2 class="section-heading animated">Tentang U.O.T.S</h2>
          <p class="section-paragraph">Aplikasi ini adalah aplikasi yang dirancang bukan hanya untuk menghadapi ETS dan EAS saja tapi anda juga bisa mengerjakan kuis dari dosen anda, silahkan login untuk mangerjakan kuis</p>
          <ul>
            <li>
              <img class="item-icon" src="<?php echo base_url(); ?>assets/assets/svg/check.svg" alt="">
              <a href="" data-toggle="modal" data-target="#modal_mahasiswa"><span class="item-text">Login sebagai mahasiswa</span></a>
            </li>
            <li>
              <img class="item-icon" src="<?php echo base_url(); ?>assets/assets/svg/check.svg" alt="">
              <a href="" data-toggle="modal" data-target="#modal_dosen"><span class="item-text">Login sebagai dosen</span></a>
            </li>
            <li>
              <img class="item-icon" src="<?php echo base_url(); ?>assets/assets/svg/check.svg" alt="">
              <a href="" data-toggle="modal" data-target="#modal_admin"><span class="item-text">Login sebagai administrator</span></a>
            </li>
          </ul>
        </div><!-- #brief-text -->
      </div><!-- .container -->
    </section><!-- #brief -->

    <!-- <section id="reviews">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="text-center">
              <img src="<?php echo base_url(); ?>assets/assets/images/landing-page/talk-bubble.png" alt="">
            </div>
            <div id="owl-slider" class="owl-carousel owl-theme">
              <div class="item">
                <p class="review-text">Being the richest man in the cemetery doesn't matter to me. Going to bed at night saying we've done something wonderful, that's what matters to me.</p>
                <h4 class="reviewer">Steve Jobs</h4>
              </div>
              
              <div class="item">
                <p class="review-text">Technology is just a tool. In terms of getting the kids working together and motivating them, the teacher is the most important</p>
                <h4 class="reviewer">Bill Gates</h4>
              </div>

              <div class="item">
                <p class="review-text">When you give everyone a voice and give people power, the system usually ends up in a really good place. So, what we view our role as, is giving people that power.</p>
                <h4 class="reviewer">Mark Zuckerberg</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <section id="copyright">
      <div class="container text-center">
        <p>Ujian Online Tinkat Sarjana <a href="#" class="text-primary">Untag 1945</a></p>
      </div>
    </section><!-- #copyright -->
  </div>

  <div id="loading-div">
    <img src="<?php echo base_url(); ?>assets/assets/images/landing-page/puff.svg" width="50" alt="">
  </div>
  <script src="<?php echo base_url(); ?>assets/libs/bower/jquery/dist/jquery.js"></script>
  <script src="<?php echo base_url();?>assets/sweetalert-master/dist/sweetalert.min.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/misc/owl-carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/bower/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/bower/waypoints/lib/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/bower/counterup/jquery.counterup.min.js"></script>

  <script>

    $(function() {
      $(window).on('load', function(){
        $(document.body).addClass('loading-done');
      });

      //= shrink and expand the navbar 
      $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 50) $('.navbar').addClass('shrink');
        else $('.navbar').removeClass('shrink');
      });

      //= autoplay the video when the modal show up
      autoPlayYouTubeModal();

      //= equal columns height
      matchHeight('#states .col-inner');

      //= counterUp plugin
      $('.counterUp').counterUp({ delay: 10, time: 1500 });

      //= set the max-height property for .navbar-collapse
      $(window).on('load resize orientationchange', function(){
        $('.navbar-collapse').css('max-height', $(window).height() - $('.navbar').height());
      });

      $(document).on('click', '[data-toggle="collapse"]', function(e){
        var $trigger = $(e.target);
        $trigger.is('[data-toggle="collapse"]') || ($trigger = $trigger.parents('[data-toggle="collapse"]'));
        var $target = $($trigger.attr('data-target'));
        if ($target.attr('id') === 'page-menu-collapse')
          $(document.body).toggleClass('navbar-collapse-show', !$trigger.hasClass('collapsed'))
      });

      //= initialize smooth scroll plugin
      smoothScroll.init({
        offset: 60,
        speed: 1000,
        updateURL: false
      });

      // initializing owlCarousel
      $("#owl-slider").owlCarousel({
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoPlay: true
      });

      // initialize waypoints for section-headings
      $('.section-heading').waypoint(function(direction) {
        if (direction === 'down') $(this.element).addClass('fadeInUp');
        else $(this.element).removeClass('fadeInUp');
      }, { offset: '96%' });

      $('#login_dsn').on('submit',function(e) {
        e.preventDefault();
        var formData = new FormData( $("#login_dsn")[0]);
          $.ajax({
            url: $("#login_dsn").attr('action'), //nama action script php sobat
              method:'POST',
              data:new FormData(this),
              contentType: false,
              processData: false,
              dataType: 'json',
              success:function(data){
                console.log(data);
                if (data.Code == 'Error') {
                  swal("error!", data.Message, "error");
                  // alert(data.Message);
                }else{
                  swal({
                  title: "Succes",
                  text: data.Message,
                  type: "success",
                  },function(){
                  window.location.href = "<?php echo base_url('matkul'); ?>"
                  });
                }
              },
              error:function(data){
                alert("Gagal Bro")
              },
          });
        });

        $('#frm_mhs').on('submit',function(e) {
        e.preventDefault();
        var formData = new FormData( $("#frm_mhs")[0]);
          $.ajax({
            url: $("#frm_mhs").attr('action'), //nama action script php sobat
              method:'POST',
              data:new FormData(this),
              contentType: false,
              processData: false,
              dataType: 'json',
              success:function(data){
                console.log(data);
                if (data.Code == 'Error') {
                  swal("error!", data.Message, "error");
                  // alert(data.Message);
                }else{
                  swal({
                  title: "Succes",
                  text: data.Message,
                  type: "success",
                  },function(){
                    window.location.href = "<?php echo base_url('mahasiswa/matkul/') ?>"+data.Nbi;
                  });
                }
              },
              error:function(data){
                alert("Gagal Bro")
              },
          });
        });

        $('#login_adm').on('submit',function(e) {
        e.preventDefault();
        var formData = new FormData( $("#login_adm")[0]);
          $.ajax({
            url: $("#login_adm").attr('action'), //nama action script php sobat
              method:'POST',
              data:new FormData(this),
              contentType: false,
              processData: false,
              dataType: 'json',
              success:function(data){
                console.log(data);
                if (data.Code == 'Error') {
                  swal("error!", data.Message, "error");
                  // alert(data.Message);
                }else{
                  swal({
                  title: "Succes",
                  text: data.Message,
                  type: "success",
                  },function(){
                  window.location.href = "<?php echo base_url('dosen'); ?>"
                  });
                }
              },
              error:function(data){
                alert("Gagal Bro")
              },
          });
        });
    });

    autoPlayYouTubeModal = function() {
      $('#play-video').on("click",function() {
        var theModal = $(this).data("target"),
          videoSRC = $('#video-modal iframe').attr('src'),
          videoSRCauto = videoSRC + "?autoplay=1";
        $(theModal + ' iframe').attr('src', videoSRCauto);
        $(theModal + ' button.close').on("click",function() {
          $(theModal + ' iframe').attr('src', videoSRC);
        });
        $('.modal').on("click",function() {
          $(theModal + ' iframe').attr('src', videoSRC);
        });
      });
    };

    matchHeight = function(selector){
      var height, max = 0, $selector = $(selector);
      $selector.each(function(index, item){
        height = $(item).height();
        if (height > max) max = height;
      });
      $selector.height(max);
    };
  </script>
</body>

</html>