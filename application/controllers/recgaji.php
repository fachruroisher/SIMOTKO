<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class recgaji extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function index() {
		include 'extend_function/profil_bar.php';
		$data = array(
			'title' 		=> 'Record Gaji',
			'part'			=> 'record gaji',
			'sub_part'		=> 'record gaji',
			'form'			=> 'index',
			'id_button'		=> 'rg',
			'button'		=> 'Cetak Gaji',
			'access'		=> 'add_rg',
			'submit'		=> 'Cetak',
			'area'			=> $this->sim_model->GetData('area')->result_array(),	
			'content'		=> $this->sim_model->totalGaji()->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function hasil($area,$bln,$thn){
		include 'extend_function/profil_bar.php';
		$a = $this->sim_model->totalGaji("man_power.id_area = $area","bulan_penerimaan = $bln","tahun_penerimaan = $thn")->result_array();
		$bulan = $bln;
				if($bulan==01){
                    $c = "Januari";
                }elseif ($bulan==02) {
                    $c = "Februari";
                }elseif ($bulan==03) {
                    $c = "Maret";
                }elseif ($bulan==04) {
                    $c = "April";
                }elseif ($bulan==05) {
                    $c = "Mei";
                }elseif ($bulan==06) {
                    $c = "Juni";
                }elseif ($bulan==07) {
                    $c = "Juli";
                }elseif ($bulan==08) {
                    $c = "Agustus";
                }elseif ($bulan==09) {
                    $c = "September";
                }elseif ($bulan==10) {
                    $c = "Oktober";
                }elseif ($bulan==11) {
                    $c = "November";
                }elseif ($bulan==12) {
                    $c = "Desember";
                }
		$data = array(
			'title' 		=> 'Record Gaji',
			'part'			=> 'record gaji',
			'sub_part'		=> 'record gaji',
			'form'			=> 'hasil',
			'direct'		=> 'Record Gaji',
			'link_direct'	=> 'rg_ad',
			'id_button'		=> '',
			'access'		=> 'add_rg',
			'submit'		=> 'Cetak',
			'teamleader'	=> $a[0]['fullname'],
			'area'			=> $a[0]['nama_area'],
			'bulan'			=> $c,
			'tahun'			=> $thn,
			'total'			=> $a,
			'content'		=> $this->sim_model->totalGaji()->result_array()
		);	

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function cetak($area,$bln,$thn){
		include 'extend_function/profil_bar.php';
		$a = $this->sim_model->totalGaji("man_power.id_area = $area","bulan_penerimaan = $bln","tahun_penerimaan = $thn")->result_array();
		$bulan = $bln;
				if($bulan==01){
                    $c = "Januari";
                }elseif ($bulan==02) {
                    $c = "Februari";
                }elseif ($bulan==03) {
                    $c = "Maret";
                }elseif ($bulan==04) {
                    $c = "April";
                }elseif ($bulan==05) {
                    $c = "Mei";
                }elseif ($bulan==06) {
                    $c = "Juni";
                }elseif ($bulan==07) {
                    $c = "Juli";
                }elseif ($bulan==08) {
                    $c = "Agustus";
                }elseif ($bulan==09) {
                    $c = "September";
                }elseif ($bulan==10) {
                    $c = "Oktober";
                }elseif ($bulan==11) {
                    $c = "November";
                }elseif ($bulan==12) {
                    $c = "Desember";
                }
		$data = array(
			'title' 		=> 'Print Gaji',
			'form'			=> 'CetakGaji',
			'teamleader'	=> $a[0]['fullname'],
			'area'			=> $a[0]['nama_area'],
			'bulan'			=> $c,
			'tahun'			=> $thn,
			'content'		=> $a
		);
		$this->load->view('simotko/print',$data);
	}

	public function add_action() {		
		$area 	= $this->input->post('area');
		$bulan0 = $this->input->post('bulan');
		$bulan 	= '-'.$bulan0.'-';			
		$tahun0 = $this->input->post('tahun');
		$tahun 	= $tahun0.'-';
		$cek_presensi = $this->sim_model->rgData("man_power.id_area = $area",$bulan,$tahun);
		$data = $cek_presensi->result_array();
		if (empty($data)) {
			$this->session->set_flashdata('kosong',true);
			redirect('rg_ad');
		}else{
			foreach ($data as $key) { 
				$tot = $this->sim_model->rgSum("presensi.nik_mp = ".$key['nik_mp'],'nominal')->result_array();
				$data = array(
					'total_gaji'	=> $tot[0]['nominal'],
					'nik_mp'		=> $key['nik_mp'],
					'bulan_penerimaan' => $bulan0,
					'tahun_penerimaan' => $tahun
				);
				$validasi = $this->sim_model->GetDataArray("total_gaji",$data)->result_array();
				if(empty($validasi)){					
					$result = $this->sim_model->InsertData('total_gaji',$data);
				}else{
					$this->session->set_flashdata('warning',true);
					redirect('rg_ad');
				}
			}			
			if ($result) {
				redirect('rg_cetak/'.$area.'/'.$bulan0.'/'.$tahun0);
			}
		}		
	}
}