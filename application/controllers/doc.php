<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class doc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('sim_model');
        $this->load->library('pagination');
    }

    public function upload_file_baru() {
        $config['upload_path'] = './assets/document/';
        $config['allowed_types'] = 'docx|pdf|doc|xlsx';
        $config['max_size'] = '2000';
        $config['max_width'] = '1000';
        $config['max_height'] = '1000';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('doc_file')) {
            $error = array('error' => $this->upload->display_errors());
            echo '1';
//            return false;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->docpath = $data['upload_data']['file_name'];
//            return true;
            echo '2';
        }
    }

    public function index() {
        include 'extend_function/profil_bar.php';
        $data = array(
            'title' => 'Manage Document',
            'part' => 'doc',
            'sub_part' => 'doc',
            'form' => 'index',
            'id_button' => 'doc',
            'button' => 'Upload New Doc',
            'access' => 'a2_doc',
            'submit' => 'Upload',
            'content' => $this->sim_model->GetDataDoc("document.id_user = $pengguna")->result_array(),
            'link' => $this->pagination->create_links()
        );
        $this->load->view('simotko/template/header', $data);
        $this->load->view('simotko/home', $data0, $data);
        $this->load->view('simotko/template/footer');
    }

    public function view() {
        include 'extend_function/profil_bar.php';
        $config = array();
        $config["base_url"] = site_url('doc_vd');
        $config["total_rows"] = $this->sim_model->jumlahDoc();
        $config["per_page"] = 8;
        $config["uri_segment"] = 2;
        $config['next_link'] = ' Next <i class=" fa fa-arrow-right"></i>';
        $config['prev_link'] = '<i class="fa fa-arrow-left"></i> Prev ';
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $this->pagination->initialize($config);
        $pages = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data = array(
            'title' => 'Document',
            'part' => 'doc',
            'form' => 'index',
            'sub_part' => 'view',
            'nav' => 'required',
            'id_button' => 'doc',
            'active' => 'out',
            'content' => $this->sim_model->paginationDoc($config["per_page"], $pages),
            'links' => $this->pagination->create_links()
        );
        $this->load->view('simotko/template/header', $data);
        $this->load->view('simotko/home', $data0, $data);
        $this->load->view('simotko/template/footer');
    }

    public function edit($kode) {
        include 'extend_function/profil_bar.php';
        $temp = $this->sim_model->GetData('document', "where id_document = '$kode'")->result_array();
        $data = array(
            'title' => 'Edit Document',
            'part' => 'doc',
            'sub_part' => 'doc',
            'form' => 'edit',
            'direct' => 'Manage Document',
            'link_direct' => 'doc_ad',
            'id_button' => 'doc',
            'access' => 'ea_doc',
            'read' => 'readonly',
            'submit' => 'Update',
            'judul' => $temp[0]['title'],
            'isi' => $temp[0]['keterangan'],
            'kode' => $temp[0]['id_document'],
            'file' => $temp[0]['gambar'],
            'content' => $this->sim_model->GetDataDoc()->result_array()
        );

        $this->load->view('simotko/template/header', $data);
        $this->load->view('simotko/home', $data0, $data);
        $this->load->view('simotko/template/footer');
    }

    public function add_action() {
//        $judul = $_POST['judul'];
//        $ket = $_POST['isi'];
//        $user = $_POST['id'];
//        print_r($_POST);
//        $valid = $this->sim_model->GetData("document where title= '$judul'")->result_array();
//        if (!empty($valid)) {
//            $this->session->set_flashdata('warning', true);
//            redirect('doc_ad');
//        }

        $this->upload_file_baru();
//        if (!empty($this->docpath)) {
//            $docpaths = $this->docpath;
//            $data = array(
//                'title' => $judul,
//                'keterangan' => $ket,
//                'tanggal' => date("Y-m-d"),
//                'id_user' => $user,
//                'gambar' => $docpaths
//            );
//        } else {
//            $data = array(
//                'title' => $judul,
//                'tanggal' => date("Y-m-d"),
//                'id_user' => $user,
//                'keterangan' => $ket
//            );
//        }
//        $result = $this->sim_model->InsertData('document', $data);
//        if ($result) {
//            $this->session->set_flashdata('warning', true);
//            redirect('doc_ad');
//        } else {
//            redirect('doc_ad');
//        }
    }

    public function edit_action() {
        $kode = $_POST['kode'];
        $file = $_POST['doc'];
        $judul = $_POST['judul'];
        $ket = $_POST['isi'];
        $user = $_POST['id'];

        $temp = $this->sim_model->GetData('document', "where id_document = $kode")->result_array();
        $this->upload_file_baru();
        if (!empty($this->docpath)) {
            unlink('./assets/document/' . $temp[0]['gambar']);
            $docpaths = $this->docpath;
            $data = array(
                'title' => $judul,
                'keterangan' => $ket,
                'gambar' => $docpaths
            );
        } else {
            $data = array(
                'title' => $judul,
                'keterangan' => $ket
            );
        }
        $result = $this->sim_model->UpdateData('document', $data, array('id_document' => $kode));
        if ($result) {
            $this->session->set_flashdata('ubah', true);
            redirect('doc_ad');
        } else {
            redirect('doc_ad/' . $kode);
        }
    }

    public function delete_action($kode) { //fungsi delete user----

        $temp = $this->sim_model->GetData('document', "where id_document = $kode")->result_array();
        $file = $temp[0]['gambar'];
        if (!empty($file)) {
            unlink('./assets/file/' . $file);
        }

        $result = $this->sim_model->DeleteData('document', array('id_document' => $kode));
        if ($result) {
            $this->session->set_flashdata('hapus', true);
            redirect('doc_ad');
        } else {
            redirect('doc_ad');
        }
    }

}