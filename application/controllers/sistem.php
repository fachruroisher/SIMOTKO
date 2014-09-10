<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sistem extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}
	public function upload_foto_baru(){
		$config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '500';
        $config['max_width'] = '1200';
        $config['max_height'] = '700';
  
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('wallpaper')) {             			
 			if($this->upload->is_allowed_filetype()){
 				$this->session->set_flashdata('warning',true);
				redirect('sis_ad');	
 			}else{
 				return false;
 			}
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->fotopath = $data['upload_data']['file_name'];
 			return true;
 		}

 	}
	public function index() {
		include 'extend_function/profil_bar.php';
		$sis = $this->sim_model->GetData('sistem where id_sistem=1')->result_array();		
		$data = array(
			//--- General function
			'title' 		=> 'Update Profile System',
			'part'			=> 'prosis',
			'sub_part'		=> 'sistem',
			'form'			=> 'index',
			'id_button'		=> 'sistem',
			'access'		=> 'ea_sis',
			'submit'		=> 'Update System',
			'idsis'			=> $sis[0]['id_sistem'],
			'namsis'		=> $sis[0]['nama_sistem'],
			'desis'			=> $sis[0]['deskripsi_sistem'],
			'tagsis'		=> $sis[0]['tag_sistem'],
			'cnsis'			=> $sis[0]['company_name'],
			'casis'			=> $sis[0]['company_address'],
			'csis'			=> $sis[0]['company_site'],
			'cpsis'			=> $sis[0]['company_phone'],
			'wpsis'			=> $sis[0]['welcome_page'],
			'bgsis'			=> $sis[0]['bg_login'],
			'guide'			=> $this->sim_model->GetData("guide where id_guide = 1")->result_array(),
		);	
		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}	

	public function edit_action() {
		$kode 				= $_POST['idsis'];
		$nama_sistem 		= $_POST['namsis'];
		$deskripsi_sistem 	= $_POST['desis'];
		$tag_sistem			= $_POST['tagsis'];
		$company_name		= $_POST['cnsis'];
		$company_address	= $_POST['casis'];
		$company_site		= $_POST['csis'];
		$company_phone		= $_POST['cpsis'];
		$welcome_page		= $_POST['wpsis'];	
		
		
		$temp 	= $this->sim_model->GetData("sistem where id_sistem = $kode")->result_array();			
		$this->upload_foto_baru(); 
		if(!empty($this->fotopath))  {			
			unlink('./assets/file/'.$temp[0]['bg_login']);
			$fotopaths = $this->fotopath;
			$data = array(
				'nama_sistem' 		=> $nama_sistem,
				'deskripsi_sistem' 	=> $deskripsi_sistem,
				'tag_sistem'		=> $tag_sistem,
				'company_name'		=> $company_name,
				'company_address'	=> $company_address,
				'company_site'		=> $company_site,
				'company_phone'		=> $company_phone,
				'welcome_page'		=> $welcome_page,
				'bg_login'			=> $fotopaths
			);
		}else{
			$data = array(
				'nama_sistem' 		=> $nama_sistem,
				'deskripsi_sistem' 	=> $deskripsi_sistem,
				'tag_sistem'		=> $tag_sistem,
				'company_name'		=> $company_name,
				'company_address'	=> $company_address,
				'company_site'		=> $company_site,
				'company_phone'		=> $company_phone,
				'welcome_page'		=> $welcome_page
			);
		}

		$result = $this->sim_model->UpdateData('sistem',$data,array('id_sistem' => $kode));
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('sis_ad');	
		}else{
			redirect('sis_ad');	
		}
	}

}