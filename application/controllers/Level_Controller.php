<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Penumpang_Controller
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

class Level_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
		// untuk user nerobos admin
		if (!$this->user) {
			redirect('auth');
		}
		if (empty($this->user->nama_petugas)) {
			show_404();
		}
		// end user nerobos admin5y66h6
    $this->load->model('Level_model');
  }

  public function index()
  {
    $data['level'] = $this->Level_model->read();
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/header', $data);
    $this->load->view('admin/petugas_level/index', $data);
    $this->load->view('template/footer', $data);
  }

  public function add()
  {

    $this->form_validation->set_rules('nama_level', 'Nama Level', 'required');


    if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/sidebar');
      $this->load->view('template/header');
      $this->load->view('admin/petugas_level/add');
      $this->load->view('template/footer');
    } else {
      $this->Level_model->create();
      redirect('Level_Controller');
    }
  }

  public function edit($id)
  {
    $data['level'] = $this->Level_model->read_by_id($id);
    $this->load->view('template/sidebar');
    $this->load->view('template/header');
    $this->load->view('admin/petugas_level/v_edit', $data);
    $this->load->view('template/footer');
  }

  public function update($id)
  {
    // Ambil data penumpang berdasarkan ID
    $level = $this->Level_model->read_by_id($id);

    // Cek apakah data ditemukan
    if (!$level) {
      show_404(); // Jika data tidak ditemukan, tampilkan halaman 404
    }
    // Data yang akan diupdate
    $data = array(
      'nama_level' => $this->input->post('nama_level'),
    );

    // Update data ke database
    $this->Level_model->update($id, $data);

    // Redirect ke halaman yang sesuai setelah update
    redirect('Level_Controller');
  }

  public function delete() {
    // Ambil ID dari POST
    $id = $this->input->post('id_level');

    // Cek apakah ID valid
    if (!$id) {
        $this->session->set_flashdata('error', 'ID Level tidak ditemukan.');
        redirect('Level_Controller');
        return;
    }

    // Hapus data di database
    $deleted = $this->Level_model->delete($id);

    if ($deleted) {
        $this->session->set_flashdata('success', 'Level berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus level.');
    }

    // Redirect kembali ke daftar Level
    redirect('Level_Controller');
}

}




/* End of file Level_Controller.php */
/* Location: ./application/controllers/Level_Controller.php */
