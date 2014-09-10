<?php
	$status0 = ucfirst($this->session->userdata('id_user'));
	$fc = $this->sim_model->GetData('user',"where id_user = '$status0'")->result_array();
	$info = $this->sim_model->GetDataInf1()->result_array();
	$pengguna = $fc[0]['id_user'];
	if ($fc[0]['level']=='team leader') {
		$tl = $this->sim_model->GetData("team_leader where id_user = $pengguna")->result_array();
		$tl = $tl[0]['id_tl'];
	}
	
	$lvl = $fc[0]['level'];
	$sys = $this->sim_model->GetData('sistem where id_sistem=1')->result_array();		

	$data0 = array(			
		'show_kode' 	=> $fc[0]['id_user'],
		'show_nama' 	=> $fc[0]['fullname'],
		'show_nik' 		=> $fc[0]['username'],
		'show_status' 	=> $fc[0]['status_user'],
		'last_access' 	=> $fc[0]['last_access'],
		'show_level' 	=> $fc[0]['level'],
		'show_foto' 	=> $fc[0]['foto'],
		'idsis'			=> $sys[0]['id_sistem'],
		'namsis'		=> $sys[0]['nama_sistem'],
		'desis'			=> $sys[0]['deskripsi_sistem'],
		'tagsis'		=> $sys[0]['tag_sistem'],
		'cnsis'			=> $sys[0]['company_name'],
		'casis'			=> $sys[0]['company_address'],
		'csis'			=> $sys[0]['company_site'],
		'cpsis'			=> $sys[0]['company_phone'],
		'wpsis'			=> $sys[0]['welcome_page'],
		'bgsis'			=> $sys[0]['bg_login'],
		'ps'			=> $this->sim_model->GetData('posisi')->result_array(),
		'show_info'		=> $info[0]['keterangan'],
		'show_posted'	=> $info[0]['fullname'],
		'show_stinfo'	=> $info[0]['status_info'],
		'guide_set'		=> $this->sim_model->GetData("guide")->result_array(),
		'doc_set'		=> $this->sim_model->GetData("document LIMIT 5")->result_array(),
		'info_set'		=> $this->sim_model->GetDataInf8()->result_array()
	);