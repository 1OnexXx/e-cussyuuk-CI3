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

  public function cari_penerbangan(){
    
  }

  public function get_filtered_rute($rute_awal = null, $rute_ahir = null)
{
  $this->db->select('rute.*, transportasi.kode, transportasi.jumlah_kursi, type_transportasi.nama_type, transportasi.keterangan');
  $this->db->from('rute');
  $this->db->join('transportasi', 'rute.id_transportasi = transportasi.id_transportasi', 'left');
  $this->db->join('type_transportasi', 'transportasi.id_type_transportasi = type_transportasi.id_type_transportasi', 'left');
  
  if (!empty($rute_awal)) {
      $this->db->where('rute.rute_awal', $rute_awal);
  }
  if (!empty($rute_ahir)) {
      $this->db->where('rute.rute_ahir', $rute_ahir);
  }
  
  return $this->db->get()->result_array();
  
}




  
  public function ambil_rute(){
    $this->db->select('*');
    $this->db->from('rute');
    $query = $this->db->get();
    return $query->result_array();
  }
  // ------------------------------------------------------------------------

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */