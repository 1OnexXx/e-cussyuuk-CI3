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


    public function delete_rute($id_rute)
    {
        return $this->db->delete('rute', ['id_rute' => $id_rute]);
    }

	public function getTransportasi()
	{
		return $this->db->get('type_transportasi')->result();
	}
}
