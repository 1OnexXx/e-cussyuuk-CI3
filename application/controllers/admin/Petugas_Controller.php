<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
		// untuk user nerobos admin
		if (!$this->user) {
			redirect('auth');
		}
		if ($this->session->userdata('user')['role'] == 'penumpang') {
			show_404();
		}
		// end user nerobos admin


        $this->load->model('Petugas_model');
        $this->load->model('Level_model'); // Untuk dropdown level
        $this->load->library('upload'); // Load library upload
    }

    public function index() {
        $data['petugas'] = $this->Petugas_model->get_all();
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/header', $data);
        $this->load->view('admin/petugas_level/petugasindex', $data);
		$this->load->view('template/footer', $data);
    }

    public function add() {
        $data['level'] = $this->Level_model->read();
    
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('id_level', 'Level', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/sidebar');
            $this->load->view('template/header');
            $this->load->view('admin/petugas_level/petugastambah', $data);
            $this->load->view('template/footer');
        } else {

			$config['upload_path'] = FCPATH . 'assets/uploads/petugas/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 30000; // Batas ukuran file (da lam KB)
			$this->load->library('upload');
			$this->upload->initialize($config);

			// Proses upload
			if ($this->upload->do_upload('foto')) {
				$nama_foto = $this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}


    
            $insert_data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama_petugas' => $this->input->post('nama_petugas'),
                'id_level' => $this->input->post('id_level'),
                'photo_petugas' => $nama_foto // Pastikan variabel benar
            ];
            $this->Petugas_model->create($insert_data);
            redirect('admin/Petugas_Controller');
        }
    }
    

    public function edit($id) {
        $data['petugas'] = $this->Petugas_model->read_by_id($id);
        $data['level'] = $this->Level_model->read();

        $this->load->view('template/sidebar');
        $this->load->view('template/header');
        $this->load->view('admin/petugas_level/petugasedit', $data);
        $this->load->view('template/footer');
    }

    public function update($id) {
        $update_data = [
            'username' => $this->input->post('username'),
            'nama_petugas' => $this->input->post('nama_petugas'),
            'id_level' => $this->input->post('id_level'),
        ];

        // Update password jika diisi
        if ($this->input->post('password')) {
            $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        // Cek apakah ada foto baru yang diunggah
        if (!empty($_FILES['photo_petugas']['name'])) {
            // Ambil photo_petugas lama untuk dihapus
            $petugas = $this->Petugas_model->read_by_id($id);
            $photo_petugas_lama = $petugas['photo_petugas'];

            // Konfigurasi upload photo_petugas baru
            $config['upload_path']   = './uploads/petugas/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = time() . '-' . $_FILES['photo_petugas']['name'];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('photo_petugas')) {
                $photo_petugas_baru = $this->upload->data('file_name');
                $update_data['photo_petugas'] = $photo_petugas_baru;

                // Hapus photo_petugas lama kecuali default.png
                if ($photo_petugas_lama != 'default.png' && file_exists('./uploads/petugas/' . $photo_petugas_lama)) {
                    unlink('./uploads/petugas/' . $photo_petugas_lama);
                }
            }
        }

        $this->Petugas_model->update($id, $update_data);
        redirect('admin/Petugas_Controller');
    }

    public function delete($id) {
        if ($id) {
            // Ambil photo_petugas lama untuk dihapus
            $petugas = $this->Petugas_model->read_by_id($id);
            $photo_petugas_lama = $petugas['photo_petugas'];

            // Hapus dari database
            $this->Petugas_model->delete($id);

            // Hapus photo_petugas kecuali default.png
            if ($photo_petugas_lama != 'default.png' && file_exists('./uploads/petugas/' . $photo_petugas_lama)) {
                unlink('./uploads/petugas/' . $photo_petugas_lama);
            }
        }
        redirect('admin/Petugas_Controller');
    }
}
?>
