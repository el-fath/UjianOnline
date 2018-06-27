<section>
    <div class="container">
        <!-- <div class="row "> -->
            <h2 align="center">Ujian Yang Tersedia</h2>
            <div class="table-responsive">
            <table border="1" class="table table-bordered table-striped table-hover">
                <tr>
                <th>Nama Soal</th>
                <th>Mata Kuliah</th>
                <th>Kelas</th>
                <th>Jenis Ujian</th>
                <!-- <th>Jenis</th> -->
                <th align="center">Status / Action</th>
                </tr>
                <?php foreach($bab_soal as $s){ ?>
                <tr>
                <td><?php echo $s->nm_test ?></td>
                <td><?php echo $s->nm_matkul ?></td>
                <td><?php echo $s->nm_kelas ?></td>
                <td><?php echo $s->nm_ujian ?></td>
                <!-- <td><?php echo $s->status ?></td> -->
                <td>
                    <?php if ($s->start == 1): ?>
                        <a href="<?php echo base_url('mahasiswa/ujian/'.$s->id_test) ?>">
                            <button class="btn btn-primary">Mulai</button>
                        </a> 
                    <?php else: echo'Ditutup'; endif ?>
                </td>
                </tr>
                <?php } ?>
            </table>
            </div>
        <!-- </div> -->
    </div>
</section>
<br>
<br>
<br>
<br>