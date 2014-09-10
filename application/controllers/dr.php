<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dr extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function index() {
		include 'extend_function/profil_bar.php';
		if($lvl=='team leader'){
			$content = $this->sim_model->GetDataDR("daily_report.id_tl = $tl ")->result_array();
		}else{
			$content = $this->sim_model->GetDataDR()->result_array();
		}
		$data = array(
			'title' 		=> 'Daily Report',
			'part'			=> 'dr',
			'sub_part'		=> 'dr',
			'form'			=> 'index',
			'id_button'		=> 'doc',
			'button'		=> 'Post Report',
			'access'		=> 'a2_vd',
			'id_tl'			=> $pengguna,
			'submit'		=> 'Upload',
			'content'		=> $content
		);
		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}	
	public function edit($tgl,$tl) {
		include 'extend_function/profil_bar.php';
		if($lvl=='team leader'){
			$content = $this->sim_model->GetDataDR("daily_report.id_tl = $tl ")->result_array();
		}else{
			$content = $this->sim_model->GetDataDR()->result_array();
		}	
		$data = array(
			'title' 		=> 'Edit Daily Report',
			'part'			=> 'dr',
			'sub_part'		=> 'dr',
			'form'			=> 'edit',
			'direct'		=> 'Daily Report',
			'link_direct'	=> 'vd_ad',
			'id_button'		=> 'doc',
			'access'		=> 'ea_vd',
			'tanggal'		=> $tgl,
			'tl'			=> $tl,
			'submit'		=> 'Submit',
			'content'		=> $content,
			'daily_set'		=> $this->sim_model->GetDataDR0("tanggal = '$tgl' AND daily_report.id_tl='$tl'")->result_array()
			
		);
		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}
	public function view($tgl,$tl) {
		include 'extend_function/profil_bar.php';
		if($lvl=='team leader'){
			$content = $this->sim_model->GetDataDR("daily_report.id_tl = $tl ")->result_array();
		}else{
			$content = $this->sim_model->GetDataDR()->result_array();
		}	
		$data = array(
			'title' 		=> 'View Daily Report',
			'part'			=> 'dr',
			'sub_part'		=> 'dr',
			'form'			=> 'view',
			'direct'		=> 'Daily Report',
			'link_direct'	=> 'vd_ad',
			'id_button'		=> 'doc',
			'tanggal'		=> $tgl,
			'content'		=> $content,
			'daily_set'		=> $this->sim_model->GetDataDR0("tanggal = '$tgl' AND daily_report.id_tl='$tl'")->result_array()
		);
		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}
	public function add_action() {		
		$user = ucfirst($this->session->userdata('id_user'));
		$val	= $this->sim_model->GetData("team_leader where id_user = $user")->result_array();
		$tl 	= $val[0]['id_tl'];
		$tanggal	= $_POST['date2'];
		
		foreach ($_POST['mulai'] as $key=>$val) {
			$mulai = $_POST['mulai'][$key];
			$selesai = $_POST['selesai'][$key];

			$valid = $this->sim_model->GetData("daily_report where tanggal= '$tanggal' AND id_tl='$tl' AND jam_mulai = '$mulai' AND jam_selesai = '$selesai'")->result_array();
			if(!empty($valid)){
				$this->session->set_flashdata('warning',true);
				redirect('vd_ad');
			}
			$data = array(
				'jam_mulai'		=> $mulai,
				'jam_selesai'	=> $selesai,
				'keterangan'	=> $_POST['isi'][$key],
				'status_report'	=> $_POST['status'][$key],
				'tanggal'		=> $tanggal,
				'id_tl'			=> $tl

			);
			$result = $this->sim_model->InsertData('daily_report',$data);
		}
		
		if($result){
			$this->session->set_flashdata('success',true);
			redirect('vd_ad');							
		}else{
			redirect('vd_ad');							
		}
	}
	public function edit_action() {
		$tl 	= $_POST['tl'];
		$tgl = $_POST['tanggal'];

		foreach ($_POST['mulai'] as $key => $value) {
			$kode = $_POST['kode'][$key];
			$mulai = $_POST['mulai'][$key];
			$selesai = $_POST['selesai'][$key];

			$valid = $this->sim_model->GetData("daily_report where tanggal= '$gl' AND id_tl='$tl' AND jam_mulai = '$mulai' AND jam_selesai = '$selesai'")->result_array();
			if(!empty($valid)){
				$this->session->set_flashdata('warning',true);
				redirect('p_ad/'.$back);
			}
			$data = array(
				'jam_mulai'		=> $mulai,
				'jam_selesai'	=> $selesai,
				'keterangan'	=> $_POST['isi'][$key],
				'status_report'	=> $_POST['status'][$key],
			);
			$result = $this->sim_model->UpdateData('daily_report',$data,array('id_report' => $kode));
		}		
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('vd_ad/'.$tgl.'/'.$tl);
		}else{
			redirect('vd_ad/'.$tgl.'/'.$tl);
		}
	}
	public function delete_action0($kode) {
		$back	= $this->sim_model->GetData("daily_report where id_report=$kode")->result_array();
		$tgl	= $back[0]["tanggal"];
		$tl		= $back[0]["id_tl"];
		$result = $this->sim_model->DeleteData('daily_report',array('id_report' => $kode));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('vd_ad/'.$tgl.'/'.$tl);
		}else{
			redirect('vd_ad/'.$tgl.'/'.$tl);
		}
	}
	public function delete_action1($tgl,$kode) {
		$val1	= $this->sim_model->GetData("daily_report where tanggal = '$tgl' AND id_tl= $kode")->result_array();
		foreach ($val1 as $key) {
			$result = $this->sim_model->DeleteData('daily_report',array('id_report' => $key['id_report']));
		}
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('vd_ad');
		}else{
			redirect('vd_ad');
		}
		
	}

}