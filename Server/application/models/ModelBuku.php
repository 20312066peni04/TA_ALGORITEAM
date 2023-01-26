<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelBuku extends CI_Model {

    function get_data($data)
    {
      if (empty($data)) $query = $this->db->query("SELECT * FROM buku WHERE buku.hapus = '1' ORDER BY buku.nama_buku ASC");
      else $query = $this->db->query("SELECT * FROM buku WHERE buku.hapus = '1' AND buku.id = '$data' ORDER BY buku.nama_buku ASC");
      return $query->result();
    }

    function save_data($data)
    {
      return $this->db->insert("buku", $data);
    }
    
}

