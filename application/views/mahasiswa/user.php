    <!--HOME SECTION-->
    <div id="home-sec">
    <div class="container">
    <!-- <div class="jumbotron"> -->
        <div class="row g-pad-bottom" >
            <div class="col-md-4 col-sm-4">
            <div class="portfolio-item">
                <div class="item-main">
                    <a href="<?php echo base_url('mahasiswa/krs/').$this->session->userdata("jurusan"); ?>">
                    <div class="portfolio-image">
                        <img src="<?php echo base_url(); ?>assets/assets-user/img/portfolio/thumb/krs.png" alt="">
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
                        <img src="<?php echo base_url(); ?>assets/assets-user/img/portfolio/thumb/test.png" alt="">
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
                        <img src="<?php echo base_url(); ?>assets/assets-user/img/portfolio/thumb/lihat.png" alt="">
                        <div class="overlay">
                            <button class="preview btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
                        </div>
                    </div>
                </a>
                    <h5>Lihat Nilai</h5>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    <!-- </div> -->