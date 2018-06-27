<div class="wrap">
	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget widget-pie-chart">
					<header class="widget-header">
						<h4 class="widget-title">Form Edit Nama Soal</h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<?php foreach($bab as $b){ ?>
						<form id="form-edit" action="<?php echo base_url('bab/update/'.$b->id_test)?>" method="POST">
						<label>Nama Nama Soal :</label><input type="text" name="nm_test" class="form-control" value="<?php echo $b->nm_test ?>">
						<input type="hidden" name="id_test" class="form-control" value="<?php echo $b->id_test ?>">
						<label>Matkul</label>
						<select class="form-control" name="matkul">
				        <?php foreach($matk as $m){ ?>
	        			<option value="<?php echo $m->id_matkul ?>"<?=$b->matkul == $m->id_matkul ?'selected' : ''?>><?php echo $m->nm_matkul ?> - <?php echo $m->nm_kelas ?></option>
				        <?php } ?>
				      	</select>
				      	<!-- <label>Kelas</label>
						<select class="form-control" name="kelas">
				        <?php foreach($kel as $k){ ?>
				        <option value="<?php echo $k->id_kelas ?>"<?=$b->kelas == $k->id_kelas ?'selected' : ''?>><?php echo $k->nm_kelas ?></option>
				        <?php } ?>
				      	</select> -->
				      	<label>Jenis</label>
						<select class="form-control" name="jenis">
				        <?php foreach($jen as $j){ ?>
				        <option value="<?php echo $j->id_j_ujian ?>"<?=$b->jenis == $j->id_j_ujian ?'selected' : ''?>><?php echo $j->nm_ujian ?></option>
				        <?php } ?>
				      	</select>
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
        window.location.href = "<?php echo base_url('matkul/materi/'.$matkul); ?>"
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