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
    return $this->db->select('id_type_transportasi, nama_type, keterangan')
    ->get('type_transportasi')
    ->result_array();
  }

  //untuk type transportasi
  public function addData($data){
    return $this->db->insert('type_transportasi',$data);
  }

  //delete type transportasi
  public function deleteData($where, $table)
  {
      $this->db->where($where);
      return $this->db->delete($table);
  }
  
  public function getDataById($id)
{
    return $this->db->get_where('type_transportasi', ['id_type_transportasi' => $id])->row_array();
}

public function updateData($id, $data)
{
    $this->db->where('id_type_transportasi', $id);
    return $this->db->update('type_transportasi', $data);
}

  

  // ------------------------------------------------------------------------

}

/* End of file TypeTransportasi_model.php */
/* Location: ./application/models/TypeTransportasi_model.php */