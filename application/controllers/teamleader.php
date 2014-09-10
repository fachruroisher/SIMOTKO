<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teamleader extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function upload_foto_baru(){
		$config['upload_path'] = './assets/file/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '1000';
        $config['max_height'] = '1000';
  
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
 	public function index() {
		include 'extend_function/profil_bar.php';
		$data = array(
			'title'			=> 'Team Leader',
			'part'			=> 'tl',
			'sub_part'		=> 'tl',
			'form'			=> 'index',
			'id_button'		=> '',
			'content' 		=> $this->sim_model->GetData('user',"where level = 'team leader' order by id_user DESC")->result_array()
		);

		$level = $this->sim_model->GetDataTL();		
		$data['dataLevel'] = $level->result_array();
		$data['jumlahTL'] = $level->num_rows();

		$jumlahMp = $this->db->get('area');		
		$data['jumlahMp'] = $jumlahMp->num_rows();

		$jumlahMpPerPosisi = array();

		foreach ($level->result() as $rowLevel) {		
			$jumlahMpPerPosisi[$rowLevel->fullname] = array();

			$queryGroup = $this->db->get_where('area', array('id_tl' => $rowLevel->id_tl));
			foreach ($queryGroup->result() as $rowGroup) {
				$querySiswa = $this->db->get_where('area', array('id_tl' => $rowGroup->id_tl));
				$jumlahMpPerPosisi[$rowLevel->fullname][$rowGroup->id_tl] = $querySiswa->num_rows();				
			}
		}
		$jsonStrDataPosisi = array();
		foreach ($level->result() as $rowLevel) {
			$tempTotalSiswaPerLevel = 0;
			foreach ($jumlahMpPerPosisi[$rowLevel->fullname] as $rowTotalSiswaGroup) {
				$tempTotalSiswaPerLevel += (int) $rowTotalSiswaGroup;
			}
			$jsonStrDataPosisi[$rowLevel->fullname] = $tempTotalSiswaPerLevel;
		}
		$data['jsonStrDataPosisi'] = json_encode($jsonStrDataPosisi);


		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}
	public function edit($kode) {
		include 'extend_function/profil_bar.php';
		$tlj	= $this->sim_model->GetDataTL("user.id_user = $kode")->result_array();		
		$set_a 	= $tlj[0]['id_tl'];
		
		$data = array(
			'title' 		=> 'Edit TL '.$tlj[0]['fullname'],
			'part'			=> 'tl',
			'sub_part'		=> 'tl',
			'form'			=> 'edit',
			'direct'		=> 'Team Leader',
			'id_button'		=> '',
			'link_direct'	=> 'tl_ad',
			'access'		=> 'eat_ad',
			'submit'		=> 'Update',
			'kode'			=> $tlj[0]['id_user'],
			'fullname'		=> $tlj[0]['fullname'],
			'username'		=> $tlj[0]['username'],
			'mail'			=> $tlj[0]['email'],
			'phone'			=> $tlj[0]['telephone'],
			'foto'			=> $tlj[0]['foto'],
			'tgl'			=> $tlj[0]['tanggal_lahir'],
			'tpl'			=> $tlj[0]['tempat_lahir'],
			'alamat'		=> $tlj[0]['alamat'],
			'tgm'			=> $tlj[0]['tanggal_masuk'],
			'wk_id'			=> $tlj[0]['id_wilayah'],
			'wk'			=> $tlj[0]['nama_wilayah'],
			'wilayah_set'	=> $this->sim_model->GetData('wilayah')->result_array(),
			'area_set'		=> $this->sim_model->GetData('area',"where id_tl= $set_a")->result_array(),
			'content' 		=> $this->sim_model->GetData('user',"where level = 'team leader' order by id_user DESC")->result_array()
		);

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}
	public function view($kode) {
		include 'extend_function/profil_bar.php';
		$tlj	= $this->sim_model->GetDataTL("user.id_user = $kode")->result_array();		
		$set_a 	= $tlj[0]['id_tl'];
		$data = array(
			'title' 		=> 'View TL '.$tlj[0]['fullname'],
			'part'			=> 'tl',
			'sub_part'		=> 'tl',
			'form'			=> 'view',
			'direct'		=> 'Team Leader',
			'id_button'		=> '',
			'link_direct'	=> 'tl_ad',
			'kode'			=> $tlj[0]['id_user'],
			'fullname'		=> $tlj[0]['fullname'],
			'username'		=> $tlj[0]['username'],
			'mail'			=> $tlj[0]['email'],
			'phone'			=> $tlj[0]['telephone'],
			'foto'			=> $tlj[0]['foto'],
			'tgl'			=> $tlj[0]['tanggal_lahir'],
			'tpl'			=> $tlj[0]['tempat_lahir'],
			'alamat'		=> $tlj[0]['alamat'],
			'tgm'			=> $tlj[0]['tanggal_masuk'],
			'wk_id'			=> $tlj[0]['id_wilayah'],
			'wk'			=> $tlj[0]['nama_wilayah'],	
			'wilayah_set'	=> $this->sim_model->GetData('wilayah')->result_array(),
			'area_set'		=> $this->sim_model->GetData('area',"where id_tl= $set_a")->result_array(),
			'content' 		=> $this->sim_model->GetData('user',"where level = 'team leader' order by id_user DESC")->result_array()
		);

		$this->load->view('simotko/template/header',$data);
		$this->load->view('simotko/home',$data0,$data);
		$this->load->view('simotko/template/footer');
	}

	public function edit_action() {
		$kode 		= $_POST['kode'];
		$mail 		= $_POST['email'];
		$fullname	= $_POST['nama'];
		$phone 		= $_POST['digits'];			
		$tgl_lahir 	= $_POST['birth'];					
		$tmp_lahir 	= $_POST['born'];
		$alamat 	= $_POST['alamat'];
		$tgl_masuk 	= $_POST['masuk'];
		$wilayah 	= $_POST['wilayah'];
		$this->upload_foto_baru();
			if(!empty($this->fotopath))  {
				$temp 	= $this->sim_model->GetData('user',"where id_user = $kode")->result_array();		
				unlink('./assets/file/'.$temp[0]['foto']);
				$fotopaths = $this->fotopath;
				$dataUser = array(
					'fullname'	=> $fullname,
					'email' 	=> $mail,
					'telephone' => $phone,
					'foto' 		=> $fotopaths
				);
				$dataTL = array(
					'tanggal_lahir' => $tgl_lahir,
					'tempat_lahir' 	=> $tmp_lahir,
					'alamat' 		=> $alamat,
					'tanggal_masuk' => $tgl_masuk,
					'id_wilayah' => $wilayah,
				);
			}else{
				$dataUser = array(
					'fullname'	=> $fullname,
					'email' 	=> $mail,
					'telephone' => $phone
				);
				$dataTL = array(
					'tanggal_lahir' => $tgl_lahir,
					'tempat_lahir' 	=> $tmp_lahir,
					'alamat' 		=> $alamat,
					'tanggal_masuk' => $tgl_masuk,
					'id_wilayah' 	=> $wilayah
				);
			}
		
		$result = $this->sim_model->UpdateData('user',$dataUser,array('id_user' => $kode));
			
		$leader = $this->sim_model->UpdateData('team_leader',$dataTL,array('id_user' => $kode));
			if($leader){
				$this->session->set_flashdata('ubah',true);
				redirect('tl_ad/'.$kode);
			}else{
				redirect('tl_ad/'.$kode);
		}
	}
	public function delete_action($kode) {

		$temp 	= $this->sim_model->GetData('user',"where id_user = $kode")->result_array();			
		$foto 	= $temp[0]['foto'];
		if(!empty($foto)){
			unlink('./assets/file/'.$foto);
		}
		$this->sim_model->DeleteData('user',array('id_user'=> $kode));
		$result = $this->sim_model->DeleteData('team_leader',array('id_user' => $kode));
		if($result){
			$this->session->set_flashdata('hapus',true);
			redirect('tl_ad');			
		}else{
			redirect('tl_ad');			
		}
	}

}