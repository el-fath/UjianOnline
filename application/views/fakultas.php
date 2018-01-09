<div class="wrap">
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Tambah Fakultas</h4>
      </div>
      <form id="tambah-div" action="<?php echo base_url('fakultas/tambah') ?>" method="POST">
      <div class="modal-body">
      <label>Nama Fakultas</label>
      <input type="text" class="form-control" required="" placeholder="Masukkan Nama Fakultas" name="nm_fakultas">
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
						<h4 class="widget-title">Data Fakultas</h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></button>
					<br>
					<br>
						<table border="1" class="table table-bordered table-striped table-hover" id="table_fakultas">
						<thead>
            <tr>
            <th>Id Fakultas</th>
            <th>Nama Fakultas</th>
            <th>Action</th>
            </tr>
            </thead>
						<tbody>
            <?php foreach($fak as $f){ ?>
            <tr>
            <td><?php echo $f->kd_fakultas ?></td>
            <td><?php echo $f->nm_fakultas ?></td>
            <td>
                <a href="<?php echo base_url('fakultas/edit/'.$f->kd_fakultas) ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button></a>
                <a href="<?php echo base_url('fakultas/hapus/'.$f->kd_fakultas) ?>" class="hapus"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
						</table>
					</div><!-- .widget -->
				</div>
			</div>
		</div><!-- .row -->
	</section><!-- #dash-content -->
</div>
<script>
$(document).ready(function(){
    $('#table_fakultas').DataTable();
});
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