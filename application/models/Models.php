<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Models extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();		
	}

	function tampil($table)
	{
		return $this->db->get($table);
	}

	function tambah($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function edit($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function cek_login($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	function tampil_krs($table,$where)
	{
		$this->db->from($table);
		$this->db->join('tb_matkul', $table.'.id_matkul = tb_matkul.id_matkul', 'left');
		$this->db->where('nbi',$where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_join_bab()
	{
		$this->db->from('tb_test');
		$this->db->join('tb_matkul', 'tb_test.matkul = tb_matkul.id_kelasmatkul', 'left');
		$this->db->join('tb_kelas', 'tb_test.kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_jenis_ujian', 'tb_test.jenis = tb_jenis_ujian.id_j_ujian', 'left');
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_join_bab_where($where)
	{
		$this->db->from('tb_test');
		$this->db->join('tb_matkul', 'tb_test.matkul = tb_matkul.id_matkul', 'left');
		$this->db->join('tb_kelas', 'tb_matkul.kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_jenis_ujian', 'tb_test.jenis = tb_jenis_ujian.id_j_ujian', 'left');
		$this->db->where('tb_test.matkul', $where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_all_soal($where)
	{
		$this->db->from('tb_soal');
		$this->db->join('tb_test', 'tb_soal.id_test = tb_test.id_test', 'left');
		$this->db->where($where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_fakultas($table)
	{
		$this->db->from($table);
		$this->db->join('tb_fakultas', $table.'.fakultas = tb_fakultas.kd_fakultas', 'left');
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_mhs_fakjur($table,$where)
	{
		$this->db->from($table);
		$this->db->join('tb_jurusan', $table.'.jurusan = tb_jurusan.kd_jurusan', 'left');
		$this->db->join('tb_fakultas', 'tb_jurusan.fakultas = tb_fakultas.kd_fakultas', 'left');
		$this->db->where($where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_fakjur($table)
	{
		$this->db->from($table);
		$this->db->join('tb_fakultas', $table.'.fakultas = tb_fakultas.kd_fakultas', 'left');
		$this->db->join('tb_jurusan', $table.'.jurusan = tb_jurusan.kd_jurusan', 'left');
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_fakjur_w($table,$where)
	{
		$this->db->from($table);
		$this->db->join('tb_fakultas', $table.'.fakultas = tb_fakultas.kd_fakultas', 'left');
		$this->db->join('tb_jurusan', $table.'.jurusan = tb_jurusan.kd_jurusan', 'left');
		$this->db->join('tb_kelas', $table.'.kelas = tb_kelas.id_kelas', 'left');
		$this->db->where($table.'.dosen',$where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_fakjur_where($table,$where)
	{
		$this->db->from($table);
		$this->db->join('tb_fakultas', $table.'.fakultas = tb_fakultas.kd_fakultas', 'left');
		$this->db->join('tb_jurusan', $table.'.jurusan = tb_jurusan.kd_jurusan', 'left');
		$this->db->where($table.'.jurusan',$where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_fakjur_2($table,$where)
	{	
		$this->db->select('tb_matkul.id_matkul,tb_matkul.nm_matkul,tb_fakultas.nm_fakultas,tb_jurusan.nm_jurusan,id_krs,nbi');
		$this->db->from($table);
		$this->db->join('tb_fakultas', $table.'.fakultas = tb_fakultas.kd_fakultas', 'left');
		$this->db->join('tb_jurusan', $table.'.jurusan = tb_jurusan.kd_jurusan', 'left');
		$this->db->join('tb_krs', $table.'.id_matkul = tb_krs.id_matkul', 'left');
		$this->db->where($table.'.jurusan',$where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_matkul($table)
	{	
		$this->db->from($table);
		$this->db->join('tb_kelas', $table.'.kelas = tb_kelas.id_kelas', 'left');
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_nilai($table,$where)
	{
		$this->db->from($table);
		$this->db->join('tb_mahasiswa', $table.'.nbi = tb_mahasiswa.nbi', 'left');
		$this->db->where($where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_test($table,$where)
	{
		$this->db->from($table);
		$this->db->join('tb_matkul', $table.'.matkul = tb_matkul.id_matkul', 'left');
		$this->db->where($where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_anggota($table,$where)
	{
		$this->db->from($table);
		$this->db->join('tb_mahasiswa', $table.'.nbi = tb_mahasiswa.nbi', 'left');
		$this->db->where($where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_bab_soal($table,$where)
	{
		$this->db->from($table);
		$this->db->join('tb_test', $table.'.id_matkul = tb_test.matkul', 'inner');
		$this->db->join('tb_matkul', $table.'.id_matkul = tb_matkul.id_matkul', 'inner');
		$this->db->join('tb_kelas', 'tb_matkul.kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_jenis_ujian', 'tb_test.jenis = tb_jenis_ujian.id_j_ujian', 'left');
		// $this->db->join('tb_riwayat', 'tb_test.id_test = tb_riwayat.id_test', 'left');
		$this->db->where($where);
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_riwayat($table,$where)
	{
		$this->db->from($table);
		$this->db->join('tb_mahasiswa', $table.'.nbi = tb_mahasiswa.nbi', 'left');
		$this->db->where($where);
		$query = $this->db->get();
	    return $query->result();
	}

	function soal_ujian($where,$table)
	{
		$this->db->order_by('rand()');
		return $this->db->get_where($table,$where);
	}
}

/* End of file  */
/* Location: ./application/models/ */