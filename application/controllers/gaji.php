<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gaji extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function index() {
		include 'extend_function/profil_bar.php';
		$data = array(
			'title' 		=> 'Setup Gaji',
			'part'			=> 'gaji',
			'sub_part'		=> 'sistem',
			'form'			=> 'index',
			'id_button'		=> 'sallary',
			'button'		=> 'Add New Sallary Category',
			'access'		=> 'a2_sm',
			'submit'		=> 'Submit',
			'kode'			=> '',
			'jenis'			=> '',
			'deskripsi'		=> '',
			'gaji'			=> '',	
			'content'		=> $this->sim_model->GetData('gaji order by id_gaji DESC')->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit($kode){
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetData('gaji',"where id_gaji = '$kode'")->result_array();
		$data = array(
			'title' 		=> 'Edit Gaji',
			'part'			=> 'gaji',
			'sub_part'		=> 'sistem',
			'form'			=> 'edit',
			'direct'		=> 'Manage Gaji',
			'id_button'		=> 'gaji',
			'link_direct'	=> 'sm_ad',
			'access'		=> 'ea_sm',
			'read'			=> 'readonly',
			'submit'		=> 'Update',
			'kode'			=> $temp[0]['id_gaji'],
			'jenis'			=> $temp[0]['jenis_gaji'],
			'deskripsi'		=> $temp[0]['deskripsi'],
			'gaji'			=> $temp[0]['nominal'],
			'content'		=> $this->sim_model->GetData('gaji order by id_gaji DESC')->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function add_action() {	
		
		$kode 	= $_POST['kode'];
		$jenis 	= $_POST['jenis'];			
		$ket 	= $_POST['deskripsi'];
		$gaji 	= $_POST['gaji'];	

		$valid = $this->sim_model->GetData("gaji where jenis_gaji= '$jenis'")->result_array();
		if(!empty($valid)){
			$this->session->set_flashdata('warning',true);
			redirect('sm_ad');
		}

		$data 	= array(
			'id_gaji' 		=> $kode,
			'jenis_gaji' 	=> $jenis,
			'deskripsi' 	=> $ket,	
			'nominal' 		=> $gaji
		);

		$result = $this->sim_model->InsertData('gaji',$data);
		if($result){
			$this->session->set_flashdata('success',true);
			redirect('sm_ad');
		}else{
			redirect('sm_ad');
		}		
	}

	public function edit_action() {
		$kode 	= $_POST['kode'];
		$jenis 	= $_POST['jenis'];			
		$ket 	= $_POST['deskripsi'];
		$gaji 	= $_POST['gaji'];
		
		$data = array(
			'jenis_gaji' 	=> $jenis,
			'deskripsi' 	=> $ket,	
			'nominal' 		=> $gaji
		);
		$result = $this->sim_model->UpdateData('gaji',$data,array('id_gaji' => $kode));
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('sm_ad/'.$kode);
		}else{
			redirect('sm_ad/'.$kode);
		}
	}

	public function delete_action($kode) {
		$result = $this->sim_model->DeleteData('gaji',array('id_gaji' => $kode));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('sm_ad');
		}else{
			redirect('sm_ad');
		}
	}
}