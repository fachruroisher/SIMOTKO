<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class guide extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}
	public function upload_file_baru(){
		$config['upload_path'] = './assets/document/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '2000';
        $config['max_width'] = '1000';
        $config['max_height'] = '1000';
  
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('guide_file')) {
            $error = array('error' => $this->upload->display_errors()); 			
 			return false; 
        } 
        else {
            $data = array('upload_data' => $this->upload->data());
            $this->docpath = $data['upload_data']['file_name']; 			
 			return true;
 		}
 	}
	public function index() {
		include 'extend_function/profil_bar.php';
		$data = array(
			'title' 		=> 'Manage User Guide',
			'part'			=> 'guide',
			'sub_part'		=> 'sistem',
			'form'			=> 'index',
			'id_button'		=> 'area',
			'button'		=> 'Add New Guide',
			'access'		=> 'a2_g',
			'submit'		=> 'Add',
			'kode'			=> '',
			'deskripsi'		=> '', 	
			'file'			=> '',
			'content'		=> $this->sim_model->GetData("guide")->result_array(),
			
		);

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit($kode) {
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetData("guide where id_guide = $kode")->result_array();
		$data = array(
			'title' 		=> 'Edit User Guide ',
			'part'			=> 'guide',
			'sub_part'		=> 'sistem',
			'form'			=> 'edit',
			'direct'		=> 'Manage User Guide',
			'id_button'		=> '',
			'link_direct'	=> 'g_ad',
			'access'		=> 'ea_g',
			'read'			=> 'readonly',
			'submit'		=> 'Update',
			'kode'			=> $temp[0]['id_guide'],
			'deskripsi'		=> $temp[0]['ket_guide'], 	
			'file'			=> $temp[0]['file'],	
			'content'		=> $this->sim_model->GetData("guide")->result_array()
		);
		
		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function add_action() {	
		
		$kode 	= $_POST['kode'];
		$ket 	= $_POST['isi'];

		$this->upload_file_baru();
		if(!empty($this->docpath)){				
			$docpaths = $this->docpath; 
			$data 	= array(
			'file'		=> $docpaths,
			'ket_guide'	=> $ket
			);
		}else{
			$data 	= array(			
				'ket_guide'	=> $ket
			);
		}		
		$result = $this->sim_model->InsertData('guide',$data);
		if($result){
			$this->session->set_flashdata('success',true);
			redirect('g_ad');					
		}else{
			redirect('g_ad');	
		}			
	}

	public function edit_action() {	
		$kode	= $_POST['kode'];
		$ket 	= $_POST['isi'];
		
		$temp 	= $this->sim_model->GetData('guide',"where id_guide = $kode")->result_array();			
		$this->upload_file_baru(); 
		if(!empty($this->docpath))  {			
			unlink('./assets/document/'.$temp[0]['file']);
			$docpaths = $this->docpath;
			$data 	= array(	
				'ket_guide'	=> $ket,
				'file'		=> $docpaths
			);
		}else{
			$data 	= array(	
				'ket_guide'	=> $ket
			);
		}			
		$result = $this->sim_model->UpdateData('guide',$data,array('id_guide' => $kode));
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('g_ad');				
		}else{
			redirect('g_ad');				
		}	
	}

	public function delete_action($kode) //fungsi delete user----
	{
		$page 	= site_url('g_ad');
		$temp 	= $this->sim_model->GetData('guide',"where id_guide = $kode")->result_array();			
		$file 	= $temp[0]['file'];
		if(!empty($file)){
			unlink('./assets/document/'.$file);
		}		
		$result = $this->sim_model->DeleteData('guide',array('id_guide' => $kode));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('g_ad');			
		}else{
			redirect('g_ad');
		}
	}
}