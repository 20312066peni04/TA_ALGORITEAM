<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPengguna extends CI_Model {

    function get_data($data)
    {
      if (empty($data)){
        $query = $this->db->query("SELECT * FROM pengguna WHERE pengguna.hapus = '1' ORDER BY pengguna.nama_pengguna ASC");
      } else {
        $query = $this->db->query("SELECT * FROM pengguna WHERE pengguna.hapus = '1' AND pengguna.id = '$data' ORDER BY pengguna.nama_pengguna ASC");
      }
      return $query->result();
    }

    function save_data($data)
    {
      return $this->db->insert("pengguna", $data);
    }
    
}

