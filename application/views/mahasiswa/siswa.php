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
  <title>Ujian Online S1</title>
</head>
<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="60">
<div class="modal fade" id="modal_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 align="center">Login Sebagai Admin</h2>
      </div>
      <form id="tambah-div" action="<?php echo base_url('login/aksi_login_admin') ?>" method="POST">
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

    <nav class="navbar navbar-default navbar-fixed-top">
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
        </div><!-- .navbar-header -->

        <div class="navbar-collapse collapse" id="page-menu-collapse">
          <div class="navbar-right">
            <ul class="nav navbar-nav">
              <li><a data-scroll href="#header">Home</a></li>
              <li><a data-scroll href="#features">Features</a></li>
              <li><a data-scroll href="#reviews">Reviews</a></li>
              <li><a href="<?php echo base_url('login/logout') ?>">Log Out</a></li>
            </ul>
          </div>
        </div><!-- .navbar-collapse -->

      </div><!-- .container -->
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

      </div><!-- .container -->
    </header><!-- #header -->

    <section id="price">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="text-center">
              <h2 class="section-heading animated">Subscribe</h2>
              <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt accusantium est illum ratione corporis?</p>
            </div>
          </div><!-- /.col -->
        </div><!-- .row -->

        <div class="row text-center">

          <div class="col-md-4">
            <div class="col-inner feature">
              <img src="assets/svg/tie.svg" alt="icon">
              <h4>Myspace profile</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div><!-- /.col -->

          <div class="col-md-4">
            <div class="col-inner feature">
              <img src="assets/svg/pig.svg" alt="icon">
              <h4>Myspace profile</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div><!-- /.col -->

          <div class="col-md-4">
            <div class="col-inner feature">
              <img src="assets/svg/pointer.svg" alt="icon">
              <h4>Myspace profile</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div><!-- /.col -->
          
        </div>
      </div><!-- .container -->
    </section><!-- #subscribe -->

    <section id="features">
      <div class="container">

        <div class="text-center">
          <h2 class="section-heading animated">Working to Build A Better Web</h2>
          <p class="section-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus sunt quisquam ea distinctio unde, iste doloribus iure dignissimos rerum eaque ipsum nostrum. Non deserunt reprehenderit eaque libero sunt, nam optio.</p>
        </div><!-- .text-center -->

        <div class="row text-center">

          <div class="col-md-4">
            <div class="col-inner feature">
              <img src="assets/svg/tie.svg" alt="icon">
              <h4>Myspace profile</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div><!-- /.col -->

          <div class="col-md-4">
            <div class="col-inner feature">
              <img src="assets/svg/pig.svg" alt="icon">
              <h4>Myspace profile</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div><!-- /.col -->

          <div class="col-md-4">
            <div class="col-inner feature">
              <img src="assets/svg/pointer.svg" alt="icon">
              <h4>Myspace profile</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div><!-- /.col -->
          
        </div><!-- .row -->
      </div><!-- .container -->
    </section>

    <section id="reviews">
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
            </div><!-- #owl-slider -->
          </div><!-- /.col -->
        </div>
      </div><!-- .container -->
    </section>

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