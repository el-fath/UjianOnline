<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fakultas extends CI_Controller {

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
		$data['fak'] = $this->models->tampil('tb_fakultas')->result();
		$this->load->view('template/header');
		$this->load->view('fakultas',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$nm_fakultas = $this->input->post('nm_fakultas');

		$data = array(
			"nm_fakultas" => $nm_fakultas
		);

		$this->models->tambah('tb_fakultas',$data);
		// redirect('matkul','refresh');
	}

	public function edit($kd_fakultas)
	{
		$where = array('kd_fakultas' => $kd_fakultas);
		$data['fak'] = $this->models->edit($where,'tb_fakultas')->result();
		$this->load->view('template/header');
		$this->load->view('e_fakultas',$data);
		$this->load->view('template/footer');
 	}

 	public function update($kd_fakultas)
 	{
		$kd_fakultas = $kd_fakultas;
		$nm_fakultas = $this->input->post('nm_fakultas');
		
		$where = array('kd_fakultas' => $kd_fakultas);
		
		$data  = array(
			"nm_fakultas" => $nm_fakultas
		);

 		$this->models->update($where,$data,'tb_fakultas');
 	}

 	public function hapus($kd_fakultas)
 	{
 		$where = array('kd_fakultas' => $kd_fakultas);
 		$this->models->hapus($where,'tb_fakultas');
 		redirect('fakultas','refresh');
 	}

}

/* End of file  */
/* Location: ./application/controllers/ */