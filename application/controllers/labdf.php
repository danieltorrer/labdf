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

	public function landing(){
		$this->load->view("landing_view");
	}

	public function peticionTwitter(){
		ini_set('display_errors', 1);
		
		$busqueda = $this->input->post("busqueda");
		$latitud = $this->input->post("latitud");
		$longitud = $this->input->post("longitud");

		$resource = 'https://api.twitter.com/1.1/search/tweets.json?q='. $busqueda.'&geocode='.$latitud.','.$longitud.',1km&count=30';

		$response = $this->twitter_consumer->request($resource, TRUE);


		/*$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);*/
		//header('Content-Type: application/json; charset=utf-8');
		echo $response;


	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */	