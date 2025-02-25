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

class Penumpang_Controller extends CI_Controller
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
		// end user nerobos admin
    $this->load->model('Penumpang_model');
  }

  public function index()
  {
    $data['penumpang'] = $this->Penumpang_model->read();
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/header', $data);
    $this->load->view('admin/penumpang/index', $data);
    $this->load->view('template/footer', $data);
  }

  public function add()
  {

    $this->form_validation->set_rules('nama_penumpang', 'Nama penumang', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('no_telepon', 'No telpon', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/sidebar');
      $this->load->view('template/header');
      $this->load->view('admin/penumpang/add');
      $this->load->view('template/footer');
    } else {
      $this->Penumpang_model->create();
      redirect('penumpang_controller');
    }
  }

  public function edit($id)
  {
    $data['penumpang'] = $this->Penumpang_model->read_by_id($id);
    $this->load->view('template/sidebar');
    $this->load->view('template/header');
    $this->load->view('admin/penumpang/v_edit', $data);
    $this->load->view('template/footer');
  }

  public function update($id)
  {
    // Ambil data penumpang berdasarkan ID
    $penumpang = $this->Penumpang_model->read_by_id($id);

    // Cek apakah data ditemukan
    if (!$penumpang) {
      show_404(); // Jika data tidak ditemukan, tampilkan halaman 404
    }

    // Ambil password lama dari database
    $old_password = $penumpang['password'];

    // Ambil password dari input form
    $password = $this->input->post('password');

    // Jika password baru diinputkan, hash password baru, jika tidak gunakan password lama
    $password_to_update = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $old_password;

    // Data yang akan diupdate
    $data = array(
      'nama_penumpang' => $this->input->post('nama_penumpang'),
      'username' => $this->input->post('username'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'telepon' => $this->input->post('telepon'),
      'alamat_penumpang' => $this->input->post('alamat'),
      'password' => $password_to_update
    );

    // Update data ke database
    $this->Penumpang_model->update($id, $data);

    // Redirect ke halaman yang sesuai setelah update
    redirect('admin/penumpang');
  }

  public function delete() {
    // Ambil ID dari POST
    $id = $this->input->post('id_penumpang');

    // Cek apakah ID valid
    if (!$id) {
        $this->session->set_flashdata('error', 'ID Penumpang tidak ditemukan.');
        redirect('admin/penumpang');
        return;
    }

    // Hapus data di database
    $deleted = $this->Penumpang_model->delete($id);

    if ($deleted) {
        $this->session->set_flashdata('success', 'Penumpang berhasil dihapus.');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus penumpang.');
    }

    // Redirect kembali ke daftar penumpang
    redirect('admin/penumpang');
}

}




/* End of file Penumpang_Controller.php */
/* Location: ./application/controllers/Penumpang_Controller.php */
