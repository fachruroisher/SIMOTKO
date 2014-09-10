<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class area extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function index() {
		include 'extend_function/profil_bar.php';
		$data = array(
			'title' 		=> 'Manage Area',
			'part'			=> 'area',
			'sub_part'		=> 'area',
			'form'			=> 'index',
			'id_button'		=> 'area',
			'button'		=> 'Add New Area',
			'access'		=> 'a3_ad',
			'submit'		=> 'Submit',
			'kode'			=> '',
			'user'			=> '', 	
			'area'			=> '',	
			'alamat'		=> '',				
			'phone'			=> '',
			'tl_area' 		=> $this->sim_model->GetDataTL()->result_array(),
			'content'		=> $this->sim_model->GetDataArea()->result_array()
		);

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit($kode) {
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetDataArea("id_area = $kode")->result_array();
		$data = array(
			'title' 		=> 'Edit Area '.$temp[0]['nama_area'],
			'part'			=> 'area',
			'sub_part'		=> 'area',
			'form'			=> 'edit',
			'direct'		=> 'Manage Area',
			'id_button'		=> '',
			'link_direct'	=> 'am_ad',
			'access'		=> 'e2_ad',
			'kode'			=> $temp[0]['id_area'],	
			'id'			=> $temp[0]['id_tl'],
			'user'			=> $temp[0]['fullname'], 	
			'area'			=> $temp[0]['nama_area'],	
			'alamat'		=> $temp[0]['alamat_area'],				
			'phone'			=> $temp[0]['phone_area'],		
			'submit'		=> 'Update',
			'tl_area' 		=> $this->sim_model->GetDataTL()->result_array(),		
			'content'		=> $this->sim_model->GetDataArea()->result_array()
		);

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}
	public function view($kode) {
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetDataArea("id_area = $kode")->result_array();
		$data = array(
			'title' 		=> 'View Area '.$temp[0]['nama_area'],
			'part'			=> 'area',
			'sub_part'		=> 'area',
			'form'			=> 'view',
			'direct'		=> 'Manage Area',
			'id_button'		=> '',
			'link_direct'	=> 'am_ad',
			'kode'			=> $temp[0]['id_area'],	
			'id'			=> $temp[0]['id_tl'],
			'user'			=> $temp[0]['fullname'],
			'wilayah'		=> $temp[0]['nama_wilayah'], 	
			'area'			=> $temp[0]['nama_area'],	
			'alamat'		=> $temp[0]['alamat_area'],				
			'phone'			=> $temp[0]['phone_area'],
			'content'		=> $this->sim_model->GetDataArea()->result_array()
		);

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function add_action() {	
		
		$kode 	= $_POST['kode'];
		$area 	= $_POST['area'];
		$alamat	= $_POST['alamat'];			
		$phone 	= $_POST['digits'];					
		$user 	= $_POST['user'];

		$valid = $this->sim_model->GetData("area where nama_area= '$area'")->result_array();
		if(!empty($valid)){
			$this->session->set_flashdata('warning',true);
			redirect('am_ad');
		}

		$data 	= array(
			'nama_area' 	=> $area,	
			'alamat_area' 	=> $alamat,
			'phone_area' 	=> $phone,
			'id_tl'			=> $user
		);
		
		$result = $this->sim_model->InsertData('area',$data);
			if($result){
				$this->session->set_flashdata('success',true);
				redirect('am_ad');					
			}else{
				redirect('am_ad');					
			}		
	}

	public function edit_action() {
		$kode 	= $_POST['kode'];
		$area 	= $_POST['area'];
		$alamat	= $_POST['alamat'];			
		$phone 	= $_POST['digits'];					
		$user 	= $_POST['user'];

		$data 	= array(	
				'nama_area' 	=> $area,
				'alamat_area' 	=> $alamat,
				'phone_area' 	=> $phone,
				'id_tl'			=> $user
		);
		$result = $this->sim_model->UpdateData('area',$data,array('id_area' => $kode));
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('am_ad/'.$kode);				
		}else{
			redirect('am_ad/'.$kode);
		}					
	}

	public function delete_action($kode) {
		$result = $this->sim_model->DeleteData('area',array('id_area' => $kode));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('am_ad');
		}else{
			redirect('am_ad');
		}
	}
}