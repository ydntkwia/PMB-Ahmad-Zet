<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_data extends CI_Model {


// Root :: 
	function insert($table, $data){
		$insert = $this->db->insert($table,$data);
		return $insert;
	}
	function delete($where,$data,$table)
	{
		$this->db->where($where,$data);
		$this->db->delete($table);
	}
	function update($id,$data,$where,$table)
	{
		$this->db->where($where,$id);
		$this->db->update($table,$data);
	}
	function get_table($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get();
	}
	function get_where($where,$id,$table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where,$id);	
		return $this->db->get();
	}

// Index Page
	// Index, Info, Daftar, Berita, Bantuan
	function get_artikell()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_artikel','tbl_kategori.id_kategori=tbl_artikel.id_kategori');
		$this->db->order_by("id_artikel", "desc");
		return $this->db->get();
	}
	// Info, Daftar, Berita, Bantuan
	function datakategori()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		return $this->db->get();
	}
	// Daftar
	function datajk()
	{
		$this->db->select('*');
		$this->db->from('tbl_jk');
		return $this->db->get();
	}
	// per page
	function get_page_artikel($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_artikel','tbl_kategori.id_kategori=tbl_artikel.id_kategori');
		$this->db->where('judul',$id);
		return $this->db->get();
	}
	// per page
	function get_artikelll($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_artikel','tbl_kategori.id_kategori=tbl_artikel.id_kategori');
		$this->db->where('kategori',$id);
		$this->db->order_by("id_artikel", "desc");
		return $this->db->get();
	}
// Admin Page
	// index
	function hitung_pendaftar()
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->where('id_status', '1');
		return $this->db->count_all_results();
	}
	function hitung_calon()
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->where('id_status', '2');
		return $this->db->count_all_results();
	}
	function hitung_registrasi()
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->where('id_status', '3');
		return $this->db->count_all_results();
	}
	function hitung_diterima()
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->where('id_status', '4');
		return $this->db->count_all_results();
	}
	// Data-Daftar.pendaftar
	function data_aprove()
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->where('id_status', '1');
		return $this->db->get();
	}
	// Data-Daftar.calon
	function calon()
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->join('tbl_user_daftar', 'tbl_daftar.id_daftar = tbl_user_daftar.id_daftar');
		$this->db->where('id_status', '2');
		return $this->db->get();
	}
	// Data-Daftar.registrasi
	function registrasi()
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->where('id_status', '3');
		return $this->db->get();
	}
	// Data-Daftar.registrasi
	function datamhs()
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->where('id_status', '4');
		return $this->db->get();
	}
	// Data-Daftar.registrasi
	function get_edit($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->join('tbl_detail_pendidikan','tbl_daftar.id_daftar=tbl_detail_pendidikan.id_daftar');
		$this->db->join('tbl_detail_ortu','tbl_daftar.id_daftar=tbl_detail_ortu.id_daftar');
		$this->db->join('tbl_sbkerja','tbl_daftar.id_daftar=tbl_sbkerja.id_daftar');
		$this->db->join('tbl_mhs','tbl_daftar.id_daftar=tbl_mhs.id_daftar');
		$this->db->where('tbl_daftar.id_daftar',$id);
		return $this->db->get();
	}
	// Artikel.Kelola.Index
	function get_artikel()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_artikel','tbl_kategori.id_kategori=tbl_artikel.id_kategori');
		return $this->db->get();
	}
	// Artikel.Kelola.Index-Edit
	function get_edit_artikel($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->join('tbl_artikel','tbl_kategori.id_kategori=tbl_artikel.id_kategori');
		$this->db->where('id_artikel',$id);
		return $this->db->get();
	}
	// Artikel.User.Mahasiswa
	function usermahasiswa()
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->join('tbl_user_daftar', 'tbl_daftar.id_daftar = tbl_user_daftar.id_daftar');
		return $this->db->get();
	}
	// Grafik_data
	function get_data_stok()
	{
		$this->db->select('status,count(nis) as jumlah');
		$this->db->from('tbl_daftar');
		$this->db->join('tbl_status', 'tbl_daftar.id_status = tbl_status.id_status');
		$this->db->group_by('tbl_daftar.id_status');
		return $this->db->get();
	}
    // Grafik_data_jumlah
	function get_data_stok_jumlah()
	{
		$this->db->select('count(id_daftar) as jumlah');
		$this->db->from('tbl_daftar');
		return $this->db->get();
	}
// User Page
	function get_daftar($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->join('tbl_jk','tbl_daftar.id_jk = tbl_jk.id_jk');
		$this->db->where('id_daftar', $id);
		return $this->db->get();
	}
	// Cek-data-registrasi
	function get_edit_lengkap($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_daftar');
		$this->db->join('tbl_detail_pendidikan','tbl_daftar.id_daftar=tbl_detail_pendidikan.id_daftar');
		$this->db->join('tbl_detail_ortu','tbl_daftar.id_daftar=tbl_detail_ortu.id_daftar');
		$this->db->join('tbl_sbkerja','tbl_daftar.id_daftar=tbl_sbkerja.id_daftar');
		$this->db->join('tbl_mhs','tbl_daftar.id_daftar=tbl_mhs.id_daftar');
		$this->db->join('tbl_jk', 'tbl_daftar.id_jk = tbl_jk.id_jk');
		$this->db->join('tbl_agama', 'tbl_mhs.id_agama = tbl_agama.id_agama');
		$this->db->join('tbl_marital', 'tbl_mhs.id_marital = tbl_marital.id_marital');
		$this->db->join('tbl_studi_pilihan', 'tbl_mhs.id_studi_pilihan = tbl_studi_pilihan.id_studi_pilihan');
		$this->db->join('tbl_kelas_pilihan', 'tbl_mhs.id_kelas_pilihan = tbl_kelas_pilihan.id_kelas_pilihan');
		$this->db->where('tbl_daftar.id_daftar',$id);
		return $this->db->get();
	}

	
}

/* End of file Mod_data.php */
/* Location: ./application/models/Mod_data.php */