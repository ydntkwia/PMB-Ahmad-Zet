<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modlogin');
		$this->load->model('Mod_data');
		$this->load->helper('url');
	}	
	// Login Mahasiswa
	public function index_error()
	{
		if ($this->session->userdata('id_log_error') != ''){
			$this->load->view('login/1.login/index-error');
		}else{	
			redirect('login','refresh');
		}
	}

	public function force_index()
	{
		if ($this->session->userdata('id_log_error') != ''){

			$a2 = $this->session->userdata('log_token_before');
			$a3 = $this->session->userdata('log_nisn');
			$a4 = $this->session->userdata('log_role');
			$data_logout = array(
				'id_user' => $a3,
				'role' => $a4,
				'token' => $a2,
				'status' => 'logout'  
			);
			$this->Mod_data->insert('log',$data_logout);

			$a1 = $this->session->userdata('log_token');
			$log_isi = array(
				'id_user' => $a3,
				'role' => 'pelajar',
				'token' => $a1,
				'status' => 'login'
			);
			$this->Mod_data->insert('log',$log_isi);
			redirect('user','refresh');
		}else{	
			redirect('login','refresh');
		}
	}

	public function index()
	{
		if ($this->session->userdata('level') == '4'){
			redirect('user','refresh');
		}else{
			$this->_set();
			if (isset($_POST['login'])) {
				$nis = input_filter($this->input->post('nis'));
				if ($this->form_validation->run()==true) {
					if ($this->Modlogin->ceklogin_user($nis)->num_rows()==1) {
						$db = $this->Modlogin->ceklogin_user($nis)->row();
						$password = input_filter($this->input->post('password'));
						if (hash_verified($password,$db->password)) {
							if ($this->Modlogin->getlog($nis,'pelajar')->num_rows()==0) {
								$log_status = '';
								$log_token = '';
								$log_role = '';
							}else{
								$db_log = $this->Modlogin->getlog($nis,'pelajar')->row();
								$log_status = $db_log->status;
								$log_token = $db_log->token;
								$log_role = $db_log->role;
							}
							$log_verify = $this->input->post('token');
							if($log_status == 'logout' && $log_role == 'pelajar' || $log_status == '' && $log_role == ''){
								// langsung login
								$log_isi = array(
									'id_user' => $nis,
									'role' => 'pelajar',
									'token' => $log_verify,
									'status' => 'login'
								);
								$datauser = array(
									'id_daftar' => $db->id_daftar,
									'nama' => $db->nama,
									'level' =>$db->id_level,
									'foto' => $db->foto,
									'id_user' => $db->id_user,
									'id_status' => $db->id_status,
									'log_nisn' => $db->nis,
									'log_role' => 'pelajar',
									'log_token' => $log_verify,
									'log_token_before' => ''
								);
								$this->Mod_data->insert('log',$log_isi);
								$this->session->set_userdata($datauser);
								redirect('user','refresh');
							}else{
								if ($log_token == $log_verify) {
								// do nothing
									$datauser= array(
										'id_daftar' => $db->id_daftar,
										'nama' => $db->nama,
										'level' =>$db->id_level,
										'foto' => $db->foto,
										'id_user' => $db->id_user,
										'id_status' => $db->id_status,
										'log_nisn' => $db->nis,
										'log_role' => 'pelajar',
										'log_token' => $log_verify,
										'log_token_before' => ''
									);
									$this->session->set_userdata($datauser);
									redirect('user','refresh'); 
								}else{
								// peringatan
									$has_login = array(
										'id_daftar' => $db->id_daftar,
										'nama' => $db->nama,
										'level' =>$db->id_level,
										'foto' => $db->foto,
										'id_user' => $db->id_user,
										'id_status' => $db->id_status,
										'log_nisn' => $db->nis,
										'log_role' => 'pelajar',
										'log_token' => $log_verify,
										'log_token_before' => $log_token,
										'id_log_error' => '1'
									);
									$this->session->set_userdata($has_login);
									redirect('login-error','refresh');
								// end
								}
							}
						}else{
							$this->session->set_flashdata('message-wrong','Username atau Password Salah');
							redirect('login','refresh');
						}
					}else{
						$this->session->set_flashdata('message-wrong','Akun tidak terdaftar');
						redirect('login','refresh');
					}
				}else{
					$this->load->view('login/1.login/index');
				}
			}else{
				$this->load->view('login/1.login/index');
			}
		}
	}
	// Login Admin
	public function index_admin_error()
	{
		if ($this->session->userdata('id_log_error') != ''){
			$this->load->view('login/1.login/index-admin-error');
		}else{	
			redirect('login-admin','refresh');
		}
	}

	public function force_index_admin()
	{
		if ($this->session->userdata('id_log_error') != ''){

			$a2 = $this->session->userdata('log_token_before');
			$a3 = $this->session->userdata('log_nidn');
			$a4 = $this->session->userdata('log_role');
			$data_logout = array(
				'id_user' => $a3,
				'role' => $a4,
				'token' => $a2,
				'status' => 'logout'  
			);
			$this->Mod_data->insert('log',$data_logout);

			$a1 = $this->session->userdata('log_token');
			$log_isi = array(
				'id_user' => $a3,
				'role' => 'admin',
				'token' => $a1,
				'status' => 'login'
			);
			$this->Mod_data->insert('log',$log_isi);
			redirect('admin','refresh');
		}else{	
			redirect('login-admin','refresh');
		}
	}

	public function index_admin()
	{
		if ($this->session->userdata('level') != ''){
			if ($this->session->userdata('level') == '4') {
				redirect('login','refresh');
			}else{
				redirect('admin','refresh');
			}
		}else{

			$this->_set();
			if (isset($_POST['login'])) {
				$nidn = $this->input->post('nidn');
				if ($this->form_validation->run()==true) {
					if ($this->Modlogin->ceklogin($nidn)->num_rows()==1) {
						$db = $this->Modlogin->ceklogin($nidn)->row();
						$password = input_filter($this->input->post('password'));
						if (hash_verified($password,$db->password)) {
								// start
							if ($this->Modlogin->getlog($nidn,'admin')->num_rows()==0) {
								$log_status = '';
								$log_token = '';
								$log_role = '';
							}else{
								$db_log = $this->Modlogin->getlog($nidn,'admin')->row();
								$log_status = $db_log->status;
								$log_token = $db_log->token;
								$log_role = $db_log->role;
							}
							$log_verify = $this->input->post('token');
							if($log_status == 'logout' && $log_role == 'admin' || $log_status == '' && $log_role == ''){
							// langsung login
								$log_isi = array(
									'id_user' => $nidn,
									'role' => 'admin',
									'token' => $log_verify,
									'status' => 'login'
								);
								if ($db->id_level == '1') {
									$datauser= array(
										'nama' => $db->nama,
										'level' => $db->id_level,
										'foto' => $db->foto,
										'log_nidn' => $db->nidn,
										'id_user' => $db->id_admin,
										'log_role' => 'admin',
										'log_token' => $log_verify,
										'log_token_before' => ''
									);
									$this->session->set_userdata($datauser);
									$this->Mod_data->insert('log',$log_isi);
									redirect('admin','refresh');
								}
								elseif ($db->id_level == '2') {
									$datauser = array(
										'nama' => $db->nama,
										'level' =>$db->id_level,
										'foto' => $db->foto,
										'log_nidn' => $db->nidn,
										'id_user' => $db->id_admin,
										'log_role' => 'admin',
										'log_token' => $log_verify,
										'log_token_before' => ''
									);
									$this->Mod_data->insert('log',$log_isi);
									$this->session->set_userdata($datauser);
									redirect('admin','refresh');
								}
								elseif ($db->id_level == '3') {
									$datauser = array(
										'nama' => $db->nama,
										'level' =>$db->id_level,
										'foto' => $db->foto,
										'log_nidn' => $db->nidn,
										'id_user' => $db->id_admin,
										'log_role' => 'admin',
										'log_token' => $log_verify,
										'log_token_before' => ''
									);
									$this->Mod_data->insert('log',$log_isi);
									$this->session->set_userdata($datauser);
									redirect('admin','refresh');
								}
								else{
									$this->session->set_flashdata('message-wrong','gagal login');
									redirect('login-admin','refresh');
								}

									// end
							}else{
								if ($log_token == $log_verify) {
								// do nothing
									$datauser= array(
										'nama' => $db->nama,
										'level' => $db->id_level,
										'foto' => $db->foto,
										'log_nidn' => $db->nidn,
										'id_user' => $db->id_admin,
										'log_role' => 'admin',
										'log_token' => $log_verify,
										'log_token_before' => ''
									);
									$this->session->set_userdata($datauser);
									redirect('admin','refresh'); 
								}else{
								// peringatan
									$has_login = array(
										'nama' => $db->nama,
										'level' =>$db->id_level,
										'foto' => $db->foto,
										'log_nidn' => $db->nidn,
										'id_user' => $db->id_admin,
										'log_role' => 'admin',
										'log_token' => $log_verify,
										'log_token_before' => $log_token,
										'id_log_error' => '1'
									);
									$this->session->set_userdata($has_login);
									redirect('login-admin-error','refresh');
								// end
								}
							}
						}else{
							$this->session->set_flashdata('message-wrong','Username atau Password Salah');
							redirect('login-admin','refresh');
						}
					}else{
						$this->session->set_flashdata('message-wrong','Akun tidak terdaftar');
						redirect('login-admin','refresh');
					}
				}else{
					$this->load->view('login/1.login/index-admin');
				}
			}else{
				$this->load->view('login/1.login/index-admin');
			}


		}	
	}

	public function _set()
	{
		// $this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_message('required','{field} Masih Kosong, Silahkan Diisi');
		$this->form_validation->set_message('min_length','{field} tidak boleh kurang dari 8 karakter');
		//dibawah isi sama css yang buat pemberitahuan gagal
		// $this->form_validation->set_error_deilimiters('');
	}
	public function login_admin_verif($a,$b,$c)
	{
		if ($this->session->userdata('level') != ''){
			if ($this->session->userdata('level') == '4') {
				redirect('login','refresh');
			}else{
				redirect('admin','refresh');
			}
		}else{
			$nidn = $a;
			if ($this->Modlogin->ceklogin($nidn)->num_rows()==1) {
				$db = $this->Modlogin->ceklogin($nidn)->row();
				$password = $b;
				if (hash_verified($password,$db->password)) {
								// start
					if ($this->Modlogin->getlog($nidn,'admin')->num_rows()==0) {
						$log_status = '';
						$log_token = '';
						$log_role = '';
					}else{
						$db_log = $this->Modlogin->getlog($nidn,'admin')->row();
						$log_status = $db_log->status;
						$log_token = $db_log->token;
						$log_role = $db_log->role;
					}
					$log_verify = $c;
					if($log_status == 'logout' && $log_role == 'admin' || $log_status == '' && $log_role == ''){
							// langsung login
						$log_isi = array(
							'id_user' => $nidn,
							'role' => 'admin',
							'token' => $log_verify,
							'status' => 'login'
						);
						if ($db->id_level == '1') {
							$datauser= array(
								'nama' => $db->nama,
								'level' => $db->id_level,
								'foto' => $db->foto,
								'log_nidn' => $db->nidn,
								'id_user' => $db->id_admin,
								'log_role' => 'admin',
								'log_token' => $log_verify,
								'log_token_before' => ''
							);
							$this->session->set_userdata($datauser);
							$this->Mod_data->insert('log',$log_isi);
							redirect('admin','refresh');
						}
						elseif ($db->id_level == '2') {
							$datauser = array(
								'nama' => $db->nama,
								'level' =>$db->id_level,
								'foto' => $db->foto,
								'log_nidn' => $db->nidn,
								'id_user' => $db->id_admin,
								'log_role' => 'admin',
								'log_token' => $log_verify,
								'log_token_before' => ''
							);
							$this->Mod_data->insert('log',$log_isi);
							$this->session->set_userdata($datauser);
							redirect('admin','refresh');
						}
						elseif ($db->id_level == '3') {
							$datauser = array(
								'nama' => $db->nama,
								'level' =>$db->id_level,
								'foto' => $db->foto,
								'log_nidn' => $db->nidn,
								'id_user' => $db->id_admin,
								'log_role' => 'admin',
								'log_token' => $log_verify,
								'log_token_before' => ''
							);
							$this->Mod_data->insert('log',$log_isi);
							$this->session->set_userdata($datauser);
							redirect('admin','refresh');
						}
						else{
							$this->session->set_flashdata('message-wrong','gagal login');
							redirect('login-admin','refresh');
						}

									// end
					}else{
						if ($log_token == $log_verify) {
								// do nothing
							$datauser= array(
								'nama' => $db->nama,
								'level' => $db->id_level,
								'foto' => $db->foto,
								'log_nidn' => $db->nidn,
								'id_user' => $db->id_admin,
								'log_role' => 'admin',
								'log_token' => $log_verify,
								'log_token_before' => ''
							);
							$this->session->set_userdata($datauser);
							redirect('admin','refresh'); 
						}else{
								// peringatan
							$has_login = array(
								'nama' => $db->nama,
								'level' =>$db->id_level,
								'foto' => $db->foto,
								'log_nidn' => $db->nidn,
								'id_user' => $db->id_admin,
								'log_role' => 'admin',
								'log_token' => $log_verify,
								'log_token_before' => $log_token,
								'id_log_error' => '1'
							);
							$this->session->set_userdata($has_login);
							redirect('login-admin-error','refresh');
								// end
						}
					}
				}else{
					$this->session->set_flashdata('message-wrong','Username atau Password Salah');
					redirect('login-admin','refresh');
				}
			}else{
				$this->session->set_flashdata('message-wrong','Akun tidak terdaftar');
				redirect('login-admin','refresh');
			}
		}
	}	

	public function login_admin($a,$b)
	{
		if ($this->Modlogin->ceklogin($a)->num_rows()==1) {
			$db = $this->Modlogin->ceklogin($a)->row();
			$password = input_filter($b);
			if (hash_verified($password,$db->password)) {
				if ($db->id_level == '1') {
					$this->load->view('login/1.login/verif');
				}
				elseif ($db->id_level == '2') {
					$this->load->view('login/1.login/verif');
				}
				elseif ($db->id_level == '3') {
					$this->load->view('login/1.login/verif');
				}
				else{
					$this->session->set_flashdata('message-wrong','gagal login');
					redirect('login-admin','refresh');
				}
			}else{
				$this->session->set_flashdata('message-wrong','Username atau Password Salah');
				redirect('login-admin','refresh');
			}
		}else{
			$this->session->set_flashdata('message-wrong','Akun tidak terdaftar');
			redirect('login-admin','refresh');
		}
	}

	// Logout
	public function logout()
	{
		$data1= $this->session->userdata('log_role');
		$data2= $this->session->userdata('log_token');
		$data3= $this->session->userdata('log_nisn');
		$log_logout = array(
			'id_user' => $data3,
			'role' => $data1,
			'token' => $data2,
			'status' => 'logout'
		);
		$this->Mod_data->insert('log',$log_logout);
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
	public function logout_admin()
	{
		$data1= $this->session->userdata('log_role');
		$data2= $this->session->userdata('log_token');
		$data3= $this->session->userdata('log_nidn');
		$log_logout = array(
			'id_user' => $data3,
			'role' => $data1,
			'token' => $data2,
			'status' => 'logout'
		);
		$this->Mod_data->insert('log',$log_logout);
		$this->session->sess_destroy();
		redirect('login-admin','refresh');
	}

	public function force_logout()
	{
		$this->session->sess_destroy();
		redirect('login-admin','refresh');	
	}
	public function force_logout_siswa()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');	
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */