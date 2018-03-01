<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('models');
	}

	public function index()
	{
		$this->load->view('template/logins');
	}

	function aksi_login_dosen()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$where = array(
			'username' => $username,
			'pass' => $pass
		);
		$cek = $this->models->cek_login("tb_dosen",$where)->row();
		if($cek){
			$data_session = array(
				'nama' 	   => $username,
				'id_dosen' => $cek->id_dosen,
				'foto'     => $cek->foto,
				'status'   => "login"
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('matkul'));
		}else{
	    	echo "<script>alert('Username atau Password salah !');</script>";
			// redirect(base_url("login"));
		}
	}

	function aksi_login_mahasiswa()
	{
		$nbi = $this->input->post('nbi');
		$pass = $this->input->post('pass');
		$where = array(
			'nbi' => $nbi,
			'pass' => $pass
		);
		$cek = $this->models->cek_login("tb_mahasiswa",$where)->row();
		if($cek){
			$data_session = array(
				'nbi' 	   => $nbi,
				'nama'     => $cek->nm_mahasiswa,
				'matkul'   => $cek->matkul,
				'fakultas' => $cek->fakultas,
				'jurusan'  => $cek->jurusan,
				'foto'     => $cek->foto,
				'status'   => "login"
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('mahasiswa/user'));
		}else{
	    	echo "<script>alert('NBI atau Password salah !');</script>";
			// redirect(base_url("login"));
		}
	}

	function aksi_login_admin()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$where = array(
			'username' => $username,
			'pass' => $pass
		);
		$cek = $this->models->cek_login("tb_admin",$where)->row();
		if($cek){
			$data_session = array(
				'nama' 	   => $username,
				'id_admin' => $cek->id_admin,
				'foto'     => $cek->foto,
				'status'   => "login"
			);
			$this->session->set_userdata($data_session);
			redirect(base_url("dosen"));
		}else{
	    	echo "<script>alert('Username atau Password salah !');</script>";
			// redirect(base_url("login"));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function regdos()
	{
		$this->load->view('template/daftardos');
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

		$data1 = array(
			"id_dosen" => $id_dosen,
			"nm_dosen" => $nm_dosen,
			"foto" => $foto['file_name']
		);

		$this->models->tambah('tb_dosen',$data1);

		redirect('dosen','refresh');
	}

	public function regsis()
	{
		$this->load->view('template/daftarsiswa');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */