<section  id="services-sec">
 <div class="sidebar sidebar-main sidebar-default sidebar-separate">
    <div class="sidebar-content">

        <div class="sidebar-category">
        <!-- <h2 align="center">Waktu</h2> -->
            <div class="category-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div id="waktu" class="waktu" style="height: 50px">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<form action="<?php echo base_url('mahasiswa/penilaian') ?>" method="post" name="formSoal" id="formSoal">
    <div class="container">
        <h2 align="center">Selamat Mengerjakan</h2>
        <div class="category-content">
       
        <!-- <?php $no=0; foreach($soal as $s){ $no++;?>
            <button data-toggle="collapse" class="btn btn-info" data-target="#<?php echo $no ?>">No<?php echo $no ?></button>
        <?php } ?> -->
        
        <br>
        <br>
        <?php $no=0; foreach($soal as $s){ $no++;?>
            <!-- <div id="<?php echo $no ?>" class="collapse panel panel-primary"> -->
            <div id="<?php echo $no ?>" class="panel panel-primary">
                <!-- <label>Soal No.<?php echo $no ?></label> -->
                <div class="panel-heading">Soal No.<?php echo $no ?></div>
                <p><?php echo $s->soal ?></p>
                <?php if ($s->id_j_soal==1){ ?>
                <ol type="A">
                    <li><input type="radio" name="pilihan<?php echo $s->id_soal ?>[]" value = "A" id="custome-checkbox1"/>
                    <label for="custome-checkbox1"><?php echo $s->pil_a ?></label></li>
                    <li><input type="radio" name="pilihan<?php echo $s->id_soal ?>[]" value = "B" id="custome-checkbox2"/>
                    <label for="custome-checkbox2"><?php echo $s->pil_b ?></label></li>
                    <li><input type="radio" name="pilihan<?php echo $s->id_soal ?>[]" value = "C" id="custome-checkbox3"/>
                    <label for="custome-checkbox3"><?php echo $s->pil_c ?></label></li>
                    <li><input type="radio" name="pilihan<?php echo $s->id_soal ?>[]" value = "D" id="custome-checkbox4"/>
                    <label for="custome-checkbox4"><?php echo $s->pil_d ?></label></li>
                </ol>
                <p>Pilih 1 jawaban yang benar</p>
                <?php } else if ($s->id_j_soal==2){ ?>
                <ol type="A">
                    <li><input type="checkbox" name="pilihan<?php echo $s->id_soal ?>[]" value = "A" id="custome-checkbox1"/>
                    <label for="custome-checkbox1"><?php echo $s->pil_a ?></label></li>
                    <li><input type="checkbox" name="pilihan<?php echo $s->id_soal ?>[]" value = "B" id="custome-checkbox2"/>
                    <label for="custome-checkbox2"><?php echo $s->pil_b ?></label></li>
                    <li><input type="checkbox" name="pilihan<?php echo $s->id_soal ?>[]" value = "C" id="custome-checkbox3"/>
                    <label for="custome-checkbox3"><?php echo $s->pil_c ?></label></li>
                    <li><input type="checkbox" name="pilihan<?php echo $s->id_soal ?>[]" value = "D" id="custome-checkbox4"/>
                    <label for="custome-checkbox4"><?php echo $s->pil_d ?></label></li>
                </ol>
                <p>Pilih 2 jawaban yang benar</p>
                <?php } else if ($s->id_j_soal==3){ ?>
                <div class='btn-group' data-toggle='buttons'>
                    <label class='btn btn-success'>
                    <input type='radio' name='pilihan<?php echo $s->id_soal ?>[]' value ='benar'>Benar
                    </label>
                    <label class='btn btn-danger'>
                    <input type='radio' name='pilihan<?php echo $s->id_soal ?>[]' value ='salah'>Salah
                    </label>
                </div>
                <br>
                <br>
                <p>Tekan benar atau salah</p>
                <?php } else if ($s->id_j_soal==4){ ?>
                <textarea name="" class="form-control"></textarea>
                <br>
                <?php } else if ($s->id_j_soal==5){ ?>
                <ol>
                    <li><label for="custome-checkbox1"><?php echo $s->pil_a ?></label></li>
                    <li><label for="custome-checkbox2"><?php echo $s->pil_b ?></label></li>
                    <li><label for="custome-checkbox3"><?php echo $s->pil_c ?></label></li>
                    <li><label for="custome-checkbox4"><?php echo $s->pil_d ?></label></li>
                </ol>
                <input type="text" name="pilihan<?php echo $s->id_soal ?>[]" class="form-control">
                <br>
                <p>Tuliskan urutan yang benar, Contoh jawaban : 3412</p>
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