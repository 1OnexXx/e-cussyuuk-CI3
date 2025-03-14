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
		$data['transportasi'] = $this->Rute_Model->getTransportasi();
        
        
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


		$kota_asal = $this->input->post('rute_awal');
		$kota_tujuan = $this->input->post('rute_ahir');

		// Ambil koordinat kedua kota
		$koordinat_asal = $this->_getCoordinates($kota_asal);
		$koordinat_tujuan = $this->_getCoordinates($kota_tujuan);

		// Hitung jarak
		$jarak = $this->_calculateDistance($koordinat_asal, $koordinat_tujuan);

		$transport = $this->db->get_where('type_transportasi', ['id_type_transportasi' => $this->input->post('id_transportasi')])->row();


		if ($transport->nama_type == 'Pesawat') {
			$harga = round($jarak) * 500; 
		} elseif ($transport->nama_type == 'Kereta') {
			$harga = round($jarak) * 1500;
		}

		$data = [
			'tujuan'     => $this->input->post('tujuan', true),
			'rute_awal'  => $this->input->post('rute_awal', true),
			'rute_ahir'  => $this->input->post('rute_ahir', true), // Pastikan sesuai
			'harga'      => $harga,
			'id_transportasi' => $this->input->post('id_transportasi', true),
			'jarak' => round($jarak)
		];
    
        $insert = $this->Rute_Model->insert_rute($data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Rute berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan rute.');
        }
    
        redirect('admin/Rute_Controller');
    }
    
    


    public function update()
    {
        $id_rute = $this->input->post('id_rute');

		$kota_asal = $this->input->post('rute_awal');
		$kota_tujuan = $this->input->post('rute_ahir');

		// Ambil koordinat kedua kota
		$koordinat_asal = $this->_getCoordinates($kota_asal);
		$koordinat_tujuan = $this->_getCoordinates($kota_tujuan);

		// Hitung jarak
		$jarak = $this->_calculateDistance($koordinat_asal, $koordinat_tujuan);

		$transport = $this->db->get_where('type_transportasi', ['id_type_transportasi' => $this->input->post('id_transportasi')])->row();


		if ($transport->nama_type == 'Pesawat') {
			$harga = round($jarak) * 500;
		} elseif ($transport->nama_type == 'Kereta') {
			$harga = round($jarak) * 1500;
		}

        $data = [
            'tujuan' => $this->input->post('tujuan'),
            'rute_awal' => $this->input->post('rute_awal'),
            'rute_ahir' => $this->input->post('rute_ahir'),
			'id_transportasi' => $this->input->post('id_transportasi'),
            'harga' => $harga,
			'jarak' => round($jarak)
        ];
    
        if ($this->Rute_Model->update($id_rute, $data)) {
            $this->session->set_flashdata('success', 'Rute berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui rute.');
        }
    
        redirect('admin/Rute_Controller');
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
    
    redirect('admin/Rute_Controller'); // Redirect kembali ke halaman rute
}


	private function _getCoordinates($city)
	{
		// Endpoint Nominatim API
		$url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($city) . "&format=json";

		// Menambahkan header User-Agent
		$headers = [
			'User-Agent: test/1.0 salmaramadhiany15@gmail.com'
		];

		// Gunakan cURL untuk mengambil data
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); // Menyertakan header
		$response = curl_exec($curl);
		curl_close($curl);

		// Pastikan respons tidak kosong dan bisa di-decode
		if ($response !== false) {
			$data = json_decode($response, true);

			// Periksa apakah $data adalah array dan memiliki elemen pertama
			if (is_array($data) && !empty($data)) {
				// Pastikan elemen pertama memiliki 'lat' dan 'lon'
				if (isset($data[0]['lat']) && isset($data[0]['lon'])) {
					return [
						'lat' => (float) $data[0]['lat'],
						'lon' => (float) $data[0]['lon']
					];
				}
			}
		}

		// Jika tidak ada data yang ditemukan, kembalikan null
		return null;
	}

	private function _calculateDistance($origin, $destination)
	{
		// Pastikan data yang diterima valid
		if (!$origin || !$destination || !isset($origin['lat'], $origin['lon'], $destination['lat'], $destination['lon'])) {
			return null; // Kembalikan null atau penanganan lain jika data tidak valid
		}

		$earthRadius = 6371; // Radius bumi dalam kilometer

		// Menghitung perbedaan antara koordinat
		$latDelta = deg2rad($destination['lat'] - $origin['lat']);
		$lonDelta = deg2rad($destination['lon'] - $origin['lon']);

		// Hitung jarak dengan rumus Haversine
		$a = sin($latDelta / 2) * sin($latDelta / 2) +
			cos(deg2rad($origin['lat'])) * cos(deg2rad($destination['lat'])) *
			sin($lonDelta / 2) * sin($lonDelta / 2);

		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));

		return $earthRadius * $c; // Jarak dalam kilometer
	}
}


/* End of file Dashboard_Controller.php */
/* Location: ./application/controllers/Dashboard_Controller.php */
