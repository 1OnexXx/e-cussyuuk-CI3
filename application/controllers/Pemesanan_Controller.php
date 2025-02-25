<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Transaksi_Controller
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

class Pemesanan_Controller extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pemesanan_model');

  }

  public function index()
  {

    $data['pemesanan'] = $this->Pemesanan_model->read();

    $this->load->view('template/sidebar');
    $this->load->view('template/header');
    $this->load->view('pemesanan/v_pemesanan', $data);
    $this->load->view('template/footer');
  }

  public function detail($id)
  {
    $data['detail'] = $this->Pemesanan_model->detail($id);

    $this->load->view('template/sidebar');
    $this->load->view('template/header');
    $this->load->view('pemesanan/v_detail', $data);
    $this->load->view('template/footer');
  }

  public function tiket($id) {
    // // Ambil detail pemesanan
    $data['detail'] = $this->Pemesanan_model->getTiket($id);

    // Load view tiket
    $this->load->view('tiket/v_tiket', $data);
}


}


/* End of file Transaksi_Controller.php */
/* Location: ./application/controllers/Transaksi_Controller.php */