<div class="wrap">

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Tambah Dosen</h4>
      </div>
      <form id="tambah-div" action="<?php echo base_url('dosen/tambah') ?>" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      <label>NIDN</label>
      <input type="text" class="form-control" required="" placeholder="Masukkan NIDN Dosen" name="id_dosen">
      <label>Nama</label>
      <input type="text" class="form-control" required="" placeholder="Masukkan Nama Dosen" name="nm_dosen">
      <label>Foto</label>
      <input type="file" class="form-control" required="" placeholder="Upload Foto Anda" name="foto" id="image-source" onchange="previewImage();">
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
						<table border="1" class="table table-bordered table-striped table-hover">
						<tr>
						<th>Id Dosen</th>
						<th>Nama Dosen</th>
						<th>Foto</th>
						<th>Action</th>
						</tr>
						<?php if(!empty($dos)): ?>
						<?php foreach($dos as $d){ ?>
						<tr>
						<td><?php echo $d->id_dosen ?></td>
						<td><?php echo $d->nm_dosen ?></td>
						<td><img style="width: 125px;" src="<?php echo base_url(); ?>/gambar/dosen<?php echo '/'.$d->nm_dosen.'/'.$d->foto ?>">
                      	</td>
						<td>
				        <a href="<?php echo base_url('dosen/edit/'.$d->id_dosen) ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button></a>
				        <a href="<?php echo base_url('dosen/hapus/'.$d->id_dosen) ?>" class="hapus"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
				        </td>
						</tr>
						<?php } else: ?>
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
    <div class="row">
      <div class="col-md-12">
        <div class="widget products-widget">
          <header class="widget-header">
            <h4 class="widget-title">Top items this month</h4>
          </header><!-- .widget-header -->
          <hr class="widget-separator">
          <div class="widget-body">
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <a href="javascript:void(0)" class="product">
                  <img class="img-responsive" src="<?php echo base_url(); ?>assets/assets/images/product-1.jpg" alt="oroduct image">
                  <div class="product-caption clearfix">
                    <span>147 Sales</span>
                    <span class="pull-right">$450</span>
                  </div><!-- .product-caption -->
                </a><!-- .product -->
              </div><!-- END column -->
              <div class="col-sm-6 col-md-3">
                <a href="javascript:void(0)" class="product">
                  <img class="img-responsive" src="<?php echo base_url(); ?>assets/assets/images/product-2.jpg" alt="oroduct image">
                  <div class="product-caption clearfix">
                    <span>147 Sales</span>
                    <span class="pull-right">$450</span>
                  </div><!-- .product-caption -->
                </a><!-- .product -->
              </div><!-- END column -->
              <div class="col-sm-6 col-md-3">
                <a href="javascript:void(0)" class="product">
                  <img class="img-responsive" src="<?php echo base_url(); ?>assets/assets/images/product-3.jpg" alt="oroduct image">
                  <div class="product-caption clearfix">
                    <span>147 Sales</span>
                    <span class="pull-right">$450</span>
                  </div><!-- .product-caption -->
                </a><!-- .product -->
              </div><!-- END column -->
              <div class="col-sm-6 col-md-3">
                <a href="javascript:void(0)" class="product">
                  <img class="img-responsive" src="<?php echo base_url(); ?>assets/assets/images/product-4.jpg" alt="oroduct image">
                  <div class="product-caption clearfix">
                    <span>147 Sales</span>
                    <span class="pull-right">$450</span>
                  </div><!-- .product-caption -->
                </a><!-- .product -->
              </div><!-- END column -->
            </div><!-- .row -->
          </div><!-- .widget-body -->
        </div><!-- .widget -->
      </div><!-- END column -->
    </div><!-- .row -->
	</section><!-- #dash-content -->
</div><!-- .wrap-->
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