<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penumpang_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/index');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
	
		// Cek di tabel 'penumpang' dulu
		$user = $this->db->get_where('penumpang', ['username' => $username])->row();
		$role = 'penumpang';
	
		// Jika tidak ditemukan, cek di tabel 'petugas'
		if (!$user) {
			$user = $this->db->get_where('petugas', ['username' => $username])->row();
			$role = 'petugas';
		}
	
		// Jika tetap tidak ditemukan, kasih error
		if (!$user) {
			$this->session->set_flashdata('error_username', 'Pengguna tidak ditemukan');
			redirect('index.php/auth');
		}
	
		// Verifikasi password
		if (password_verify($password, $user->password)) {
			// Simpan user ke session
			$this->session->set_userdata(['user' => [
				'username' => $user->username,
				'role' => $role
			]]);
	
			// Redirect berdasarkan peran
			if ($role == 'penumpang') {

								
				$this->session->set_userdata([
					'id_pelanggan' => $user->id_penumpang, 
					'username' => $user->username,
					'nama_penumpang' => $user->nama_penumpang
				]);


				redirect(base_url());

			} else {
				redirect('index.php/admin');
			}
		} else {
			$this->session->set_flashdata('error_password', 'Password anda salah!');
			redirect('index.php/auth');
		}
	}
	

	public function register()
	{
		$this->form_validation->set_rules('nama_penumpang', 'Nama penumang', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('no_telepon', 'No telpon', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/register');
		} else {
			$this->Penumpang_model->create();
			redirect('auth');
		}
	}

	public function logout()
	{
		// Hapus sessionn
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
