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
						<h4 class="widget-title">Form Edit Dosen</h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<?php foreach($dose as $d){ ?>
						<form id="form-edit" action="<?php echo base_url('dosen/update/'.$d->id_dosen)?>" method="POST" enctype="multipart/form-data">
						<label>Nama Dosen :</label>
						<input type="text" name="nm_dosen" class="form-control" value="<?php echo $d->nm_dosen ?>">
                        <label>Username :</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $d->username ?>">
                        <label>Pass :</label>
                        <input type="text" name="pass" class="form-control" value="<?php echo $d->pass ?>">
                        <label>Fakultas :</label>
                        <select class="form-control" name="fakultas" id="fakultas">
                        <?php foreach($fak as $f){ ?>
                        <option value="<?php echo $f->kd_fakultas ?>"<?=$d->fakultas == $f->kd_fakultas ?'selected' : ''?>><?php echo $f->nm_fakultas ?></option>
                        <?php } ?>
                        </select>
                        <label>Jurusan :</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                        <?php foreach($jur as $j){ ?>
                        <option value="<?php echo $j->kd_jurusan ?>"<?=$d->jurusan == $j->kd_jurusan ?'selected' : ''?>><?php echo $j->nm_jurusan ?></option>
                        <?php } ?>
                        </select>
						<label>Foto Dosen :</label>
						<br>
                        <input type="file" name="foto" class="form-control" value="<?php echo $d->foto ?>" id="image-source" onchange="previewImage();">
						<img style="width: 200px;" id="image-preview" src="<?php echo base_url(); ?>/gambar/dosen<?php echo '/'.$d->nm_dosen.'/'.$d->foto ?>">
						<input type="hidden" name="id_dosen" class="form-control" value="<?php echo $d->id_dosen ?>">
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
<!-- <script type="text/javascript">
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
            dataType: 'json',
            success:function(data){
            console.log(data);
            if (data.Code == 'Error') {
                swal("error!", data.Message, "error");
            }else{
                swal({
                    title: "Succes",
                    text: data.Message,
                    type: "success",
                },function(){
                window.location.href = "<?php echo base_url('dosen'); ?>"
            });}
            },
            error:function(data){
                swal("Oops...", "Something went wrong :(", "error");
            },
        });
        // e.preventDefault(); 
        });
    });
</script> -->
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
        window.location.href = "<?php echo base_url('dosen'); ?>"
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