<?php

class DataBuku extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        if (empty($this->session->userdata('id'))){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda belum login!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
			redirect("Login");
        }
    }
    
    public function index()
    {
        $send = array('id' => "");
        $data['title'] = "Data Buku";
        $buku = json_decode($this->client->simple_get(API_BUKU, $send));
        $data['buku'] = $buku->buku;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('data_buku',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_data()
    {
        $send = array('id' => "");
        $data['title'] = "Tambah Data Buku";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('tambah_buku',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->tambah_data();
        } else {
            $photo = $_FILES['photo']['name'];

            if($photo= ''){

            } else {
                $config['upload_path'] = './ext/buku';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('photo')){
                    echo "Photo Gagal diupload!";
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama_buku' => $this->input->post('nama_buku'),
                'gambar'     => $photo,
                'hapus'     => '1'
            );

            $response = json_decode($this->client->simple_post(API_BUKU, $data));
            if ($response->status){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            }

            $this->index();
        }
    }

    public function update_data($id)
    {
        $send = array('id' => $id);
        $response = json_decode($this->client->simple_get(API_BUKU, $send));
        $data['buku'] = $response->buku;
        $data['id'] = $id;

        $data['title'] = "Update Data Buku " . $response->buku[0]->nama_buku;
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('update_buku',$data);
        $this->load->view('templates/footer');
    }

    public function update_data_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $photo = $_FILES['photo']['name'];

            if($photo){
                $config['upload_path'] = './ext/photo';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('photo')){
                    $photo = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'id'        => $this->input->post('id'),
                'nama_buku' => $this->input->post('nama_buku'),
                'gambar'    => $photo,
                'hapus'     => '1'
            );

            $response = json_decode($this->client->simple_post(API_BUKU . 'Update', $data));
            if ($response->pesan){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diUpdate</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gagal diUpdate</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            }

            $this->index();
        }
    }

    public function delete_data($id)
    {
        $send = array('id' => $id);
        $response = json_decode($this->client->simple_get(API_BUKU, $send));
        $data['buku'] = $response->buku;

        $data = array(
            'id' => $id,
            'nama_buku' => $response->buku[0]->nama_buku,
            'gambar' => $response->buku[0]->gambar,
            'hapus' => '0'
        );

        $response = json_decode($this->client->simple_post(API_BUKU . 'Update', $data));
        if ($response->pesan){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data gagal dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        }

        $this->index();
    }

    public function _rules(){
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
    }
}

?>