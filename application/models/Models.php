<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Models extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();		
	}

	function cek_login($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	function tampil_join_bab()
	{
		$this->db->from('tb_bab');
		$this->db->join('tb_matkul', 'tb_bab.matkul = tb_matkul.id_matkul', 'left');
		$this->db->join('tb_kelas', 'tb_bab.kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_jenis_ujian', 'tb_bab.jenis = tb_jenis_ujian.id_j_ujian', 'left');
		$query = $this->db->get();
	    return $query->result();
	}

	function tampil_all_soal($where)
	{
		$this->db->from('tb_soal');
		$this->db->join('tb_bab', 'tb_soal.id_bab = tb_bab.id_bab', 'left');
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
		$this->db->select('tb_matkul.id_matkul,tb_matkul.nm_matkul,tb_fakultas.nm_fakultas,tb_jurusan.nm_jurusan,id_krs');
		$this->db->from($table);
		$this->db->join('tb_fakultas', $table.'.fakultas = tb_fakultas.kd_fakultas', 'left');
		$this->db->join('tb_jurusan', $table.'.jurusan = tb_jurusan.kd_jurusan', 'left');
		$this->db->join('tb_krs', $table.'.id_matkul = tb_krs.id_matkul', 'left');
		$this->db->where($table.'.jurusan',$where);
		$query = $this->db->get();
	    return $query->result();
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

	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

}

/* End of file  */
/* Location: ./application/models/ */