<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Simotko extends CI_Controller{
// Load Database ================================================================ Start >
	public function __construct() {
		parent :: __construct();
		$this->load->model('sim_model');
	}

	public function index(){
		include 'extend_function/header_data.php';
		include 'extend_function/profil_bar.php';
		
		$data = array(
			'title' 		=> 'SIMOTKO',
			'part'			=> 'home',
			'sub_part'		=> '',
			'form'			=> 'index',
			'id_button'		=> '',
			'content'		=> $this->sim_model->GetData('posisi')->result_array()
			
		);

		$level = $this->db->get('posisi');		
		$data['dataLevel'] = $level->result_array();

		$jumlahMp = $this->db->get('man_power');		
		$data['jumlahMp'] = $jumlahMp->num_rows();

		$jumlahMpPerPosisi = array();

		foreach ($level->result() as $rowLevel) {		
			$jumlahMpPerPosisi[$rowLevel->nama_posisi] = array();

			$queryGroup = $this->db->get_where('man_power', array('id_posisi' => $rowLevel->id_posisi));
			foreach ($queryGroup->result() as $rowGroup) {
				$querySiswa = $this->db->get_where('man_power', array('id_posisi' => $rowGroup->id_posisi));
				$jumlahMpPerPosisi[$rowLevel->nama_posisi][$rowGroup->id_posisi] = $querySiswa->num_rows();				
			}
		}
		$jsonStrDataPosisi = array();
		foreach ($level->result() as $rowLevel) {
			$tempTotalSiswaPerLevel = 0;
			foreach ($jumlahMpPerPosisi[$rowLevel->nama_posisi] as $rowTotalSiswaGroup) {
				$tempTotalSiswaPerLevel += (int) $rowTotalSiswaGroup;
			}
			$jsonStrDataPosisi[$rowLevel->nama_posisi] = $tempTotalSiswaPerLevel;
		}
		$data['jsonStrDataPosisi'] = json_encode($jsonStrDataPosisi);


		$this->load->view('simotko/template/header',$data,$data1);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');	
	}	
	public function search(){
		$user=$this->input->post('user');
		$where = "fullname like '%" . $user . "%'";
		include 'extend_function/profil_bar.php';		
		$data = array(
			'title' 		=> 'Search ',
			'part'			=> 'search',
			'sub_part'		=> 'search',
			'form'			=> 'index',
			'id_button'		=> '',
			'content'		=> $this->sim_model->GetDataUser($where)->result_array(),
			'hasil'			=> $user
		);
		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}
}
