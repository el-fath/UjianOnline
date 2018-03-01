<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bab extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('nama')){
			redirect('login');
		}
		$this->load->model('models');
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
		$nm_bab = $this->input->post('nm_bab');
		$matkul = $this->input->post('matkul');
		// $kelas  = $this->input->post('kelas');
		$jenis  = $this->input->post('jenis');

		$data = array(
			"nm_bab" => $nm_bab,
			"matkul" => $matkul,
			// "kelas"  => $kelas,
			"jenis"  => $jenis
		);

		$this->models->tambah('tb_bab',$data);
		// redirect('matkul','refresh');
	}

	public function edit($id_bab)
	{
		$where = array('id_bab' => $id_bab);
		$data['kel'] = $this->models->tampil('tb_kelas')->result();
		$data['jen'] = $this->models->tampil('tb_jenis_ujian')->result();
		$data['mat'] = $this->models->tampil('tb_matkul')->result();
		$data['bab'] = $this->models->edit($where,'tb_bab')->result();
		$this->load->view('template/header');
		$this->load->view('e_bab',$data);
		$this->load->view('template/footer');
 	}

 	public function update($id_bab)
 	{
		$id_bab = $id_bab;
		$nm_bab = $this->input->post('nm_bab');
		$matkul = $this->input->post('matkul');
		$kelas  = $this->input->post('kelas');
		$jenis  = $this->input->post('jenis');
		
		$where = array('id_bab' => $id_bab);
		
		$data  = array(
			"nm_bab" => $nm_bab,
			"matkul" => $matkul,
			"kelas"  => $kelas,
			"jenis"  => $jenis
		);

 		$this->models->update($where,$data,'tb_bab');
 	}

 	public function hapus($id_bab)
 	{
 		$where = array('id_bab' => $id_bab);
 		$this->models->hapus($where,'tb_bab');
 		redirect('bab','refresh');
 	}

 	public function buat_soal($id_bab)
 	{
 		$where = array('id_bab' => $id_bab);
		$data['kel']   = $this->models->tampil('tb_kelas')->result();
		$data['jen']   = $this->models->tampil('tb_jenis_ujian')->result();
		$data['jen_s'] = $this->models->tampil('tb_jenis_soal')->result();
		$data['mat']   = $this->models->tampil('tb_matkul')->result();
		$data['bab']   = $this->models->edit($where,'tb_bab')->result();
		$this->load->view('template/header');
		$this->load->view('buat_soal',$data);
		$this->load->view('template/footer');
 	}

 	public function tambah_soal()
	{
		$soal      = $this->input->post('soal');
		$pil_a     = $this->input->post('pil_a');
		$pil_b     = $this->input->post('pil_b');
		$pil_c     = $this->input->post('pil_c');
		$pil_d     = $this->input->post('pil_d');
		$id_bab    = $this->input->post('id_bab');
		$id_j_soal = $this->input->post('id_j_soal');
		// $matkul = $this->input->post('matkul');
		// $kelas  = $this->input->post('kelas');
		// $jenis  = $this->input->post('jenis');

		$jawaban  = $this->input->post('jawaban[]');
		// $gabungJawaban = "";
		foreach ($jawaban as $key => $result) {
			$gabungJawaban = $gabungJawaban." ".$result;
		}

		$data = array(
			"soal"        => $soal,
			"pil_a"       => $pil_a,
			"pil_b"       => $pil_b,
			"pil_c"       => $pil_c,
			"pil_d"       => $pil_d,
			"id_bab"      => $id_bab,
			"id_j_soal"   => $id_j_soal,
			// "matkul"   => $matkul,
			// "kelas"    => $kelas,
			// "jn_ujian" => $jenis,
			"jawaban"     => trim($gabungJawaban),
			"pembuat"     => $this->session->userdata('id_dosen')
		);

		$this->models->tambah('tb_soal',$data);
		// redirect('matkul','refresh');
	}

	public function all_soal($id_bab)
	{
		$where = array('id_bab' => $id_bab);
		$data['soal'] = $this->models->edit($where,'tb_soal')->result();
		$this->load->view('template/header');
		$this->load->view('bab_soal',$data);
		$this->load->view('template/footer');
	}

	public function edit_soal($id_soal)
	{
		$where = array('id_soal' => $id_soal);
		$data['jen_s'] = $this->models->tampil('tb_jenis_soal')->result();
		$data['kel'] = $this->models->tampil('tb_kelas')->result();
		$data['jen'] = $this->models->tampil('tb_jenis_ujian')->result();
		$data['mat'] = $this->models->tampil('tb_matkul')->result();
		$data['soal'] = $this->models->tampil_all_soal($where);
		$this->load->view('template/header');
		$this->load->view('e_soal',$data);
		$this->load->view('template/footer');	
	}

	public function update_soal($id_soal)
 	{
		$id_soal   = $id_soal;
		$soal      = $this->input->post('soal');
		$pil_a     = $this->input->post('pil_a');
		$pil_b     = $this->input->post('pil_b');
		$pil_c     = $this->input->post('pil_c');
		$pil_d     = $this->input->post('pil_d');
		$id_j_soal = $this->input->post('id_j_soal');

		$jawaban  = $this->input->post('jawaban[]');
		// $gabungJawaban = "";
		foreach ($jawaban as $key => $result) {
			$gabungJawaban = $gabungJawaban." ".$result;
		}
		
		$where = array('id_soal' => $id_soal);
		
		$data  = array(
			"soal"      => $soal,
			"pil_a"     => $pil_a,
			"pil_b"     => $pil_b,
			"pil_c"     => $pil_c,
			"pil_d"     => $pil_d,
			"id_j_soal" => $id_j_soal,
			"jawaban"   => trim($gabungJawaban)
		);

 		$this->models->update($where,$data,'tb_soal');
 	}

 	public function ajax_jenis_soal($id_j_soal)
	{
		if ($id_j_soal==1) {
		    $data = "
                <div class='radio radio-primary'>
                    <input type='radio' name='jawaban[]' value = 'A' id='custome-checkbox1'/>
                    <label for='custome-checkbox1'>Pil A :</label>
                    <textarea id='editor2' name='pil_a'></textarea>
                    <input type='radio' name='jawaban[]' value = 'B' id='custome-checkbox2'/>
                    <label for='custome-checkbox2'>Pil B :</label>
                    <textarea id='editor3' name='pil_b'></textarea>
                    <input type='radio' name='jawaban[]' value = 'C' id='custome-checkbox3'/>
                    <label for='custome-checkbox3'>Pil C :</label>
                    <textarea id='editor4' name='pil_c'></textarea>
                    <input type='radio' name='jawaban[]' value = 'D' id='custome-checkbox4'/>
                    <label for='custome-checkbox4'>Pil D :</label>
                    <textarea id='editor5' name='pil_d'></textarea>
                </div>
		    ";
		} else if ($id_j_soal==2) {
		    $data = "
		    	<div class='checkbox checkbox-primary'>
                    <input type='checkbox' name='jawaban[]' value = 'A' id='custome-checkbox1'/>
                    <label for='custome-checkbox1'>Pil A :</label>
                    <textarea id='editor2' name='pil_a'></textarea>
                    <input type='checkbox' name='jawaban[]' value = 'B' id='custome-checkbox2'/>
                    <label for='custome-checkbox2'>Pil B :</label>
                    <textarea id='editor3' name='pil_b'></textarea>
                    <input type='checkbox' name='jawaban[]' value = 'C' id='custome-checkbox3'/>
                    <label for='custome-checkbox3'>Pil C :</label>
                    <textarea id='editor4' name='pil_c'></textarea>
                    <input type='checkbox' name='jawaban[]' value = 'D' id='custome-checkbox4'/>
                    <label for='custome-checkbox4'>Pil D :</label>
                    <textarea id='editor5' name='pil_d'></textarea>
                </div>
		    ";
		} else if ($id_j_soal==3) {
		    $data = "
		    	<br>
	    		<div class='btn-group' data-toggle='buttons'>
                  	<label class='btn btn-success'>
                    <input type='radio' name='jawaban[]' value ='benar'>Benar
                  	</label>
                  	<label class='btn btn-danger'>
                    <input type='radio' name='jawaban[]' value ='salah'>Salah
                  	</label>
                </div>
		    ";
		} else if ($id_j_soal==4) {
			$data = "
				<label>Akan langsung di isi oleh mahasiswa, dan anda akan bisa menilai langsung setelah soal di kerjakan</label>
			";
		} else if ($id_j_soal==5) {
			$data = "
				<label>Isikan urutan yang salah yang akan dijadikan soal</label>
				<br>
				<label>1.</label>
                <textarea id='editor2' name='pil_a'></textarea>
                <label>2.</label>
                <textarea id='editor3' name='pil_b'></textarea>
                <label>3.</label>
                <textarea id='editor4' name='pil_c'></textarea>
                <label>4.</label>
                <textarea id='editor5' name='pil_d'></textarea>
				<label>Jawaban Urutan Yang Benar | contoh : 3214</label>
                <input type='' class='form-control' name='jawaban[]'>
			";
		}
		if ($id_j_soal!=5) {
		echo "<label>Jawaban</label>";
		}
	    echo $data;
	    echo "<script type='text/javascript'>
		    CKEDITOR.replace( 'editor2' );
		    CKEDITOR.replace( 'editor3' );
		    CKEDITOR.replace( 'editor4' );
		    CKEDITOR.replace( 'editor5' );
			</script>";

	}
}

/* End of file  */
/* Location: ./application/controllers/ */