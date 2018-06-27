<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bab extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('nama')){
			redirect('login');
		}
		$this->load->model('models');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$where = $this->session->userdata('id_dosen');
		$data['matk']  = $this->models->tampil_fakjur_w('tb_matkul',$where);

		$data['kel'] = $this->models->tampil('tb_kelas')->result();
		$data['jen'] = $this->models->tampil('tb_jenis_ujian')->result();
		$data['mat'] = $this->models->tampil('tb_matkul')->result();
		$data['bab'] = $this->models->tampil_join_bab();
		$this->load->view('template/header');
		$this->load->view('bab',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{ 
		$nm_test = $this->input->post('nm_test');
		$matkul = $this->input->post('matkul');
		// $kelas  = $this->input->post('kelas');
		$jenis  = $this->input->post('jenis');

		$data = array(
			"nm_test"  => $nm_test,
			"matkul"   => $matkul,
			"waktu"    => 120,
			// "kelas" => $kelas,
			"jenis"    => $jenis
		);

		$this->models->tambah('tb_test',$data);
		// redirect('matkul','refresh');
	}

	public function edit($matkul,$id_test)
	{
		$where = array('id_test' => $id_test);
		$data['kel'] = $this->models->tampil('tb_kelas')->result();
		$data['jen'] = $this->models->tampil('tb_jenis_ujian')->result();
		$data['mat'] = $this->models->tampil('tb_matkul')->result();
		$data['bab'] = $this->models->edit($where,'tb_test')->result();
		
		$where1 = $this->session->userdata('id_dosen');
		$data['matk']  = $this->models->tampil_fakjur_w('tb_matkul',$where1);
		
		$data['matkul'] = $matkul;
		$this->load->view('template/header');
		$this->load->view('e_bab',$data);
		$this->load->view('template/footer');
 	}

 	public function update($id_test)
 	{
		$id_test  = $id_test;
		$nm_test  = $this->input->post('nm_test');
		$matkul   = $this->input->post('matkul');
		// $kelas = $this->input->post('kelas');
		$jenis    = $this->input->post('jenis');
		
		$where = array('id_test' => $id_test);
		
		$data  = array(
			"nm_test"  => $nm_test,
			"matkul"   => $matkul,
			"waktu"    => 120,
			// "kelas" => $kelas,
			"jenis"    => $jenis
		);

 		$this->models->update($where,$data,'tb_test');
 	}

 	public function hapus($matkul,$id_test)
 	{
 		$where = array('id_test' => $id_test);
 		$this->models->hapus($where,'tb_test');
 		redirect('matkul/materi/'.$matkul,'refresh');
 	}

 	public function hapus_soal($id_test,$id_soal)
 	{
 		$where = array('id_soal' => $id_soal);
 		$this->models->hapus($where,'tb_soal');
 		redirect('bab/all_soal/'.$id_test,'refresh');
 	}

 	public function mulai($matkul,$id_test)
 	{
 		$where = array('id_test' => $id_test);
 		$data = array('start' => 1 );
 		$this->models->update($where,$data,'tb_test');
 		redirect('matkul/materi/'.$matkul,'refresh');
 	}

 	public function stop($matkul,$id_test)
 	{
 		$where = array('id_test' => $id_test);
 		$data = array('start' => 0 );
 		$this->models->update($where,$data,'tb_test');
 		redirect('matkul/materi/'.$matkul,'refresh');
 	}

 	function lihat_nilai($id_test)
 	{
 		$where = array('id_test' => $id_test);
 		$data['tes'] = $this->models->tampil_test('tb_test',$where);
 		$data['nil'] = $this->models->tampil_nilai('tb_riwayat',$where);
 		$this->load->view('template/header');
		$this->load->view('lihat_nilai',$data);
		$this->load->view('template/footer');
 	}

 	public function buat_soal($id_test)
 	{
 		$where = array('id_test' => $id_test);
		$data['id']    = $id_test;
		$data['kel']   = $this->models->tampil('tb_kelas')->result();
		$data['jen']   = $this->models->tampil('tb_jenis_ujian')->result();
		$data['jen_s'] = $this->models->tampil('tb_jenis_soal')->result();
		$data['bab']   = $this->models->edit($where,'tb_test')->result();
		
		$where1 = $this->session->userdata('id_dosen');
		$data['matk']  = $this->models->tampil_fakjur_w('tb_matkul',$where1);

		$this->load->view('template/header');
		$this->load->view('buat_soal',$data);
		$this->load->view('template/footer');
 	}

	public function all_soal($id_test)
	{
		$where = array('id_test' => $id_test);
		$data['bab'] = $id_test;
		// var_dump($data['bab']);
		// die();
		$data['soal'] = $this->models->edit($where,'tb_soal')->result();
		$this->load->view('template/header');
		$this->load->view('bab_soal',$data);
		$this->load->view('template/footer');
	}

	public function edit_soal($id_test,$id_soal)
	{
		$where = array('id_soal' => $id_soal);
		$data['kel']    = $this->models->tampil('tb_kelas')->result();
		$data['jen']    = $this->models->tampil('tb_jenis_ujian')->result();
		$data['jen_s']  = $this->models->tampil('tb_jenis_soal')->result();
		$data['soal']   = $this->models->tampil_all_soal($where);

		$where1 = $this->session->userdata('id_dosen');
		$data['matk']  = $this->models->tampil_fakjur_w('tb_matkul',$where1);

		$data['id_test'] = $id_test;
		$this->load->view('template/header');
		$this->load->view('e_soal',$data);
		$this->load->view('template/footer');	
	}

	public function tambah_soal()
	{
		$this->form_validation->set_rules('soal','Soal','required');
		if($this->form_validation->run() == false){
			$arrayResponse = array('Code' => "Error",'Message' => validation_errors(), );
			echo json_encode($arrayResponse);
		}else{
			
		$soal      = $this->input->post('soal');
		$pil_a     = $this->input->post('pil_a');
		$pil_b     = $this->input->post('pil_b');
		$pil_c     = $this->input->post('pil_c');
		$pil_d     = $this->input->post('pil_d');
		$pil_e     = $this->input->post('pil_e');
		$pil_f     = $this->input->post('pil_f');
		$pil_g     = $this->input->post('pil_g');
		$pil_h     = $this->input->post('pil_h');
		$pil_i     = $this->input->post('pil_i');
		$pil_j     = $this->input->post('pil_j');
		$id_test   = $this->input->post('id_test');
		$id_j_soal = $this->input->post('id_j_soal');
		// $matkul = $this->input->post('matkul');
		// $kelas  = $this->input->post('kelas');
		// $jenis  = $this->input->post('jenis');

		$jawaban  = $this->input->post('jawaban');
		// $gabungJawaban = "";
		// foreach ($jawaban as $key => $result) {
		// 	$gabungJawaban = $gabungJawaban." ".$result;
		// }

		// if ($id_j_soal==2) {
		// $chunks = str_split($jawaban, 1);
		// $jawaban = implode('|', $chunks);
		// }

		if ($id_j_soal==4) {
			$data = array(
				"soal"          => $soal,
				"id_test"       => $id_test,
				"id_j_soal"     => $id_j_soal,
				"jawaban_isian" => $jawaban,
				"pembuat"       => $this->session->userdata('id_dosen')
			);
		}else if($id_j_soal==5){
			$data = array(
				"soal"      => $soal,
				"pil_a"     => $pil_a,
				"pil_b"     => $pil_b,
				"pil_c"     => $pil_c,
				"pil_d"     => $pil_d,
				"pil_e"     => $pil_e,
				"pil_f"     => $pil_f,
				"pil_g"     => $pil_g,
				"pil_h"     => $pil_h,
				"pil_i"     => $pil_i,
				"pil_j"     => $pil_j,
				"id_test"   => $id_test,
				"id_j_soal" => $id_j_soal,
				"jawaban"   => $jawaban,
				"pembuat"   => $this->session->userdata('id_dosen')
			);
		}else{
			$data = array(
				"soal"      => $soal,
				"pil_a"     => $pil_a,
				"pil_b"     => $pil_b,
				"pil_c"     => $pil_c,
				"pil_d"     => $pil_d,
				"pil_e"     => $pil_e,
				"id_test"   => $id_test,
				"id_j_soal" => $id_j_soal,
				"jawaban"   => $jawaban,
				"pembuat"   => $this->session->userdata('id_dosen')
			);
		}

		$this->models->tambah('tb_soal',$data);

		$arrayResponse = array('Code' => "Succees",'Message' => "Succees Bro", );
		echo json_encode($arrayResponse);
		}
		// redirect('matkul','refresh');
	}

	public function update_soal($id_soal)
 	{
 		$this->form_validation->set_rules('soal','Soal','required');
		if($this->form_validation->run() == false){
			$arrayResponse = array('Code' => "Error",'Message' => validation_errors(), );
			echo json_encode($arrayResponse);
		}else{

		$id_soal   = $id_soal;
		$id_test   = $this->input->post('id_test');
		$soal      = $this->input->post('soal');
		$pil_a     = $this->input->post('pil_a');
		$pil_b     = $this->input->post('pil_b');
		$pil_c     = $this->input->post('pil_c');
		$pil_d     = $this->input->post('pil_d');
		$pil_e     = $this->input->post('pil_e');
		$pil_f     = $this->input->post('pil_f');
		$pil_g     = $this->input->post('pil_g');
		$pil_h     = $this->input->post('pil_h');
		$pil_i     = $this->input->post('pil_i');
		$pil_j     = $this->input->post('pil_j');
		$id_j_soal = $this->input->post('id_j_soal');

		$jawaban  = $this->input->post('jawaban');
		// $gabungJawaban = "";

		// foreach ($jawaban as $key => $result) {
		// 	$gabungJawaban = $gabungJawaban." ".$result;
		// }

		// if ($id_j_soal==2) {
		// $chunks = str_split($jawaban, 1);
		// $jawaban = implode('|', $chunks);
		// }
		
		$where = array('id_soal' => $id_soal);
		
		if ($id_j_soal==4) {
			$data  = array(
				"soal"          => $soal,
				"id_j_soal"     => $id_j_soal,
				"jawaban_isian" => $jawaban
				// "jawaban"   => trim($gabungJawaban),
			);
		}else if($id_j_soal==5){
			$data  = array(
				"soal"      => $soal,
				"pil_a"     => $pil_a,
				"pil_b"     => $pil_b,
				"pil_c"     => $pil_c,
				"pil_d"     => $pil_d,
				"pil_e"     => $pil_e,
				"pil_f"     => $pil_f,
				"pil_g"     => $pil_g,
				"pil_h"     => $pil_h,
				"pil_i"     => $pil_i,
				"pil_j"     => $pil_j,
				"id_j_soal" => $id_j_soal,
				"jawaban"   => $jawaban
				// "jawaban"   => trim($gabungJawaban),
			);
		}else{
			$data  = array(
				"soal"      => $soal,
				"pil_a"     => $pil_a,
				"pil_b"     => $pil_b,
				"pil_c"     => $pil_c,
				"pil_d"     => $pil_d,
				"pil_e"     => $pil_e,
				"id_j_soal" => $id_j_soal,
				"jawaban"   => $jawaban
				// "jawaban"   => trim($gabungJawaban),
			);
		}

 		$this->models->update($where,$data,'tb_soal');
 		$arrayResponse = array('Code' => "Succees",'Message' => "Succees Bro", );
		echo json_encode($arrayResponse);
 		// redirect('bab/all_soal/'.$id_test, 'refresh');
		}
 	}

 	public function nyobak()
 	{
		$data['kel'] = $this->models->tampil('tb_kelas')->num_rows();
 		$this->load->view('nyobak',$data);
 	}

 	public function ajax_jenis_soal($id_j_soal)
	{
		if ($id_j_soal==1) {
		    $data = "
                <div class='radio radio-primary'>
                    <input type='radio' name='jawaban' value = '16' id='custome-checkbox1'/>
                    <label for='custome-checkbox1'>Pil A :</label>
                    <textarea  id='editor2' name='pil_a'></textarea>
                    <input type='radio' name='jawaban' value = '8' id='custome-checkbox2'/>
                    <label for='custome-checkbox2'>Pil B :</label>
                    <textarea id='editor3' name='pil_b'></textarea>
                    <input type='radio' name='jawaban' value = '4' id='custome-checkbox3'/>
                    <label for='custome-checkbox3'>Pil C :</label>
                    <textarea id='editor4' name='pil_c'></textarea>
                    <input type='radio' name='jawaban' value = '2' id='custome-checkbox4'/>
                    <label for='custome-checkbox4'>Pil D :</label>
                    <textarea id='editor5' name='pil_d'></textarea>
                    <input type='radio' name='jawaban' value = '1' id='custome-checkbox4'/>
                    <label for='custome-checkbox4'>Pil E :</label>
                    <textarea id='editor6' name='pil_e'></textarea>
                </div>
                <script type='text/javascript'>
				    CKEDITOR.replace( 'editor2' );
				    CKEDITOR.replace( 'editor3' );
				    CKEDITOR.replace( 'editor4' );
				    CKEDITOR.replace( 'editor5' );
				    CKEDITOR.replace( 'editor6' );
				</script>
		    ";
		} else if ($id_j_soal==2) {
			// <script>
			//   $( function() {
			//     $( '#sortable' ).sortable({
			//       placeholder: 'ui-state-highlight'
			//     });
			//     $( '#sortable' ).disableSelection();
			//   } );
			// </script>
			// <style>
			//  #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
			//  #sortable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
			//  html>body #sortable li { height: 1.5em; line-height: 1.2em; }
			//  .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
			// </style>
	  		// <ul id='sortable'>
			//   <li class='ui-state-default'>Item 1</li>
			//   <li class='ui-state-default'>Item 2</li>
			//   <li class='ui-state-default'>Item 3</li>
			//   <li class='ui-state-default'>Item 4</li>
			// </ul>
		    $data = "
		    	<label>Tuliskan urutan yang salah</label><br>
		    	<label>1</label>
                <textarea name='pil_a' class='form-control' required=''></textarea>
		    	<label>2</label>
                <textarea name='pil_b' class='form-control' required=''></textarea>
		    	<label>3</label>
                <textarea name='pil_c' class='form-control' required=''></textarea>
		    	<label>4</label>
                <textarea name='pil_d' class='form-control' required=''></textarea>
                <label>5</label>
                <textarea name='pil_e' class='form-control' required=''></textarea>
		    	<label>Urutan Yang Benar, contoh: 32145</label>
                <input type='number' name='jawaban' class='form-control'>
		    ";
		} else if ($id_j_soal==3) {
		    $data = "
		    	<br>
	    		<div class='btn-group' data-toggle='buttons'>
                  	<label class='btn btn-success'>
                    <input type='radio' name='jawaban' value ='1'>Benar
                  	</label>
                  	<label class='btn btn-danger'>
                    <input type='radio' name='jawaban' value ='0'>Salah
                  	</label>
                </div>
		    ";
		} else if ($id_j_soal==4) {
			$data = "
				<label>yang akan dijadikan acuan presentase dengan jawaban mahasiswa</label>
                <textarea class='form-control' name='jawaban'></textarea>
			";
		} else if ($id_j_soal==5) {
			// <script>
			//   $( function() {
			//     $( '#sortable1, #sortable2' ).sortable({
			//       connectWith: '.connectedSortable'
			//     }).disableSelection();
			//   } );
			//  </script>
			//  <style>
			//   #sortable1, #sortable2 {
			//     border: 1px solid #eee;
			//     width: 142px;
			//     min-height: 20px;
			//     list-style-type: none;
			//     margin: 0;
			//     padding: 5px 0 0 0;
			//     float: left;
			//     margin-right: 10px;
			//   }
			//   #sortable1 li, #sortable2 li {
			//     margin: 0 5px 5px 5px;
			//     padding: 5px;
			//     font-size: 1.2em;
			//     width: 120px;
			//   }
			//   </style>
			// <ul id='sortable1' class='connectedSortable'>
			//   <li class='ui-state-default'>Item 1</li>
			//   <li class='ui-state-default'>Item 2</li>
			//   <li class='ui-state-default'>Item 3</li>
			//   <li class='ui-state-default'>Item 4</li>
			//   <li class='ui-state-default'>Item 5</li>
			// </ul>
			 
			// <ul id='sortable2' class='connectedSortable'>
			//   <li class='ui-state-highlight'>Item 1</li>
			//   <li class='ui-state-highlight'>Item 2</li>
			//   <li class='ui-state-highlight'>Item 3</li>
			//   <li class='ui-state-highlight'>Item 4</li>
			//   <li class='ui-state-highlight'>Item 5</li>
			// </ul>
			$data = '
				<label>Note: hanya sisi kanan(1,2,3,4,5) yang bisa digeser mahasiswa ke-atas dan ke-bawah untuk mencocokkan dengan sisi kiri(A,B,C,D,E)</label>
				<div class="form-inline">
					<div class="form-group">
						<label for="input1">A</label>
						<input type="text" name="pil_a" class="form-control" id="input1">
					</div>
					<div class="form-group">
						<label for="input2">1</label>
						<input type="text" name="pil_f" class="form-control" id="input2">
					</div>
				</div><br>
				<div class="form-inline">
					<div class="form-group">
						<label for="input1">B</label>
						<input type="text" name="pil_b" class="form-control" id="input1">
					</div>
					<div class="form-group">
						<label for="input2">2</label>
						<input type="text" name="pil_g" class="form-control" id="input2">
					</div>
				</div><br>
				<div class="form-inline">
					<div class="form-group">
						<label for="input1">C</label>
						<input type="text" name="pil_c" class="form-control" id="input1">
					</div>
					<div class="form-group">
						<label for="input2">3</label>
						<input type="text" name="pil_h" class="form-control" id="input2">
					</div>
				</div><br>
				<div class="form-inline">
					<div class="form-group">
						<label for="input1">D</label>
						<input type="text" name="pil_d" class="form-control" id="input1">
					</div>
					<div class="form-group">
						<label for="input2">4</label>
						<input type="text" name="pil_i" class="form-control" id="input2">
					</div>
				</div><br>
				<div class="form-inline">
					<div class="form-group">
						<label for="input1">E</label>
						<input type="text" name="pil_e" class="form-control" id="input1">
					</div>
					<div class="form-group">
						<label for="input2">5</label>
						<input type="text" name="pil_j" class="form-control" id="input2">
					</div>
				</div>
				<br>
				<label>Jawaban dari ABCDE, contoh: 32145</label>
                <input type="number" name="jawaban" class="form-control">
			';
		}
		if ($id_j_soal!=5 && $id_j_soal!=2) {
		echo "<label>Jawaban</label>";
		}
	    echo $data;
	}
}

/* End of file  */
/* Location: ./application/controllers/ */