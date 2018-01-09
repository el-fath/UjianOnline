<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('nama')){
			redirect('login');
		}
		$this->load->model('models');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['dos'] = $this->models->tampil('tb_dosen')->result();
		$data['fak'] = $this->models->tampil('tb_fakultas')->result();
		$data['jur'] = $this->models->tampil('tb_jurusan')->result();
		$this->load->view('template/header');
		$this->load->view('dosen',$data,array('error' => ' ' ));
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$id_dosen = $this->input->post('id_dosen');
		$nm_dosen = $this->input->post('nm_dosen');

		mkdir('./gambar/dosen/'.$nm_dosen, 0777, TRUE);
		$nmfile = "img_".$nm_dosen."_".time();

		$config['upload_path'] = './gambar/dosen/'.$nm_dosen;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['file_name'] = $nmfile;
		
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

		$foto = $this->upload->data();

		$username = $this->input->post('username');
		$fakultas = $this->input->post('fakultas');
		$jurusan = $this->input->post('jurusan');

		$data1 = array(
			"id_dosen" => $id_dosen,
			"nm_dosen" => $nm_dosen,
			"username" => $username,
			"fakultas" => $fakultas,
			"jurusan" => $jurusan,
			"pass" => 'untag',
			"foto" => $foto['file_name']
		);

		$this->models->tambah('tb_dosen',$data1);

		// redirect('dosen','refresh');
	}

	public function edit($id_dosen)
	{
		$where = array('id_dosen' => $id_dosen);
		$data['fak'] = $this->models->tampil('tb_fakultas')->result();
		$data['jur'] = $this->models->tampil('tb_jurusan')->result();
		$data['dose'] = $this->models->edit($where,'tb_dosen')->result();
		$this->load->view('template/header');
		$this->load->view('e_dosen',$data);
		$this->load->view('template/footer');
 	}

 	public function update($id_dosen)
 	{
		$id_dosen = $id_dosen;
		$nm_dosen = $this->input->post('nm_dosen');
		$gambar = $this->input->post('foto');
		
		if($gambar != "") {
 		mkdir('./gambar/dosen/'.$nm_dosen, 0777, TRUE);
		$nmfile = "img_".$nm_dosen."_".time();
		$config['file_name'] = $nmfile;
		}
		
		$config['upload_path'] = './gambar/dosen/'.$nm_dosen;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
	    	echo "<script>alert('Update foto gagal');</script>";
			// var_dump($error);
		}else{
			$data = array('upload_data' => $this->upload->data());
	    	echo "<script>alert('Update foto sukses');</script>";
	    	// var_dump($this->upload->data());
		}

		
		$username = $this->input->post('username');
		$fakultas = $this->input->post('fakultas');
		$jurusan = $this->input->post('jurusan');
		$pass = $this->input->post('pass');

		$foto = $this->upload->data();

		$where = array('id_dosen' => $id_dosen);
		
		if($foto['file_name'] == "") {
			$data  = array(
				"nm_dosen" => $nm_dosen,
				"username" => $username,
				"fakultas" => $fakultas,
				"jurusan" => $jurusan,
				"pass" => $pass
			);
		}else{
			$data  = array(
				"nm_dosen" => $nm_dosen,
				"username" => $username,
				"fakultas" => $fakultas,
				"jurusan" => $jurusan,
				"pass" => $pass,
				"foto" => $foto['file_name']
			);
		}

 		$this->models->update($where,$data,'tb_dosen');
 		// redirect('dosen');
 	}

 	public function hapus($id_dosen)
 	{
 		$where = array('id_dosen' => $id_dosen);
 		$this->models->hapus($where,'tb_dosen');
 		redirect('dosen','refresh');
 	}

}

/* End of file  */
/* Location: ./application/controllers/ */