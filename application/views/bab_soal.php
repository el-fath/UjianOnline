<div class="wrap">
  <section class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="widget widget-pie-chart">
            <header class="widget-header">
                <h4 class="widget-title">Form Soal</h4>
            </header>
            <hr class="widget-separator"/>
            <div class="widget-body clearfix">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table_bab">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>soal</th>
                          <th>Pil_A</th>
                          <th>Pil_B</th>
                          <th>Pil_C</th>
                          <th>Pil_D</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no='0'; if (!empty($soal)){ ?>
                    <?php foreach ($soal as $s) { $no++;?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo read_more($s->soal,75); ?>.....</td>
                        <td><?php echo read_more($s->pil_a,50); ?>.....</td>
                        <td><?php echo read_more($s->pil_b,50); ?>.....</td>
                        <td><?php echo read_more($s->pil_c,50); ?>.....</td>
                        <td><?php echo read_more($s->pil_d,50); ?>.....</td>
                        <td>
                        <a href="<?php echo base_url('bab/edit_soal/'.$s->id_soal) ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button></a>
                        <a href="<?php echo base_url('bab/hapus_soal/'.$s->id_soal) ?>" class="hapus"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                        </td>
                    </tr>
                    <?php }}else{ ?>
                        <td colspan="7" align="center">Data Belum Tersedia</td>
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
        $('#table_bab').DataTable();
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