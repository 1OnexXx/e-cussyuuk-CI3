<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	 public function __construct()
	 {
		parent::__construct();
		// sampel contoh
		// untuk admin nerobos user
		if (!$this->user) {
			redirect('auth');
		}
		if (empty($this->user->nama_penumpang)) {
			show_error('Anda tidak memiliki hak akses untuk mengakses halaman ini. Logout dan login sebagai user untuk melanjutkan, <a href="'. base_url('admin') .'">Kembali.</a>' , 403, 'Akses Ditolak');
		}
		// end admin nerobos user
	 }
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
