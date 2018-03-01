<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jujian extends CI_Controller {

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
		$table = 'tb_jenis_ujian';
		$data['juji'] = $this->models->tampil($table)->result();
		$this->load->view('template/header');
		$this->load->view('jujian',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$nm_ujian = $this->input->post('nm_ujian');

		$data = array(
			"nm_ ujian" => $nm_ujian
		);

		$this->models->tambah('tb_jenis_ujian',$data);
		// redirect('matkul','refresh');
	}

	public function edit($id_j_ujian)
	{
		$where = array('id_j_ujian' => $id_j_ujian);
		$data['juji'] = $this->models->edit($where,'tb_jenis_ujian')->result();
		$this->load->view('template/header');
		$this->load->view('e_jujian',$data);
		$this->load->view('template/footer');
 	}

 	public function update($id_j_ujian)
 	{
		$id_j_ujian = $id_j_ujian;
		$nm_ujian = $this->input->post('nm_ujian');
		
		$where = array('id_j_ujian' => $id_j_ujian);
		
		$data  = array(
			"nm_ujian" => $nm_ujian
		);

 		$this->models->update($where,$data,'tb_jenis_ujian');
 	}

 	public function hapus($id_j_ujian)
 	{
 		$where = array('id_j_ujian' => $id_j_ujian);
 		$this->models->hapus($where,'tb_jenis_ujian');
 		redirect('jujian','refresh');
 	}

}

/* End of file  */
/* Location: ./application/controllers/ */