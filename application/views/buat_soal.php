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
                        <h4 class="widget-title">Tambah Soal</h4>
                    </header>
                    <hr class="widget-separator"/>
                    <div class="widget-body clearfix">
                        <?php foreach($bab as $b){ ?>
                        <form id="form-edit" action="<?php echo base_url('bab/tambah_soal')?>" method="POST">
                        <label>Nama test:</label><input type="text" readonly name="nm_test" class="form-control" value="<?php echo $b->nm_test ?>">
                        <input type="hidden" name="id_test" class="form-control" value="<?php echo $b->id_test ?>">
                        <label>Matkul - Kelas</label>
                        <select class="form-control" name="matkul" disabled>
                        <?php foreach($matk as $m){ ?>
                        <option value="<?php echo $m->id_matkul ?>"<?=$b->matkul == $m->id_matkul ?'selected' : ''?>><?php echo $m->nm_matkul ?> - <?php echo $m->nm_kelas ?></option>
                        <?php } ?>
                        </select>
                        <!-- <label>Kelas</label>
                        <select class="form-control" name="kelas" disabled>
                        <?php foreach($kel as $k){ ?>
                        <option value="<?php echo $k->id_kelas ?>"<?=$b->kelas == $k->id_kelas ?'selected' : ''?>><?php echo $k->nm_kelas ?></option>
                        <?php } ?>
                        </select> -->
                        <label>Jenis</label>
                        <select class="form-control" name="jenis" disabled>
                        <?php foreach($jen as $j){ ?>
                        <option value="<?php echo $j->id_j_ujian ?>"<?=$b->jenis == $j->id_j_ujian ?'selected' : ''?>><?php echo $j->nm_ujian ?></option>
                        <?php } ?>
                        </select>
                        <label>Jenis Soal</label>
                        <select class="form-control" name="id_j_soal" id="jenis_soal">
                        <option>Pilih Jenis Soal</option>
                        <?php foreach($jen_s as $js){ ?>
                        <option value="<?php echo $js->id_j_soal ?>"><?php echo $js->nm_j_soal ?></option>
                        <?php } ?>
                        </select>
                        <!-- <?php echo validation_errors(); ?> -->
                        <label>Soal :</label>
                        <textarea id="editor1" name="soal" required=""></textarea>
                        <br>
                        <div id="jenisnya">
                        
                        <!-- <label>Jawaban</label>
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" name="jawaban[]" value = "A" id="custome-checkbox1"/>
                            <label for="custome-checkbox1">Pil A :</label>
                            <textarea id="editor2" name="pil_a"></textarea>
                            <input type="checkbox" name="jawaban[]" value = "B" id="custome-checkbox2"/>
                            <label for="custome-checkbox2">Pil B :</label>
                            <textarea id="editor3" name="pil_b"></textarea>
                            <input type="checkbox" name="jawaban[]" value = "C" id="custome-checkbox3"/>
                            <label for="custome-checkbox3">Pil C :</label>
                            <textarea id="editor4" name="pil_c"></textarea>
                            <input type="checkbox" name="jawaban[]" value = "D" id="custome-checkbox4"/>
                            <label for="custome-checkbox4">Pil D :</label>
                            <textarea id="editor5" name="pil_d"></textarea>
                        </div> -->
                        
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
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
    // CKEDITOR.replace( 'editor2' );
    // CKEDITOR.replace( 'editor3' );
    // CKEDITOR.replace( 'editor4' );
    // CKEDITOR.replace( 'editor5' );

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
                            window.location.href = "<?php echo base_url('bab/all_soal/'.$id); ?>"
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