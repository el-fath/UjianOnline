<script>
$(document).ready(function(){
  $("#jenis_soal").change(function (){
    var url = "<?php echo base_url('bab/ajax_jenis_soal');?>/"+$(this).val();
    $('#jenisnya').load(url);
    return false;
  })
});
</script>
<div class="wrap">
    <section class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="widget widget-pie-chart">
                    <header class="widget-header">
                        <h4 class="widget-title">Form Edit Soal</h4>
                    </header>
                    <hr class="widget-separator"/>
                    <div class="widget-body clearfix">
                    <?php foreach ($soal as $s) { ?>
                        <form id="form-edit" action="<?php echo base_url('bab/update_soal/'.$s->id_soal)?>" method="POST">
                        <label>Nama Soal :</label><input type="text" readonly name="soal" class="form-control" value="<?php echo $s->nm_test ?>">
                        <input type="hidden" name="id_soal" class="form-control" value="<?php echo $s->id_soal ?>">
                        <label>Matkul</label>
                        <select class="form-control" name="matkul" disabled>
                        <?php foreach($matk as $m){ ?>
                        <option value="<?php echo $m->id_matkul ?>"<?=$s->matkul == $m->id_matkul ?'selected' : ''?>><?php echo $m->nm_matkul ?> - <?php echo $m->nm_kelas ?></option>
                        <?php } ?>
                        </select>
                        <!-- <label>Kelas</label>
                        <select class="form-control" name="kelas" disabled>
                        <?php foreach($kel as $k){ ?>
                        <option value="<?php echo $k->id_kelas ?>"<?=$s->kelas == $k->id_kelas ?'selected' : ''?>><?php echo $k->nm_kelas ?></option>
                        <?php } ?>
                        </select> -->
                        <label>Jenis</label>
                        <select class="form-control" name="jenis" disabled>
                        <?php foreach($jen as $j){ ?>
                        <option value="<?php echo $j->id_j_ujian ?>"<?=$s->jenis == $j->id_j_ujian ?'selected' : ''?>><?php echo $j->nm_ujian ?></option>
                        <?php } ?>
                        </select>
                        <label>Jenis Soal</label>
                        <select class="form-control" name="id_j_soal" id="jenis_soal">
                        <option>Pilih Jenis Soal</option>}
                        <?php foreach($jen_s as $js){ ?>
                        <option value="<?php echo $js->id_j_soal ?>"<?=$s->id_j_soal == $js->id_j_soal ?'selected' : ''?>><?php echo $js->nm_j_soal ?></option>
                        <?php } ?>
                        </select>
                        <label>Soal :</label>
                        <input type="hidden" value="<?php echo $s->id_test ?>" name="id_test">
                        <textarea id="editor1" name="soal" required=""><?php echo $s->soal ?></textarea>
                        <br>
                        <div id='jenisnya'>
                        <?php if ($s->id_j_soal==1){ ?>
                        <label>Jawaban</label>
                        <div class="radio radio-primary">
                            <!-- <?php $j = explode(',',$s->jawaban); ?> -->
                            <!-- <?php print_r($j); ?> -->
                            <input type="radio" name="jawaban" value = "16" id="custome-checkbox1" <?=$s->jawaban == '16' ? 'checked':'' ?>/>
                            <label for="custome-checkbox1">Pil A :</label>
                            <textarea id="editor2" name="pil_a"><?php echo $s->pil_a ?></textarea>
                            <input type="radio" name="jawaban" value = "8" id="custome-checkbox2" <?=$s->jawaban == '8' ? 'checked':'' ?>/>
                            <label for="custome-checkbox2">Pil B :</label>
                            <textarea id="editor3" name="pil_b"><?php echo $s->pil_b ?></textarea>
                            <input type="radio" name="jawaban" value = "4" id="custome-checkbox3" <?=$s->jawaban == '4' ? 'checked':'' ?>/>
                            <label for="custome-checkbox3">Pil C :</label>
                            <textarea id="editor4" name="pil_c"><?php echo $s->pil_c ?></textarea>
                            <input type="radio" name="jawaban" value = "2" id="custome-checkbox4" <?=$s->jawaban == '2' ? 'checked':'' ?>/>
                            <label for="custome-checkbox4">Pil D :</label>
                            <textarea id="editor5" name="pil_d"><?php echo $s->pil_d ?></textarea>
                            <input type="radio" name="jawaban" value = "1" id="custome-checkbox5" <?=$s->jawaban == '1' ? 'checked':'' ?>/>
                            <label for="custome-checkbox5">Pil E :</label>
                            <textarea id="editor6" name="pil_e"><?php echo $s->pil_e ?></textarea>
                        </div>                            
                        <?php } elseif ($s->id_j_soal==2) { ?>
                        <label>Jawaban</label>
                        <label>Isikan urutan yang salah yang akan dijadikan soal</label>
                        <br>
                        <label>1.</label>
                        <textarea name='pil_a' class="form-control"><?php echo $s->pil_a ?></textarea>
                        <label>2.</label>
                        <textarea name='pil_b' class="form-control"><?php echo $s->pil_b ?></textarea>
                        <label>3.</label>
                        <textarea name='pil_c' class="form-control"><?php echo $s->pil_c ?></textarea>
                        <label>4.</label>
                        <textarea name='pil_d' class="form-control"><?php echo $s->pil_d ?></textarea>
                        <label>5.</label>
                        <textarea name='pil_e' class="form-control"><?php echo $s->pil_e ?></textarea>
                        <label>Jawaban Urutan Yang Benar | contoh : 32145</label>
                        <!-- <?php 
                            $list = $s->jawaban;
                            $k = explode('|', $list);
                            $h = implode($k);
                        ?> -->
                        <input type='' class='form-control' name='jawaban' value='<?php echo $s->jawaban ?>'>
                        <?php } elseif ($s->id_j_soal==3) { ?>
                        <label>Jawaban</label>
                        <br>
                        <div class='btn-group' data-toggle='buttons'>
                            <label class='btn btn-success'>
                            <input type='radio' name='jawaban' value ='1' <?=$s->jawaban == '1' ? 'checked':'' ?>>Benar
                            </label>
                            <label class='btn btn-danger'>
                            <input type='radio' name='jawaban' value ='0' <?=$s->jawaban == '0' ? 'checked':'' ?>>Salah
                            </label>
                        </div>
                        <br>
                        <?php } elseif ($s->id_j_soal==4) { ?>
                        <label>Jawaban</label>
                        <textarea class="form-control" name="jawaban"><?php echo $s->jawaban_isian ?></textarea>
                        <?php } elseif ($s->id_j_soal==5) { ?>
                        <label>Note: hanya sisi kanan(1,2,3,4,5) yang bisa digeser mahasiswa ke-atas dan ke-bawah untuk mencocokkan dengan sisi kiri(A,B,C,D,E)</label>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="input1">A</label>
                                <input type="text" name="pil_a" class="form-control" value="<?php echo $s->pil_a ?>" id="input1">
                            </div>
                            <div class="form-group">
                                <label for="input2">1</label>
                                <input type="text" name="pil_f" class="form-control" value="<?php echo $s->pil_f ?>" id="input2">
                            </div>
                        </div><br>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="input1">B</label>
                                <input type="text" name="pil_b" class="form-control" value="<?php echo $s->pil_b ?>" id="input1">
                            </div>
                            <div class="form-group">
                                <label for="input2">2</label>
                                <input type="text" name="pil_g" class="form-control" value="<?php echo $s->pil_g ?>" id="input2">
                            </div>
                        </div><br>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="input1">C</label>
                                <input type="text" name="pil_c" class="form-control" value="<?php echo $s->pil_c ?>" id="input1">
                            </div>
                            <div class="form-group">
                                <label for="input2">3</label>
                                <input type="text" name="pil_h" class="form-control" value="<?php echo $s->pil_h ?>" id="input2">
                            </div>
                        </div><br>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="input1">D</label>
                                <input type="text" name="pil_d" class="form-control" value="<?php echo $s->pil_d ?>" id="input1">
                            </div>
                            <div class="form-group">
                                <label for="input2">4</label>
                                <input type="text" name="pil_i" class="form-control" value="<?php echo $s->pil_i ?>" id="input2">
                            </div>
                        </div><br>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="input1">E</label>
                                <input type="text" name="pil_e" class="form-control" value="<?php echo $s->pil_e ?>" id="input1">
                            </div>
                            <div class="form-group">
                                <label for="input2">5</label>
                                <input type="text" name="pil_j" class="form-control" value="<?php echo $s->pil_j ?>" id="input2">
                            </div>
                        </div>
                        <br>
                        <label>Jawaban dari ABCDE, contoh: 32145</label>
                        <input type="number" name="jawaban" value="<?php echo $s->jawaban ?>" class="form-control">
                        <?php } ?>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                        </form>
                    <?php } ?>
                    </div><!-- .widget -->
                </div>
            </div>
        </div><!-- .row -->
    </section><!-- #dash-content -->
</div>
<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor3' );
    CKEDITOR.replace( 'editor4' );
    CKEDITOR.replace( 'editor5' );
    CKEDITOR.replace( 'editor6' );

    $(function() {
        $('#form-edit').on('submit',function(e) {
        e.preventDefault();
        var formData = new FormData( $("#form-edit")[0]);
        console.log(new FormData(this));
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
          $.ajax({
            url: $("#form-edit").attr('action'), //nama action script php sobat
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
                  window.location.href = "<?php echo base_url('bab/all_soal/'.$id_test); ?>"
                  });
                }
              },
              error:function(data){
                alert("Gagal Bro")
              },
          });
        });
    });
</script>