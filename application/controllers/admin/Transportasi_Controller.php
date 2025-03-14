<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Dashboard_Controller
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Transportasi_Controller extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		// untuk user nerobos admin
		if (!$this->user) {
			redirect('auth');
		}
		if ($this->session->userdata('user')['role'] == 'penumpang') {
			show_404();
		}
		// end user nerobos admin
    $this->load->model('Transportasi_model');
    $this->load->model('TypeTransportasi_model');
    $this->load->library('session');
    

  }

  public function index()
  {
    $data['transportasi'] = $this->Transportasi_model->index();
    $data['type_transportasi'] = $this->TypeTransportasi_model->index();

    $this->load->view('template/sidebar');
    $this->load->view('template/header');
    $this->load->view('admin/transportasi/v_transportasi', $data);
    $this->load->view('template/footer');
  }

  public function addTypeForm()
{
    $this->load->view('template/sidebar');
    $this->load->view('template/header');
    $this->load->view('admin/transportasi/v_addType'); // View untuk form
    $this->load->view('template/footer');
}

public function printType()
{
    $data['type_transportasi'] = $this->TypeTransportasi_model->index();
    $this->load->view("admin/transportasi/v_printType",$data);
}

public function addDataType()
{
    $this->load->model('TypeTransportasi_model');
    $this->load->library('form_validation');

    // Aturan Validasi Form
    $this->form_validation->set_rules('nama_type', 'Nama Type', 'required|trim');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kembali ke halaman form dengan error
        $this->session->set_flashdata('error', 'Harap isi semua kolom dengan benar!');
        $this->session->set_flashdata('validation_errors', validation_errors());
        redirect('/Transportasi_Controller/addTypeForm');

    } else {
        // // Inisialisasi variabel gambar
        // $gambar = null;

        // // Cek apakah ada file yang diupload
        // if (!empty($_FILES['gambar']['name'])) {
        //     $config['upload_path']   = './uploads/'; // Folder penyimpanan
        //     $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file yang diizinkan
        //     $config['max_size']      = 2048; // Maksimum ukuran file (2MB)
        //     $config['file_name']     = time() . '_' . $_FILES['gambar']['name']; // Nama file unik

        //     $this->load->library('upload', $config);

        //     if ($this->upload->do_upload('gambar')) {
        //         $gambar = $this->upload->data('file_name'); // Ambil nama file yang diupload
        //     } else {
        //         // Jika gagal upload, set flashdata error
        //         $this->session->set_flashdata('error', $this->upload->display_errors());
        //         redirect('admin/Transportasi_Controller/addTypeForm');
        //     }
        // }

        // Data yang akan dimasukkan ke database
        $data = [
            'nama_type' => $this->input->post('nama_type', true),
            'keterangan' => $this->input->post('keterangan', true),
            // 'gambar' => $gambar, // Simpan nama file gambar
        ];

        // Simpan data ke database melalui model
        if ($this->TypeTransportasi_model->addData($data, 'type_transportasi')) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data.');
        }

        // Redirect ke halaman utama
        redirect('admin/Transportasi_Controller');
    }
}



public function deleteDataType($id)
{
    $where = ['id_type_transportasi' => $id];

    if ($this->TypeTransportasi_model->deleteData($where, 'type_transportasi')) {
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus data.');
    }

    redirect('admin/Transportasi_Controller'); // Tidak perlu "index.php" di URL

}




public function editDataType($id)
{
    $this->load->model('TypeTransportasi_model');
    $data['type_transportasi'] = $this->TypeTransportasi_model->getDataById($id);

    if (!$data['type_transportasi']) {
        $this->session->set_flashdata('error', 'Data tidak ditemukan.');
        redirect('admin/Transportasi_Controller/index');
    }

    $this->load->view('admin/transportasi/v_editType', $data);
}

public function updateDataType()
{
    $this->load->model('TypeTransportasi_model');
    $id = $this->input->post('id_type_transportasi');

    $data = [
        'nama_type' => $this->input->post('nama_type', true),
        'keterangan' => $this->input->post('keterangan', true),
    ];

    if ($this->TypeTransportasi_model->updateData($id, $data)) {
        $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
    } else {
        $this->session->set_flashdata('error', 'Gagal memperbarui data.');
    }

    redirect('admin/Transportasi_Controller/index');
}



public function addTransportasiForm()
{
    $this->load->model('Transportasi_model');
    $this->load->model('TypeTransportasi_model');

    $data['type_transportasi'] = $this->TypeTransportasi_model->index();
    $data['petugas'] = $this->db->get('petugas')->result_array(); // Mengambil data petugas tanpa model

    $this->load->view('template/sidebar');
    $this->load->view('template/header');
    $this->load->view('admin/transportasi/v_addTransportasi', $data);
    $this->load->view('template/footer');
}

public function addTransportasi()
{
    $this->load->model('Transportasi_model');
    $this->load->library('form_validation');

    // Aturan validasi
    $this->form_validation->set_rules('kode', 'Kode Transportasi', 'required|trim');
    $this->form_validation->set_rules('jumlah_kursi', 'Jumlah Kursi', 'required|numeric|greater_than[0]');
    $this->form_validation->set_rules('id_type_transportasi', 'Tipe Transportasi', 'required');
    $this->form_validation->set_rules('id_petugas', 'Petugas', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'max_length[500]'); // Validasi keterangan

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/Transportasi_Controller/addTransportasiForm');
    } else {
        $data = [
            'kode' => $this->input->post('kode', true),
            'jumlah_kursi' => $this->input->post('jumlah_kursi', true),
            'id_type_transportasi' => $this->input->post('id_type_transportasi', true),
            'id_petugas' => $this->input->post('id_petugas', true),
            'keterangan' => $this->input->post('keterangan', true), // Simpan keterangan
        ];

        if ($this->Transportasi_model->addData($data)) {
            $this->session->set_flashdata('success', 'Data transportasi berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data.');
        }

        redirect('admin/Transportasi_Controller/index');
    }
}

public function deleteDataTrans($id)
{
    $this->load->model('Transportasi_model');
    
    $where = ['id_transportasi' => $id];
    
    if ($this->TypeTransportasi_model->deleteData($where, 'transportasi')) {
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus data.');
    }

    redirect('admin/Transportasi_Controller');
}

public function editTransportasiForm($id)
{
    $this->load->model('Transportasi_model');
    $this->load->model('TypeTransportasi_model');

    $data['transportasi'] = $this->Transportasi_model->getById($id);
    $data['type_transportasi'] = $this->TypeTransportasi_model->index();
    $data['petugas'] = $this->db->get('petugas')->result_array();

    $this->load->view('template/sidebar');
    $this->load->view('template/header');
    $this->load->view('admin/transportasi/v_editTransportasi', $data);
    $this->load->view('template/footer');
}

public function updateTransportasi()
{
    $this->load->model('Transportasi_model');
    $this->load->library('form_validation');

    $id = $this->input->post('id_transportasi');

    // Aturan validasi
    $this->form_validation->set_rules('kode', 'Kode Transportasi', 'required|trim');
    $this->form_validation->set_rules('jumlah_kursi', 'Jumlah Kursi', 'required|numeric');
    $this->form_validation->set_rules('id_type_transportasi', 'Tipe Transportasi', 'required');
    $this->form_validation->set_rules('id_petugas', 'Petugas', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/Transportasi_Controller/editTransportasiForm/' . $id);
    } else {
        $data = [
            'kode' => $this->input->post('kode', true),
            'jumlah_kursi' => $this->input->post('jumlah_kursi', true),
            'id_type_transportasi' => $this->input->post('id_type_transportasi', true),
            'id_petugas' => $this->input->post('id_petugas', true),
            'keterangan' => $this->input->post('keterangan', true),
        ];

        if ($this->Transportasi_model->updateData($id, $data)) {
            $this->session->set_flashdata('success', 'Data transportasi berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data.');
        }

        redirect('admin/Transportasi_Controller/index');
    }
}

}





  

