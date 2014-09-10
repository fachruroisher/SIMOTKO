<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class error extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sim_model');
	}

	public function losepage(){
		$this->load->view('simotko/403');
	}

}