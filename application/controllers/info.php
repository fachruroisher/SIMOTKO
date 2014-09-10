<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class info extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function index() {
		include 'extend_function/profil_bar.php';		
		$data = array(
			'title' 		=> 'Manage Information',
			'part'			=> 'info',
			'sub_part'		=> 'info',
			'form'			=> 'index',
			'id_button'		=> 'info',
			'button'		=> 'Add New Info',
			'access'		=> 'aai_ad',
			'submit'		=> 'Submit',
			'keterangan'	=> '',
			'status'		=> '',
			'kode'			=> '',				
			'status_option1'=> 'aktif',
			'status_option2'=> 'tidak',
			'content'		=> $this->sim_model->GetDataIn("informasi.id_user = $pengguna order by id_info DESC")->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit($kode){
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetData('informasi',"where id_info = '$kode'")->result_array();
		$data = array(
			'title' 		=> 'Edit Information Tanggal  '.$temp[0]['tanggal'],
			'part'			=> 'info',
			'sub_part'		=> 'info',
			'form'			=> 'edit',
			'direct'		=> 'Manage Information',
			'link_direct'	=> 'inf_ad',
			'id_button'		=> 'info',
			'access'		=> 'eai_ad',
			'read'			=> 'readonly',
			'submit'		=> 'Update',
			'keterangan'	=> $temp[0]['keterangan'],
			'status'		=> $temp[0]['status_info'],
			'kode'			=> $temp[0]['id_info'],
			'content'		=> $this->sim_model->GetDataIn("informasi.id_user = $pengguna order by id_info DESC")->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function add_action() {	
		
		$kode 	= $_POST['kode'];
		$info 	= $_POST['info'];			
		$status = $_POST['status'];					
		$user 	= $_POST['id'];

		$data 	= array(
			'id_info' 		=> $kode,
			'status_info' 	=> $status,	
			'keterangan' 	=> $info,
			'tanggal' 		=> date("Y-m-d"),
			'id_user'		=> $user
		);

		$result = $this->sim_model->InsertData('informasi',$data);
		if($result){
			$this->session->set_flashdata('success',true);
			redirect('inf_ad');						
		}else{
			redirect('inf_ad');
		}		
	}

	public function edit_action() {
		$kode 		= $_POST['kode'];
		$isi 		= $_POST['info'];
		$status		= $_POST['status'];	
		
		$data = array(
			'keterangan' 	=> $isi,
			'status_info'	=> $status
		);
		$result = $this->sim_model->UpdateData('informasi',$data,array('id_info' => $kode));
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('inf_ad/'.$kode);	
		}else{
			redirect('inf_ad/'.$kode);	
		}
	}

	public function delete_action($kode) {
		$result = $this->sim_model->DeleteData('informasi',array('id_info' => $kode));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('inf_ad');				
		}else{
			redirect('inf_ad');
		}
	}

}