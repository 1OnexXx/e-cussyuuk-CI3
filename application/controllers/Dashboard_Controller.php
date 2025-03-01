<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rute_Model');
        
    }

    public function index()
    {
        $data['rute'] = $this->Rute_Model->getAllRute();
        
        
        $this->load->view('template/sidebar');
        $this->load->view('template/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $this->load->view('rute');
    }

    public function store()
    {
        $data = [
            'tujuan'    => $this->input->post('tujuan'),
            'rute_awal' => $this->input->post('rute_awal'),
            'rute_ahir' => $this->input->post('rute_ahir'),
            'harga'     => $this->input->post('harga'),
        ];

        if ($this->Rute_Model->insert_rute($data)) {
            $this->session->set_flashdata('success', 'Rute berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan rute.');
        }

        redirect('Dashboard_Controller');
    }


    public function update() {

       
        $data = [
            'tujuan' => $this->input->post('tujuan'),
            'rute_awal' => $this->input->post('rute_awal'),
            'rute_ahir' => $this->input->post('rute_ahir'),
            'harga' => $this->input->post('harga'),
        ];

        $this->db->where('id_rute', $this->input->post('id_rute') );
        $this->db->update('rute', $data);

        redirect('dashboard_controller'); 
    }


    public function delete($id)
    {
        if ($this->Rute_Model->delete_rute($id)) {
            $this->session->set_flashdata('success', 'Rute berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus rute.');
        }

        redirect('Dashboard_Controller');
    }
}


/* End of file Dashboard_Controller.php */
/* Location: ./application/controllers/Dashboard_Controller.php */