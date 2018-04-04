<section  id="services-sec">
    <div class="container">
        <!-- <div class="row "> -->
            <h2 align="center">Riwayat Ujian</h2>
            <!-- <form id="" action="" method="POST"> -->
            <br>
            <div class="table-responsive">
            <table border="1" class="table table-bordered table-striped table-hover">
                <tr>
                <!-- <th>Id Matkul</th> -->
                <th>No</th>
                <th>Bab</th>
                <th>NIlai</th>
                </tr>
                <?php $no=0; foreach($riw as $r){ $no++; ?>
                <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $r->bab ?></td>
                <td><?php echo $r->nilai ?></td>
                </tr>
                <?php } ?>
            </table>
            </div>
            <!-- </form> -->
        <!-- </div> -->
    </div>
</section>