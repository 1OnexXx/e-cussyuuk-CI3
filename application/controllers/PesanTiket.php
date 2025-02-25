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
  }

  public function index()
  {
    $this->load->view('user/Pesan Tiket'); 
  }

}


/* End of file PesanTiket.php */
/* Location: ./application/controllers/PesanTiket.php */