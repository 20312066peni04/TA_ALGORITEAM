<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSiswa extends CI_Model {

    function get_data($data)
    {
      if (empty($data)){
        $query = $this->db->query("SELECT * FROM siswa WHERE siswa.hapus = '1' ORDER BY siswa.nama_siswa ASC");
      } else {
        $query = $this->db->query("SELECT * FROM siswa WHERE siswa.hapus = '1' AND siswa.id = '$data' ORDER BY siswa.nama_siswa ASC");
      }
      return $query->result();
    }

    function save_data($data)
    {
      return $this->db->insert("siswa", $data);
    }

    function update_data($data, $id)
    {
        return $this->db->update("siswa", $data, array('id' => $id));
    }
    
}

