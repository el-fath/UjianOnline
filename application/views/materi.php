<div class="wrap">

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Tambah Test</h4>
      </div>
      <form id="tambah-div" action="<?php echo base_url('bab/tambah') ?>" method="POST">
      <div class="modal-body">
      <label>Nama Test</label>
      <input type="text" class="form-control" required="" placeholder="Masukkan Nama Test" name="nm_test">
      <label>Mata Kuliah - Kelas</label>
      <select class="form-control" name="matkul">
        <?php foreach($matk as $m){ ?>
        <option value="<?php echo $m->id_matkul ?>"><?php echo $m->nm_matkul ?> - <?php echo $m->nm_kelas ?></option>
        <?php } ?>
      </select>
<!--       <label>Kelas</label>
      <select class="form-control" name="kelas">
        <?php foreach($kel as $k){ ?>
        <option value="<?php echo $k->id_kelas ?>"><?php echo $k->nm_kelas ?></option>
        <?php } ?>
      </select> -->
      <label>Jenis Ujian</label>
      <select class="form-control" name="jenis">
        <?php foreach($jen as $j){ ?>
        <option value="<?php echo $j->id_j_ujian ?>"><?php echo $j->nm_ujian ?></option>
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
						<h4 class="widget-title">Data Test </h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></button>
					<br>
					<br>
          <div class="table-responsive">
            <table id="table_ujian" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
              <th>Id Test</th>
              <th>Nama Test</th>
              <th>Matkul</th>
              <th>Jenis</th>
              <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php if(!empty($bab)): ?>
            <?php foreach($bab as $b){ ?>
              <tr>
              <td><?php echo $b->id_test ?></td>
              <td><?php echo $b->nm_test ?></td>
              <td><?php echo $b->nm_matkul ?> - <?php echo $b->nm_kelas ?></td>
              <td><?php echo $b->nm_ujian ?></td>
              <td>
                <div class="btn-group" role="group">
                  <?php if ($b->start == 1){ ?>
                  <a href="<?php echo base_url('bab/stop/'.$matkul.'/'.$b->id_test) ?>" type="button" class="btn btn-danger btn-sm stop"><i class="fa fa-hourglass-1"></i></a>
                  <?php }else{ ?>
                  <a href="<?php echo base_url('bab/mulai/'.$matkul.'/'.$b->id_test) ?>" type="button" class="btn btn-primary btn-sm mulai"><i class="fa fa-hourglass-1"></i></a>
                  <?php } ?>
                  <!-- <a href="<?php echo base_url('bab/buat_soal/'.$b->id_test) ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> -->
                  <a href="<?php echo base_url('bab/all_soal/'.$b->id_test) ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                  <a href="<?php echo base_url('bab/lihat_nilai/'.$b->id_test) ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></a>
                  <a href="<?php echo base_url('bab/edit/'.$matkul.'/'.$b->id_test) ?>" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                  <a href="<?php echo base_url('bab/hapus/'.$matkul.'/'.$b->id_test) ?>" type="button" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                </div>
                  <!-- <a href="<?php echo base_url('bab/edit/'.$b->id_test) ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button></a>
                  <a href="<?php echo base_url('bab/hapus/'.$b->id_test) ?>" class="hapus"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                  <a href="<?php echo base_url('bab/buat_soal/'.$b->id_test) ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button></a>
                  <a href="<?php echo base_url('bab/all_soal/'.$b->id_test) ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button></a> -->
              </td>
              </tr>
            <?php } else :?>
            <tr>
              <td colspan="6" align="center">Data Belum Tersedia</td>
            </tr>
            </tbody>
            <?php endif; ?>
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
    $('#table_ujian').DataTable();
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
    jQuery(document).ready(function($){
        $('.mulai').on('click',function(){
            var getLink = $(this).attr('href');
            swal({
              title: "Are you sure?",
              text: "are you sure to begin",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#32ad2a",
              confirmButtonText: "Yes, begin it!",
              cancelButtonText: "No, cancel!",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm){
              if (isConfirm) {
                swal({
                title: "Success",
                text: "Berhasil Dimulai",
                type: "success",
                },function(){
                window.location.href = getLink
                });
              } else {
                swal("Cancelled", "dibatalkan :)", "error");
              }
            });
            return false;
        });
    });
    jQuery(document).ready(function($){
        $('.stop').on('click',function(){
            var getLink = $(this).attr('href');
            swal({
              title: "Are you sure?",
              text: "are you sure to stop",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#e43838",
              confirmButtonText: "Yes, stop it!",
              cancelButtonText: "No, cancel!",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm){
              if (isConfirm) {
                swal({
                title: "Success",
                text: "Berhasil Di stop",
                type: "success",
                },function(){
                window.location.href = getLink
                });
              } else {
                swal("Cancelled", "dibatalkan :)", "error");
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