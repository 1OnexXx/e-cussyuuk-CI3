<?php
class Rute_Model extends CI_Model {
    
    public function getAllRute() {
        return $this->db->get('rute')->result_array(); 
    }

    public function getById($id) {
        return $this->db->get_where('rute', ['id_rute' => $id])->row_array();
    }

    public function insert_rute($data) {
        return $this->db->insert('rute', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_rute', $id);
        return $this->db->update('rute', $data);
    }



    public function delete_rute($id) {
        $this->db->where('id_rute', $id);
        $this->db->delete('rute');

        // Pastikan ada data yang dihapus sebelum return true
        return ($this->db->affected_rows() > 0);
    }
}
