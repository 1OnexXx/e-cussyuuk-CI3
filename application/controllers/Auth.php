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

		$user = $this->db->get_where('penumpang', ['username' => $username])->row();

		if ($user) {

			if (password_verify($password, $user->password)) {

				$this->session->set_userdata(['user' => $user]);
				redirect(base_url());

			} else {
				$this->session->set_flashdata('error_password', 'Password anda salah!');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('error_username', 'Pengguna tidak ditemukan');
			redirect('auth');
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
