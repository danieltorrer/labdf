<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Labdf extends CI_Controller {

	public function index(){
		$this->load->view('index');
	}

	public function overview(){
		$this->load->view("overview_view");
	}

	public function map(){
		$this->load->view("map_overview_view");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */	