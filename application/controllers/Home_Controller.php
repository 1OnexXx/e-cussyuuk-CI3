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
  }

  public function index()
  {
    $this->load->view('user/index'); 
  }

}


/* End of file Home_Controller.php */
/* Location: ./application/controllers/Home_Controller.php */