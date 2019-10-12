<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mod_data');
		$this->load->helper('url','upload');
	}

	// Hal Index
	public function index()
	{
		$data['artikel']=$this->Mod_data->get_artikell()->result();
		$this->load->view('Index/1.home/index',$data);
	}

	// Hal Pendaftaran
	public function info()
	{
		$data['artikel']=$this->Mod_data->get_artikell()->result();
		$data['kategori']=$this->Mod_data->datakategori()->result();
		$this->load->view('Index/2.info/index',$data);
	}

	// Hal Daftar
	public function daftar()
	{
		$data['artikel']=$this->Mod_data->get_artikell()->result();
		$data['kategori']=$this->Mod_data->datakategori()->result();
		$data['jk']=$this->Mod_data->datajk()->result();
		$this->load->view('Index/3.daftar/index',$data);
	}

	public function create()
	{
		$jk = $this->input->post('id_jk');
		$telp = $this->input->post('telp');
		$sub_telp = substr($telp, 0,1);
		if ($jk == 'null') {
			$this->session->set_flashdata('gagal_daftar','Anda belum memilih jenis kelamin!');
			redirect('daftar','refresh');
		}
		elseif ($sub_telp != '0') {
			$this->session->set_flashdata('gagal_daftar','Masukkan format nomor telp wa dengan benar!');
			redirect('daftar','refresh');	
		}
		elseif ($sub_telp == '0' && $jk != 'null') {
			$nis= $this->input->post('nis');
			if ($this->Mod_data->get_where('nis',$nis,'tbl_daftar')->num_rows()==1) {
				$this->session->set_flashdata('gagal_daftar','NISN sudah terdaftar!');
				redirect('daftar','refresh');
			}else{
				$namaxyz = $this->input->post('nama');
				$sekolahxyz = $this->input->post('sekolah');
				$xyzsekolah = strtoupper($sekolahxyz);
				$xyznama = ucwords($namaxyz);
				$nama = $this->input->post('nis');
				$config['upload_path'] = "./assets/img/user/";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = '10000';
				// $config['max_width'] = '450';
				// $config['max_height'] = '650';
				$config['file_name'] = $nama;
				$this->upload->initialize($config);
				if ($this->upload->do_upload('berkas')) {
					$image = $this->upload->data();
					$data = array(
						'nis' => $this->input->post('nis'),
						'nama' => $xyznama,
						'id_jk' => $jk,
						'alamat' => $this->input->post('alamat'),
						'telp' => $this->input->post('telp'),
						'sekolah' => $xyzsekolah,
						'foto' => $image['file_name'],
						'id_status' => '1',
						'id_status_pesan' => '2'
					);
					$this->session->set_flashdata('berhasil_daftar','Anda sudah melakukan pendaftaran! Mohon tunggu pesan dari Admin kami!');
					$this->Mod_data->insert("tbl_daftar",$data);
					redirect('daftar','refresh');
				}
				else{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('gagal_daftar',$error['error']);
					redirect('daftar','refresh');
				}
			}
		}
	}

	// HAL BERITA
	public function berita()
	{
		$data['artikel']=$this->Mod_data->get_artikell()->result();
		$data['kategori']=$this->Mod_data->datakategori()->result();
		$this->load->view('Index/4.berita/index',$data);
	}
	// HAL per page
	public function page()
	{
		$judul = str_replace('%20', ' ', $this->uri->segment(2));
		$data['tampil'] = $this->Mod_data->get_page_artikel($judul)->result(); 
		$data['artikel']=$this->Mod_data->get_artikell()->result();
		$data['kategori']=$this->Mod_data->datakategori()->result();
		$this->load->view('Index/4.berita/pages-berita',$data);
	}
	// HAL per kategoti
	public function kategori()
	{
		$kategori = str_replace('%20', ' ', $this->uri->segment(2));
		$data['artikell']=$this->Mod_data->get_artikelll($kategori)->result();
		$data['artikel']=$this->Mod_data->get_artikell()->result();
		$data['kategori']=$this->Mod_data->datakategori()->result();
		$this->load->view('Index/4.berita/kategori',$data);
	}
	// Hal Bantuan
	public function bantuan()
	{
		$data['artikel']=$this->Mod_data->get_artikell()->result();
		$data['kategori']=$this->Mod_data->datakategori()->result();
		$this->load->view('Index/5.bantuan/index',$data);
	}

	//error 404
	public function error()
	{
		$this->load->view('eror/index');
	}



}
