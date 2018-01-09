<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Campsite Registration</title>  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/registrasi/css/style.css">
  <link href='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css' rel='stylesheet' type='text/css'>
  <link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/css/bootstrap-switch.css' rel='stylesheet' type='text/css'>
  <link href='https://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet' type='text/css'>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js' type='text/javascript'></script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js' type='text/javascript'></script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/js/bootstrap-switch.min.js' type='text/javascript'></script>
  <script src='https://davidstutz.github.io/bootstrap-multiselect/js/bootstrap-multiselect.js' type='text/javascript'></script>
</head>
<body>
<br>
  <div class='container'>
    <div class='panel panel-primary dialog-panel'>
      <div class='panel-heading'>
        <h4 align="center">Form Pendaftaran Untuk Dosen</h4>
      </div>
      <div class='panel-body'>
        <form class='form-horizontal' action="<?php echo base_url('login/tambah') ?>" method="POST" enctype="multipart/form-data">
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_accomodation'>NIDN</label>
            <div class='col-md-6'>
              <input type="text" name="id_dosen" class="form-control">
            </div>
          </div>
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_accomodation'>Nama</label>
            <div class='col-md-6'>
              <input type="text" name="nm_dosen" class="form-control">
            </div>
          </div>
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_accomodation'>Alamat</label>
            <div class='col-md-6'>
              <input type="text" name="alamat" class="form-control">
            </div>
          </div>
          <div class='form-group'>
            <label class='control-label col-md-2 col-md-offset-2' for='id_accomodation'>Foto</label>
            <div class='col-md-6'>
              <input type="file" name="foto" class="form-control" id="image-source" onchange="previewImage();">
              <br>
              <img src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg" width="100%" id="image-preview" class="img-rounded img-responsive" style=" width: 200px;">
            </div>
          </div>
          <div class='form-group'>
            <div class='col-md-offset-4 col-md-3'>
              <button class='btn-lg btn-primary' type='submit'>Daftar</button>
              <button class='btn-lg btn-danger' style='float:right' type='reset'>Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
  <script src="<?php echo base_url(); ?>assets/registrasi/js/index.js"></script>
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
</html>
