<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Dashboard_Controller
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

class Dashboard_Controller extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		if (!$this->user) {
			redirect('auth');
		}
  }

  public function index()
  {
    $this->load->view('template/sidebar');
    $this->load->view('template/header');
    $this->load->view('admin/dashboard');
    $this->load->view('template/footer');
  }

}


/* End of file Dashboard_Controller.php */
/* Location: ./application/controllers/Dashboard_Controller.php */
