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

 		$config['upload_path'] = './gambar/';
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
 		$this->load->view('mahasiswa/template/header');
 		$this->load->view('mahasiswa/user');
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

	public function matkul($matkul)
	{
		$where = array('matkul' => $matkul);
		$data['soal'] = $this->models->edit($where,'tb_bab')->result();

		$this->load->view('mahasiswa/template/header');
 		$this->load->view('mahasiswa/masuk_ujian',$data);
 		$this->load->view('mahasiswa/template/footer');
	}

	public function ujian($id_bab)
	{
		$where = array('id_bab' => $id_bab);
		$data['soal'] = $this->models->edit($where,'tb_soal')->result();
		$data['bab']  = $this->models->edit($where,'tb_bab')->row();
		$this->load->view('mahasiswa/template/header');
 		$this->load->view('mahasiswa/ujian',$data);
 		$this->load->view('mahasiswa/template/footer');
	}

	public function penilaian()
	{
		echo "<pre>";
		// var_dump($_REQUEST);
		$soal   = $this->models->tampil('tb_soal')->result();
		$benar = 0;
		$bool = true;
		$no = 0;
		$nilai = 0;
		$id_bab = 0;
		foreach ($soal as $key => $result) { 
			$id_bab = $result->id_bab;
			if ($this->input->post('pilihan'.$result->id_soal.'[]')) {

				echo $no++;
				echo "<br>";				
				$pilihan = ($this->input->post('pilihan'.$result->id_soal.'[]'));
				print_r($pilihan);
				
				$jawaban = explode(' ', $result->jawaban);
				print_r($jawaban);

				if ($pilihan==$jawaban) {
					$benar = $benar + 1;
					$bool = true;
				}else{
					$bool = false;
				}
			}
		}
		$nilai = $benar*100/$no;
		// echo 'Benar = '.$benar;
		// echo "<br>";
		// echo 'Nilai = '.$nilai;
		// $mahasiswa = ;
		// var_dump($mahasiswa);
		// die();

		$data = array(
			"mahasiswa" => $this->session->userdata("nbi"),
			"bab"       => $id_bab,
			"nilai"     => $nilai
		);

		$this->models->tambah('tb_riwayat',$data);
	}
}

/* End of file  */
/* Location: ./application/controllers/ */