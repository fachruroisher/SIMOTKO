<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sim_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function InsertData($table,$data)
	{
		return $this->db->insert($table,$data);
	}
	public function GetData($table, $where = '')
	{
		return $this->db->query('select * from '.$table.' '.$where);
	}
	public function DeleteData($table,$where)
	{
		return $this->db->delete($table,$where);
	}
	public function UpdateData($table,$data,$where)
	{
		return $this->db->update($table,$data,$where);
	}
	public function GetDataArray($table,$data){
		$this->db->from($table);
		$this->db->where($data);
		return $this->db->get();
	}
	public function totalGaji($where='',$bln='',$thn=''){
		if (empty($where) AND empty($bln) AND empty($thn)) {
			$this->db->from('total_gaji');
			$this->db->join('man_power','man_power.nik_mp=total_gaji.nik_mp');
			$this->db->join('area','area.id_area=man_power.id_area');
			$this->db->join('gaji','gaji.id_gaji=man_power.id_gaji');

			$this->db->group_by('man_power.id_area');
			return $this->db->get();
		}else{
			$this->db->where($where);
			$this->db->where($bln);
			$this->db->where($thn);
			$this->db->from('total_gaji');
			$this->db->join('man_power','man_power.nik_mp=total_gaji.nik_mp');
			$this->db->join('area','area.id_area=man_power.id_area');
			$this->db->join('gaji','gaji.id_gaji=man_power.id_gaji');
			$this->db->join('posisi','posisi.id_posisi=man_power.id_posisi');			
			$this->db->join('team_leader','team_leader.id_tl=area.id_tl');
			$this->db->join('user','user.id_user=team_leader.id_user');
			return $this->db->get();
		}
	}
	public function rgData($where,$bln,$thn){
		$this->db->where($where);
		$this->db->from('presensi');
		$this->db->join('man_power','man_power.nik_mp=presensi.nik_mp');
		$this->db->join('area','area.id_area=man_power.id_area');
		$this->db->join('gaji','gaji.id_gaji=man_power.id_gaji');
		$this->db->join('shift','shift.id_shift=presensi.shift');
		$this->db->group_by('presensi.nik_mp');
		$this->db->like('tanggal',$bln);
		$this->db->like('tanggal',$thn);
		return $this->db->get();

	}
	public function rgSum($where,$sum){
		$this->db->where($where);
		$this->db->from('presensi');
		$this->db->join('man_power','man_power.nik_mp=presensi.nik_mp');
		$this->db->join('gaji','gaji.id_gaji=man_power.id_gaji');
		$this->db->select_sum($sum);
		return $this->db->get();
	}
	public function paginationDoc($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('document');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function jumlahDoc($id=''){
		return $this->db->count_all('document');
	}
	public function GetDataUser($where=''){
		$this->db->where($where);
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('team_leader','team_leader.id_user=user.id_user','left');
		return $query=$this->db->get();	
		
	}
	public function GetDataTL($where='') {
		if (empty($where)) {
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('team_leader','team_leader.id_user=user.id_user');
			$this->db->join('wilayah','wilayah.id_wilayah=team_leader.id_wilayah');
			return $query=$this->db->get();				 
		} else {
			$this->db->where($where);
			$this->db->from('team_leader');
			$this->db->join('user','user.id_user=team_leader.id_user');
			$this->db->join('wilayah','wilayah.id_wilayah=team_leader.id_wilayah');
			return $query=$this->db->get();		 
		}
	}

	public function GetDataRP($where='') {
		if (empty($where)) {
			$this->db->select('*');
			$this->db->from('presensi');
			$this->db->from('shift','shift.id_shift=presensi.shift');
			$this->db->join('man_power','man_power.nik_mp=presensi.nik_mp');
			$this->db->join('area','area.id_area=man_power.id_area');
			$this->db->join('posisi','posisi.id_posisi=man_power.id_posisi');
			$this->db->group_by('tanggal');
			$this->db->group_by('posisi.id_posisi');
			$this->db->group_by('man_power.id_area');
			$this->db->order_by('tanggal','DESC');
			return $query=$this->db->get();				 
		} else {
			$this->db->where($where);
			$this->db->from('presensi');
			$this->db->from('shift','shift.id_shift=presensi.shift');
			$this->db->join('man_power','man_power.nik_mp=presensi.nik_mp');
			$this->db->join('gaji','gaji.id_gaji=man_power.id_gaji');
			$this->db->join('area','area.id_area=man_power.id_area');
			$this->db->join('team_leader','team_leader.id_tl=area.id_tl');
			$this->db->join('user','user.id_user=team_leader.id_user');
			$this->db->join('posisi','posisi.id_posisi=man_power.id_posisi');
			$this->db->group_by('presensi.nik_mp');
			return $query=$this->db->get();		 
		}
	}
//menampilkan fitur informasi
	public function GetDataIn($where='') {
		if (empty($where)) {
				$this->db->select('*');
				$this->db->from('informasi');
				$this->db->join('user','user.id_user=informasi.id_user');
				return $query=$this->db->get();
		} else {
				$this->db->where($where);
				$this->db->from('informasi');
				$this->db->join('user','user.id_user=informasi.id_user');
				return $query=$this->db->get();
		}
	}
	public function GetDataInf1() {
		$this->db->select('*');
		$this->db->from('informasi');
		$this->db->join('user','user.id_user=informasi.id_user ORDER BY id_info DESC LIMIT 1');
		return $query=$this->db->get();
	}
	public function GetDataInf8() {
		$this->db->select('*');
		$this->db->from('informasi');
		$this->db->join('user','user.id_user=informasi.id_user ORDER BY id_info DESC LIMIT 8');
		return $query=$this->db->get();
	}
	
	//menampilkan fitur doc
	public function GetDataDoc($where='') {
		if (empty($where)) {
				$this->db->select('*');
				$this->db->from('document');
				$this->db->join('user','user.id_user=document.id_user');
				return $query=$this->db->get();
		} else {
				$this->db->where($where);
				$this->db->from('document');
				$this->db->join('user','user.id_user=document.id_user');
				return $query=$this->db->get();
		}
	}
//Menampilkan fitur area
	public function GetDataArea($where='') {
		if (empty($where)) {
				$this->db->select('*');
				$this->db->from('area');
				$this->db->join('team_leader','team_leader.id_tl=area.id_tl');
				$this->db->join('wilayah','wilayah.id_wilayah=team_leader.id_wilayah');
				$this->db->join('user','user.id_user=team_leader.id_user');
				return $query=$this->db->get();	
				
		} else {
				$this->db->where($where);
				$this->db->from('area');
				$this->db->join('team_leader','team_leader.id_tl=area.id_tl');
				$this->db->join('wilayah','wilayah.id_wilayah=team_leader.id_wilayah');
				$this->db->join('user','user.id_user=team_leader.id_user');
				return $query=$this->db->get();	
				

		}
	}

//Menampilkan fitur area
	public function GetDataMp($where='') {
		if (empty($where)) {
				$this->db->select('*');
				$this->db->from('man_power');
				$this->db->join('area','area.id_area=man_power.id_area');
				$this->db->join('posisi','posisi.id_posisi=man_power.id_posisi');
				$this->db->join('gaji','gaji.id_gaji=man_power.id_gaji');
				$this->db->join('team_leader','team_leader.id_tl=area.id_tl');
				$this->db->join('user','user.id_user=team_leader.id_user ');
				return $query=$this->db->get();	
				
		} else {
				$this->db->where($where);
				$this->db->from('man_power');
				$this->db->join('area','area.id_area=man_power.id_area');
				$this->db->join('posisi','posisi.id_posisi=man_power.id_posisi');
				$this->db->join('gaji','gaji.id_gaji=man_power.id_gaji');
				$this->db->join('team_leader','team_leader.id_tl=area.id_tl');
				$this->db->join('user','user.id_user=team_leader.id_user');
				return $query=$this->db->get();	
				

		}
	}
	public function GetDataMpGroup(){
		$this->db->from('man_power');
		$this->db->join('area','area.id_area=man_power.id_area');
		$this->db->join('posisi','posisi.id_posisi=man_power.id_posisi');
		$this->db->join('gaji','gaji.id_gaji=man_power.id_gaji');
		$this->db->join('team_leader','team_leader.id_tl=area.id_tl');
		$this->db->join('user','user.id_user=team_leader.id_user');
		$this->db->group_by('man_power.id_posisi');
		return $query=$this->db->get();	
	}
	public function GetDataMpGroup0($group,$where=''){
		if (empty($where)) {
			$this->db->from('man_power');
			$this->db->join('area','area.id_area=man_power.id_area');
			$this->db->join('posisi','posisi.id_posisi=man_power.id_posisi');
			$this->db->join('gaji','gaji.id_gaji=man_power.id_gaji');
			$this->db->join('team_leader','team_leader.id_tl=area.id_tl');
			$this->db->join('user','user.id_user=team_leader.id_user');
			$this->db->group_by($group);
			return $query=$this->db->get();					
		} else {
			$this->db->where($where);
			$this->db->from('man_power');
			$this->db->join('area','area.id_area=man_power.id_area');
			$this->db->join('posisi','posisi.id_posisi=man_power.id_posisi');
			$this->db->join('gaji','gaji.id_gaji=man_power.id_gaji');
			$this->db->join('team_leader','team_leader.id_tl=area.id_tl');
			$this->db->join('user','user.id_user=team_leader.id_user');
			$this->db->group_by($group);
			return $query=$this->db->get();
				
		}
		
	}
	public function GetCountMpGroup($where='') {

		return $this->db->query("select count(id_posisi) as jumlah from man_power where id_posisi= $where")->result_array();
	}
	public function get_CountMP($where='') {

		return $this->db->query("select count(id_area) as jumlah from man_power where id_area= $where")->result_array();
	}
	public function GetDataDR($where='') {
		if (empty($where)) {
				$this->db->select('*');
				$this->db->from('daily_report');
				$this->db->join('team_leader','team_leader.id_tl=daily_report.id_tl');
				$this->db->join('user','user.id_user=team_leader.id_user');
				$this->db->group_by('tanggal');
				$this->db->group_by('daily_report.id_tl');
				$this->db->order_by('tanggal','ASC');
				return $query=$this->db->get();
		} else {
				$this->db->where($where);
				$this->db->from('daily_report');
				$this->db->join('team_leader','team_leader.id_tl=daily_report.id_tl');
				$this->db->join('user','user.id_user=team_leader.id_user');
				$this->db->group_by('tanggal');
				$this->db->group_by('daily_report.id_tl');
				return $query=$this->db->get();
		}
	}
	public function GetDataDR0($where) {
				$this->db->where($where);
				$this->db->from('daily_report');
				$this->db->join('team_leader','team_leader.id_tl=daily_report.id_tl');
				$this->db->join('user','user.id_user=team_leader.id_user');
				return $query=$this->db->get();
		
	}
}