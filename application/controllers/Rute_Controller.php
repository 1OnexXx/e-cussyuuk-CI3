<?php
defined('BASEPATH') or exit('No direct script access allowed');

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



    public function index()
    {
        $data['rute'] = $this->Rute_Model->getAllRute();
        
        
        $this->load->view('template/sidebar');
        $this->load->view('template/header');
        $this->load->view('admin/rute', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $this->load->view('rute');
    }

    public function store()
    {
        $this->load->model('Rute_Model');
    
        $data = [
            'tujuan'     => $this->input->post('tujuan', true),
            'rute_awal'  => $this->input->post('rute_awal', true),
            'rute_ahir'  => $this->input->post('rute_ahir', true), // Pastikan sesuai
            'harga'      => $this->input->post('harga', true),
        ];
    
        if (empty($data['rute_ahir'])) {
            $this->session->set_flashdata('error', 'Rute Akhir tidak boleh kosong!');
            redirect('Rute_Controller');
        }
    
        $insert = $this->Rute_Model->insert_rute($data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Rute berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan rute.');
        }
    
        redirect('Rute_Controller');
    }
    
    


    public function update()
    {
        $id_rute = $this->input->post('id_rute');
        $data = [
            'tujuan' => $this->input->post('tujuan'),
            'rute_awal' => $this->input->post('rute_awal'),
            'rute_ahir' => $this->input->post('rute_ahir'),
            'harga' => $this->input->post('harga'),
        ];
    
        if ($this->Rute_Model->update($id_rute, $data)) {
            $this->session->set_flashdata('success', 'Rute berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui rute.');
        }
    
        redirect('Rute_Controller');
    }
    


    public function delete($id_rute)
{
    $this->load->model('Rute_Model'); 
    $delete = $this->Rute_Model->delete_rute($id_rute);

    if ($delete) {
        $this->session->set_flashdata('success', 'Data rute berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus data rute.');
    }
    
    redirect('Rute_Controller'); // Redirect kembali ke halaman rute
}

    
}


/* End of file Dashboard_Controller.php */
/* Location: ./application/controllers/Dashboard_Controller.php */
