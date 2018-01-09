<div class="wrap">

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Tambah Ujian</h4>
      </div>
      <form id="tambah-div" action="<?php echo base_url('jujian/tambah') ?>" method="POST">
      <div class="modal-body">
      <input type="text" class="form-control" required="" placeholder="Masukkan Nama Ujian" name="nm_ujian">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div

	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget widget-pie-chart">
					<header class="widget-header">
						<h4 class="widget-title">Jenis Ujian</h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></button>
					<br>
					<br>
						<table border="1" class="table table-bordered table-striped table-hover">
						<tr>
						<th>Id</th>
						<th>Jenis Ujian</th>
						<th>Action</th>
						</tr>
						<?php foreach($juji as $j){ ?>
						<tr>
						<td><?php echo $j->id_j_ujian ?></td>
						<td><?php echo $j->nm_ujian ?></td>
						<td>
				        <a href="<?php echo base_url('jujian/edit/'.$j->id_j_ujian) ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button></a>
				        <a href="<?php echo base_url('jujian/hapus/'.$j->id_j_ujian) ?>" class="hapus"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
				        </td>
						</tr>
						<?php } ?>
						</table>
					</div><!-- .widget -->
				</div>
			</div>
		</div><!-- .row -->
	</section><!-- #dash-content -->
</div>
<script>
    jQuery(document).ready(function($){
        $('.hapus').on('click',function(){
            var getLink = $(this).attr('href');
            swal({
              title: "Are you sure?",
              text: "You will not be able to recover this imaginary file!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              cancelButtonText: "No, cancel plx!",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm){
              if (isConfirm) {
                swal({
                title: "Deleted",
                text: "Data Berhasil Dihapus",
                type: "success",
                },function(){
                window.location.href = getLink
                });
              } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
              }
            });
            return false;
        });
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#tambah-div').on('submit',function(e) {
      e.preventDefault();
      var formData = new FormData( $("#tambah-div")[0]);
      $.ajax({
        url: $("#tambah-div").attr('action'), //nama action script php sobat
          method:'POST',
          data:new FormData(this),
          contentType: false,
            processData: false,
          success:function(data){
          console.log(data);
        swal({
      title: "Succes",
      text: "Tambah Data Berhasil",
      type: "success",
      },function(){
      window.location.href = "<?php echo base_url('jujian'); ?>"
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