<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matkul extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('nama')){
			redirect('login');
		}
		$this->load->model('models');
		$this->load->helper(array('url','html'));
	}

	public function index()
	{
		$where = $this->session->userdata('id_dosen');
		$data['mat'] = $this->models->tampil_fakjur_w('tb_matkul',$where);

		// $data['mat'] = $this->models->tampil_fakjur('tb_matkul');
		$data['fak'] = $this->models->tampil('tb_fakultas')->result();
		$data['jur'] = $this->models->tampil('tb_jurusan')->result();
		$data['kel'] = $this->models->tampil('tb_kelas')->result();
		$this->load->view('template/header');
		$this->load->view('matkul',$data);
		$this->load->view('template/footer');
	}

	public function materi($matkul)
	{
		$where = $this->session->userdata('id_dosen');
		$data['matk']  = $this->models->tampil_fakjur_w('tb_matkul',$where);

		$data['kel'] = $this->models->tampil('tb_kelas')->result();
		$data['jen'] = $this->models->tampil('tb_jenis_ujian')->result();
		$data['mat'] = $this->models->tampil_matkul('tb_matkul');
		
		$where1 = $matkul;
		$data['matkul'] = $matkul;
		$data['bab'] = $this->models->tampil_join_bab_where($where1);
		$this->load->view('template/header');
		$this->load->view('materi',$data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$nm_matkul = $this->input->post('nm_matkul');
		$fakultas  = $this->input->post('fakultas');
		$jurusan   = $this->input->post('jurusan');
		$kelas     = $this->input->post('kelas');

		$data = array(
			"nm_matkul" => $nm_matkul,
			"fakultas"  => $fakultas,
			"jurusan"   => $jurusan,
			"dosen"   	=> $this->session->userdata('id_dosen'),
			"kelas"     => $kelas
		);

		$this->models->tambah('tb_matkul',$data);
		// redirect('matkul','refresh');
	}

	public function edit($id_matkul)
	{
		$where = array('id_matkul' => $id_matkul);
		$data['fak']  = $this->models->tampil('tb_fakultas')->result();
		$data['jur']  = $this->models->tampil('tb_jurusan')->result();
		$data['kel']  = $this->models->tampil('tb_kelas')->result();
		$data['matk'] = $this->models->edit($where,'tb_matkul')->result();
		$this->load->view('template/header');
		$this->load->view('e_matkul',$data);
		$this->load->view('template/footer');
 	}

 	public function update($id_matkul)
 	{
		$id_matkul = $id_matkul;
		$nm_matkul = $this->input->post('nm_matkul');
		$fakultas  = $this->input->post('fakultas');
		$jurusan   = $this->input->post('jurusan');
		$kelas     = $this->input->post('kelas');
		
		$where = array('id_matkul' => $id_matkul);
		
		$data  = array(
			"nm_matkul" => $nm_matkul,
			"fakultas"  => $fakultas,
			"kelas"     => $kelas,
			"jurusan"   => $jurusan			
		);

 		$this->models->update($where,$data,'tb_matkul');
 	}

 	public function hapus($id_matkul)
 	{
 		$where = array('id_matkul' => $id_matkul);
 		$this->models->hapus($where,'tb_matkul');
 		redirect('matkul','refresh');
 	}

	public function ajax_jurusan($kd_fakul)
	{
	    $query = $this->db->get_where('tb_jurusan',array('fakultas'=>$kd_fakul));
	    $data = "<option value=''>Select Jurusan</option>";
	    foreach ($query->result() as $value) {
	        $data .= "<option value='".$value->kd_jurusan."'>".$value->nm_jurusan."</option>";
	    }
	    echo $data;
	}

	public function lihat_anggota($matkul)
	{
		$where = array('id_matkul' => $matkul );
		$data['matkul'] = $matkul;
		$data['la'] = $this->models->tampil_anggota('tb_krs',$where);
		// echo"<pre>";
		// var_dump($data['la']);
		$this->load->view('template/header');
		$this->load->view('lihat_anggota',$data);
		$this->load->view('template/footer');
	}

	public function terima($matkul,$id_krs)
	{
		// echo $id_krs;
		$where = array('id_krs' => $id_krs);
		$data  = array('status' => 'disetujui');
		$this->models->update($where,$data,'tb_krs');
		redirect('matkul/lihat_anggota/'.$matkul,'refresh');
	}

	public function tolak($matkul,$id_krs)
	{
		// echo $id_krs;
		$where = array('id_krs' => $id_krs);
		$data  = array('status' => 'ditolak');
		$this->models->update($where,$data,'tb_krs');
		redirect('matkul/lihat_anggota/'.$matkul,'refresh');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */