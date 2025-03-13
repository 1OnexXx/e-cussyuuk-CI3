<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Home_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Home_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  public function findbyname($name)
  {
    $this->db->where('name', $name);
    return $this->db->get('users')->row();
  }


  public function get_new_flights($limit = 6){
    $this->db->limit($limit);
    $this->db->order_by('id_rute', 'desc');
    return $this->db->get('rute')->result_array();
  }
  // ------------------------------------------------------------------------

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */