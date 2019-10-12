<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modlogin extends CI_Model {
	function ceklogin($nidn)
	{
		return $this->db->get_where('tbl_user_admin', array('nidn' => $nidn));
	}

	function cekklogin($nidn)
	{
		$this->db->select('*');
		$this->db->from('tbl_user_admin');
		$this->db->where('nidn', $nidn);
		return $this->db->get();
	}

	public function ceklogin_user($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_user_daftar');
		$this->db->join('tbl_daftar', 'tbl_user_daftar.id_daftar = tbl_daftar.id_daftar');
		$this->db->where('tbl_daftar.nis', $id);
		return $this->db->get();
	}
	
	function getlog($id,$id2)
	{
		$where = "id_user = '$id' AND role = '$id2'";
		$this->db->select('*');
		$this->db->from('log');
		$this->db->where($where);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		return $this->db->get();
	}

	function getlog_verify($id,$id2,$id3)
	{
		$where = "id_user = '$id' AND role = '$id2' AND token = '$id3'";
		$this->db->select('*');
		$this->db->from('log');
		$this->db->where($where);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		return $this->db->get();
	}


	function cek_login($id,$id2)
	{
		$where = "nidn = '$id' AND nama='$id2'";
		$this->db->select('nama');
		$this->db->from('tbl_user_admin');
		$this->db->where($where);
		return $this->db->get();
	}

}

/* End of file Modlogin.php */
/* Location: ./application/models/Modlogin.php */