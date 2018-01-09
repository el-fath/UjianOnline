<script>
$(document).ready(function(){
  $("#fakultas").change(function (){
    var url = "<?php echo base_url('matkul/ajax_jurusan');?>/"+$(this).val();
    $('#jurusan').load(url);
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
						<h4 class="widget-title">Form Edit Matkul</h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<?php foreach($matk as $m){ ?>
						<form id="form-edit" action="<?php echo base_url('matkul/update/'.$m->id_matkul)?>" method="POST">
						<label>Nama Matkul :</label><input type="text" name="nm_matkul" class="form-control" value="<?php echo $m->nm_matkul ?>">
                        <label>Fakultas :</label>
                        <select class="form-control" name="fakultas" id="fakultas">
                        <?php foreach($fak as $f){ ?>
                        <option value="<?php echo $f->kd_fakultas ?>"<?=$m->fakultas == $f->kd_fakultas ?'selected' : ''?>><?php echo $f->nm_fakultas ?></option>
                        <?php } ?>
                        </select>
                        <label>Jurusan :</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                        <?php foreach($jur as $j){ ?>
                        <option value="<?php echo $j->kd_jurusan ?>"<?=$m->jurusan == $j->kd_jurusan ?'selected' : ''?>><?php echo $j->nm_jurusan ?></option>
                        <?php } ?>
                        </select>
                        <label>Kelas :</label>
                        <select class="form-control" name="kelas">
                        <?php foreach($kel as $k){ ?>
                        <option value="<?php echo $k->nm_kelas ?>"<?=$m->kelas == $k->nm_kelas ?'selected' : ''?>><?php echo $k->nm_kelas ?></option>
                        <?php } ?>
                        </select>
						<input type="hidden" name="id_matkul" class="form-control" value="<?php echo $m->id_matkul ?>">
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
    $(document).ready(function(){
        $('#form-edit').on('submit',function(e) {
        e.preventDefault();
        var formData = new FormData( $("#form-edit")[0]);
        $.ajax({
          url: $("#form-edit").attr('action'), //nama action script php sobat
            method:'POST',
            data:new FormData(this),
            contentType: false,
            processData: false,
            success:function(data){
            console.log(data);
          swal({
        title: "Succes",
        text: "Edit Data Berhasil",
        type: "success",
        },function(){
        window.location.href = "<?php echo base_url('matkul'); ?>"
        });
            },
            error:function(data){
          swal("Oops...", "Something went wrong :(", "error");
            },
        });
        e.preventDefault(); 
        });
    });
</script>