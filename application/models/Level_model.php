<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Penumpang_model
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

class Level_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
 public function create() 
 {
  

  $form_data = [
    'nama_level' => $this->input->post('nama_level'),

  ];
  $this->db->insert('level', $form_data);
 }

    public function read() {
      $this->db->select('*');
      $this->db->from('level');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function read_by_id($id){
      $this->db->select('*');
      $this->db->from('level');
      $this->db->where('id_level', $id);
      $query = $this->db->get();
      return $query->row_array();
    }

    public function update($id) {
      // Ambil data lama dari database
      $level = $this->db->get_where('level', ['id_level' => $id])->row_array();
  
  
    
  
      // Data yang akan diupdate
      $form_data = [
          'nama_level' => $this->input->post('nama_level'),
            ];
  
      // Update data di database
      $this->db->where('id_level', $id);
      $this->db->update('level', $form_data);
  }

  public function delete($id)
    {
        $this->db->where('id_level', $id);
        $this->db->delete('level');
        return $this->db->affected_rows(); // Mengembalikan jumlah baris yang terpengaruh
    }
  
  // ------------------------------------------------------------------------

}

/* End of file Level_model.php */
/* Location: ./application/models/Level_model.php */