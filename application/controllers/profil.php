<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}
	public function upload_foto_baru(){
		$config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '400';
        $config['max_height'] = '600';
  
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('foto_profil')) {             			
 			if($this->upload->is_allowed_filetype()){
 				$this->session->set_flashdata('warning',true);
				redirect('up_ad/'.$_POST['kode']);	
 			}else{
 				return false;
 			}
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->fotopath = $data['upload_data']['file_name'];
 			return true;
 		}

 	}
	public function index($kode) {
		$temp 	= $this->sim_model->GetData('user',"where id_user = '$kode'")->result_array();
		include 'extend_function/profil_bar.php';
		$data 	= array(
			'title' 		=> 'Update Profil',
			'part'			=> 'profil',
			'sub_part'		=> '',
			'form'			=> 'edit',
			'direct'		=> 'Account Setting',
			'link_direct'	=> 'set_ad/'.$temp[0]['id_user'],
			'id_button'		=> '',
			'access'		=> 'epu_ad',
			'submit'		=> 'Update',
			'kode' 			=> $temp[0]['id_user'],
			'nama' 			=> $temp[0]['fullname'],
			'tlp' 			=> $temp[0]['telephone'],
			'foto' 			=> $temp[0]['foto'],
			'last' 			=> $temp[0]['last_access'],
			'nameusr' 		=> 'admin',
			'passusr' 		=> $temp[0]['password'],
			'mailusr' 		=> $temp[0]['email'],
			'statususr' 	=> 'aktif',
			'levelusr' 		=> 'admin',
		);					
		
		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit_profil_user() {
		$kode 	= $_POST['kode'];
		$nama 	= $_POST['nameusr'];
		$full 	= $_POST['nama'];			
		$pass 	= $_POST['passusr'];
		$en_pas = md5($pass);
		$mail 	= $_POST['mailusr'];					
		$status = $_POST['statususr'];
		$level 	= $_POST['levelusr'];
		$phone 	= $_POST['digits'];		
        
		$this->upload_foto_baru(); 
				
		if(!empty($this->fotopath))  {
			$fotopaths = $this->fotopath;	
			$temp 	= $this->sim_model->GetData('user',"where id_user = $kode")->result_array();		
			unlink('./assets/file/'.$temp[0]['foto']);				
			if($temp[0]['password'] != $pass){							
				$data = array(
					'username' 		=> $nama,
					'fullname' 		=> $full,	
					'email'       	=> $mail,
					'telephone' 	=> $phone,
					'level'       	=> $level,
					'status_user' 	=> $status,
					'foto' 			=> $fotopaths,
					'password' 		=> $en_pas
				);
			}else{
				$data = array(	
					'username' 		=> $nama,
					'fullname' 		=> $full,	
					'email'       	=> $mail,
					'telephone' 	=> $phone,
					'level'       	=> $level,
					'status_user' 	=> $status,
					'foto' 			=> $fotopaths,
					'password' 		=> $pass
				);
			}
		} else{
			if(!empty($temp[0]['password'])){
				$data = array(
					'username' 		=> $nama,
					'fullname' 		=> $full,	
					'email'       	=> $mail,
					'telephone' 	=> $phone,
					'level'       	=> $level,
					'status_user' 	=> $status,
					'password' 		=> $en_pas
				);
			}else{								
				$data = array(	
					'username' 		=> $nama,
					'fullname' 		=> $full,	
					'email'       	=> $mail,
					'telephone' 	=> $phone,
					'level'       	=> $level,
					'status_user' 	=> $status,
					'password' 		=> $pass
				);
			}
		}
		$result = $this->sim_model->UpdateData('user',$data,array('id_user' => $kode));
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('up_ad/'.$kode);		
		}else{
			redirect('up_ad/'.$kode);
		}
	}
	

}