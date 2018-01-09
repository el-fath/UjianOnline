<div class="wrap">

	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget widget-pie-chart">
					<header class="widget-header">
						<h4 class="widget-title">Form Edit Fakultas</h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<?php foreach($fak as $f){ ?>
						<form id="form-edit" action="<?php echo base_url('fakultas/update/'.$f->kd_fakultas)?>" method="POST">
						<label>Nama Fakultas :</label><input type="text" name="nm_fakultas" class="form-control" value="<?php echo $f->nm_fakultas ?>">
						<input type="hidden" name="kd_fakultas" class="form-control" value="<?php echo $f->kd_fakultas ?>">
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
        window.location.href = "<?php echo base_url('fakultas'); ?>"
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