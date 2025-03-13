<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller HistoryTiket
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class HistoryTiket extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		// untuk admin nerobos user
		if (!$this->user) {
			redirect('auth');
		}
		 // admin ke user ga akan bisa
     if ($this->session->userdata('user')['role'] == 'petugas') {
			show_error('Anda tidak memiliki hak akses untuk mengakses halaman ini. Logout dan login sebagai user untuk melanjutkan, <a href="' . base_url('admin') . '">Kembali.</a>', 403, 'Akses Ditolak');
		}
		// end admin nerobos user

		// end admin nerobos user
  }

  public function index()
  {
    $this->load->view('user/Riwayat Pesan');
  }

}


/* End of file HistoryTiket.php */
/* Location: ./application/controllers/HistoryTiket.php */
