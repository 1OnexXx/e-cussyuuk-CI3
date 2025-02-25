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

class Penumpang_model extends CI_Model {

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
    'nama_penumpang' => $this->input->post('nama_penumpang'),
    'username' => $this->input->post('username'),
    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    'telepon' => $this->input->post('no_telepon'),
    'alamat_penumpang' => $this->input->post('alamat'),
    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    'password' => $this->input->post('password')
  ];
  $this->db->insert('penumpang', $form_data);
 }

    public function read() {
      $this->db->select('*');
      $this->db->from('penumpang');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function read_by_id($id){
      $this->db->select('*');
      $this->db->from('penumpang');
      $this->db->where('id_penumpang', $id);
      $query = $this->db->get();
      return $query->row_array();
    }

    public function update($id) {
      // Ambil data lama dari database
      $penumpang = $this->db->get_where('penumpang', ['id_penumpang' => $id])->row_array();
  
      // Ambil password dari input form
      $password = $this->input->post('password');
  
      // Jika password diisi, hash password baru, jika kosong gunakan password lama
      $password_to_update = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $penumpang['password'];
  
      // Data yang akan diupdate
      $form_data = [
          'nama_penumpang' => $this->input->post('nama_penumpang'),
          'username' => $this->input->post('username'),
          'tanggal_lahir' => $this->input->post('tanggal_lahir'),
          'jenis_kelamin' => $this->input->post('jenis_kelamin'),
          'telepon' => $this->input->post('telepon'),
          'alamat_penumpang' => $this->input->post('alamat'),
          'password' => $password_to_update // Password sudah di-hash jika diinputkan
      ];
  
      // Update data di database
      $this->db->where('id_penumpang', $id);
      $this->db->update('penumpang', $form_data);
  }

  public function delete($id)
    {
        $this->db->where('id_penumpang', $id);
        $this->db->delete('penumpang');
        return $this->db->affected_rows(); // Mengembalikan jumlah baris yang terpengaruh
    }
  
  // ------------------------------------------------------------------------

}

/* End of file Penumpang_model.php */
/* Location: ./application/models/Penumpang_model.php */