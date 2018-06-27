<div class="wrap">
	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget widget-pie-chart">
					<header class="widget-header">
            <?php foreach ($tes as $t) { ?>
						<h4 class="widget-title">Nilai Mahasiswa Pada <?php echo $t->nm_test ?> Matkul <?php echo $t->nm_matkul ?></h4>
            <?php } ?>
					</header>
					<hr class="widget-separator"/>
					<div class="widget-body clearfix">
          <div class="table-responsive">
            <table id="table_ujian" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
              <th>Nama</th>
              <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
            <?php if(!empty($nil)): ?>
            <?php foreach($nil as $n){ ?>
              <tr>
              <td><?php echo $n->nm_mahasiswa ?></td>
              <td><?php echo $n->nilai ?></td>
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
</script>