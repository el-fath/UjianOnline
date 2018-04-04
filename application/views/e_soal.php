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
                        <label>Nama Soal :</label><input type="text" readonly name="soal" class="form-control" value="<?php echo $s->nm_bab ?>">
                        <input type="hidden" name="id_soal" class="form-control" value="<?php echo $s->id_soal ?>">
                        <label>Matkul</label>
                        <select class="form-control" name="matkul" disabled>
                        <?php foreach($mat as $m){ ?>
                        <option value="<?php echo $m->id_matkul ?>"<?=$s->matkul == $m->id_matkul ?'selected' : ''?>><?php echo $m->nm_matkul ?></option>
                        <?php } ?>
                        </select>
                        <label>Kelas</label>
                        <select class="form-control" name="kelas" disabled>
                        <?php foreach($kel as $k){ ?>
                        <option value="<?php echo $k->id_kelas ?>"<?=$s->kelas == $k->id_kelas ?'selected' : ''?>><?php echo $k->nm_kelas ?></option>
                        <?php } ?>
                        </select>
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
                        <input type="hidden" value="<?php echo $s->id_bab ?>" name="id_bab">
                        <textarea id="editor1" name="soal" required=""><?php echo $s->soal ?></textarea>
                        <br>
                        <div id='jenisnya'>
                        <?php if ($s->id_j_soal==1){ ?>
                        <label>Jawaban</label>
                        <div class="radio radio-primary">
                            <!-- <?php $j = explode(',',$s->jawaban); ?> -->
                            <!-- <?php print_r($j); ?> -->
                            <input type="radio" name="jawaban[]" value = "A" id="custome-checkbox1" <?=$s->jawaban == 'A' ? 'checked':'' ?>/>
                            <label for="custome-checkbox1">Pil A :</label>
                            <textarea id="editor2" name="pil_a"><?php echo $s->pil_a ?></textarea>
                            <input type="radio" name="jawaban[]" value = "B" id="custome-checkbox2" <?=$s->jawaban == 'B' ? 'checked':'' ?>/>
                            <label for="custome-checkbox2">Pil B :</label>
                            <textarea id="editor3" name="pil_b"><?php echo $s->pil_b ?></textarea>
                            <input type="radio" name="jawaban[]" value = "C" id="custome-checkbox3" <?=$s->jawaban == 'C' ? 'checked':'' ?>/>
                            <label for="custome-checkbox3">Pil C :</label>
                            <textarea id="editor4" name="pil_c"><?php echo $s->pil_c ?></textarea>
                            <input type="radio" name="jawaban[]" value = "D" id="custome-checkbox4" <?=$s->jawaban == 'D' ? 'checked':'' ?>/>
                            <label for="custome-checkbox4">Pil D :</label>
                            <textarea id="editor5" name="pil_d"><?php echo $s->pil_d ?></textarea>
                        </div>                            
                        <?php } elseif ($s->id_j_soal==2) { ?>
                        <label>Jawaban</label>
                        <label>Isikan urutan yang salah yang akan dijadikan soal</label>
                        <br>
                        <label>1.</label>
                        <textarea id='editor2' name='pil_a'><?php echo $s->pil_a ?></textarea>
                        <label>2.</label>
                        <textarea id='editor3' name='pil_b'><?php echo $s->pil_b ?></textarea>
                        <label>3.</label>
                        <textarea id='editor4' name='pil_c'><?php echo $s->pil_c ?></textarea>
                        <label>4.</label>
                        <textarea id='editor5' name='pil_d'><?php echo $s->pil_d ?></textarea>
                        <label>Jawaban Urutan Yang Benar | contoh : 3214</label>
                        <input type='' class='form-control' name='jawaban[]' value='<?php echo $s->jawaban ?>'>
                            <!-- <?php $j = explode(',',$s->jawaban); ?> -->
                            <!-- <?php print_r($j); ?> -->
                        <!-- <div class="checkbox checkbox-primary">
                            <input type="checkbox" name="jawaban[]" value = "A" id="custome-checkbox1" <?=$s->jawaban == 'A' || $s->jawaban == 'A B' || $s->jawaban == 'A C' || $s->jawaban == 'A D' ? 'checked':'' ?>/>
                            <label for="custome-checkbox1">Pil A :</label>
                            <textarea id="editor2" name="pil_a"><?php echo $s->pil_a ?></textarea>
                            <input type="checkbox" name="jawaban[]" value = "B" id="custome-checkbox2" <?=$s->jawaban == 'B' || $s->jawaban == 'A B' || $s->jawaban == 'B C' || $s->jawaban == 'B D' ? 'checked':'' ?>/>
                            <label for="custome-checkbox2">Pil B :</label>
                            <textarea id="editor3" name="pil_b"><?php echo $s->pil_b ?></textarea>
                            <input type="checkbox" name="jawaban[]" value = "C" id="custome-checkbox3" <?=$s->jawaban == 'C' || $s->jawaban == 'A C' || $s->jawaban == 'B C' || $s->jawaban == 'C D'? 'checked':'' ?>/>
                            <label for="custome-checkbox3">Pil C :</label>
                            <textarea id="editor4" name="pil_c"><?php echo $s->pil_c ?></textarea>
                            <input type="checkbox" name="jawaban[]" value = "D" id="custome-checkbox4" <?=$s->jawaban == 'D' || $s->jawaban == 'A D' || $s->jawaban == 'B D' || $s->jawaban == 'C D' ? 'checked':'' ?>/>
                            <label for="custome-checkbox4">Pil D :</label>
                            <textarea id="editor5" name="pil_d"><?php echo $s->pil_d ?></textarea>
                        </div> -->
                        <?php } elseif ($s->id_j_soal==3) { ?>
                        <label>Jawaban</label>
                        <br>
                        <div class='btn-group' data-toggle='buttons'>
                            <label class='btn btn-success'>
                            <input type='radio' name='jawaban[]' value ='benar' <?=$s->jawaban == 'benar' ? 'checked':'' ?>>Benar
                            </label>
                            <label class='btn btn-danger'>
                            <input type='radio' name='jawaban[]' value ='salah' <?=$s->jawaban == 'salah' ? 'checked':'' ?>>Salah
                            </label>
                        </div>
                        <br>
                        <?php } elseif ($s->id_j_soal==4) { ?>
                        <label>Jawaban</label>
                        <textarea class="form-control" name="jawaban[]"><?php echo $s->jawaban ?></textarea>
                        <?php } elseif ($s->id_j_soal==5) { ?>
                        <label>Isikan urutan yang salah yang akan dijadikan soal</label>
                        <br>
                        <label>1.</label>
                        <textarea id='editor2' name='pil_a'><?php echo $s->pil_a ?></textarea>
                        <label>2.</label>
                        <textarea id='editor3' name='pil_b'><?php echo $s->pil_b ?></textarea>
                        <label>3.</label>
                        <textarea id='editor4' name='pil_c'><?php echo $s->pil_c ?></textarea>
                        <label>4.</label>
                        <textarea id='editor5' name='pil_d'><?php echo $s->pil_d ?></textarea>
                        <label>Jawaban Urutan Yang Benar | contoh : 3214</label>
                        <input type='' class='form-control' name='jawaban[]' value='<?php echo $s->jawaban ?>'>
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

    $(function() {
        $('#form-edit').on('submit',function(e) {
        e.preventDefault();
        var formData = new FormData( $("#form-edit")[0]);
        console.log(new FormData(this));
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        } 
        console.log("asd",formData);
        $.ajax({
          url: $("#form-edit").attr('action'), //nama action script php sobat
            method:'POST',
            data: formData,
            contentType: false,
            processData: false,
            success:function(data){
            
          swal({
                title: "Succes",
                text: "Edit Data Berhasil",
                type: "success",
                },function(){
                window.location.href = "<?php echo base_url('bab/all_soal/'.$id_bab); ?>"
                });
            },
            error:function(data){
            swal("Oops...", "Something went wrong :(", "error");
            },
        });
        // e.preventDefault(); 
        });
    });
</script>