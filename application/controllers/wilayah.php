<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wilayah extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function index() {
		include 'extend_function/profil_bar.php';
		$data = array(
			'title' 		=> 'Manage Wilayah',
			'part'			=> 'wilayah',
			'sub_part'		=> 'sistem',
			'form'			=> 'index',
			'id_button'		=> 'wilayah',
			'button'		=> 'Add New Wilayah',
			'access'		=> 'a2_wm',
			'submit'		=> 'Add',
			'kode'			=> '',
			'wilayah'		=> '',
			'content'		=> $this->sim_model->GetData('wilayah order by id_wilayah DESC')->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit($kode){
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetData('wilayah',"where id_wilayah = '$kode'")->result_array();
		$data = array(
			'title' 		=> 'Edit Wilayah',
			'part'			=> 'wilayah',
			'sub_part'		=> 'sistem',
			'form'			=> 'edit',
			'direct'		=> 'Manage Wilayah',
			'link_direct'	=> 'wm_ad',
			'id_button'		=> 'wilayah',
			'access'		=> 'ea_wm',
			'read'			=> 'readonly',
			'submit'		=> 'Update',
			'kode'			=> $temp[0]['id_wilayah'],
			'wilayah'		=> $temp[0]['nama_wilayah'],
			'content'		=> $this->sim_model->GetData('wilayah order by id_wilayah DESC')->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function add_action() {	
		
		$kode 		= $_POST['kode'];
		$wilayah 	= $_POST['wilayah'];	

		$valid = $this->sim_model->GetData("wilayah where nama_wilayah= '$wilayah'")->result_array();
		if(!empty($valid)){
			$this->session->set_flashdata('warning',true);
			redirect('wm_ad');
		}

		$data 	= array(
			'id_wilayah'	=> $kode,
			'nama_wilayah' 	=> $wilayah
		);

		$result = $this->sim_model->InsertData('wilayah',$data);
		if($result){
			$this->session->set_flashdata('success',true);
			redirect('wm_ad');						
		}else{
			echo "<h2>Operasi Tambah Data Gagal !!!</h2><br><a href='".base_url()."'>Kembali ke Halaman sebelumnya</a>";
		}		
	}

	public function edit_action() {
		$kode 	= $_POST['kode'];
		$wilayah= $_POST['wilayah'];

		$valid = $this->sim_model->GetData("wilayah where nama_wilayah= '$wilayah'")->result_array();
		if(!empty($valid)){
			$this->session->set_flashdata('warning',true);
			redirect('wm_ad/'.$kode);
		}

		$data = array(
			'nama_wilayah' 	=> $wilayah
		);
		$result = $this->sim_model->UpdateData('wilayah',$data,array('id_wilayah' => $kode));
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('wm_ad');
		}else{
			redirect('wm_ad');
		}
	}

	public function delete_action($kode){
		$result = $this->sim_model->DeleteData('wilayah',array('id_wilayah' => $kode));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('wm_ad');			
		}else{
			redirect('wm_ad');
		}
	}
	

}