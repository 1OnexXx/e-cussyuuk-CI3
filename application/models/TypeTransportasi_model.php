<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model TypeTransportasi_model
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

class TypeTransportasi_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    return $this->db->get('type_transportasi')->result_array();
  }

  

  // ------------------------------------------------------------------------

}

/* End of file TypeTransportasi_model.php */
/* Location: ./application/models/TypeTransportasi_model.php */