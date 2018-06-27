
    <div id="home-sec">
    <div class="container" >
        <div class="row text-center">
            <div  class="col-md-12 col-sm-12" >
                <div class="col-md-12">
                <!-- <img src="assets/img/gnfi.png" style="width: 350px; height: 110px;" alt="">                    -->
                </div>
                <a  href="#port-sec">
                <img src="<?php echo base_url();?>gambar.<?php echo '/'.$this->session->userdata("foto") ?>" alt="..." class="img-circle profile_img" style="width: 200px; height: 200px">
                </a>
            </div>
                <div class="col-md-4 col-md-offset-4  col-sm-6 col-sm-offset-3">
                <h4><span class="label label-primary">Welcome to UOTS</span></h4>
                <h4><span class="label label-primary">Ujian Online Tingkat Sarjana</span></h4>
                </div>
        </div>
    </div>
    </div>
    <!-- </div> -->
    <section id="port-sec">
        <div class="container">
            <div class="row g-pad-bottom" >
                    <div class="col-md-4 col-sm-4">
                    <div class="portfolio-item">
                        <div class="item-main">
                            <a href="<?php echo base_url('mahasiswa/krs/').$this->session->userdata("jurusan"); ?>">
                            <div class="portfolio-image">
                                <img src="<?php echo base_url(); ?>assets/assets-user/img/portfolio/thumb/krs.jpg" alt="">
                                <div class="overlay">
                                    <button class="preview btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
                                </div>
                            </div>
                            </a>
                            <h5>Ambil Matkul</h5>
                        </div>
                    </div>
                    </div>
                   
                    <div class="col-md- col-sm-4">
                    <div class="portfolio-item">
                        <div class="item-main">
                            <a href="<?php echo base_url('mahasiswa/matkul/').$this->session->userdata("nbi"); ?>">
                            <div class="portfolio-image">
                                <img src="<?php echo base_url(); ?>assets/assets-user/img/portfolio/thumb/test.jpg" alt="">
                                <div class="overlay">
                                    <button class="preview btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
                                </div>
                            </div>
                            </a>
                            <h5>Go to Exam</h5>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-md- col-sm-4">
                    <div class="portfolio-item">
                        <div class="item-main">
                        <a href="<?php echo base_url('mahasiswa/riwayat/').$this->session->userdata("nbi"); ?>">
                            <div class="portfolio-image">
                                <img src="<?php echo base_url(); ?>assets/assets-user/img/portfolio/thumb/lihat.jpg" alt="">
                                <div class="overlay">
                                    <button class="preview btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
                                </div>
                            </div>
                        </a>
                            <h5>Lihat Nilai</h5>
                        </div>
                    </div>
                    </div>

                    <div class="col-md- col-sm-4">
                    <div class="portfolio-item">
                        <div class="item-main">
                            <div class="portfolio-image" data-toggle="modal" data-target=".biodata">
                                <img src="<?php echo base_url(); ?>assets/assets-user/img/portfolio/thumb/biodata.jpg" alt="">
                                <div class="overlay">
                                    <button class="preview btn btn-primary" data-toggle="modal" data-target="#exampleModalLong"><i class="glyphicon glyphicon-pencil"></i></button>
                                </div>
                            </div>
                            <h5>Biodata</h5>
                        </div>
                    </div>
                    </div>

                    <div class="col-md- col-sm-4">
                   <!--  <div class="portfolio-item">
                        <div class="item-main">
                        <a href="<?php echo base_url('mahasiswa/riwayat/').$this->session->userdata("nbi"); ?>">
                            <div class="portfolio-image">
                                <img src="<?php echo base_url(); ?>assets/assets-user/img/portfolio/thumb/lihat.jpg" alt="">
                                <div class="overlay">
                                    <button class="preview btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
                                </div>
                            </div>
                        </a>
                            <h5>Lihat Nilai</h5>
                        </div>
                    </div> -->
                    </div>

                    <div class="col-md- col-sm-4" data-toggle="modal" data-target=".tentang">
                    <div class="portfolio-item">
                        <div class="item-main">
                            <div class="portfolio-image">
                                <img src="<?php echo base_url(); ?>assets/assets-user/img/portfolio/thumb/tentang.jpg" alt="">
                                <div class="overlay">
                                    <button class="preview btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
                                </div>
                            </div>
                            <h5>Tentang UOTS</h5>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="modal fade biodata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Biodata</h3>
            </div>
            <!--Body-->
            <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <?php foreach($mhs as $m){ ?>
                    <tr>
                        <td align="center" rowspan="10"><img src="<?php echo base_url(); ?>/gambar<?php echo '/'.$m->foto ?>" style="width: 140px; height: 160px"></td>
                    </tr>
                    <tr>
                        <td><strong>NBI</strong></td>
                        <td><?php echo $m->nbi ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td><?php echo $m->nm_mahasiswa ?></td>
                    </tr>
                    <tr> 
                        <td><strong>Fakultas</strong></td>
                        <td><?php echo $m->nm_fakultas ?></td>
                    </tr>
                    <tr>
                        <td><strong>Jurusan</strong></td>
                        <td><?php echo $m->nm_jurusan ?></td>
                    </tr>
                    <tr>
                        <td><strong>Password</strong></td>
                        <td><?php echo $m->pass ?></td>
                    </tr>
                    <?php } ?>
                    <!-- </div> -->
                </table>
            </div> 
            </div>
            <!--Footer-->
            
        </div>
        <!--/.Content-->
    </div>
</div>
<div class="modal fade tentang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Tentang UOTS</h3>
            </div>
            <!--Body-->
            <div class="modal-body">
            <div class="table-responsive">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <table class="table table-bordered table-hover table-striped">
                    <?php foreach($mhs as $m){ ?>
                    <tr>
                        <td><strong>Pengembang</strong></td>
                        <td><strong>Pembimbing</strong></td>
                    </tr>
                    <tr>
                        <td align="center"><img src="<?php echo base_url(); ?>/gambar<?php echo '/'.$m->foto ?>" style="width: 140px; height: 160px"></td>
                        <td align="center"><img src="<?php echo base_url(); ?>/gambar<?php echo '/'.$m->foto ?>" style="width: 140px; height: 160px"></td>
                    </tr>
                    <?php } ?>
                    <!-- </div> -->
                </table>
            </div> 
            </div>
            <!--Footer-->
        </div>
        <!--/.Content-->
    </div>
</div>
<div class="modal fade edit_biodata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Edit Biodata</h3>
            </div>
            <!--Body-->
            <div class="modal-body">
            <form id="form-edit" action="<?php echo base_url('mahasiswa/update_user/'.$this->session->userdata('nbi'))?>" method="POST">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <?php foreach($mhs as $m){ ?>
                    <tr>
                        <td align="center" rowspan="10"><img id="image-preview" src="<?php echo base_url(); ?>/gambar<?php echo '/'.$m->foto ?>" style="width: 140px; height: 160px">
                        <input type="file" class="form-control" name="foto" id="image-source" onchange="previewImage();">
                        </td>
                    </tr>
                    <tr>
                        <td><strong>NBI</strong></td>
                        <td><?php echo $m->nbi ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td><?php echo $m->nm_mahasiswa ?></td>
                    </tr>
                    <tr> 
                        <td><strong>Fakultas</strong></td>
                        <td><?php echo $m->fakultas ?></td>
                    </tr>
                    <tr>
                        <td><strong>Jurusan</strong></td>
                        <td><?php echo $m->jurusan ?></td>
                    </tr>
                    <tr>
                        <td><strong>Password</strong></td>
                        <td><input type="password" class="form-control" value="<?php echo $m->pass ?>"></td>
                    </tr>
                    <?php } ?>
                    <!-- </div> -->
                </table>
            </div>
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </form> 
            </div>
            <!--Footer--> 
        </div>
        <!--/.Content-->
    </div>
</div>
<script>
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

        oFReader.onload = function(oFREvent) {
          document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };
</script>