<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shift extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function index() {
		include 'extend_function/profil_bar.php';
		$data = array(
			'title' 		=> 'Manage Shift',
			'part'			=> 'shift',
			'sub_part'		=> 'sistem',
			'form'			=> 'index',
			'id_button'		=> 'shift',
			'button'		=> 'Add New Shift',
			'access'		=> 'a2_sf',
			'submit'		=> 'Add',
			'kode'			=> '',
			'shift'			=> '',
			'deskripsi'		=> '',
			'content'		=> $this->sim_model->GetData('shift order by id_shift DESC')->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit($kode){
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetData('shift',"where id_shift = '$kode'")->result_array();
		$data = array(
			'title' 		=> 'Edit Shift',
			'part'			=> 'shift',
			'sub_part'		=> 'sistem',
			'form'			=> 'edit',
			'direct'		=> 'Manage Shift',
			'link_direct'	=> 'sf_ad',
			'id_button'		=> 'shift',
			'access'		=> 'ea_sf',
			'read'			=> 'readonly',
			'submit'		=> 'Update',
			'kode'			=> $temp[0]['id_shift'],
			'shift'			=> $temp[0]['nama_shift'],
			'deskripsi'		=> $temp[0]['deskripsi_shift'],
			'content'		=> $this->sim_model->GetData('shift order by id_shift DESC')->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function add_action() {	
		
		$kode 		= $_POST['kode'];
		$shift 	 	= $_POST['shift'];	
		$deskripsi 	= $_POST['deskripsi'];	

		$valid = $this->sim_model->GetData("shift where nama_shift= '$shift'")->result_array();
		if(!empty($valid)){
			$this->session->set_flashdata('warning',true);
			redirect('sf_ad');
		}
		$data 	= array(
			'id_shift'	=> $kode,
			'nama_shift' 	=> $shift,
			'deskripsi_shift' 	=> $deskripsi
		);

		$result = $this->sim_model->InsertData('shift',$data);
		if($result){
			$this->session->set_flashdata('success',true);
			redirect('sf_ad');					
		}else{
			redirect('sf_ad');
		}		
	}

	public function edit_action() {
		$kode 		= $_POST['kode'];
		$shift 	 	= $_POST['shift'];	
		$deskripsi 	= $_POST['deskripsi'];

		$data = array(
			'nama_shift' 	=> $shift,
			'deskripsi_shift' 	=> $deskripsi
		);
		$result = $this->sim_model->UpdateData('shift',$data,array('id_shift' => $kode));
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('sf_ad/'.$kode);
		}else{
			redirect('sf_ad/'.$kode);
		}
	}

	public function delete_action($kode) {
		$result = $this->sim_model->DeleteData('shift',array('id_shift' => $kode));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('sf_ad');			
		}else{
			redirect('sf_ad');
		}
	}
	

}