<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
// fungsi login user
	public function loginUser(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		if($this->input->post('submit')){
			$query = $this->db->get_where('user',array('username'=>$username,'password'=>$password),1);
			$result = $query->num_rows();

			if($result == 1){
				return $query->result_array();
			}
			else return false;
		}
	}
}