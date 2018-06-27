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
    <link href="<?php echo base_url(); ?>assets/assets-user/css/style1.css" rel="stylesheet" />
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
    <div class="navbar navbar-fixed-top">
        <div class="jumbotron" style="height: 140px; background-color: #428bca">
            <div class="container">
            <div id="waktu" class="waktu" style="height: 50px">
            </div>
            <div class="col-md-6" style="background-color: #fff">
               <label>NBI-Nama : <?php echo $this->session->userdata("nbi"); ?>-<?php echo$this->session->userdata("nama"); ?></label>
            </div>
            <div class="col-md-6" style="background-color: #fff">
                <?php foreach ($matkul as $m) { ?>
               <label>Test-Matkul : <?php echo $m-> nm_test ?>-<?php echo $m-> nm_matkul ?></label>
                <?php } ?>
            </div>
            </div>
        <!--     <div class="navbar-header">
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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->session->userdata("nama"); ?><span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li><a href="#" data-toggle="modal" data-target=".edit_biodata">Edit Biodata</a></li>
                            <li><a href="<?php echo base_url('login/logout') ?>">Log out</a></li>
                        </ul>
                    </li>
                </ul>  
            </div> -->
        </div>
    </div>


<section  id="services-sec">

<form action="<?php echo base_url('mahasiswa/penilaian/'.$id_test) ?>" method="post" name="formSoal" id="formSoal">
    <div class="container">
        <!-- <h1 align="center">Selamat Mengerjakan</h1> -->
        <br><br><br><br><br><br><br><br>
        <div class="category-content">
       
        <!-- <?php $no=0; foreach($soal as $s){ $no++;?>
            <button data-toggle="collapse" class="btn btn-info" data-target="#<?php echo $no ?>">No<?php echo $no ?></button>
        <?php } ?> -->
        
        <!-- <br>
        <br> -->
        <?php $no=0; foreach($soal as $s){ $no++;?>
            <!-- <div id="<?php echo $no ?>" class="collapse panel panel-primary"> -->
            <div id="<?php echo $no ?>" class="panel panel-primary">
                <!-- <label>Soal No.<?php echo $no ?></label> -->
                <div class="panel-heading">Soal No.<?php echo $no ?></div>
                <?php echo $s->soal ?>
                <?php if ($s->id_j_soal==1){ ?>
                <ol type="A">
                    <li><input type="radio" name="pilihan<?php echo $s->id_soal ?>[]" value = "16" id="custome-checkbox1"/ required>
                    <label for="custome-checkbox1"><?php echo $s->pil_a ?></label></li>
                    <li><input type="radio" name="pilihan<?php echo $s->id_soal ?>[]" value = "8" id="custome-checkbox2"/>
                    <label for="custome-checkbox2"><?php echo $s->pil_b ?></label></li>
                    <li><input type="radio" name="pilihan<?php echo $s->id_soal ?>[]" value = "4" id="custome-checkbox3"/>
                    <label for="custome-checkbox3"><?php echo $s->pil_c ?></label></li>
                    <li><input type="radio" name="pilihan<?php echo $s->id_soal ?>[]" value = "2" id="custome-checkbox4"/>
                    <label for="custome-checkbox4"><?php echo $s->pil_d ?></label></li>
                    <li><input type="radio" name="pilihan<?php echo $s->id_soal ?>[]" value = "1" id="custome-checkbox5"/>
                    <label for="custome-checkbox5"><?php echo $s->pil_e ?></label></li>
                </ol>
                <p>Pilih 1 jawaban yang benar</p>
                <?php } else if ($s->id_j_soal==2){ ?>
                <script>
                    $( function() {
                        $( '#sortable' ).sortable({
                            placeholder: 'ui-state-highlight'
                        });
                        $( '#sortable' ).disableSelection();
                    } );
                </script>
                <style>
                    #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
                    #sortable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
                    html>body #sortable li { height: 1.5em; line-height: 1.2em; }
                    .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
                </style>
                <ul id='sortable'>
                    <li class='ui-state-default'><?php echo $s->pil_a ?><input type="hidden" value="1" name="pilihan<?php echo $s->id_soal ?>[]"></li>
                    <li class='ui-state-default'><?php echo $s->pil_b ?><input type="hidden" value="2" name="pilihan<?php echo $s->id_soal ?>[]"></li>
                    <li class='ui-state-default'><?php echo $s->pil_c ?><input type="hidden" value="3" name="pilihan<?php echo $s->id_soal ?>[]"></li>
                    <li class='ui-state-default'><?php echo $s->pil_d ?><input type="hidden" value="4" name="pilihan<?php echo $s->id_soal ?>[]"></li>
                    <li class='ui-state-default'><?php echo $s->pil_e ?><input type="hidden" value="5" name="pilihan<?php echo $s->id_soal ?>[]"></li>
                    <!-- <li class='ui-state-default'>Item 1</li>
                    <li class='ui-state-default'>Item 2</li>
                    <li class='ui-state-default'>Item 3</li>
                    <li class='ui-state-default'>Item 4</li> -->
                </ul>
                <p>Urutkan dengan benar</p>
                <?php } else if ($s->id_j_soal==3){ ?>
                <div class='btn-group' data-toggle='buttons'>
                    <label class='btn btn-success'>
                    <input type='radio' name='pilihan<?php echo $s->id_soal ?>[]' value ='1'>Benar
                    </label>
                    <label class='btn btn-danger'>
                    <input type='radio' name='pilihan<?php echo $s->id_soal ?>[]' value ='0'>Salah
                    </label>
                </div>
                <br>
                <br>
                <p>Tekan benar atau salah</p>
                <?php } else if ($s->id_j_soal==4){ ?>
                <textarea name="pilihan<?php echo $s->id_soal ?>[]" class="form-control" required></textarea>
                <p>Tuliskan jawaban pada textarea yang tersedia</p>
                <!-- <br> -->
                <?php } else if ($s->id_j_soal==5){ ?>
                <script>
                    $( function() {
                        // $( '#sortable1' ).sortable({
                        //     placeholder: 'ui-state-highlight'
                        // });
                        $( '#sortable1' ).disableSelection();
                        $( '#sortable2' ).sortable({
                            placeholder: 'ui-state-highlight'
                        });
                        $( '#sortable2' ).disableSelection();
                    } );
                </script>
                <style>
                    #sortable1 { list-style-type: none; margin: 0; padding: 0; width: 100%; }
                    #sortable1 li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
                    html>body #sortable1 li { height: 1.5em; line-height: 1.2em; }
                    .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
                    #sortable2 { list-style-type: none; margin: 0; padding: 0; width: 100%; }
                    #sortable2 li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
                    html>body #sortable2 li { height: 1.5em; line-height: 1.2em; }
                    .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
                </style>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        <label>List A</label>
                        <ul id='sortable1'>
                            <li class='ui-state-default'><?php echo $s->pil_a ?></li>
                            <li class='ui-state-default'><?php echo $s->pil_b ?></li>
                            <li class='ui-state-default'><?php echo $s->pil_c ?></li>
                            <li class='ui-state-default'><?php echo $s->pil_d ?></li>
                            <li class='ui-state-default'><?php echo $s->pil_e ?></li>
                            <!-- <li class='ui-state-default'>Item 1</li>
                            <li class='ui-state-default'>Item 2</li>
                            <li class='ui-state-default'>Item 3</li>
                            <li class='ui-state-default'>Item 4</li> -->
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <label>List B</label>
                        <ul id='sortable2'>
                            <li class='ui-state-default'><?php echo $s->pil_f ?><input type="hidden" value="1" name="pilihan<?php echo $s->id_soal ?>[]"></li>
                            <li class='ui-state-default'><?php echo $s->pil_g ?><input type="hidden" value="2" name="pilihan<?php echo $s->id_soal ?>[]"></li>
                            <li class='ui-state-default'><?php echo $s->pil_h ?><input type="hidden" value="3" name="pilihan<?php echo $s->id_soal ?>[]"></li>
                            <li class='ui-state-default'><?php echo $s->pil_i ?><input type="hidden" value="4" name="pilihan<?php echo $s->id_soal ?>[]"></li>
                            <li class='ui-state-default'><?php echo $s->pil_j ?><input type="hidden" value="5" name="pilihan<?php echo $s->id_soal ?>[]"></li>
                            <!-- <li class='ui-state-default'>Item 1</li>
                            <li class='ui-state-default'>Item 2</li>
                            <li class='ui-state-default'>Item 3</li>
                            <li class='ui-state-default'>Item 4</li> -->
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <p>Geser List B ke atas dan ke bawah untuk menjodohkan dengan List A</p>
                <!-- <ul id="sortable1">
                  <li class="ui-state-default">Item 1</li>
                  <li class="ui-state-default">Item 2</li>
                  <li class="ui-state-default">Item 3</li>
                  <li class="ui-state-default">Item 4</li>
                  <li class="ui-state-default">Item 5</li>
                </ul>
                <ul id="sortable1">
                <img src="<?php echo base_url(); ?>assets/assets-user/img/arrow.png" alt="Good News from Indonesia" style="height: 35px; width: 140px">
                <img src="<?php echo base_url(); ?>assets/assets-user/img/arrow.png" alt="Good News from Indonesia" style="height: 35px; width: 140px">
                <img src="<?php echo base_url(); ?>assets/assets-user/img/arrow.png" alt="Good News from Indonesia" style="height: 35px; width: 140px">
                <img src="<?php echo base_url(); ?>assets/assets-user/img/arrow.png" alt="Good News from Indonesia" style="height: 35px; width: 140px">
                <img src="<?php echo base_url(); ?>assets/assets-user/img/arrow.png" alt="Good News from Indonesia" style="height: 35px; width: 140px">
                </ul>
                <ul id="sortable2">
                  <li class="ui-state-highlight">Item 1</li>
                  <li class="ui-state-highlight">Item 2</li>
                  <li class="ui-state-highlight">Item 3</li>
                  <li class="ui-state-highlight">Item 4</li>
                  <li class="ui-state-highlight">Item 5</li>
                </ul> -->
                <?php } ?>
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary" onclick="hapusCookies();">Kumpulkan</button>
    </div>
</form>
    <!-- <div class="container">
        <div class="row ">
            <div class="table-responsive">
            <table border="1" class="table table-bordered table-striped table-hover">
                <tr>
                <th>No</th>
                <th>Soal</th>
                <th>Pilihan A</th>
                <th>Pilihan B</th>
                <th>Pilihan C</th>
                <th>Pilihan D</th>
                <th align="center">Jawaban</th>
                </tr>
                <?php $no=0; foreach($soal as $s){ $no++;?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $s->soal ?></td>
                <td><?php echo $s->pil_a ?></td>
                <td><?php echo $s->pil_b ?></td>
                <td><?php echo $s->pil_c ?></td>
                <td><?php echo $s->pil_d ?></td>
                <td>
                    
                </td>
                </tr>
                <?php } ?>
            </table>
            </div>
        </div>
    </div> -->
</section>
<br>
<br>
<br>
<br>
<script type="text/javascript">
    $(function() {
        $('#formSoal').on('submit',function(e) {
            e.preventDefault();
            var formData = new FormData( $("#formSoal")[0]);
            // console.log(new FormData(this));
            // for (instance in CKEDITOR.instances) {
            //     CKEDITOR.instances[instance].updateElement();
            // }
            $.ajax({
                url: $("#formSoal").attr('action'), //nama action script php sobat
                method:'POST',
                data:new FormData(this),
                contentType: false,
                processData: false,
                dataType: 'json',
                success:function(data){
                    console.log(data);
                    if (data.Code == 'Error') {
                        swal("Error!", data.Message, "error");
                      // alert(data.Message);
                    }else{
                        swal({
                            title: "Succes",
                            text: data.Message,
                            type: "success",
                            },function(){
                            window.location.href = "<?php echo base_url('mahasiswa/user'); ?>"
                        });
                    }
                },
                error:function(data){
                alert("Gagal Bro")
                },
            });
        });
    });
    var waktu = 0
    if (localStorage.getItem("detik2")!=null) {
        var waktu = localStorage.getItem("detik2");
    }else{
        var waktu = 120*60;
    }
    $('#waktu').countdown({
         until: waktu ,
         onExpiry: function(){
            localStorage.clear();
            alert("Waktu Selesai");
            $('#formSoal').submit();
         },
         onTick: simpanCookies

    });
    function hapusCookies() { 
       localStorage.clear();
    };
    function simpanCookies() { 
        var periods = $('#waktu').countdown('getTimes');
        localStorage.setItem('detik2', $.countdown.periodsToSeconds(periods));
        // alert($.countdown.periodsToSeconds(periods)); 
    };
    $(document).ready(function(){
        localStorage.clear();
    });
</script>

    <div id="footer">
    <center><i class="glyphicon glyphicon-fire"></i> Universitas 17 Agustus 1945 <i class="glyphicon glyphicon-fire"></i></center>
    </div>
    <!-- END FOOTER SECTION -->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="<?php echo base_url(); ?>assets/assets-user/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets-user/plugins/jquery.prettyPhoto.js"></script>    
    <script src="<?php echo base_url(); ?>assets/sweetalert-master/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets-user/plugins/bootstrap.min.js"></script>  

</body>
</html>    <!--FOOTER SECTION -->