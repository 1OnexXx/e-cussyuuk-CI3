<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller PesanTiket
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

class PesanTiket extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
		// untuk admin nerobos user
		if (!$this->user) {
			redirect('auth');
		}
		if ($this->session->userdata('user')['role'] == 'petugas') {
			show_error('Anda tidak memiliki hak akses untuk mengakses halaman ini. Logout dan login sebagai user untuk melanjutkan, <a href="' . base_url('admin') . '">Kembali.</a>', 403, 'Akses Ditolak');
		}

		$this->load->model('Rute_model');
		// end admin nerobos user
  }

  public function index()
  {
      // Ambil data rute dari model
      $data['rute'] = $this->Rute_model->getAllRute();
  
      // Pastikan session dimulai sebelum mengaksesnya
      if ($this->session->has_userdata('rute_awal')) {
          $this->session->unset_userdata('rute_awal');
      }
  
      if ($this->session->has_userdata('rute_ahir')) {
          $this->session->unset_userdata('rute_ahir');
      }
  
      // Load view dengan data rute
      $this->load->view('user/Pesan Tiket', $data);
  }
  

}


/* End of file PesanTiket.php */
/* Location: ./application/controllers/PesanTiket.php */
