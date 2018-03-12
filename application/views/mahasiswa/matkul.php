<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <!-- <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        <center><h5>Masukkan Kode Kelas</h5></center>
        </div> -->
        <form id="tambah-div" action="<?php echo base_url('dosen/tambah') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <!-- <center><h3>Masukkan Kode Kelas</h3></center>
            <input type="text" class="form-control input-sm" required="" placeholder="" name="nm_dosen"> -->
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Masukkan Kode Kelas">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Daftar</button>
              </span>
            </div>
        </div>
        </form>
    </div>
  </div>
</div>
<section  id="services-sec">
    <div class="container">
        <!-- <div class="row "> -->
            <h2 align="center">Matkul Yang Anda Ambil</h2>
            <!-- <form id="" action="" method="POST"> -->
            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Tambah Kelas</button></center>
            <br>
            <div class="table-responsive">
            <table border="1" class="table table-bordered table-striped table-hover">
                <tr>
                <!-- <th>Id Matkul</th> -->
                <th>No</th>
                <th>Mata Kuliah</th>
                </tr>
                <?php $no=0; foreach($krs as $k){ $no++; ?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $k->nm_matkul ?></td>
                </tr>
                <?php } ?>
            </table>
            </div>
            <!-- </form> -->
        <!-- </div> -->
    </div>
</section>