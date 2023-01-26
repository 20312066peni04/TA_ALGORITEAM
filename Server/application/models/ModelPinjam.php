<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPinjam extends CI_Model {

    function get_data($data)
    {
      if (empty($data)){
        $query = $this->db->query("SELECT * FROM pinjam WHERE pinjam.status = '1' ORDER BY pinjam.created ASC");
      } else {
        $query = $this->db->query("SELECT * FROM pinjam WHERE pinjam.id = '$data' AND pinjam.status = '1'");
      }
      return $query->result();
    }

    function get_data_()
    {
      return $this->db->query("SELECT pinjam.id, siswa.nama_siswa, pengguna.nama_pengguna, buku.nama_buku FROM pinjam INNER JOIN siswa ON siswa.id = pinjam.id_siswa INNER JOIN pengguna ON pengguna.id = pinjam.id_pengguna INNER JOIN buku ON buku.id = pinjam.id_buku WHERE pinjam.status = '1' ORDER BY pinjam.created ASC")->result();
    }

    function save_data($data)
    {
      return $this->db->insert("pinjam", $data);
    }

    function update_data($data, $id)
    {
        return $this->db->update("pinjam", $data, array('id' => $id));
    }
    
}

