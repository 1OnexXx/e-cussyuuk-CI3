<?php class Petugas_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('petugas.*, level.nama_level');
        $this->db->from('petugas');
        $this->db->join('level', 'petugas.id_level = level.id_level');
        return $this->db->get()->result_array();
    }

    public function create($photo_petugas)
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama_petugas' => $this->input->post('nama_petugas'),
            'id_level' => $this->input->post('id_level'),
            'photo_petugas' => $photo_petugas
        ];
        return $this->db->insert('petugas', $data);
    }

    public function read_by_id($id)
    {
        return $this->db->get_where('petugas', ['id_petugas' => $id])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id_petugas', $id);
        return $this->db->update('petugas', $data);
    }

    public function delete($id)
    {
        $petugas = $this->read_by_id($id);
        
        if ($petugas) {
            // Cek apakah foto ada sebelum dihapus
            if (isset($petugas['photo_petugas']) && !empty($petugas['photo_petugas'])) {
                $photo_petugas_path = './uploads/petugas/' . $petugas['photo_petugas'];
                
                // Cek apakah file benar-benar ada sebelum dihapus
                if (file_exists($photo_petugas_path)) {
                    unlink($photo_petugas_path); // Hapus photo_petugas lama
                }
            }

            $this->db->where('id_petugas', $id);
            return $this->db->delete('petugas');
        }
        return false;
    }
}
