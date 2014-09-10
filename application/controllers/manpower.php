<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manpower extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}
	public function upload_foto_baru(){
		$config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '500';
        $config['max_width'] = '400';
        $config['max_height'] = '600';
  
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors()); 			
 			return false; 
        } 
        else {
            $data = array('upload_data' => $this->upload->data());
            $this->fotopath = $data['upload_data']['file_name'];
 			return true;
 		}
 	}
	public function index($kode) {

		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetData("posisi where id_posisi = $kode")->result_array();
		$kode_pos	= $temp[0]["id_posisi"];
		$posisi 	= $temp[0]["nama_posisi"];
		if ($lvl=='team leader') {
			$content 	= $this->sim_model->GetDataMp("posisi.id_posisi = $kode AND user.id_user= $pengguna order by nik_mp DESC");	
		}else{
			$content 	= $this->sim_model->GetDataMp("posisi.id_posisi = $kode order by nik_mp DESC");	
		}
		$cont 	= $this->sim_model->GetDataMp("posisi.id_posisi = $kode order by nik_mp DESC");
		$group 	= $this->sim_model->GetDataMpGroup0("area.id_tl","man_power.id_posisi = $kode");
		$data = array(
			'title' 		=> 'Manage '.$posisi,
			'part'			=> 'mp',
			'sub_part'		=> 'mp_sub',
			'form'			=> 'index',
			'posisi_tmp'	=> $posisi,
			'kode_tmp'		=> $kode_pos,
			'id_button'		=> $kode_pos,
			'button'		=> 'Add New '.$posisi,
			'access'		=> 'a2_mp',
			'submit'		=> 'Submit',
			'tl_set' 		=> $this->sim_model->GetDataTL()->result_array(),
			'status_set'	=> $this->sim_model->GetData('gaji')->result_array(),
			'posisi_set'	=> $this->sim_model->GetData('posisi')->result_array(),
			'area_set'		=> $this->sim_model->GetData('area')->result_array(),
			'content'		=> $content->result_array()
		);
			
		$data['dataLevel'] = $cont->result_array();
		$data['jumlahCont'] = $cont->num_rows();
		
		$data['jumlahGroup'] = $group->num_rows();
		$TotalGroup = array();

		foreach ($cont->result() as $rowLevel) {		
			$TotalGroup[$rowLevel->fullname] = array();

			$queryGroup = $this->db->get_where('area', array('id_tl' => $rowLevel->id_tl));
			foreach ($queryGroup->result() as $rowGroup) {
				$query = $this->db->get_where('man_power', array('id_area' => $rowGroup->id_area,'id_posisi'=> $rowLevel->id_posisi));
				$TotalGroup[$rowLevel->fullname][ $rowGroup->id_area] = $query->num_rows();				
			}
		}
		$jsonData = array();
		foreach ($cont->result() as $rowLevel) {
			$tempTotalCont = 0;
			foreach ($TotalGroup[$rowLevel->fullname] as $rowTotalSiswaGroup) {
				$tempTotalCont += (int) $rowTotalSiswaGroup;
			}
			$jsonData[$rowLevel->fullname] = $tempTotalCont;
		}
		$data['jsonData'] = json_encode($jsonData);

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit($kode) {
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetDataMp("man_power.nik_mp = $kode")->result_array();
		$cek = $this->sim_model->GetData("man_power where nik_mp = $kode")->result_array();
		$kode_pos= $temp[0]['id_posisi'];
		$posisi= $temp[0]['nama_posisi'];
		$data = array(
			'title' 		=> 'Manage '.$temp[0]['nama_mp'],
			'part'			=> 'mp',
			'sub_part'		=> 'mp_sub',
			'form'			=> 'edit',
			'direct'		=> 'Manage '.$posisi,
			'posisi_tmp'	=> $posisi,
			'kode_tmp'		=> $kode_pos,
			'link_direct'	=> 'mp_ad/'.$kode_pos,
			'access'		=> 'ea_mp',
			'read'			=> 'readonly',
			'submit'		=> 'Update',
			'id_button'		=> $kode_pos,
			'nik' 			=> $temp[0]['nik_mp'],	
			'id_area'		=> $temp[0]['id_area'],
			'area' 			=> $temp[0]['nama_area'],
			'tl' 			=> $temp[0]['fullname'],
			'nama' 			=> $cek[0]['nama_mp'],
			'alamat' 		=> $cek[0]['alamat_mp'],
			'tgl' 			=> $cek[0]['tanggal_masuk'],
			'status' 		=> $temp[0]['jenis_gaji'],
			'phone'			=> $cek[0]['telephone'],
			'ktp' 			=> $temp[0]['no_ktp'],
			'foo' 			=> $cek[0]['foto_mp'],
			'posisi'		=> $posisi,
			'id_posisi'		=> $kode_pos,
			'tl_set' 		=> $this->sim_model->GetDataTL()->result_array(),
			'status_set'	=> $this->sim_model->GetData('gaji')->result_array(),
			'posisi_set'	=> $this->sim_model->GetData('posisi')->result_array(),
			'area_set'		=> $this->sim_model->GetData('area')->result_array(),
			'content'		=> $this->sim_model->GetDataMp("man_power.id_posisi = $kode_pos order by nik_mp DESC")->result_array()
		);

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}
	public function view($kode) {
		include 'extend_function/profil_bar.php';
		$temp = $this->sim_model->GetDataMp("man_power.nik_mp = $kode")->result_array();
		$cek = $this->sim_model->GetData("man_power where nik_mp = $kode")->result_array();
		$kode_pos= $temp[0]['id_posisi'];
		$posisi= $temp[0]['nama_posisi'];
		$data = array(
			'title' 		=> 'View '.$temp[0]['nama_mp'],
			'part'			=> 'mp',
			'sub_part'		=> 'mp_sub',
			'form'			=> 'view',
			'direct'		=> 'Manage '.$posisi,
			'posisi_tmp'	=> $posisi,
			'kode_tmp'		=> $kode_pos,
			'link_direct'	=> 'mp_ad/'.$kode_pos,
			'id_button'		=> $kode_pos,
			'nik' 			=> $temp[0]['nik_mp'],	
			'id_area'		=> $temp[0]['id_area'],
			'area' 			=> $temp[0]['nama_area'],
			'tl' 			=> $temp[0]['fullname'],
			'nama' 			=> $cek[0]['nama_mp'],
			'alamat' 		=> $cek[0]['alamat_mp'],
			'tgl' 			=> $cek[0]['tanggal_masuk'],
			'status' 		=> $temp[0]['jenis_gaji'],
			'phone'			=> $cek[0]['telephone'],
			'ktp' 			=> $temp[0]['no_ktp'],
			'foo' 			=> $cek[0]['foto_mp'],
			'posisi'		=> $posisi,
			'id_posisi'		=> $kode_pos,
			'tl_set' 		=> $this->sim_model->GetDataTL()->result_array(),
			'status_set'	=> $this->sim_model->GetData('gaji')->result_array(),
			'posisi_set'	=> $this->sim_model->GetData('posisi')->result_array(),
			'area_set'		=> $this->sim_model->GetData('area')->result_array(),
			'content'		=> $this->sim_model->GetDataMp("man_power.id_posisi = $kode_pos order by nik_mp DESC")->result_array()
		);

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}
	
	public function add_action() {	
		
		$nik 	= $_POST['nik'];
		$nama 	= $_POST['nama'];
		$alamat	= $_POST['alamat'];			
		$phone 	= $_POST['phone'];					
		$ktp 	= $_POST['ktp'];
		$tgl 	= $_POST['tgl'];
		$status = $_POST['status'];
		$posisi = $_POST['posisi'];
		$area 	= $_POST['area'];		
		
		
		$valid	= $this->sim_model->GetData('man_power',"where nik_mp = $nik")->result_array();
		if(!empty($valid)){
			$this->session->set_flashdata('warning',true);
			redirect('mp_ad/'.$posisi);
		}
		$this->upload_foto_baru();
		if(!empty($this->fotopath)){				
			$fotopaths = $this->fotopath; 
			$data 	= array(
				'nik_mp' 		=> $nik,	
				'id_area' 		=> $area,
				'id_gaji' 		=> $status,
				'nama_mp' 		=> $nama,
				'foto_mp'		=> $fotopaths,
				'alamat_mp' 	=> $alamat,
				'tanggal_masuk' => $tgl,
				'telephone' 	=> $phone,
				'no_ktp' 		=> $ktp,
				'id_posisi'		=> $posisi
			);
		}else{
			$data 	= array(
				'nik_mp' 		=> $nik,	
				'id_area' 		=> $area,
				'id_gaji'	 	=> $status,
				'nama_mp' 		=> $nama,
				'alamat_mp' 	=> $alamat,
				'tanggal_masuk' => $tgl,
				'telephone' 	=> $phone,
				'no_ktp' 		=> $ktp,
				'id_posisi'		=> $posisi
			);
		}
		$result = $this->sim_model->InsertData('man_power',$data);
		if($result){
			$this->session->set_flashdata('success',true);
			redirect('mp_ad/'.$posisi);					
		}else{
			redirect('mp_ad/'.$posisi);
		}	
	}

	public function edit_action() {	
		
		$nik 	= $_POST['nik'];
		$nama 	= $_POST['nama'];
		$alamat	= $_POST['alamat'];			
		$phone 	= $_POST['phone'];					
		$ktp 	= $_POST['ktp'];
		$tgl 	= $_POST['tgl'];
		$status = $_POST['status'];
		$posisi = $_POST['posisi'];
		$area 	= $_POST['area'];	
		
		$temp 	= $this->sim_model->GetData('man_power',"where nik_mp = $nik")->result_array();			
		$this->upload_foto_baru(); 
		if(!empty($this->fotopath))  {			
			unlink('./assets/file/'.$temp[0]['foto_mp']);
			$fotopaths = $this->fotopath;
			$data 	= array(	
				'id_area' 		=> $area,
				'nama_mp' 		=> $nama,
				'foto_mp'		=> $fotopaths,
				'alamat_mp' 	=> $alamat,
				'tanggal_masuk' => $tgl,
				'id_gaji' 		=> $status,
				'telephone' 	=> $phone,
				'no_ktp' 		=> $ktp,
				'id_posisi'		=> $posisi
			);
		}else{
			$data 	= array(	
				'id_area' 		=> $area,
				'nama_mp' 		=> $nama,
				'alamat_mp' 	=> $alamat,
				'tanggal_masuk' => $tgl,
				'id_gaji' 		=> $status,
				'telephone' 	=> $phone,
				'no_ktp' 		=> $ktp,
				'id_posisi'		=> $posisi
			);
		}
		
		$result = $this->sim_model->UpdateData('man_power',$data,array('nik_mp' => $nik));
		if($result){
			$this->session->set_flashdata('ubah',true);
			redirect('mp_ed/'.$nik);			
		}else{
			redirect('mp_ed/'.$nik);
		}
	}

	public function delete_action($nik) //fungsi delete user----
	{

		$temp 	= $this->sim_model->GetData('man_power',"where nik_mp = $nik")->result_array();			
		$foto 	= $temp[0]['foto_mp'];
		$posisi	= $temp[0]['id_posisi'];
		if(!empty($foto)){
			unlink('./assets/file/'.$foto);
		}
		
		$result = $this->sim_model->DeleteData('man_power',array('nik_mp' => $nik));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('mp_ad/'.$posisi);			
		}else{
			redirect('mp_ad/'.$posisi);
		}
	}

}