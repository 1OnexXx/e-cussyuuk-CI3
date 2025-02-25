<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Transportasi_model
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

class Transportasi_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    $this->db->select('transportasi.*, type_transportasi.nama_type, petugas.nama_petugas');
    $this->db->from('transportasi');
    $this->db->join('type_transportasi', 'transportasi.id_type_transportasi = type_transportasi.id_type_transportasi', 'left');
    $this->db->join('petugas', 'transportasi.id_petugas = petugas.id_petugas', 'left');

    return $this->db->get()->result_array(); // Mengambil semua data
  }

  public function addData($data)
  {
    return $this->db->insert('transportasi',$data);
  }
  public function deleteData($where, $table)
  {
      $this->db->where($where);
      return $this->db->delete($table);
  }
  public function getById($id)
  {
      return $this->db->get_where('transportasi', ['id_transportasi' => $id])->row_array();
  }
  
  public function updateData($id, $data)
  {
      $this->db->where('id_transportasi', $id);
      return $this->db->update('transportasi', $data);
  }
  
  // ------------------------------------------------------------------------

}

/* End of file Transportasi_model.php */
/* Location: ./application/models/Transportasi_model.php */