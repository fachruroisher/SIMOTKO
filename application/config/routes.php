<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/* Route Admin-------------------------------- */
//------- route Manage guide start
$route['rg_ad']				='recgaji/index';
$route['rg_cetak/(:num)/(:num)/(:num)']			='recgaji/hasil/$1/$2/$3';
$route['print_rg/(:num)/(:num)/(:num)']			='recgaji/cetak/$1/$2/$3';
$route['add_rg']				='recgaji/add_action';
$route['da_rg/(:any)']		='recgaji/delete_action/$1';
//------- route Manage guide end

//------- route Manage guide start
$route['sis_ad']			='sistem/index';
$route['ea_sis']			='sistem/edit_action';
//------- route Manage guide end

$route['vd_ad']				='dr/index';
$route['vd_ad/(:any)/(:any)']	='dr/edit/$1/$2';
$route['vd_ed/(:any)/(:any)']	='dr/view/$1/$2';
$route['a2_vd']				='dr/add_action';
$route['ea_vd']				='dr/edit_action';
$route['d_vd/(:any)']		='dr/delete_action0/$1';
$route['da_vd/(:any)/(:any)']	='dr/delete_action1/$1/$2';


//------- route Manage guide start
$route['g_ad']				='guide/index';
$route['g_ad/(:any)']		='guide/edit/$1';
$route['a2_g']				='guide/add_action';
$route['ea_g']				='guide/edit_action';
$route['da_g/(:any)']		='guide/delete_action/$1';
//------- route Manage guide end

//------- route Manage wilayah start
$route['wm_ad']				='wilayah/index';
$route['wm_ad/(:any)']		='wilayah/edit/$1';
$route['a2_wm']				='wilayah/add_action';
$route['ea_wm']				='wilayah/edit_action';
$route['da_wm/(:any)']		='wilayah/delete_action/$1';
//------- route Manage wilayah end

//------- route Manage wilayah start
$route['sf_ad']				='shift/index';
$route['sf_ad/(:any)']		='shift/edit/$1';
$route['a2_sf']				='shift/add_action';
$route['ea_sf']				='shift/edit_action';
$route['da_sf/(:any)']		='shift/delete_action/$1';
//------- route Manage wilayah end

//------- route Manage Posisi start
$route['pos_ad']			='posisi/index';
$route['pos_ad/(:any)']		='posisi/edit/$1';
$route['a2_pos']			='posisi/add_action';
$route['ea_pos']			='posisi/edit_action';
$route['da_pos/(:any)']		='posisi/delete_action/$1';
//------- route Manage Posisi end

//------- route Manage presensi start
$route['pm_ad']				  ='presensi/index';
$route['pm_add']			  ='presensi/add';
$route['pm_ad/(:any)/(:any)'] ='presensi/edit/$1/$2';
$route['pm_vd/(:any)/(:any)'] ='presensi/view/$1/$2';
$route['print_pm/(:any)/(:any)'] ='presensi/cetak/$1/$2';
$route['a2_pm']				  ='presensi/add_action';
$route['ea_pm']				  ='presensi/edit_action';
$route['da_pm/(:any)/(:any)'] ='presensi/delete_action/$1/$2';
//------- route Manage presensi end

//------- route Manage Gaji start
$route['sm_ad']				='gaji/index';
$route['sm_ad/(:any)']		='gaji/edit/$1';
$route['a2_sm']				='gaji/add_action';
$route['ea_sm']				='gaji/edit_action';
$route['da_sm/(:any)']		='gaji/delete_action/$1';
//------- route Manage Gaji end

//------- route Manage Doc start
$route['doc_ad']			='doc/index';
$route['doc_vd']			='doc/view';
$route['doc_vd/(:num)']		='doc/view/$1';
$route['doc_ad/(:any)']		='doc/edit/$1';
$route['a2_doc']			='doc/add_action';
$route['ea_doc']			='doc/edit_action';
$route['da_doc/(:any)']		='doc/delete_action/$1';
//------- route Manage Doc end

//------- route Manage Mp start
$route['mp_ad/(:any)']		='manpower/index/$1';
$route['mp_ed/(:any)']		='manpower/edit/$1';
$route['mp_vd/(:any)']		='manpower/view/$1';
$route['a2_mp']				='manpower/add_action';
$route['ea_mp']				='manpower/edit_action';
$route['da_mp/(:any)']		='manpower/delete_action/$1';
//------- route Manage Mp end

//------- route Manage Area start
$route['am_ad']				='area/index';
$route['am_ad/(:any)']		='area/edit/$1';
$route['am_vd/(:any)']		='area/view/$1';
$route['a3_ad']				='area/add_action';
$route['e2_ad']				='area/edit_action';
$route['d2_ad/(:any)']		='area/delete_action/$1';
//------- route Manage Area end

//------- route Manage Info start
$route['inf_ad']			='info/index';
$route['inf_ad/(:any)']		='info/edit/$1';
$route['aai_ad']			='info/add_action';
$route['eai_ad']			='info/edit_action';
$route['dai_ad/(:any)']		='info/delete_action/$1';
//------- route Manage Info end

//------- route Manage TL start
$route['tl_ad']				='teamleader/index';
$route['tl_ad/(:any)']		='teamleader/edit/$1';
$route['tl_vd/(:any)']		='teamleader/view/$1';
$route['eat_ad']			='teamleader/edit_action';
$route['d2_tl/(:any)']		='teamleader/delete_action/$1';
//------- route Manage TL  end

//------- route Manage User  start
$route['user_ad']			='user/index';
$route['user_ad/(:any)']	='user/edit/$1';
$route['aau_ad']			='user/add_action';
$route['eau_ad']			='user/edit_action';
$route['dau_ad/(:any)']		='user/delete_action/$1';
//------- route Manage User  end

//------- route setting start
$route['set_ad/(:any)']		='setting/index/$1';
$route['esu_ad']			='setting/edit_setting_user';
//------- route setting end

//------- route profil start
$route['up_ad/(:any)']		='profil/index/$1';
$route['epu_ad']			='profil/edit_profil_user';
//------- route profil end
$route['search_ad']			='simotko/search';
$route['simotko/(:any)'] 	='simotko/index/$1';
$route['ad_home'] 			='simotko';
/* Route Login-------------------------------- */
$route['login']				='login/login';
$route['default_controller']= "login";
$route['login/(:any)'] 		= "login/$1";
$route['(:any)']			='login/$1';
$route['404_override'] 		= 'error/losepage';


/* End of file routes.php */
/* Location: ./application/config/routes.php */