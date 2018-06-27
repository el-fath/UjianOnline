<div class="wrap">

  <section class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="widget widget-pie-chart">
          <header class="widget-header">
            <h4 class="widget-title">Halaman Approval</h4>
          </header>
          <hr class="widget-separator"/>
          <div class="widget-body clearfix">
            <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus"></i></button> -->
          <!-- <br> -->
          <!-- <br> -->
          <div class="table-responsive">
            <table id="table_ujian" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Foto</th>
              <th>Status</th>
              <!-- <th>Fak-Jur</th> -->
              <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php if(!empty($la)): ?>
            <?php $no=0; foreach($la as $l){ $no++; ?>
              <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $l->nm_mahasiswa ?></td>
              <td><img style="width: 125px;" src="<?php echo base_url(); ?>/gambar<?php echo '/'.$l->foto ?>"></td>
              <!-- <td><?php echo $l->fakultas ?> - <?php echo $l->jurusan ?></td> -->
              <td><?php echo $l->status ?></td>
              <td>
                <a href="<?php echo base_url('matkul/terima/'.$matkul.'/'.$l->id_krs)?>" class="terima"><button type="button" class="btn btn-success btn-sm" <?=$l->status != 'disetujui' ? '':'disabled' ?>><i class="fa fa-check"></i></button></a>
                <a href="<?php echo base_url('matkul/tolak/'.$matkul.'/'.$l->id_krs)?>" class="tolak"><button type="button" class="btn btn-danger btn-sm" <?=$l->status != 'ditolak' ? '':'disabled' ?>><i class="fa fa-times"></i></button></a>
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
      $('.terima').on('click',function(){
          var getLink = $(this).attr('href');
          swal({
            title: "Are you sure?",
            text: "You will accept this student..!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#439637",
            confirmButtonText: "Yes, confirm",
            cancelButtonText: "No, cancel",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm) {
              swal({
              title: "Success",
              text: "You accepted this student",
              type: "success",
              },function(){
              window.location.href = getLink
              });
            } else {
              swal("Cancelled", "", "error");
            }
          });
          return false;
      });
  });
  jQuery(document).ready(function($){
        $('.tolak').on('click',function(){
            var getLink = $(this).attr('href');
            swal({
              title: "Are you sure?",
              text: "You will reject this student..!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d83939",
              confirmButtonText: "Yes, confirm",
              cancelButtonText: "No, cancel",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm){
              if (isConfirm) {
                swal({
                title: "Success",
                text: "You rejected this student",
                type: "success",
                },function(){
                window.location.href = getLink
                });
              } else {
                swal("Cancelled", "", "error");
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
      window.location.href = "<?php echo base_url('bab'); ?>"
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