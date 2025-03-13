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

}


/* End of file Home_Controller.php */
/* Location: ./application/controllers/Home_Controller.php */