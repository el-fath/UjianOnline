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
						<h4 class="widget-title">Form Edit Mahasiswa</h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<?php foreach($mhs as $m){ ?>
						<form id="form-edit" action="<?php echo base_url('mahasiswa/update/'.$m->nbi)?>" method="POST" enctype="multipart/form-data">
						<label>Nama Mahasiswa :</label>
						<input type="text" name="nm_mahasiswa" class="form-control" value="<?php echo $m->nm_mahasiswa ?>">
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
						<label>Foto Mahasiswa :</label>
						<br>
                        <input type="file" name="foto" class="form-control" value="<?php echo $m->foto ?>" id="image-source" onchange="previewImage();">
						<img style="width: 200px;" id="image-preview" src="<?php echo base_url(); ?>/gambar<?php echo '/'.$m->foto ?>">
						<input type="hidden" name="nbi" class="form-control" value="<?php echo $m->nbi ?>">
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
        window.location.href = "<?php echo base_url('mahasiswa'); ?>"
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