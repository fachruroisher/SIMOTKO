<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function index($kode) {
		include 'extend_function/profil_bar.php';
		$temp 	= $this->sim_model->GetData('user',"where id_user = '$kode'")->result_array();
		$data 	= array(	
			'title' 		=> 'Account Setting',
			'part'			=> 'setting',
			'sub_part'		=> '',
			'form'			=> 'index',
			'id_button'		=> '',
			'access'		=> 'esu_ad',
			'submit'		=> 'Save',
			'kode' 			=> $temp[0]['id_user'],
			'nama' 			=> $temp[0]['fullname'],
			'tlp' 			=> $temp[0]['telephone'],
			'foto' 			=> $temp[0]['foto'],
			'last' 			=> $temp[0]['last_access'],
			'nameusr' 		=> 'admin',
			'passusr' 		=> $temp[0]['password'],
			'mailusr' 		=> $temp[0]['email'],
			'statususr' 	=> 'aktif',
			'levelusr' 		=> 'admin'
		);					
		//--------Template-------------------------
		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');		
	}

	public function edit_setting_user() {
		$kode 	= $_POST['kode'];
		$nama 	= $_POST['nameusr'];			
		$pass 	= $_POST['passusr'];
		$en_pas = md5($pass);
		$mail 	= $_POST['mailusr'];					
		$status = $_POST['statususr'];
		$level 	= $_POST['levelusr'];

		$temp 	= $this->sim_model->GetData('user',"where id_user = $kode")->result_array();		
			$test = $temp[0]['password'];
			if($temp[0]['password'] != $pass){
				$data = array(
					'username' 		=> $nama,
					'status_user' 	=> $status,
					'level' 		=> $level,
					'email' 		=> $mail,
					'password' 		=> $en_pas
				);						
			}else{
				$data = array(	
					'username' 		=> $nama,
					'status_user' 	=> $status,
					'level' 		=> $level,
					'email' 		=> $mail,
					'password' 		=> $pass
				);
			} 
			$result = $this->sim_model->UpdateData('user',$data,array('id_user' => $kode));
			if($result){
				$this->session->set_flashdata('ubah',true);
				redirect('set_ad/'.$kode);				
			}else{
				redirect('set_ad/'.$kode);
			}
	}

}