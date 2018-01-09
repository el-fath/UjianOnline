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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Tambah Mahasiswa</h4>
      </div>
      <form id="tambah-div" action="<?php echo base_url('mahasiswa/tambah') ?>" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      <label>NBI</label>
      <input type="number" class="form-control" required="" placeholder="Masukkan NBI Anda" name="nbi">
      <label>Nama</label>
      <input type="text" class="form-control" required="" placeholder="Masukkan Nama Anda" name="nm_mahasiswa">
      <label>Fakultas :</label>
      <select class="form-control" name="fakultas" id="fakultas">
      <option>Select Fakultas</option>}
      <?php foreach($fak as $f){ ?>
      <option value="<?php echo $f->kd_fakultas ?>"><?php echo $f->nm_fakultas ?></option>
      <?php } ?>
      </select>
      <label>Jurusan :</label>
      <select class="form-control" name="jurusan" id="jurusan">
      <option>Select Fakultas Dulu</option>}
      </select>
      <label>Foto</label>
      <input type="file" class="form-control" placeholder="Upload Foto Anda" name="foto" id="image-source" onchange="previewImage();">
      <img src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg" width="100%" id="image-preview" class="img-rounded img-responsive" style=" width: 200px;">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget widget-pie-chart">
					<header class="widget-header">
						<h4 class="widget-title">Data Dosen</h4>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></button>
					<br>
					<br>
					<div class="table-responsive">
						<table border="1" id="table_siswa" class="table table-bordered table-striped table-hover">
						<thead>
            <tr>
            <th>NBI</th>
            <th>Nama Mahasiswa</th>
            <th>Fakultas-Jurusan</th>
            <th>Foto</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($mhs)): ?>
            <?php foreach($mhs as $m){ ?>
            <tr>
            <td><?php echo $m->nbi ?></td>
            <td><?php echo $m->nm_mahasiswa ?></td>
            <td><?php echo $m->nm_fakultas ?> - <?php echo $m->nm_jurusan ?></td>
            <td><img style="width: 125px;" src="<?php echo base_url(); ?>/gambar<?php echo '/'.$m->foto ?>"></td>
            <td>
                <a href="<?php echo base_url('mahasiswa/edit/'.$m->nbi) ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button></a>
                <a href="<?php echo base_url('mahasiswa/hapus/'.$m->nbi) ?>" class="hapus"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
            </td>
            </tr>
            <?php } else: ?>
            </tbody>
						<tr>
							<td colspan="4" align="center">Data Belum Tersedia</td>
						</tr>
						<?php endif; ?>
						</table>
					</div>
					</div><!-- .widget -->
				</div>
			</div>
		</div><!-- .row -->
	</section><!-- #dash-content -->
</div><!-- .wrap-->
<script>
$(document).ready(function(){
    $('#table_siswa').DataTable();
});
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

        oFReader.onload = function(oFREvent) {
          document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };
</script>
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