<?php
$sys = $this->sim_model->GetData('sistem where id_sistem=1')->result_array();		
$data1=array(
	'idsis'			=> $sys[0]['id_sistem'],
	'namsis'		=> $sys[0]['nama_sistem'],
	'desis'			=> $sys[0]['deskripsi_sistem'],
	'tagsis'		=> $sys[0]['tag_sistem'],
	'cnsis'			=> $sys[0]['company_name'],
	'casis'			=> $sys[0]['company_address'],
	'csis'			=> $sys[0]['company_site'],
	'cpsis'			=> $sys[0]['company_phone'],
	'wpsis'			=> $sys[0]['welcome_page'],
	'bgsis'			=> $sys[0]['bg_login']
);
?>