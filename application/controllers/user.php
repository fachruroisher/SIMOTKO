<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}
	public function index() {		
		include 'extend_function/profil_bar.php';
		$data 	= array(
			'title' 		=> 'Manage User',
			'part'			=> 'user',
			'sub_part'		=> '',
			'form'			=> 'index',
			'id_button'		=> 'user',
			'button'		=> 'Add New User',
			'access'		=> 'aau_ad',
			'read'			=> '',
			'submit'		=> 'Submit',
            'content' 		=> $this->sim_model->GetData('user',"where level != 'admin' order by id_user DESC")->result_array()
		);		

        $this->load->view('simotko/template/header',$data);
        $this->load->view('simotko/home',$data0,$data);
        $this->load->view('simotko/template/footer');	
	}

	public function add_action() {	
		
		$kode 	= $_POST['kode'];
		$nama 	= $_POST['username'];			
		$pass 	= $_POST['passusr'];					
		$status = $_POST['statususr'];
		$level 	= $_POST['levelusr'];

		$temp 	= $this->sim_model->GetData('user',"where username = $nama")->result_array();				
		$alias 	= $temp[0]['username'];
		if(!empty($alias)){
			$this->session->set_flashdata('warning',true);
			redirect('user_ad');
		}

		$data 	= array(
			'username' 		=> $nama,
			'fullname' 		=> $nama,	
			'password' 		=> md5($pass),
			'status_user' 	=> $status,
			'level' 		=> $level
		);

		if($level == 'Team Leader'){
			$data_tl = array( 
				'id_wilayah'	=> '1',
				'id_user' 		=> $this->db->insert_id()
			);
			$tl = $this->sim_model->InsertData('team_leader',$data_tl);
		}

		$result = $this->sim_model->InsertData('user',$data);
		if($result){
			$this->session->set_flashdata('success',true);
			redirect('user_ad');					
		}else{
			redirect('user_ad');
		}		
	}

	public function edit($kode) {
		include 'extend_function/profil_bar.php';
		$temp 	= $this->sim_model->GetData('user',"where id_user = '$kode'")->result_array();		
		$data 	= array(
			'title' 		=> 'Edit User '.$temp[0]['fullname'],
			'part'			=> 'user',
			'sub_part'		=> '',
			'form'			=> 'edit',
			'direct'		=> 'Manage User',
			'link_direct'	=> 'user_ad',
			'id_button'		=> 'user',
			'access'		=> 'eau_ad',
			'read'			=> 'readonly',
			'submit'		=> 'Update',
			'kode' 			=> $temp[0]['id_user'],
			'nameusr' 		=> $temp[0]['username'],
			'passusr' 		=> $temp[0]['password'],
			'statususr' 	=> $temp[0]['status_user'],
			'levelusr' 		=> $temp[0]['level'],
			'tlp' 			=> $temp[0]['telephone'],
			'username' 		=> $temp[0]['username'],
			'fullname' 		=> $temp[0]['fullname'],
			'foto'	 		=> $temp[0]['foto'],
			'status' 		=> $temp[0]['status_user'],
			'level' 		=> $temp[0]['level'],
			'email' 		=> $temp[0]['email'],
			'phone'			=> $temp[0]['telephone'],
			'content' 		=> $this->sim_model->GetData('user',"where username != 'admin' order by id_user DESC")->result_array()
		);
		
        $this->load->view('simotko/template/header',$data);
        $this->load->view('simotko/home',$data0,$data);
        $this->load->view('simotko/template/footer');
	}

	public function edit_action() {
		$kode 	= $_POST['kode'];
		$nama 	= $_POST['digits'];			
		$pass 	= $_POST['passusr'];
		$en_pas = md5($pass);					
		$status = $_POST['statususr'];
		$level 	= $_POST['levelusr'];

		$temp 	= $this->sim_model->GetData('user',"where id_user = $kode")->result_array();		
		$test 	= $temp[0]['password'];
		if($temp[0]['password'] != $pass){
			$data = array(
				'username' 		=> $nama,
				'status_user' 	=> $status,
				'level' 		=> $level,
				'password' 		=> $en_pas
			);						
		}else{
			$data = array(	
				'username' 		=> $nama,
				'status_user' 	=> $status,
				'level' 		=> $level,
				'password' 		=> $pass
			);
		} 

		$result = $this->sim_model->UpdateData('user',$data,array('id_user' => $kode));
		if($level == 'team leader'){
			$val= $this->sim_model->GetData('team_leader',"where id_user = $kode")->result_array();		
			if($val[0]['id_user'] != $kode){
				$data_tl = array( 
					'id_user' => $kode
				);
				$tl = $this->sim_model->InsertData('team_leader',$data_tl);
			}
		}else{
			$tl = $this->sim_model->DeleteData('team_leader',array('id_user' => $kode));
		}
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('user_ad/'.$kode);				
		}else{
			redirect('user_ad/'.$kode);
		}
	}

	public function delete_action($kode) {
		$val 	= $this->sim_model->GetData('user',"where id_user = '$kode'")->result_array();
		$coba 	= $val[0]['level'];
		if($coba == 'team leader'){
			$tl = $this->sim_model->DeleteData('team_leader',array('id_user' => $kode));
		}

		$result = $this->sim_model->DeleteData('user',array('id_user' => $kode));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('user_ad');			
		}else{
			redirect('user_ad');
		}
	}
}