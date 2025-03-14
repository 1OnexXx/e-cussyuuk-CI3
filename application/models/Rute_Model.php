<?php
class Rute_Model extends CI_Model {
    
    public function getAllRute() {
        $this->db->select('rute.*, transportasi.kode, transportasi.jumlah_kursi, type_transportasi.nama_type, transportasi.keterangan');
        $this->db->from('rute');
        $this->db->join('transportasi', 'rute.id_transportasi = transportasi.id_transportasi', 'left');
        $this->db->join('type_transportasi', 'transportasi.id_type_transportasi = type_transportasi.id_type_transportasi', 'left');

        return $this->db->get()->result_array();
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

    public function getRuteById($id_rute_array) {
    if (empty($id_rute_array)) {
        return [];
    }

    $this->db->select('rute.*, transportasi.kode, transportasi.jumlah_kursi, type_transportasi.nama_type, transportasi.keterangan');
    $this->db->from('rute');
    $this->db->join('transportasi', 'rute.id_transportasi = transportasi.id_transportasi', 'left');
    $this->db->join('type_transportasi', 'transportasi.id_type_transportasi = type_transportasi.id_type_transportasi', 'left');
    $this->db->where_in('rute.id_rute', $id_rute_array); // Ambil hanya yang ada di session

    return $this->db->get()->result_array();
}


	public function getTransportasi()
	{
		return $this->db->get('type_transportasi')->result();
	}
}
