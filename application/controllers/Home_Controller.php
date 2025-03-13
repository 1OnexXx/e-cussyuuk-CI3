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
  }

  public function index()
  {
    $data['flights'] = $this->Home_model->get_new_flights();
    $this->load->view('user/index', $data); 
  }

  public function cari_penerbangan() {
    $rute_awal  = $this->input->get('rute_awal', true);
    $rute_akhir = $this->input->get('rute_ahir', true);

    // Pastikan Model diload

    // Ambil data penerbangan berdasarkan pencarian
    $data['flights'] = $this->Home_model->search_flights($rute_awal, $rute_akhir);
    
    // Kirim data ke view Pesan Tiket
    $data['dari']  = $rute_awal;
    $data['ke']    = $rute_akhir;

    $this->load->view('user/Pesan Tiket', $data);
}

}


/* End of file Home_Controller.php */
/* Location: ./application/controllers/Home_Controller.php */