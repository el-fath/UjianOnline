<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurusan extends CI_Controller {

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
		$data['jur'] = $this->models->tampil_fakultas('tb_jurusan');
		$data['fak'] = $this->models->tampil('tb_fakultas')->result();
		$this->load->view('template/header');
		$this->load->view('jurusan',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$nm_jurusan = $this->input->post('nm_jurusan');
		$fakultas = $this->input->post('fakultas');

		$data = array(
			"nm_jurusan" => $nm_jurusan,
			"fakultas" => $fakultas
		);

		$this->models->tambah('tb_jurusan',$data);
		// redirect('matkul','refresh');
	}

	public function edit($kd_jurusan)
	{
		$where = array('kd_jurusan' => $kd_jurusan);
		$data['jur'] = $this->models->edit($where,'tb_jurusan')->result();
		$data['fak'] = $this->models->tampil('tb_fakultas')->result();
		$this->load->view('template/header');
		$this->load->view('e_jurusan',$data);
		$this->load->view('template/footer');
 	}

 	public function update($kd_jurusan)
 	{
		$kd_jurusan = $kd_jurusan;
		$nm_jurusan = $this->input->post('nm_jurusan');
		$fakultas = $this->input->post('fakultas');
		
		$where = array('kd_jurusan' => $kd_jurusan);
		
		$data  = array(
			"nm_jurusan" => $nm_jurusan,
			"fakultas" => $fakultas
		);

 		$this->models->update($where,$data,'tb_jurusan');
 	}

 	public function hapus($kd_jurusan)
 	{
 		$where = array('kd_jurusan' => $kd_jurusan);
 		$this->models->hapus($where,'tb_jurusan');
 		redirect('jurusan','refresh');
 	}

}

/* End of file  */
/* Location: ./application/controllers/ */