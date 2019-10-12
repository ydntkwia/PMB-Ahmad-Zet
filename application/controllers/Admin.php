<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('Mod_data');
		$this->load->model('Modlogin');
		if ($this->session->userdata('level') == '4') {
			redirect('login','refresh');
		}elseif($this->session->userdata('level') == '1' || $this->session->userdata('level') == '2' || $this->session->userdata('level') == '3'){
			$a1 = $this->session->userdata('log_nidn');
			$a2 = $this->session->userdata('log_role');
			$a3 = $this->session->userdata('log_token');
			$db_log = $this->Modlogin->getlog_verify($a1,$a2,$a3)->row();
			$log_status = $db_log->status;
			if ($log_status == 'logout') {
				redirect('force-logout-admin','refresh');
			}else{
			}
		}elseif ($this->session->userdata('level') == ''){
			redirect('login-admin','refresh');
		}
	}
	// Root ::
	public function ubah_pesan()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');	
		}
		else{
			$id = $this->uri->segment(3);
			$data = array(
				'id_status_pesan' => '1'
			);
			$this->Mod_data->update($id,$data,'id_daftar','tbl_daftar');
			redirect('pendaftar','refresh');			
		}
	}
	public function ubah_pesan_a()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');	
		}
		else{
			$id = $this->uri->segment(3);
			$data = array(
				'id_status_pesan' => '1'
			);
			$this->Mod_data->update($id,$data,'id_daftar','tbl_daftar');
			redirect('calon-mahasiswa','refresh');			
		}
	}
	public function ubah_pesan_b()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');	
		}
		else{
			$id = $this->uri->segment(3);
			$data = array(
				'id_status_pesan' => '1'
			);
			$this->Mod_data->update($id,$data,'id_daftar','tbl_daftar');
			redirect('registrasi-mahasiswa','refresh');			
		}
	}
	public function ubah_pesan_c()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');	
		}
		else{
			$id = $this->uri->segment(3);
			$data = array(
				'id_status_pesan' => '1'
			);
			$this->Mod_data->update($id,$data,'id_daftar','tbl_daftar');
			redirect('diterima','refresh');			
		}
	}
	// Admin-Index
	public function index()
	{
		$data['daftar'] = $this->Mod_data->hitung_pendaftar();
		$data['calon'] = $this->Mod_data->hitung_calon();
		$data['registrasi'] = $this->Mod_data->hitung_registrasi();
		$data['diterima'] = $this->Mod_data->hitung_diterima();
		$this->load->view('admin/1.home/index',$data);
	}
	// Data Daftar
		// Data Daftar.pendaftar
	public function calon()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');	
		}
		else{
			$data['aprove'] = $this->Mod_data->data_aprove();
			$this->load->view('admin/2.c_mahasiswa/index',$data);	
		}
	}
		// Data Daftar.calon
	public function belum()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');	
		}
		else{
			$data['belum'] =$this->Mod_data->calon()->result();
			$this->load->view('admin/3.d_mahasiswa/belum', $data);
		}
	}
		// Data Daftar.registrasi
	public function registrasi()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');	
		}
		else{
			$data['registrasi'] =$this->Mod_data->registrasi()->result();
			$this->load->view('admin/3.d_mahasiswa/registrasi', $data);
		}
	}
		// Data Daftar.diterima
	public function data()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');
		}
		else{
			$data['dm'] = $this->Mod_data->datamhs()->result();
			$this->load->view('admin/3.d_mahasiswa/index',$data);
		}
	}
		// Data Daftar.pendaftar.hapus_diterima
	public function delete_aprove()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');
		}
		else{
			$nis = 	$this->uri->segment(3);
			$data = array(
				'id_status' => '5'  
			);
			$this->Mod_data->update($nis,$data,'nis','tbl_daftar');
			$this->session->set_flashdata('delete_aprove','Data Berhasil Dihapus!');
			redirect('pendaftar','refresh');
		}
	}
		// Data Daftar.pendaftar.approve_diterima
	public function add_user()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');
		}
		else{
			$nis = 	$this->uri->segment(3);
			$id_daftar = 	$this->uri->segment(4);
			$data = array(
				'id_status' => '2', 
				'id_status_pesan' => '2'
			);
			$data2 = array(
				'id_daftar' => $id_daftar, 
				'password' => get_hash('12345678'),
				'id_level' => '4',
			);
			$this->Mod_data->update($nis,$data,'nis','tbl_daftar');
			$this->Mod_data->insert('tbl_user_daftar',$data2);
			$this->session->set_flashdata('aprove','Pendaftar Berhasil Diterima!');
			redirect('pendaftar','refresh');
		}
	}
	// Data Daftar.calon.akun_hapus
	public function delete_belum()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');
		}
		else{
			$id_daftar = 	$this->uri->segment(3);
			$data = array(
				'id_status' => '5'  
			);
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_user_daftar');
			$this->Mod_data->update($id_daftar,$data,'id_daftar','tbl_daftar');
			$this->session->set_flashdata('delete_belum','Data Berhasil Dihapus!');
			redirect('calon-mahasiswa','refresh');
		}
	}
		// Data Daftar.registrasi.akun_hapus
	public function delete_calon()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');
		}
		else{
			$id_daftar = 	$this->uri->segment(3);
			$data = array(
				'id_status' => '5'  
			);
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_user_daftar');
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_sbkerja');
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_detail_pendidikan');
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_detail_ortu');
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_mhs');
			$this->Mod_data->update($id_daftar,$data,'id_daftar','tbl_daftar');
			$this->session->set_flashdata('delete_aprove','Data Berhasil Dihapus!');
			redirect('registrasi-mahasiswa','refresh');
		}
	}
	public function delete_diterima()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');
		}
		else{
			$id_daftar = 	$this->uri->segment(3);
			$data = array(
				'id_status' => '5'  
			);
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_user_daftar');
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_sbkerja');
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_detail_pendidikan');
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_detail_ortu');
			$this->Mod_data->delete('id_daftar',$id_daftar,'tbl_mhs');
			$this->Mod_data->update($id_daftar,$data,'id_daftar','tbl_daftar');
			$this->session->set_flashdata('delete_aprove','Data Berhasil Dihapus!');
			redirect('diterima','refresh');
		}
	}
		// Data Daftar.registrasi.terima_calon
	public function terima_calon()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');
		}
		else{
			$id_daftar = 	$this->uri->segment(3);
			$data = array(
				'id_status' => '4',
				'id_status_pesan' => '2'  
			);
			$this->Mod_data->update($id_daftar,$data,'id_daftar','tbl_daftar');
			$this->session->set_flashdata('terima_calon','Mahasiswa baru telah ditambahkan!');
			redirect('registrasi-mahasiswa','refresh');
		}
	}
		// Data Daftar.registrasi.edit_calon
	public function edit_mhs()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');
		}
		else{
			$id_cek = $this->uri->segment(3);
			$data2 = array(
				'id_edit_mhs' => $id_cek 
			);
			$this->session->set_userdata( $data2 );
			redirect('edit-data-mhs','refresh');
		}
	}
		// Data Daftar.registrasi.redirect_edit_calon
	public function tampil_edit()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');
		}
		else{
			$id = $this->session->userdata('id_edit_mhs');
			$data['agama'] = $this->Mod_data->get_table('tbl_agama')->result();
			$data['marital'] = $this->Mod_data->get_table('tbl_marital')->result();
			$data['kelas_pilihan'] = $this->Mod_data->get_table('tbl_kelas_pilihan')->result();
			$data['studi_pilihan'] = $this->Mod_data->get_table('tbl_studi_pilihan')->result();
			$data['jk'] = $this->Mod_data->get_table('tbl_jk')->result();
			$data['edit'] = $this->Mod_data->get_edit($id)->result(); 
			$this->load->view('admin/3.d_mahasiswa/v_edit', $data);
		}
	}
		// Data Daftar.registrasi.aksi_edit_calon
	public function aksi_edit_regis()
	{
		if ($this->session->userdata('level') == '3') {
			redirect('404','refresh');
		}
		else{
			$id_agama = $this->input->post('id_agama');
			$id_marital = $this->input->post('id_marital');
			$id_studi_pilihan = $this->input->post('id_studi_pilihan');
			$id_kelas_pilihan = $this->input->post('id_kelas_pilihan');
			$sbkerja = $this->input->post('sbkerja');

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
			$data4 = array(
				'id_daftar' => $id_daftar,
				'sbkerja' => $sbkerja,
				'sbnama_perusahaan' => $this->input->post('sbnama_perusahaan'),
				'sbinstansi' => $this->input->post('sbinstansi'),
				'sbjabatan' => $this->input->post('sbjabatan'),
				'sbalamat_kantor' => $this->input->post('sbalamat_kantor'),
			);
			if ($_FILES['berkas']['size'] == 0 )
			{
				$data5 = array(
					'id_daftar' => $id_daftar,
					'nis' => $this->input->post('nis'),
					'nama' => $this->input->post('nama'),
					'id_jk' => $this->input->post('id_jk'),
					'alamat' => $this->input->post('alamat'),
					'telp' => $this->input->post('telp'),
					'sekolah' => $this->input->post('d_sekolah'),
				);
				$this->Mod_data->update($id_daftar,$data5,'id_daftar','tbl_daftar');
				$this->Mod_data->update($id_daftar,$data,'id_daftar','tbl_mhs');
				$this->Mod_data->update($id_daftar,$data2,'id_daftar','tbl_detail_ortu');
				$this->Mod_data->update($id_daftar,$data3,'id_daftar','tbl_detail_pendidikan');
				$this->Mod_data->update($id_daftar,$data4,'id_daftar','tbl_sbkerja');
				redirect('edit-data-mhs','refresh');
			}
			else{
				$config['upload_path'] = "./assets/img/user/";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['file_name'] = $this->input->post('nis');
				$this->upload->initialize($config);
				$g = $this->Mod_data->get_where('id_daftar',$id_daftar,'tbl_daftar')->row_array();
				unlink('./assets/img/user/'.$g['foto']);
				if ($this->upload->do_upload('berkas')) {
					$image = $this->upload->data();
					$data5 = array(
						'id_daftar' => $id_daftar,
						'nis' => $this->input->post('nis'),
						'nama' => $this->input->post('nama'),
						'id_jk' => $this->input->post('id_jk'),
						'alamat' => $this->input->post('alamat'),
						'telp' => $this->input->post('telp'),
						'sekolah' => $this->input->post('d_sekolah'),
						'foto' => $image['file_name'],
					);
					$this->Mod_data->update($id_daftar,$data5,'id_daftar','tbl_daftar');
					$this->Mod_data->update($id_daftar,$data,'id_daftar','tbl_mhs');
					$this->Mod_data->update($id_daftar,$data2,'id_daftar','tbl_detail_ortu');
					$this->Mod_data->update($id_daftar,$data3,'id_daftar','tbl_detail_pendidikan');
					$this->Mod_data->update($id_daftar,$data4,'id_daftar','tbl_sbkerja');
					redirect('edit-data-mhs','refresh');
				}
			}
		}
		
	}
// Artikel.tambah
	// Artikel.tambah.index
	public function artikel_tambah()
	{
		if ($this->session->userdata('level')=='2') {
			redirect('404','refresh');
		}
		else{
			$data['kategori'] = $this->Mod_data->get_table('tbl_kategori')->result();
			$this->load->view('admin/5.artikel/tambah',$data);
		}
	}
	// Artikel.tambah.aksi_tambah_kategori
	public function aksi_tambah_kategori()
	{
		if ($this->session->userdata('level')=='2') {
			redirect('404','refresh');
		}
		else{

			$this->_rules();
			if ($this->form_validation->run()==true) 
			{
				$data = array(
					'kategori' => input_filter($this->input->post('kategori_baru'))
				);
				$this->Mod_data->insert('tbl_kategori',$data);
				$this->session->set_flashdata('success','Kategori berhasil ditambahkan!');
				redirect('artikel-tambah','refresh');
			}
		}
	}
	// Artikel.tambah.aksi_hapus_kategori
	public function hapus_kategori()
	{
		if ($this->session->userdata('level')=='2') {
			redirect('404','refresh');
		}
		else{
			$id_user = 	$this->uri->segment(3);
			if ($this->Mod_data->get_where('id_kategori',$id_user,'tbl_artikel')->num_rows()==1) {
				$g = $this->Mod_data->get_where('id_kategori',$id_user,'tbl_kategori')->row_array();
				$this->session->set_flashdata('error','Masih terdapat artikel dengan kategori '.$g['kategori'].' !');
				redirect('artikel-tambah','refresh');
			}
			else{
				$this->Mod_data->delete('id_kategori',$id_user,'tbl_kategori');
				$this->session->set_flashdata('success','Kategori berhasil dihapus!');
				redirect('artikel-tambah','refresh');
			}
		}
	}
	// Artikel.tambah.aksi_edit_kategori
	public function edit_kategori()
	{
		if ($this->session->userdata('level')=='2') {
			redirect('404','refresh');
		}
		else{

			$id_kategori = 	$this->uri->segment(3);
			$data1 = $this->input->post('kategori');
			$data = array(
				'kategori' => $data1  
			);
			$this->Mod_data->update($id_kategori, $data,'id_kategori','tbl_kategori');
			$this->session->set_flashdata('success','Kategori berhasil diedit!');
			redirect('artikel-tambah','refresh');
		}
	}
	// Artikel.tambah.aksi_tambah_artikel
	public function aksi_tambah_artikel()
	{
		if ($this->session->userdata('level')=='2') {
			redirect('404','refresh');
		}
		else{

			$this->_rules_artikel();
			if ($this->form_validation->run()==true) 
			{
				$data3 =  input_filter($this->input->post('id_kategori'));
				if ($data3 != '-Pilih-') {
					$config['upload_path'] = "./assets/img/artikel/";
					$config['allowed_types'] = "jpg|jpeg|png";
					$config['file_name'] = $this->input->post('judul');
					$this->upload->initialize($config);
					$this->upload->do_upload('berkas');
					$image = $this->upload->data();
					$data1 =  input_filter($this->input->post('judul'));
					$data2 =  input_filter($this->input->post('isi'));
					$tanggal =  input_filter($this->input->post('tanggal'));
					$data = array(
						'id_kategori' => $data3,
						'judul' => 	$data1,
						'gambar' => $image['file_name'],
						'isi' => $data2,
						'tanggal' => $tanggal
					);
					$this->session->set_flashdata('success','Artikel berhasil ditambahkan!');
					$this->Mod_data->insert('tbl_artikel',$data);
					redirect('artikel-tambah','refresh');

				}
				else{
					$this->session->set_flashdata('error','Anda belum memilih kategori');
					redirect('artikel-tambah','refresh');
				}
			}
		}
	}
	// Artikel.index_kelola
	public function artikel_kelola()
	{
		if ($this->session->userdata('level')=='2') {
			redirect('404','refresh');
		}
		else{
			$data['artikel'] = $this->Mod_data->get_artikel()->result();
			$this->load->view('admin/5.artikel/index', $data);
		}
	}
	// Artikel.index_kelola.hapus_artikel
	public function delete_artikel()
	{
		if ($this->session->userdata('level')=='2') {
			redirect('404','refresh');
		}
		else{
			$id_user = 	$this->uri->segment(3);
			$this->Mod_data->delete('id_artikel',$id_user,'tbl_artikel');
			$this->session->set_flashdata('hapus_artikel','Artikel berhasil dihapus!');
			redirect('artikel-kelola','refresh');
		}
	}
	// Artikel.index_kelola.edit_artikel
	public function update_artikel()
	{
		if ($this->session->userdata('level')=='2') {
			redirect('404','refresh');
		}
		else{
			$id = $this->uri->segment(3);
			$datauser = array(
				'id_edit_artikel' => $id
			);
			$this->session->set_userdata($datauser);
			redirect('edit-artikel','refresh');
		}
	}
	// Artikel.index_kelola.redirect_edit_artikel
	public function artikel_edit()
	{
		if ($this->session->userdata('level')=='2') {
			redirect('404','refresh');
		}
		else{
			$data['edit'] = $this->Mod_data->get_edit_artikel($this->session->userdata('id_edit_artikel'))->result(); 
			$data['kategori'] = $this->Mod_data->datakategori()->result();
			$this->load->view('admin/5.artikel/user-edit-artikel', $data);
		}
	}
	// Artikel.index_kelola.aksi_edit_artikel
	public function aksi_edit_artikel()
	{
		if ($this->session->userdata('level')=='2') {
			redirect('404','refresh');
		}
		else{
			if ($_FILES['berkas']['size'] == 0 ) {
				$data4 =  $this->input->post('id_artikel');
				$data3 =  $this->input->post('id_kategori');
				$data1 =  $this->input->post('judul');
				$data2 =  $this->input->post('isi');
				$tanggal =  $this->input->post('tanggal');
				$data = array(
					'id_kategori' => $data3,
					'judul' => 	$data1,
					'isi' => $data2,
					'tanggal' => $tanggal
				);
				$this->session->set_flashdata('edit_artikel','Artikel berhasil diedit!');
				$this->Mod_data->update($data4,$data,'id_artikel','tbl_artikel');
				redirect('edit-artikel','refresh');
			}else{
				$data4 =  $this->input->post('id_artikel');
				$data3 =  $this->input->post('id_kategori');
				$data1 =  $this->input->post('judul');
				$data2 =  $this->input->post('isi');
				$tanggal =  $this->input->post('tanggal');
				$config['upload_path'] = "./assets/img/artikel/";
				$config['allowed_types'] = "gif|jpg|jpeg|png";
				$config['file_name'] = $this->input->post('judul');
				$this->upload->initialize($config);

				$g = $this->Mod_data->get_where('id_artikel',$data4,'tbl_artikel')->row_array();
				unlink('./assets/img/artikel/'.$g['gambar']);

				$this->upload->do_upload('berkas');
				$image = $this->upload->data();
				
				$data = array(
					'id_kategori' => $data3,
					'judul' => 	$data1,
					'gambar' => $image['file_name'],
					'isi' => $data2,
					'tanggal' => $tanggal
				);
				$this->session->set_flashdata('edit_artikel','Artikel berhasil diedit!');
				$this->Mod_data->update($data4,$data,'id_artikel','tbl_artikel');
				redirect('edit-artikel','refresh');
			}

		}
	}
	//User.user_Admin
	public function useradmin()
	{
		if ($this->session->userdata('level') == '1') {
			$data['admin'] =$this->Mod_data->get_table('tbl_user_admin')->result();
			$data['level'] =$this->Mod_data->get_table('tbl_level')->result();
			$this->load->view('admin/4.user/user-admin',$data);
		}
		else{
			redirect('404','refresh');
		}
	}
	//User.user_Admin_tambah
	public function tambah_admin()
	{
		if ($this->session->userdata('level')=='1') {
			$id_level = $this->input->post('id_level');
			if ($id_level == 'null') {
				$this->session->set_flashdata('error','Anda belum memilih level!');
				redirect('user-admin','refresh');
			}
			elseif ($id_level == '1') {
				$this->session->set_flashdata('error','Anda belum memilih level!');
				redirect('user-admin','refresh');
			}
			elseif ($id_level == '4') {
				$this->session->set_flashdata('error','Anda belum memilih level!');
				redirect('user-admin','refresh');
			}
			else{
				$nidn = $this->input->post('nidn');
				if ($this->Mod_data->get_where('nidn',$nidn,'tbl_user_admin')->num_rows()==1) {
					$this->session->set_flashdata('error','NIDN sudah terdaftar!');
					redirect('user-admin','refresh');
				}else{
					$config['upload_path'] = "./assets/img/admin/";
					$config['allowed_types'] = "jpg|jpeg|png";
					$config['file_name'] = $nidn;
					$this->upload->initialize($config);
					if ($this->upload->do_upload('berkas')) {
						$image = $this->upload->data();
						$password = $this->input->post('password');
						$data = array(
							'nidn' => $nidn,
							'nama' => $this->input->post('nama'),
							'password' => get_hash($password),
							'foto' => $image['file_name'],
							'id_level' => $id_level
						);
						$this->session->set_flashdata('success','Anda sudah melakukan pendaftaran! Mohon tunggu pesan dari Admin kami!');
						$this->Mod_data->insert("tbl_user_admin",$data);
						redirect('user-admin','refresh');
					}					
				}
			}
		}
		else{
			redirect('404','refresh');
		}
	}
	//User.Admin_aksi_delete
	public function delete_admin()
	{
		if ($this->session->userdata('level') == '1') {
			$where = $this->uri->segment(3);
			
			$config['upload_path'] = "./assets/img/admin/";
			$config['allowed_types'] = "jpg|jpeg|png";
			$config['file_name'] = $where;
			$this->upload->initialize($config);
			
			$g = $this->Mod_data->get_where('nidn',$where,'tbl_user_admin')->row_array();
			unlink('./assets/img/admin/'.$g['foto']);

			$this->Mod_data->delete('nidn',$where,'tbl_user_admin');
			$this->session->set_flashdata('success','Data Behasil Dihapus!');
			redirect('user-admin','refresh');
		}
		else{
			redirect('404','refresh');
		}
	}
	//User.user_mahasiswa
	public function usermahasiswa()
	{
		if ($this->session->userdata('level') == '1') {
			$data['mahasiswa'] =$this->Mod_data->usermahasiswa()->result();
			$this->load->view('admin/4.user/user-mahasiswa',$data);
		}
		else{
			redirect('404','refresh');
		}
	}
	//User.user_mahasiswa_reset_pass
	public function reset_pass()
	{
		if ($this->session->userdata('level') == '1') {
			$where = $this->uri->segment(3);
			$data = array(
				'password' => get_hash('12345678')
			);
			$this->Mod_data->update($where,$data,'id_user','tbl_user_daftar');
			$this->session->set_flashdata('reset_pass','Password Berhasil Direset!');
			redirect('user-mahasiswa','refresh');
		}
		else{
			redirect('404','refresh');
		}
	}
	//Pengaturan.Admin
	public function edit_admin()
	{
		$id = $this->uri->segment(3);
		if ($this->session->userdata('id_user') == $id) {
			$datauser = array(
				'id_edit' => $id
			);
			$this->session->set_userdata($datauser);
			redirect('edit-admin','refresh');
		}elseif ($this->session->userdata('id_user') == '1') {
			$datauser = array(
				'id_edit' => $id
			);
			$this->session->set_userdata($datauser);
			redirect('edit-admin','refresh');
		}else{
			redirect('404','refresh');
		}

	}
	// Pengaturan.redirect-admin
	public function admin_edit()
	{
		$data['edit'] = $this->Mod_data->get_where('id_admin',$this->session->userdata('id_edit'),'tbl_user_admin')->result(); 
		$this->load->view('admin/4.user/user-edit-admin', $data);
	}

	// Pengaturan.setting-foto-admin
	public function aksi_upload()
	{
		if ($this->session->userdata('level') == '1') {
			if ($_FILES['berkas']['size'] == 0 ) {
				$this->session->set_flashdata('error','Anda Belum memilih gambar!');
				redirect('edit-admin','refresh');
			}
			else{
				$nidn = $this->input->post('nidn');
				$config['upload_path'] = "./assets/img/admin/";
				$config['allowed_types'] = "gif|jpg|jpeg|png";
				$config['file_name'] = $this->input->post('nidn');
				$this->upload->initialize($config);

				$g = $this->Mod_data->get_where('nidn',$nidn,'tbl_user_admin')->row_array();
				unlink('./assets/img/admin/'.$g['foto']);

				if ($this->upload->do_upload('berkas')) {
					$image = $this->upload->data();
					$save = array(
						'foto' => $image['file_name']
					);
					$nidn = $this->input->post('nidn');
					$this->Mod_data->update($nidn,$save,'nidn','tbl_user_admin');
					$this->session->set_flashdata('success','Gambar Berhasil Diupdate!');
					redirect('edit-admin','refresh');
				}
			}
		}else{
			redirect('404','refresh');
		}
	}
	// Pengaturan.setting-username-and-password-admin
	public function edit_admin_aksi()
	{
		$username_cek = $this->input->post('wkwkwk');
		if ($this->Modlogin->cekklogin($username_cek)->num_rows()==1) {
			$nama_lama = $this->input->post('nama_lama');
			$db = $this->Modlogin->cek_login($username_cek,$nama_lama)->row();
			$kepastian = $db->nama;
			$nama_baru = $this->input->post('nama');
			if ($nama_baru == $kepastian) {
				$password = $this->input->post('password');
				$password2 = $this->input->post('password_baru');
				if ($password != '' && $password2 !=''){

					$db = $this->Modlogin->ceklogin($username_cek)->row();
					if (hash_verified($password,$db->password)) {
						$passwordbaru = $this->input->post('password_baru');
						$data = array(
							'password' => get_hash($passwordbaru)
						);
						$this->Mod_data->update($username_cek,$data,'nidn','tbl_user_admin');
						$this->session->set_flashdata('berhasil','Data Berhasil Diupdate');
						redirect('edit-admin','refresh');
							// echo"password diubah<br>";
					}
					else{
						$this->session->set_flashdata('error','Password lama tidak cocok');
						redirect('edit-admin','refresh');
							// echo"password salah<br>";
					}
				}
				else {
					redirect('edit-admin','refresh');
						// echo"Gak ada yang berubah<br>";
				}

			}
			else{
				$password = $this->input->post('password');
				$password2 = $this->input->post('password_baru');
				if ($password != '' && $password2 !=''){
					$username = input_filter($this->input->post('username'));
					if ($this->form_validation->run()==true) {
						if ($this->Modlogin->ceklogin($username)->num_rows()==1) {
							$db = $this->Modlogin->ceklogin($username)->row();
							$password = $this->input->post('password');
							if (hash_verified($password,$db->password)) {
								$passwordbaru = $this->input->post('password_baru');
								$data = array(
									'nama' => $nama_baru,
									'password' => get_hash($passwordbaru)
								);
								$this->session->set_flashdata('berhasil','Data Berhasil Diupdate');
								$this->Mod_data->update($username_cek,$data,'nidn','tbl_user_admin');
								redirect('edit-admin','refresh');
									// echo"berhasil1<br>";
							}
						}
					}
				}
				else {
					$data = array(
						'nama' => $nama_baru,
					);
					$this->session->set_flashdata('berhasil','Data Berhasil Diupdate');
					$this->Mod_data->update($username_cek,$data,'nidn','tbl_user_admin');
						// echo"berhasil2<br>";
					redirect('edit-admin','refresh');
				}
				echo "gagal satu <br>";
			}
			echo "gagal dua <br>";
		}else{
		}
	}
	// Laporan.index
	public function laporan()
	{
		if ($this->session->userdata('level') == '1') {
			$x['data']=$this->Mod_data->get_data_stok()->result();
			$x['data2']=$this->Mod_data->get_data_stok()->result();
			$x['data3']=$this->Mod_data->get_data_stok_jumlah()->result();
			$x['status']=$this->Mod_data->get_table('tbl_status')->result();
			$this->load->view('admin/6.laporan/index',$x);
		}else{
			redirect('404','refresh');
		}
	}

	public function _rules_artikel()
	{
		$this->form_validation->set_rules('isi','Isi','required');
		$this->form_validation->set_rules('judul','Judul','required|max_length[100]');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('kategori_baru','Kategori','required|max_length[50]');
	}
	public function _set_rules()
	{
		$this->form_validation->set_rules('nama','nama','required|max_length[60]|alpha_space');
		$this->form_validation->set_rules('jk','Jenis Kelamin','required|max_length[11]|alpha_space');
		$this->form_validation->set_rules('tempat','Tempat Lahir','required|max_length[20]|alpha_space');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required|max_length[25]');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('kewarganegaraan','Kewarganegaraan','required|max_length[20]|alpha_space');
		$this->form_validation->set_rules('agama','Agama','required|max_length[15]|alpha_space');
		$this->form_validation->set_rules('statuskerja','Status Pekerjaan','required|max_length[15]|alpha_space');
		$this->form_validation->set_rules('statusnikah','Status Pernikahan','required|max_length[20]|alpha_space');
		$this->form_validation->set_rules('nktp','Nomer KTP','required|max_length[20]|alpha_numeric');
		$this->form_validation->set_rules('nkk','Nomer KK','required|max_length[20]|alpha_numeric');
		$this->form_validation->set_rules('ps','Program Studi','required|max_length[50]|alpha_space');
		$this->form_validation->set_rules('kp','Kelas Pilihan','required|max_length[18]|alpha_space');
		$this->form_validation->set_rules('asal','Asal Sekolah','trim|required|max_length[30]');
		$this->form_validation->set_rules('alamatsekolah','Alamat Sekolah','trim|required');
		$this->form_validation->set_rules('jurusan','Jurusan','trim|required');
		$this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
	}

	// Testing Area
	public function cetak_jm()
	{
		if ($this->session->userdata('level') == '1') 
		{
        // membuat halaman baru
			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->SetLeftMargin(22);
			$pdf->SetAutoPageBreak(true);
		// Bagian Judul
			$sc = $this->Mod_data->get_data_stok()->result();
			$sb = $this->Mod_data->get_data_stok_jumlah()->result();
			$pdf->Image(base_url()."assets\image\logo-surat.png",17,10,30,30);
			$pdf->SetFont('Arial','B',14);
			$pdf->SetY(15);
			$pdf->SetX(7);
			$pdf->Cell(230,6,'SEKOLAH TINGGI ILMU BAHASA ASING INVADA',0,1,'C');
			$pdf->SetFont('Arial','B',14);
			$pdf->SetX(7);
			$pdf->Cell(230,6,"LAPORAN PENDAFTARAN",0,1,'C');
			$pdf->SetFont('Arial','',12);
			$pdf->SetX(7);
			$pdf->Cell(230,6,'Jalan Brigjen Darsono Telp 089644481187 Cirebon 45131',0,1,'C');
			$pdf->SetX(7);
			$pdf->Cell(230,6,'Website: http://stibainvada.ac.id/ E-mail: stibainvada.cirebon@gmail.com',0,1,'C');
		// Line Break
			$pdf->SetLineWidth(0.5);
			$pdf->Line(15,42,195,42);
			$pdf->SetLineWidth(0.1);
			$pdf->Line(15,43,195,43);
		// Tanggalan	
			$pdf->Cell(10,9,'',0,1);
			$date_o = date("Y-m-j");
			$date = date_indo($date_o);
			$pdf->SetX(140);
			$pdf->Cell(20,9,"Cirebon, $date");
		// No-Surat
			$pdf->Cell(10,20,'',0,1);
			$pdf->SetX(20);
			$pdf->Cell(10,6,'Nomor',0,'C',TRUE);
			$pdf->SetX(38);
			$pdf->Cell(2,6,':',0,'C',TRUE);
			$pdf->SetX(85);
			$pdf->Cell(20,6,'421/2619-STIBAINVADA/2019',0,'C',TRUE);
		// Lampiran Surat
			$pdf->Cell(10,6,'',0,1);
			$pdf->SetX(25);
			$pdf->Cell(10,6,'Lampiran',0,'C',TRUE);
			$pdf->SetX(38);
			$pdf->Cell(2,6,':',0,'C',TRUE);
			$pdf->SetX(29);
			$pdf->Cell(20,6,'-',0,'C',TRUE);
		// Perihal Surat
			$pdf->Cell(10,6,'',0,1);
			$pdf->SetX(20.3);
			$pdf->Cell(10,6,'Perihal',0,'C',TRUE);
			$pdf->SetX(38);
			$pdf->Cell(2,6,':',0,'C',TRUE);
			$pdf->SetX(68);
			$pdf->Cell(20,6,'Laporan Pendaftaran.',0,'C',TRUE);
		// Pembuka Kata-kata
			$pdf->Cell(10,19,'',0,1);
			$pdf->SetFont('Arial','',12);
			$pdf->SetX(45);
			$pdf->MultiCell(145,7,'Sehubungan dengan telah selesainya proses pelaksanaan Penerimaan Mahasiswa Baru (PMB) di STIBA INVADA yang dilakukan oleh Pantia Pendaftaran STIBA INVADA, berikut merupakan data hasil pendaftaran :','C');
			$pdf->Cell(10,7,'',0,1);
		// Bagian Field Tabel
		// $pdf->SetTextColor(225, 225, 225);
			$pdf->SetLineWidth(0.05);
			$pdf->SetX(46);
			$pdf->SetFont('Arial','B',10);
			$pdf->setFillColor(233, 233, 233);
			$pdf->Cell(20,5,'NO','L,R,T,B',0,'C',TRUE);
			$pdf->Cell(61.5,5,'STATUS','L,T,B',0,'C',TRUE);
			$pdf->Cell(61.5,5,'JUMLAH','L,R,T,B',0,'C',TRUE);
		// Data Tabel
			$no = 1;
			foreach ($sc as $row) {
				$pdf->Cell(10,5,'',0,1);
				$pdf->SetTextColor(0, 0, 0);
				$pdf->SetX(46);
				$pdf->SetFont('Arial','',10);
				$col = false;
				if ($no % 2 == 0) {
					$pdf->setFillColor(243, 243, 243);
				}
				else{
					$pdf->setFillColor(255, 255, 255);
				}
				$pdf->Cell(20,6,$no,'L,R,B',0,'C',TRUE);
				$pdf->Cell(61.5,6,$row->status,'L,B',0,'C',TRUE);
				$pdf->Cell(61.5,6,$row->jumlah,'L,R,B,',0,'C',TRUE);
				$no++;
			}
			$no = 1;
			foreach ($sb as $row) {
				$pdf->Cell(10,5,'',0,1);
				$pdf->SetLineWidth(0.05);
				$pdf->SetX(46);
				$pdf->SetFont('Arial','B',10);
				$pdf->setFillColor(233, 233, 233);
				$pdf->Cell(81.5,6,'JUMLAH KESELURUHAN','L,T,B',0,'L',TRUE);
				$pdf->Cell(61.5,6,$row->jumlah,'L,R,T,B',0,'C',TRUE);
			}
			$pdf->Cell(10,12,'',0,1);
			$pdf->SetFont('Arial','',12);
			$pdf->SetX(45);
			$pdf->MultiCell(145,7,'Demikian disampaikan untuk diperhatikan dan dengan penuh tanggungjawab, terima kasih.','C');
			$pdf->Cell(10,15,'',0,1);
		// ttd
			$pdf->SetFont('Arial','B',12);
			$pdf->SetX(140);
			$pdf->MultiCell(60,7,'Ketua Panitia,','C');
			$pdf->Cell(10,20,'',0,1);
		//area ttd
			$pdf->SetFont('Arial','',12);
			$pdf->SetX(140);
			$pdf->MultiCell(60,1,'.....................................','C');
		// Garis ttd
			$pdf->SetX(140);
			$pdf->MultiCell(145,1,'___________________','C');
		// Nama ttd
			$pdf->MultiCell(145,1,'','C');
			$pdf->SetFont('Arial','',12);
			$pdf->SetX(140);
			$pdf->MultiCell(60,7,'NIP.','C');
			$pdf->Cell(10,20,'',0,1);
		// Hasil output
			$pdf->Output('D', 'Laporan_Pendaftaran.pdf');
		}
		else{
			redirect('404','refresh');
		}

	}

	// Cetak per status
	public function cetak_jd()
	{
		if ($this->session->userdata('level') == '1') {
			$id_status = $this->input->post('id_status');
			if ($id_status == 'null') {
				$this->session->set_flashdata('error', 'Anda belum memilih status data yang akan dicetak!');
				redirect('laporan','refresh');
			}
			else{
				// membuat halaman baru
				$pdf = new FPDF('P','mm','A4');
				$pdf->AddPage();
				$pdf->SetLeftMargin(22);
				$pdf->SetAutoPageBreak(true);
				// Bagian Judul
				$sc = $this->Mod_data->get_where('id_status',$id_status,'tbl_daftar')->result();
				$sd = $this->Mod_data->get_where('id_status',$id_status,'tbl_status')->result();
				$pdf->Image(base_url()."assets\image\logo-surat.png",17,10,30,30);
				$pdf->SetFont('Arial','B',14);
				$pdf->SetY(15);
				$pdf->SetX(7);
				$pdf->Cell(230,6,'SEKOLAH TINGGI ILMU BAHASA ASING INVADA',0,1,'C');
				$pdf->SetFont('Arial','B',14);
				$pdf->SetX(7);
				$pdf->Cell(230,6,"LAPORAN PENDAFTARAN",0,1,'C');
				$pdf->SetFont('Arial','',12);
				$pdf->SetX(7);
				$pdf->Cell(230,6,'Jalan Brigjen Darsono Telp 089644481187 Cirebon 45131',0,1,'C');
				$pdf->SetX(7);
				$pdf->Cell(230,6,'Website: http://stibainvada.ac.id/ E-mail: stibainvada.cirebon@gmail.com',0,1,'C');
				// Line Break
				$pdf->SetLineWidth(0.5);
				$pdf->Line(15,42,195,42);
				$pdf->SetLineWidth(0.1);
				$pdf->Line(15,43,195,43);
				// Judul Data
				foreach ($sd as $row) {
					$pdf->SetFont('Arial','B',14);
					$pdf->Cell(10,10,'',0,1);
					$pdf->SetX(15);
					$hasil = strtoupper($row->status);
					$pdf->Cell(195,6,'LAPORAN DATA STATUS '.$hasil,0,1,'C');
				}
				//TD
				$pdf->Cell(10,5,'',0,1);
				$pdf->SetLineWidth(0.05);
				$pdf->SetX(15);
				$pdf->SetFont('Arial','B',10);
				$pdf->setFillColor(233, 233, 233);
				$pdf->Cell(10,5,'NO','L,R,T,B',0,'C',TRUE);
				$pdf->Cell(35,5,'NIS','L,T,B',0,'C',TRUE);
				$pdf->Cell(95,5,'Nama','L,R,T,B',0,'C',TRUE);
				$pdf->Cell(40,5,'Nomor Telepon','L,R,T,B',0,'C',TRUE);
				// Isi Tabel
				$no = 1;
				if (empty($sc)) {
					$pdf->Cell(10,5,'',0,1);
					$pdf->SetTextColor(0, 0, 0);
					$pdf->SetX(15);
					$pdf->SetFont('Arial','',10);
					$col = false;
					$pdf->setFillColor(255, 255, 255);
					$pdf->Cell(180,6,'Tidak Ada Data','L,R,B',0,'C',TRUE);
				}else{
					foreach ($sc as $row) {
						$pdf->Cell(10,5,'',0,1);
						$pdf->SetTextColor(0, 0, 0);
						$pdf->SetX(15);
						$pdf->SetFont('Arial','',10);
						$col = false;
						if ($no % 2 == 0) {
							$pdf->setFillColor(243, 243, 243);
						}
						else{
							$pdf->setFillColor(255, 255, 255);
						}
						$pdf->Cell(10,6,$no,'L,R,B',0,'L',TRUE);
						$pdf->Cell(35,6,$row->nis,'L,B',0,'L',TRUE);
						$pdf->Cell(95,6,$row->nama,'L,B',0,'L',TRUE);
						$pdf->Cell(40,6,$row->telp,'L,R,B,',0,'L',TRUE);
						$no++;
					}

				}
				// Cetak
				$pdf->Output('D', 'Laporan_Pendaftaran_Per_Status.pdf');
			}
		}else{
			redirect('404','refresh');
		}
	}	
	
}


