<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('sim_model');
	}

	public function index(){
		$login = $this->sim_model->GetData('sistem')->result_array();
		$welcome=array(
			'title' 	 	=> $login[0]['nama_sistem'],
			'welcome' 	 	=> 'Selamat datang di '.$login[0]['nama_sistem'],
			'deskripsi' 	=> 'Sistem Informasi Management Operational',
			'keterangan' 	=> $login[0]['welcome_page'],
			'site' 		 	=> $login[0]['company_site'],
			'link_site'  	=> 'http://'.$login[0]['company_site'],
			'company'		=> $login[0]['company_name'],
			'alamat'		=> $login[0]['company_address'],
			'phone'			=> $login[0]['company_phone'],
			'back'			=> $login[0]['bg_login'],
			'des'			=> $login[0]['deskripsi_sistem'],
			'tag'			=> $login[0]['tag_sistem']
			);
		
		if($this->input->post('submit')){
			$this->login();
		}
		
		$this->load->view('index',$welcome);
	}

	public function login(){
		
		$dataLogin = $this->login_model->loginUser();

		if($dataLogin == True){
			//variable di deklarasikan
			$id 		= $dataLogin[0]['id_user'];
			$level 		= $dataLogin[0]['level'];
			$status 	= $dataLogin[0]['status_user'];
			//memanggil user untuk update last_access yang diambil dari new_access
			$vld 		= $this->sim_model->GetData('user',"where id_user = $id")->result_array();
			$last_access= array(
				'last_access' 	=> $vld[0]['new_access']
			);
			$this->sim_model->UpdateData('user',$last_access,array('id_user' => $id));
			//mengupdate tanggal akses yang terbaru
			$new_access = array(
				'new_access' 	=> date("Y-m-d")
			);
			$this->sim_model->UpdateData('user',$new_access,array('id_user' => $id));
			//menyimpn data user sementara
			$this->session->set_userdata(array ('id_user'=>$dataLogin[0]['id_user'],'namauser'=>$dataLogin[0]['username'],'fulluser'=>$dataLogin[0]['fullname'],'status'=>$dataLogin[0]['status_user'], 'level'=>$dataLogin[0]['level']));//namauser=nama session, yang di isi username.y
			//mengalihkan kehalaman admin
			if ($status == 'aktif'){
				redirect('ad_home');
			}else{
				redirect('index');
			}
		}
	}
//Fungsi untuk keluar dari sistem ----------------------------------------------------------------
	public function logout(){
		//mengeluarkan data username
		$this->session->unset_userdata('namauser'); 
		//menghapus history login
		$this->session->sess_destroy();
		//mengembalikan ke halaman login
		redirect('');
	}
}