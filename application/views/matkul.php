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
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Tambah Matkul</h4>
      </div>
      <form id="tambah-div" action="<?php echo base_url('matkul/tambah') ?>" method="POST">
      <div class="modal-body">
      <label>Nama matkul</label>
      <input type="text" class="form-control" required="" placeholder="Masukkan Nama Matkul" name="nm_matkul">
      <label>Fakultas</label>
      <select class="form-control" name="fakultas" id="fakultas">
        <option>Select Fakultas</option>}
        <?php foreach($fak as $f){ ?>
        <option value="<?php echo $f->kd_fakultas ?>"><?php echo $f->nm_fakultas ?></option>
        <?php } ?>
      </select>
      <label>Jurusan</label>
      <select class="form-control" name="jurusan" id="jurusan">
        <option value="">Mohon Pilih Fakultas Dulu</option>
      </select>
      <label>Kelas</label>
      <select class="form-control" name="kelas">
        <?php foreach($kel as $k){ ?>
        <option value="<?php echo $k->id_kelas ?>"><?php echo $k->nm_kelas ?></option>
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
						<h4 class="widget-title">Mata Kuliah</h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></button>
					<br>
					<br>
            <div class="table-responsive">
            <table id="table_matkul" border="1" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
            <th>Id Matkul</th>
            <th>Mata Kuliah - Kelas</th>
            <th>Fakultas - Jurusan</th>
            <th>Dibuat</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($mat as $m){ ?>
            <tr>
            <td><?php echo $m->id_matkul ?></td>
            <td><?php echo $m->nm_matkul ?> - <?php echo $m->nm_kelas ?></td>
            <td><?php echo $m->nm_fakultas ?> - <?php echo $m->nm_jurusan ?></td>
            <td><?php echo $m->tgl ?></td>
            <td>
              <div class="btn-group" role="group">
                <a href="<?php echo base_url('matkul/lihat_anggota/'.$m->id_matkul) ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i></a>
                <a href="<?php echo base_url('matkul/materi/'.$m->id_matkul) ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-folder-open-o"></i></a>
                <a href="<?php echo base_url('matkul/edit/'.$m->id_matkul) ?>" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="<?php echo base_url('matkul/hapus/'.$m->id_matkul) ?>" type="button" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
              </div>
                <!-- <a href="<?php ?>"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-check-square-o"></i></button></a>
                <a href="<?php echo base_url('matkul/materi/'.$m->id_matkul) ?>"><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-folder-open-o"></i></button></a>
                <a href="<?php echo base_url('matkul/edit/'.$m->id_matkul) ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
                <a href="<?php echo base_url('matkul/hapus/'.$m->id_matkul) ?>" class="hapus"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a> -->
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
    $('#table_matkul').DataTable();
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