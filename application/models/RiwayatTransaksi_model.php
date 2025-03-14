<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model RiwayatTransaksi_model
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

class RiwayatTransaksi_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function get_all_pesanan() {
    return $this->db->get('pemesanan')->result_array();
}

public function delete_pesanan($id_pemesanan)
{
    $this->db->where('id_pemesanan', $id_pemesanan);
    $this->db->delete('pemesanan');
}

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file RiwayatTransaksi_model.php */
/* Location: ./application/models/RiwayatTransaksi_model.php */