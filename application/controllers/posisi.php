<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class posisi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function index() {
		include 'extend_function/profil_bar.php';
		$data = array(
			'title' 		=> 'Setup Posisi',
			'part'			=> 'posisi',
			'sub_part'		=> 'sistem',
			'form'			=> 'index',
			'id_button'		=> 'posisi',
			'button'		=> 'Add New Posisi',
			'access'		=> 'a2_pos',
			'submit'		=> 'Submit',
			'kode'			=> '',
			'posi'			=> '',
			'deskripsi'		=> '',
			'content'		=> $this->sim_model->GetData('posisi order by id_posisi DESC')->result_array()
		);	 

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit($kode){
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetData('posisi',"where id_posisi = '$kode'")->result_array();
		$data = array(
			'title' 		=> 'Edit Posisi',
			'part'			=> 'posisi',
			'sub_part'		=> 'sistem',
			'form'			=> 'edit',
			'direct'		=> 'Setup Posisi',
			'id_button'		=> '',
			'link_direct'	=> 'pos_ad',
			'access'		=> 'ea_pos',
			'read'			=> 'readonly',
			'submit'		=> 'Update',
			'kode'			=> $temp[0]['id_posisi'],
			'posi'			=> $temp[0]['nama_posisi'],
			'deskripsi'		=> $temp[0]['deskripsi'],
			'content'		=> $this->sim_model->GetData('posisi order by id_posisi DESC')->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function add_action() {	
		
		$kode 	= $_POST['kode'];
		$posisi	= $_POST['posi'];			
		$ket 	= $_POST['deskripsi'];

		$valid = $this->sim_model->GetData("posisi where nama_posisi= '$posisi'")->result_array();
		if(!empty($valid)){
			$this->session->set_flashdata('warning',true);
			redirect('pos_ad');
		}

		$data 	= array(
			'nama_posisi' 	=> $posisi,
			'deskripsi' 	=> $ket
		);

		$result = $this->sim_model->InsertData('posisi',$data);
		if($result){
			$this->session->set_flashdata('success',true);
			redirect('pos_ad');						
		}else{
			redirect('pos_ad');						
		}		
	}

	public function edit_action() {
		$kode 	= $_POST['kode'];
		$posisi	= $_POST['posi'];			
		$ket 	= $_POST['deskripsi'];
		
		$data = array(
			'nama_posisi' 	=> $posisi,
			'deskripsi' 	=> $ket
		);
		$result = $this->sim_model->UpdateData('posisi',$data,array('id_posisi' => $kode));
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('pos_ad/'.$kode);
		}else{
			redirect('pos_ad/'.$kode);
		}
	}

	public function delete_action($kode) {
		$result = $this->sim_model->DeleteData('posisi',array('id_posisi' => $kode));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('pos_ad');		
		}else{
			redirect('pos_ad');
		}
	}
	

}