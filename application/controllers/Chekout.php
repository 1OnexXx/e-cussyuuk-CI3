<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Chekout
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

class Chekout extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// untuk admin nerobos user
		if (!$this->user) {
			redirect('auth');
		}
		if ($this->session->userdata('user')['role'] == 'petugas') {
			show_error('Anda tidak memiliki hak akses untuk mengakses halaman ini. Logout dan login sebagai user untuk melanjutkan, <a href="' . base_url('admin') . '">Kembali.</a>', 403, 'Akses Ditolak');
		}

		// end admin nerobos user
		$this->load->library('session');
		$this->load->model('Rute_model');
		$this->load->model('Pemesanan_model');
	}



	public function index()
	{
		// Ambil data checkout dari session



		$checkout_data = $this->session->userdata('checkout_data') ?? [];

		// Ambil hanya ID rute dari session
		$id_rute_array = array_keys($checkout_data);

		// Ambil data rute dari database berdasarkan ID yang ada di session
		$rute_data = $this->Rute_model->getRuteById($id_rute_array);

		// Gabungkan data dari database dengan qty dari session
		$checkout_final = [];
		$total_harga = 0; // Inisialisasi total harga

		foreach ($rute_data as $rute) {
			$id_rute = $rute['id_rute'];

			// Pastikan rute ini ada dalam session
			if (isset($checkout_data[$id_rute])) {
				$rute['qty'] = $checkout_data[$id_rute]['qty']; // Masukkan qty dari session
				$checkout_final[] = $rute;

				// Hitung total harga
				$total_harga += $rute['harga'] * $rute['qty'];
			}
		}

		// Kirim data ke view
		$data['checkout_data'] = $checkout_final;
		$data['total_harga'] = $total_harga; // Kirim total harga ke tampilan

		// Load tampilan dengan data yang telah difilter
		$this->load->view('user/Chekout', $data);
	}




	public function add($id_rute)
	{
		// Ambil data rute berdasarkan id_rute dari database
		$rute = $this->Rute_model->getRuteById($id_rute);

		if ($rute) {
			// Ambil data sesi yang sudah ada atau inisialisasi array kosong
			$data_checkout = $this->session->userdata('checkout_data') ?? [];

			// Cek apakah ID rute sudah ada di session
			if (isset($data_checkout[$id_rute])) {
				// Jika sudah ada, tambahkan jumlah tiketnya
				$data_checkout[$id_rute]['qty'] += 1;
			} else {
				// Jika belum ada, tambahkan dengan qty default = 1
				$data_checkout[$id_rute] = [
					'id_rute'        => $rute['id_rute'],
					'tujuan'         => $rute['tujuan'],
					'rute_awal'      => $rute['rute_awal'],
					'rute_ahir'      => $rute['rute_ahir'],
					'harga'          => $rute['harga'],
					'id_transportasi' => $rute['id_transportasi'],
					'qty'            => 1 // Tambahkan qty default 1
				];
			}

			// Simpan kembali ke session
			$this->session->set_userdata('checkout_data', $data_checkout);
		}

		// Redirect ke halaman checkout
		redirect('chekout/index');
	}


	public function update_quantity($id_rute)
	{
		$new_qty = $this->input->post('qty');

		// Ambil session checkout data
		$checkout_data = $this->session->userdata('checkout_data') ?? [];

		if (isset($checkout_data[$id_rute])) {
			$checkout_data[$id_rute]['qty'] = (int) $new_qty;  // Update jumlah tiket di session
			$this->session->set_userdata('checkout_data', $checkout_data);
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}


	public function remove($id_rute)
	{
		// Ambil data dari session
		$data_checkout = $this->session->userdata('checkout_data') ?? [];

		// Hapus data berdasarkan id_rute
		if (isset($data_checkout[$id_rute])) {
			unset($data_checkout[$id_rute]);
			$this->session->set_userdata('checkout_data', $data_checkout);
		}

		// Redirect kembali ke halaman checkout
		redirect('chekout/index');
	}


	public function process_checkout()
	{
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$checkout_data = $this->session->userdata('checkout_data') ?? [];

		if (empty($checkout_data)) {
			echo "❌ Tidak ada data checkout!";
			return;
		}

		$tanggal_pemesanan = date('Y-m-d');
		$id_rute_list = array_keys($checkout_data);

		if (empty($id_rute_list)) {
			echo "❌ ID Rute Tidak Valid!";
			return;
		}

		// 🔥 Ambil data dari $_POST lebih awal
		$post = $this->input->post();

		foreach ($id_rute_list as $id_rute) {
			$data = $checkout_data[$id_rute];
			$qty = isset($data['qty']) ? (int) $data['qty'] : 0;

			$tanggal_berangkat = $post['tanggal_berangkat'] ?? date('Y-m-d');
			$jam_berangkat = $post['jam_berangkat'] ?? '06:00';
			$jam_cekin = date('H:i', strtotime($jam_berangkat . ' -1 hour'));

			// 🔥 Ambil total_bayar dari post jika tersedia, jika tidak, hitung dari session
			$total_bayar = $post['total_bayar'] ?? ($data['harga'] * $qty);

			$rute = $this->db->get_where('rute', ['id_rute' => $id_rute])->row();
			$tujuan = $rute ? $rute->tujuan : 'Tidak diketahui';

			$total_bayar = str_replace(['Rp', '.', ' '], '', $total_bayar);

			if (!$id_pelanggan || !$id_rute || !$tanggal_berangkat || !$jam_berangkat || $total_bayar <= 0 || !$qty) {
				echo "❌ Data tidak lengkap!";
				echo 'id pelanggan: ', $id_pelanggan, '<br>';
				echo 'id rute: ', $id_rute, '<br>';
				echo 'tanggal berangkat: ', $tanggal_berangkat, '<br>';
				echo 'jam berangkat: ', $jam_berangkat, '<br>';
				echo 'total bayar: ', $total_bayar, '<br>';
				echo 'qty:', $qty, '<br>';
				return;
			}

			for ($i = 0; $i < $qty; $i++) {
				$kode_pemesanan = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));

				// 🔥 Huruf tetap random di awal, nomor bertambah
				if ($i == 0) {
					$huruf_kursi = chr(rand(65, 90)); // Random huruf A-Z untuk tiket pertama
				}
				$kode_kursi = $huruf_kursi . ($i + 1); // Contoh: B1, B2, B3

				$data_insert = [
					'kode_pemesanan' => $kode_pemesanan,
					'tanggal_pemesanan' => $tanggal_pemesanan,
					'id_pelanggan' => $id_pelanggan,
					'kode_kursi' => $kode_kursi,
					'id_rute' => $id_rute,
					'tujuan' => $tujuan,
					'tanggal_berangkat' => $tanggal_berangkat,
					'jam_cekin' => $jam_cekin,
					'jam_berangkat' => $jam_berangkat,
					'total_bayar' => $total_bayar / $qty,
					'status' => 'Tertunda'
				];

				$this->db->insert('pemesanan', $data_insert);
			}
		}

		$this->session->unset_userdata('checkout_data');
		redirect('chekout/riwayat_pesan');
	}






	public function riwayat_pesan()
	{
		$this->load->view('user/Riwayat Pesan');
	}
}


/* End of file Chekout.php */
/* Location: ./application/controllers/Chekout.php */
