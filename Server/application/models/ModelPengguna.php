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

    function update_data($data, $id)
    {
        return $this->db->update("pengguna", $data, array('id' => $id));
    }

    function get_login($data)
    {
        $this->db->select("*");
        $this->db->from("pengguna");
        $this->db->where($data);
        $data = $this->db->get()->result();
        $login = sizeof($data);

        if ($login > 0){
          $query = array('login' => $login, 'id' => $data[0]->id, 'nama_pengguna' => $data[0]->nama_pengguna);
        } else {
          $query = array('login' => $login);
        }
        return $query;
    }
    
}

