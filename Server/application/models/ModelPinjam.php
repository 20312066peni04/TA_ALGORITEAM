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
    
}

