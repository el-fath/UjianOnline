<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('models');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		if(!$this->session->userdata('nama')){
			redirect('login');
		}
		$data['fak'] = $this->models->tampil('tb_fakultas')->result();
		$data['jur'] = $this->models->tampil('tb_jurusan')->result();
		$data['mhs'] = $this->models->tampil_fakjur('tb_mahasiswa');
		$this->load->view('template/header');
		$this->load->view('mahasiswa',$data,array('error' => ' ' ));
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$config['upload_path']   = './gambar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '1000';
		$config['max_width']     = '1024';
		$config['max_height']    = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
	    	// echo "<script>alert('Upload foto gagal');</script>";
			// var_dump($error);
		}else{
			$data = array('upload_data' => $this->upload->data());
	    	// echo "<script>alert('Upload foto sukses');</script>";
	    	// var_dump($this->upload->data());
		}

		$nbi 		  = $this->input->post('nbi');
		$nm_mahasiswa = $this->input->post('nm_mahasiswa');
		$fakultas 	  = $this->input->post('fakultas');
		$jurusan 	  = $this->input->post('jurusan');
		$foto 		  = $this->upload->data();

		$data1 = array(
			"nbi" 		   => $nbi,
			"nm_mahasiswa" => $nm_mahasiswa,
			"fakultas" 	   => $fakultas,
			"pass" 	   	   => ('untag'),
			"jurusan" 	   => $jurusan,
			"foto" 	   	   => $foto['file_name']
		);

		$this->models->tambah('tb_mahasiswa',$data1);

		// redirect('dosen','refresh');
	}

	public function edit($nbi)
	{
		$where = array('nbi' => $nbi);
		$data['fak'] = $this->models->tampil('tb_fakultas')->result();
		$data['jur'] = $this->models->tampil('tb_jurusan')->result();
		$data['mhs'] = $this->models->edit($where,'tb_mahasiswa')->result();
		$this->load->view('template/header');
		$this->load->view('e_mahasiswa',$data);
		$this->load->view('template/footer');
 	}

 	public function update($nbi)
 	{

 		$config['upload_path']   = './gambar/';
		$config['allowed_types'] = 'gif|jpg|JPG|png|PNG';
		$config['max_size']      = '1000';
		$config['max_width']     = '1024';
		$config['max_height']    = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
	    	echo "<script>alert('Update foto gagal');</script>";
			var_dump($error);
		}else{
			$data = array('upload_data' => $this->upload->data());
	    	echo "<script>alert('Update foto sukses');</script>";
	    	var_dump($this->upload->data());
		}

		$nbi = $nbi;
		$nm_mahasiswa = $this->input->post('nm_mahasiswa');
		$fakultas 	  = $this->input->post('fakultas');
		$jurusan 	  = $this->input->post('jurusan');
		$foto = $this->upload->data();
		
		$where = array('nbi' => $nbi);
		
		if($foto['file_name'] == "") {
			$data  = array(
				"nm_mahasiswa" => $nm_mahasiswa,
				"fakultas" 	   => $fakultas,
				"jurusan" 	   => $jurusan,
			);
		}else{
			$data  = array(
				"nm_mahasiswa" => $nm_mahasiswa,
				"fakultas" 	   => $fakultas,
				"jurusan" 	   => $jurusan,
				"foto" => $foto['file_name']
			);
		}

 		$this->models->update($where,$data,'tb_mahasiswa');
 		// redirect('mahasiswa');
 	}

 	public function hapus($nbi)
 	{
 		$where = array('nbi' => $nbi);
 		$this->models->hapus($where,'tb_mahasiswa');
 		redirect('mahasiswa','refresh');
 	}

 	public function user()
 	{
 		if(!$this->session->userdata('nbi')){
			redirect('login');
		}
		$where = array('nbi' => $this->session->userdata('nbi'));
		// $data['fak'] = $this->models->tampil('tb_fakultas')->result();
		// $data['jur'] = $this->models->tampil('tb_jurusan')->result();
		$data['mhs'] = $this->models->tampil_mhs_fakjur('tb_mahasiswa',$where);
 		$this->load->view('mahasiswa/template/header');
 		$this->load->view('mahasiswa/user',$data);
 		$this->load->view('mahasiswa/template/footer');
 	}

 	public function update_user($nbi)
 	{
 		echo $nbi;
 	}

 	public function riwayat($nbi)
 	{
 		$where = array('tb_riwayat.nbi' => $nbi );
		$data['riw'] = $this->models->tampil_riwayat('tb_riwayat',$where); 

 		$this->load->view('mahasiswa/template/header');
 		$this->load->view('mahasiswa/riwayat',$data);
 		$this->load->view('mahasiswa/template/footer');
 	}

 	public function krs($jurusan)
 	{
 		if(!$this->session->userdata('nbi')){
			redirect('login');
		}
		$where = $this->session->userdata('nbi');
		$data['krs'] = $this->models->tampil_krs('tb_krs',$where); 
		
		// $where = $jurusan;
		// $w = array('nbi' => $this->session->userdata('nbi'));
		// $data['mat'] = $this->models->tampil_fakjur_2('tb_matkul',$where);

 		$this->load->view('mahasiswa/template/header');
 		$this->load->view('mahasiswa/matkul',$data);
 		// $this->load->view('mahasiswa/krs',$data);
 		$this->load->view('mahasiswa/template/footer');
 	}

 	public function proses_krs($nbi)
	{

		$where = array('nbi' => $nbi);
		// print_r($where);
		$post   = $this->input->post();
		$matkul = $this->input->post('matkul');
		$result = array();
		foreach ($matkul as $key => $value) {
			$result[] = array(
				'nbi'		=> $this->session->userdata('nbi'),
				'id_matkul'	=> $post['matkul'][$key]
			);
		}

		$input = $this->db->insert_batch('tb_krs', $result); // fungsi dari codeigniter untuk menyimpan multi array
    
	    if($input ){
	     echo "nama sukses di input";
	     // redirect('multi_insert');    
	 	}else{
	     echo "gagal di input";
	    }
		// redirect('matkul','refresh');
	}

	public function ambil_matkul()
	{
		$id_matkul = $this->input->post('id_matkul');
		$nbi       = $this->session->userdata("nbi");

		$where = array (
			'id_matkul' => $id_matkul
		);

		$data['mtkl'] = $this->models->edit($where,'tb_matkul')->result();
		// var_dump($data['mtkl']);
		
		if ($data['mtkl'] != NULL) {
			// echo "sukses";
			$arrayResponse = array('Code' => "Succees",'Message' => "Succees Bro", );
			echo json_encode($arrayResponse);

			$data = array(
				"id_matkul" => $id_matkul,
				"nbi"       => $nbi,
				"status"    => 'belum dikonfirmasi'
			);
			
			$this->models->tambah('tb_krs',$data);
		}else{
			// echo "gagal";
			$arrayResponse = array('Code' => "Error",'Message' => "Kode kelas yang anda masukkan tidak terdaftar", );
			echo json_encode($arrayResponse);
		}
	}

	public function matkul($nbi)
	{
		$where = array('tb_krs.nbi' => $nbi,'status' => 'disetujui');
		$data['bab_soal'] = $this->models->tampil_bab_soal('tb_krs',$where);
		$w = array('nbi' => $nbi);
		$data['riw'] = $this->models->edit($w,'tb_riwayat')->result();

		$this->load->view('mahasiswa/template/header');
 		$this->load->view('mahasiswa/masuk_ujian',$data);
 		$this->load->view('mahasiswa/template/footer');
	}

	public function ujian($id_test)
	{
		$where = array('id_test' => $id_test);
		$data['id_test'] = $id_test;
		$data['matkul'] = $this->models->tampil_test('tb_test',$where);
		$data['soal'] = $this->models->soal_ujian($where,'tb_soal')->result();
		// $data['bab']  = $this->models->edit($where,'tb_bab')->row();
		// $this->load->view('mahasiswa/template/header');
 		$this->load->view('mahasiswa/ujian',$data);
 		// $this->load->view('mahasiswa/template/footer');
	}

	public function penilaian($id_test)
	{
		// echo "<pre>";
		// var_dump($_REQUEST);
		$soal = $this->models->tampil('tb_soal')->result();
		$riw = $this->models->tampil('tb_riwayat')->num_rows();

		if ($riw) {
			$benar = 0;
			$bool = true;
			$no = 0;
			$nilai = 0;

			foreach ($soal as $key => $result) { 
				if ($this->input->post('pilihan'.$result->id_soal.'[]')) {
					$no++;

					// echo $no;
					// echo "<br>";
					
					$pilihan = ($this->input->post('pilihan'.$result->id_soal.'[]'));
					$id_test=$result->id_test;
					$pil=implode($pilihan);
					
					// echo'id -> '.$result->id_soal;
					// echo"<br>";
					// echo 'jwb_mhs = '.$pil;
					// echo "<br>";
					
					if ($result->id_j_soal==4) {
						$jawaban = $result->jawaban_isian;
					}else{
						$jawaban = $result->jawaban;
					}
					
					// echo 'knc_jwb = '.($jawaban);

					if ($result->id_j_soal==4) {
						similar_text($pil, $jawaban, $persen);
						
						// echo"<br>";
						// echo 'Kemiripan '.$persen.'%';
						
						// if ($pil==$jawaban) {
						if ($persen>50) {
							$benar = $benar + 1;
							$bool = true;
						}else{
							$bool = false;
						}

						// $data = array(
						// 	"riwayat" 		=> $riw+1,
						// 	"id_soal"       => $result->id_soal,
						// 	"jwb_isian_mhs" => $pil,
						// );
						// $this->models->tambah('tb_jwb_mhs',$data);
					}else{
						if ($pil==$jawaban) {
						// if ($persen>75) {
							$benar = $benar + 1;
							$bool = true;
						}else{
							$bool = false;
						}	

						// $data = array(
						// 	"riwayat" => $riw+1,
						// 	"id_soal" => $result->id_soal,
						// 	"jwb_mhs" => $pil,
						// );
						// $this->models->tambah('tb_jwb_mhs',$data);
					}

					// echo"<br><br>";		
				}
			}
			$nilai = $benar*100/$no;

			// echo 'Benar = '.$benar;
			// echo "<br>";
			// echo 'Nilai = '.$nilai;

			$arrayResponse = array('Code' => "Succees",'Message' => "Nilai sudah disimpan", );
			echo json_encode($arrayResponse);
		}else{
			$arrayResponse = array('Code' => "Error",'Message' => "penilaian Gagal", );
			echo json_encode($arrayResponse);
		}
		
		die();

		$data = array(
			"id_riwayat" => $riw+1,
			"nbi"        => $this->session->userdata("nbi"),
			"id_test"    => $id_test,
			"nilai"      => $nilai
		);

		$this->models->tambah('tb_riwayat',$data);
	}
}

/* End of file  */
/* Location: ./application/controllers/ */