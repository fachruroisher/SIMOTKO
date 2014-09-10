<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class presensi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}
	public function index() {
		include 'extend_function/profil_bar.php';
		$data = array(
			'title' 		=> 'Presensi',
			'part'			=> 'presensi',
			'sub_part'		=> 'presensi',
			'form'			=> 'index',
			'id_button'		=> 'pres',
			'button'		=> 'Upload Presensi',
			'access'		=> 'pm_add',
			'submit'		=> 'Go',
			'val0'			=> $this->sim_model->GetData('posisi')->result_array(),
			'val1'			=> $this->sim_model->GetData('area')->result_array(),
			'val2'			=> $this->sim_model->GetData('shift')->result_array(),
			'content'		=> $this->sim_model->GetDataRP()->result_array()
		);	
		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}
	public function add() {

		include 'extend_function/profil_bar.php';
		$data = array(
			'title' 		=> 'Presensi',
			'part'			=> 'presensi',
			'sub_part'		=> 'presensi',
			'form'			=> 'add',
			'id_button'		=> 'pres',
			'access'		=> 'a2_pm',
			'submit'		=> 'Submit',
			'area' 			=> $this->sim_model->GetData("area where id_area= $_POST[area]")->result_array(),
			'shift'			=> $this->sim_model->GetData("shift where id_shift= $_POST[shift]")->result_array(),
			'posisi'		=> $this->sim_model->GetData("posisi where id_posisi= $_POST[posisi]")->result_array(),	
			'mp_st'			=> $this->sim_model->GetData("man_power where id_area= $_POST[area] AND id_posisi= $_POST[posisi]")->result_array(),
			'content'		=> $this->sim_model->GetDataRP()->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit($kode,$id){
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetDataRP("man_power.id_area = $id AND tanggal='$kode'")->result_array();
		$data = array(
			'title' 		=> 'Edit Presensi',
			'part'			=> 'presensi',
			'sub_part'		=> 'presensi',
			'form'			=> 'edit',
			'direct'		=> 'presensi',
			'link_direct'	=> 'pm_ad',
			'position'		=> 'presensi',
			'access'		=> 'ea_pm',
			'read'			=> 'readonly',
			'submit'		=> 'Update',
			'id_button'		=> '',
			'statususr' 	=> $temp[0]['status_presensi'],
			'shift'			=> $temp[0]['shift'],
			'tanggal'		=> $temp[0]['tanggal'],
			'nama'			=> $temp[0]['nama_mp'],
			'area' 			=> $this->sim_model->GetData("area where id_area= ".$temp[0]['id_area'])->result_array(),
			'shift'			=> $this->sim_model->GetData("shift where id_shift= ".$temp[0]['shift'])->result_array(),
			'posisi'		=> $this->sim_model->GetData("posisi where id_posisi= ".$temp[0]['id_posisi'])->result_array(),	
			'mp_st'			=> $temp,
			'get_tl'		=> $this->sim_model->GetData('team_leader')->result_array(),
			'content'		=> $this->sim_model->GetDataRP()->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function view($kode,$id){
		include 'extend_function/profil_bar.php';
		$v 		= $this->sim_model->GetDataRP("man_power.id_area = $id AND tanggal='$kode'");
		$temp 	= $v->result_array();
		$data 	= array(
			'title' 		=> 'View Presensi',
			'part'			=> 'presensi',
			'sub_part'		=> 'presensi',
			'form'			=> 'view',
			'direct'		=> 'presensi',
			'nav'			=> 'active',
			'link_direct'	=> 'pm_ad',
			'access'		=> 'ea_pm',
			'read'			=> 'readonly',
			'submit'		=> 'Update',
			'id_button'		=> '',
			'statususr' 	=> $temp[0]['status_presensi'],
			'shift'			=> $temp[0]['shift'],
			'id_area'		=> $id,
			'tanggal'		=> $temp[0]['tanggal'],
			'nama'			=> $temp[0]['nama_mp'],
			'area' 			=> $this->sim_model->GetData("area where id_area= ".$temp[0]['id_area'])->result_array(),
			'mp_st'			=> $temp,
			'ada'			=> $v,
			'sts'			=> $this->sim_model->GetData("gaji")->result_array(),
			'get_tl'		=> $this->sim_model->GetData('team_leader')->result_array(),
			'content'		=> $this->sim_model->GetDataRP()->result_array()
		);
		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}
	public function cetak($kode,$id){
		include 'extend_function/profil_bar.php';
		$temp0 = $this->sim_model->GetDataRP("man_power.id_area = $id AND tanggal='$kode'");
		
		$temp = $temp0->result_array();
		$data = array(
			'title' 		=> 'Print Presensi '.$temp[0]['tanggal'],
			'form'			=> 'CetakPM',
			'statususr' 	=> $temp[0]['status_presensi'],
			'shift'			=> $temp[0]['shift'],
			'tanggal'		=> $temp[0]['tanggal'],
			'nama'			=> $temp[0]['nama_mp'],
			'area' 			=> $this->sim_model->GetData("area where id_area= ".$temp[0]['id_area'])->result_array(),
			'mp_st'			=> $temp,
			'id_area'		=> $id,
			'sts'			=> $this->sim_model->GetData("gaji")->result_array(),
			'total_hadir'	=> $temp0->num_rows(),
			'get_tl'		=> $this->sim_model->GetData('team_leader')->result_array(),
			'content'		=> $this->sim_model->GetDataRP()->result_array()
		);
		$this->load->view('simotko/print',$data);
	}

	public function add_action() {	
		$tanggal	= $_POST['tgl'];
		$area 		= $_POST['area'];
		$shift 		= $_POST['shift'];
		
		$valid = $this->sim_model->GetData("presensi where tanggal= '$tanggal' AND nik_mp='$mp' AND shift='$shift'")->result_array();
		if(!empty($valid)){
			$this->session->set_flashdata('warning',true);
			redirect('pm_add');
		}
		
		
		$result = array();
		foreach ($_POST['nik'] as $key=>$val) {
			if(!empty($_POST['status'][$key])){
				$status = 'hadir';
			}else{
				$status = 'tidak';
			};

			$data = array(
				'nik_mp'			=> $_POST['nik'][$key],
				'status_presensi'	=> $status,
				'tanggal'			=> $tanggal,
				'shift'				=> $shift
			);
			$result = $this->sim_model->InsertData('presensi',$data);
		}
		
		if($result){
			header("location:".site_url().'/pm_ad');					
		}else{
			echo "<h2>Operasi Tambah Data Gagal !!!</h2><br><a href='".base_url()."'>Kembali ke Halaman sebelumnya</a>";
		}
	}

	public function edit_action() {
			$tgl 	= $_POST['tgl'];
			$area 	= $_POST['area'];

		foreach ($_POST['idp'] as $key => $value) {
			$kode = $_POST['idp'][$key];
			if(!empty($_POST['status'][$key])){
				$status = 'hadir';
			}else{
				$status = 'tidak';
			};
			$data = array(
				'tanggal'			=> $tgl,
				'status_presensi'	=> $status,
			);
			//print_r($_POST['idp'][$key]);
			$result = $this->sim_model->UpdateData('presensi',$data,array('id_presensi' => $kode));
		}	
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('pm_ad/'.$tgl.'/'.$area);
		}else{
			redirect('pm_ad/'.$tgl.'/'.$area);
		}
	}

	public function delete_action($tgl,$area) {
		$val1	= $this->sim_model->GetDataRP("tanggal = '$tgl' AND man_power.id_area= $area")->result_array();
		foreach ($val1 as $key) {
			$result = $this->sim_model->DeleteData('presensi',array('nik_mp' => $key['nik_mp']));
		}
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('pm_ad');
		}else{
			redirect('pm_ad');
		}
	}
	

}