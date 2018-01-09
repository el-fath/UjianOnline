<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soal extends CI_Controller {

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
		$this->load->view('template/header');
		$this->load->view('soal');
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$nm_matkul = $this->input->post('nm_matkul');

		$data = array(
			"nm_matkul" => $nm_matkul
		);

		$this->models->tambah('tb_matkul',$data);
		// redirect('matkul','refresh');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */