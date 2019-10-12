<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_data');
		$this->load->model('Modlogin');
		$this->load->model('Mod_data');
		if ($this->session->userdata('level')!= '4') {
			redirect('404','refresh');
		}elseif ($this->session->userdata('level')== '4') {
			$a1 = $this->session->userdata('log_nisn');
			$a2 = $this->session->userdata('log_role');
			$a3 = $this->session->userdata('log_token');
			$db_log = $this->Modlogin->getlog_verify($a1,$a2,$a3)->row();
			$log_status = $db_log->status;
			if ($log_status == 'logout') {
				redirect('force-logout','refresh');
			}else{
			}
		}
		elseif ($this->session->userdata('level')=='') {
			redirect('login','refresh');
		}
		$this->load->helper('url');
	}

	// HAL INDEX
	public function index()
	{
		$data['tbl_daftar'] = $this->mod_data->get_daftar($this->session->userdata('id_daftar'))->result();
		$data['agama'] = $this->mod_data->get_table('tbl_agama')->result();
		$data['daftar'] = $this->mod_data->get_table('tbl_daftar')->result();
		$data['marital'] = $this->mod_data->get_table('tbl_marital')->result();
		$data['kelas_pilihan'] = $this->mod_data->get_table('tbl_kelas_pilihan')->result();
		$data['studi_pilihan'] = $this->mod_data->get_table('tbl_studi_pilihan')->result();
		$this->load->view('siswa/1.main/index',$data);
	}
	// Fungsi form registrasi ulang
	public function input_data()
	{
		$id_agama = $this->input->post('id_agama');
		$id_marital = $this->input->post('id_marital');
		$id_studi_pilihan = $this->input->post('id_studi_pilihan');
		$id_kelas_pilihan = $this->input->post('id_kelas_pilihan');
		$sbkerja = $this->input->post('sbkerja');
		if ($id_agama == 'null') {
			$this->session->set_flashdata('gagal_regis','Anda belum memilih agama!');
			redirect('user','refresh');
		}
		elseif ($id_marital == 'null') {
			$this->session->set_flashdata('gagal_regis','Anda belum memilih status marital!');
			redirect('user','refresh');
		}
		elseif ($sbkerja == 'null') {
			$this->session->set_flashdata('gagal_regis','Anda belum memilih status bekerja!');
			redirect('user','refresh');
		}
		elseif ($id_studi_pilihan == 'null') {
			$this->session->set_flashdata('gagal_regis','Anda belum memilih studi pilihan!');
			redirect('user','refresh');
		}
		elseif ($id_kelas_pilihan == 'null') {
			$this->session->set_flashdata('gagal_regis','Anda belum memilih kelas pilihan!');
			redirect('user','refresh');
		}
		elseif ($id_agama != 'null' && $id_marital != 'null' && $sbkerja != 'null' && $id_studi_pilihan != 'null' && $id_kelas_pilihan != 'null') {
			$id_daftar = $this->input->post('id_daftar');
			$data = array(
				'id_daftar' => $id_daftar,
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'kewarganegaraan' => $this->input->post('kewarganegaraan'),
				'id_agama' => $id_agama,
				'id_marital' => $id_marital,
				'nktp' => $this->input->post('nktp'),
				'nkk' => $this->input->post('nkk'),
				'id_studi_pilihan' => $id_studi_pilihan,
				'id_kelas_pilihan' => $id_kelas_pilihan
			);
			$data2 = array(
				'id_daftar' => $id_daftar,
				'nama_ibu' =>  $this->input->post('nama_ibu'),
				'p_ibu' =>  $this->input->post('p_ibu'),
				'nama_ayah' =>  $this->input->post('nama_ayah'),
				'p_ayah' =>  $this->input->post('p_ayah'),
				'nama_perusahaan' =>  $this->input->post('nama_perusahaan'),
				'jabatan' =>  $this->input->post('jabatan'),
				'alamat_kantor' =>  $this->input->post('alamat_kantor')
			);
			$data3 = array(
				'id_daftar' => $id_daftar,
				'd_sekolah' => $this->input->post('d_sekolah'),
				'd_alamat' => $this->input->post('d_alamat'),
				'd_jurusan' => $this->input->post('d_jurusan'),
				'd_noijazah' => $this->input->post('d_noijazah'),
				'd_tglijazah' => $this->input->post('d_tglijazah'),
			);
			if ($sbkerja == 'tidak-bekerja') {
				$data4 = array(
					'id_daftar' => $id_daftar,
					'sbkerja' => $sbkerja,
					'sbnama_perusahaan' => 'kosong',
					'sbinstansi' => 'kosong',
					'sbjabatan' => 'kosong',
					'sbalamat_kantor' => 'kosong',
				);
			}
			else{
				$data4 = array(
					'id_daftar' => $id_daftar,
					'sbkerja' => $sbkerja,
					'sbnama_perusahaan' => $this->input->post('sbnama_perusahaan'),
					'sbinstansi' => $this->input->post('sbinstansi'),
					'sbjabatan' => $this->input->post('sbjabatan'),
					'sbalamat_kantor' => $this->input->post('sbalamat_kantor'),
				);
			}
			$data5 = array(
				'id_status' => '3',
				'id_status_pesan' => '2'
			);
			$this->Mod_data->insert("tbl_mhs",$data);
			$this->Mod_data->insert("tbl_detail_ortu",$data2);
			$this->Mod_data->insert("tbl_detail_pendidikan",$data3);
			$this->Mod_data->insert("tbl_sbkerja",$data4);
			$this->Mod_data->update($id_daftar,$data5,'id_daftar','tbl_daftar');
			$this->session->set_userdata('id_status','3');
			$this->session->set_flashdata('message_true','Anda berhasil memasukkan data daftar ulang! Silahkan menunggu pesan Admin untuk informasi selanjutnya!');
			redirect('user','refresh');
		}
	}
	// HAL EDIT
	public function edit_mahasiswa()
	{
		$id = $this->uri->segment(3);
		$datauser = array(
			'id_edit2' => $id
		);
		$this->session->set_userdata($datauser);
		redirect('edit-mahasiswa','refresh');
	}
	public function mahasiswa_edit()
	{
		$data['edit'] = $this->mod_data->get_where('id_user',$this->session->userdata('id_edit2'),'tbl_user_daftar')->result(); 
		$this->load->view('siswa/2.Setting/index', $data);
	}
	public function edit_mahasiswa_aksi()
	{	
		$db = $this->Mod_data->get_where('id_user',$this->session->userdata('id_edit2'),'tbl_user_daftar')->row();
		$password = $this->input->post('password');
		if (hash_verified($password,$db->password)) {
			$password_baru = $this->input->post('password_baru');
			$data = array(
				'password' => get_hash($password_baru)
			);
			$this->Mod_data->update($this->session->userdata('id_edit2'),$data,'id_user','tbl_user_daftar');
			$this->session->set_flashdata('berhasil','Password anda berhasil diubah!');
			redirect('edit-mahasiswa','refresh');
		}else{
			$this->session->set_flashdata('message-wrong','Password lama anda tidak sesuai!');
			redirect('edit-mahasiswa','refresh');
		}
	}
	// HAL Cek-data-registrasi
	public function cek_registrasi()
	{
		if ($this->session->userdata('id_status')!= '3') {
			redirect('user','refresh');
		}
		else{
			$id = $this->session->userdata('id_daftar');
			$data['agama'] = $this->Mod_data->get_table('tbl_agama')->result();
			$data['marital'] = $this->Mod_data->get_table('tbl_marital')->result();
			$data['kelas_pilihan'] = $this->Mod_data->get_table('tbl_kelas_pilihan')->result();
			$data['studi_pilihan'] = $this->Mod_data->get_table('tbl_studi_pilihan')->result();
			$data['jk'] = $this->Mod_data->get_table('tbl_jk')->result();
			$data['edit'] = $this->Mod_data->get_edit_lengkap($id)->result(); 
			$this->load->view('siswa/3.Other/registrasi', $data);
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */