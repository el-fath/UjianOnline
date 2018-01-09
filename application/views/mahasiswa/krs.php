<section  id="services-sec">
    <div class="container">
        <!-- <div class="row "> -->
            <h2 align="center">Nama Matkul</h2>
            <form id="form-edit" action="<?php echo base_url('mahasiswa/proses_krs/'.$this->session->userdata("nbi"))?>" method="POST">
            <div class="table-responsive">
            <table border="1" class="table table-bordered table-striped table-hover">
                <tr>
                <!-- <th>Id Matkul</th> -->
                <th>Mata Kuliah</th>
                <th>Fakultas-Jurusan</th>
                <th align="center">Check to take</th>
                </tr>
                <?php foreach($mat as $m){ ?>
                <tr>
                <!-- <td><?php echo $m->id_matkul ?></td> -->
                <td><?php echo $m->nm_matkul ?></td>
                <td><?php echo $m->nm_fakultas ?>-<?php echo $m->nm_jurusan ?></td>
                <td align="center">
                    <?php if ($m->id_krs) {
                        echo "sudah diambil";
                    }else { ?>
                        <div class="checkbox">
                            <label><input type="checkbox" name="matkul[]" value ="<?php echo $m->id_matkul ?>"></label>
                        </div>   
                    <?php } ?>        
                </td>
                </tr>
                <?php } ?>
            </table>
            </div>
            <center>
            <button type="submit" class="btn btn-primary">Submit</button>
            </center>
            </form>
        <!-- </div> -->
    </div>
</section>
<br>
<br>
<br>
<br>
<script type="text/javascript">
    $(document).ready(function(){
        $('#form-edit').on('submit',function(e) {
        e.preventDefault();
        var formData = new FormData( $("#form-edit")[0]);
        $.ajax({
          url: $("#form-edit").attr('action'), //nama action script php sobat
            method:'POST',
            data:new FormData(this),
            contentType: false,
            processData: false,
            success:function(data){
            console.log(data);
          swal({
        title: "Succes",
        text: "Krs Berhasil Dilakukan",
        type: "success",
        },function(){
        window.location.href = "<?php echo base_url('mahasiswa/krs/').$this->session->userdata("jurusan"); ?>"
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
 