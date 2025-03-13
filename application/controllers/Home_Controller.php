<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Home_Controller
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

class Home_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Home_model');
    $this->load->model('Pemesanan_model');
  }

  public function index()
  {
    $data['kota'] = $this->Home_model->ambil_rute();
    $data['flights'] = $this->Home_model->get_new_flights();
    $this->load->view('user/index', $data);
  }

  public function cari_penerbangan()
{
    $this->load->library('session'); // Pastikan session sudah dimuat

    $rute_awal = $this->input->get('rute_awal', true);
    $rute_akhir = $this->input->get('rute_ahir', true); // Perbaiki typo

    // Simpan pencarian ke session jika ada input
    if (!empty($rute_awal) && !empty($rute_akhir)) {
        $this->session->set_userdata('rute_awal', $rute_awal);
        $this->session->set_userdata('rute_ahir', $rute_akhir);
    }

     
    $data['rute'] = $this->Home_model->get_filtered_rute($rute_awal, $rute_akhir);

    $this->load->view('user/Pesan Tiket', $data);
}

  
  

}


/* End of file Home_Controller.php */
/* Location: ./application/controllers/Home_Controller.php */