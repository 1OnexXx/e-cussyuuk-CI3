<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Transaksi_Model_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Pemesanan_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    
  }


    public function read() {
        $this->db->select('pemesanan.*, penumpang.nama_penumpang as nama_penumpang, type_transportasi.nama_type as nama_transportasi');
        $this->db->from('pemesanan');
        $this->db->join('penumpang', 'penumpang.id_penumpang = pemesanan.id_pelanggan');
        $this->db->join('rute', 'rute.id_rute = pemesanan.id_rute');
        $this->db->join('transportasi', 'transportasi.id_transportasi = rute.id_transportasi');
        $this->db->join('type_transportasi', 'type_transportasi.id_type_transportasi = transportasi.id_type_transportasi');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function detail($id) {
      $this->db->select('
          pemesanan.*, 
          penumpang.nama_penumpang, penumpang.alamat_penumpang, penumpang.tanggal_lahir, 
          penumpang.jenis_kelamin, penumpang.telepon,
          rute.tujuan, rute.rute_awal, rute.rute_ahir, rute.harga,
          transportasi.kode AS kode_transportasi, transportasi.jumlah_kursi, transportasi.keterangan AS keterangan_transportasi,
          type_transportasi.nama_type, type_transportasi.keterangan AS keterangan_type_transportasi,
          petugas.nama_petugas, level.nama_level
      ');
      $this->db->from('pemesanan');
      
      // JOIN tabel penumpang
      $this->db->join('penumpang', 'penumpang.id_penumpang = pemesanan.id_pelanggan', 'left');
      
      // JOIN tabel rute
      $this->db->join('rute', 'rute.id_rute = pemesanan.id_rute', 'left');
      
      // JOIN tabel transportasi
      $this->db->join('transportasi', 'transportasi.id_transportasi = rute.id_transportasi', 'left');
      
      // JOIN tabel type transportasi
      $this->db->join('type_transportasi', 'type_transportasi.id_type_transportasi = transportasi.id_type_transportasi', 'left');
      
      // JOIN tabel petugas
      $this->db->join('petugas', 'petugas.id_petugas = rute.id_petugas', 'left');
      
      // JOIN tabel level
      $this->db->join('level', 'level.id_level = petugas.id_level', 'left');
      
      // Filter berdasarkan ID pemesanan
      $this->db->where('pemesanan.id_pemesanan', $id);
      
      $query = $this->db->get();
      return $query->row_array(); // Mengembalikan satu baris data
  }


  public function getDetailPemesanan($id) {
        $this->db->select('
          pemesanan.*, 
          penumpang.nama_penumpang, penumpang.alamat_penumpang, penumpang.tanggal_lahir, 
          penumpang.jenis_kelamin, penumpang.telepon,
          rute.tujuan, rute.rute_awal, rute.rute_ahir, rute.harga,
          transportasi.kode AS kode_transportasi, transportasi.jumlah_kursi, transportasi.keterangan AS keterangan_transportasi,
          type_transportasi.nama_type, type_transportasi.keterangan AS keterangan_type_transportasi,
          petugas.nama_petugas, level.nama_level
      ');
      $this->db->from('pemesanan');
      
      // JOIN tabel penumpang
      $this->db->join('penumpang', 'penumpang.id_penumpang = pemesanan.id_pelanggan', 'left');
      
      // JOIN tabel rute
      $this->db->join('rute', 'rute.id_rute = pemesanan.id_rute', 'left');
      
      // JOIN tabel transportasi
      $this->db->join('transportasi', 'transportasi.id_transportasi = rute.id_transportasi', 'left');
      
      // JOIN tabel type transportasi
      $this->db->join('type_transportasi', 'type_transportasi.id_type_transportasi = transportasi.id_type_transportasi', 'left');
      
      // JOIN tabel petugas
      $this->db->join('petugas', 'petugas.id_petugas = rute.id_petugas', 'left');
      
      // JOIN tabel level
      $this->db->join('level', 'level.id_level = petugas.id_level', 'left');
      
      // Filter berdasarkan ID pemesanan
      $this->db->where('pemesanan.id_pemesanan', $id);
        return $this->db->get()->row_array();
    }


  // ------------------------------------------------------------------------

}

/* End of file Transaksi_Model_model.php */
/* Location: ./application/models/Transaksi_Model_model.php */