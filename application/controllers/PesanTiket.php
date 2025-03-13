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
		// if (!$this->user) {
		// 	redirect('auth');
		// }
		// if (empty($this->user->nama_penumpang)) {
		// 	show_error('Anda tidak memiliki hak akses untuk mengakses halaman ini. Logout dan login sebagai user untuk melanjutkan, <a href="' . base_url('admin') . '">Kembali.</a>', 403, 'Akses Ditolak');
		// }
		// end admin nerobos user

    $this->load->model('Rute_model');
    $this->load->library('session');
  }

  public function index()
  {
    $data['rute'] = $this->Rute_model->getAllRute();
    $this->load->view('user/Pesan Tiket', $data); 
  }


}


/* End of file PesanTiket.php */
/* Location: ./application/controllers/PesanTiket.php */
