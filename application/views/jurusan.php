<div class="wrap">
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Tambah Jurusan</h4>
      </div>
      <form id="tambah-div" action="<?php echo base_url('jurusan/tambah') ?>" method="POST">
      <div class="modal-body">
      <label>Nama Jurusan</label>
      <input type="text" class="form-control" required="" placeholder="Masukkan Nama Jurusan" name="nm_jurusan">
      <label>Fakultas</label>
      <select class="form-control" name="fakultas">
        <option>Select Fakultas</option>}
        <?php foreach($fak as $f){ ?>
        <option value="<?php echo $f->kd_fakultas ?>"><?php echo $f->nm_fakultas ?></option>
        <?php } ?>
      </select>
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
						<h4 class="widget-title">Data Jurusan</h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></button>
					<br>
					<br>
          <div class="table-responsive">
            <table border="1" class="table table-bordered table-striped table-hover" id="table_jurusan">
            <thead>
            <tr>
            <th>Id Jurusan</th>
            <th>Nama Jurusan</th>
            <th>Fakultas</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($jur as $j){ ?>
            <tr>
            <td><?php echo $j->kd_jurusan ?></td>
            <td><?php echo $j->nm_jurusan ?></td>
            <td><?php echo $j->nm_fakultas ?></td>
            <td>
                <a href="<?php echo base_url('jurusan/edit/'.$j->kd_jurusan) ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button></a>
                <a href="<?php echo base_url('jurusan/hapus/'.$j->kd_jurusan) ?>" class="hapus"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
          </div>
          </div><!-- .widget -->
        </div>
      </div>
    </div><!-- .row -->
  </section><!-- #dash-content -->
</div>
<script>
$(document).ready(function(){
    $('#table_jurusan').DataTable();
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
      window.location.href = "<?php echo base_url('jurusan'); ?>"
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