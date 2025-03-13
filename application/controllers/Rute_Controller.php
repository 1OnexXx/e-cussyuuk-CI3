<?php
class Rute_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rute_Model');
    }

    public function pilih($id_rute)
    {
        $this->session->set_userdata('id_rute_terpilih', $id_rute);
        redirect('rute/detail');
    }

    public function detail()
    {
        $id_rute = $this->session->userdata('id_rute_terpilih');
        if (!$id_rute) {
            redirect('rute'); // Redirect ke halaman utama jika tidak ada pilihan
        }
        
        $this->db->select('rute.*, transportasi.kode, transportasi.jumlah_kursi, type_transportasi.nama_type');
        $this->db->from('rute');
        $this->db->join('transportasi', 'rute.id_transportasi = transportasi.id_transportasi');
        $this->db->join('type_transportasi', 'transportasi.id_type_transportasi = type_transportasi.id_type_transportasi');
        $this->db->where('rute.id_rute', $id_rute);
        $query = $this->db->get();
        $data['rute'] = $query->row_array();
        
        $this->load->view('detail_rute', $data);
    }

}