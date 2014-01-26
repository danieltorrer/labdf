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
		
		$settings = array(
			'oauth_access_token' => "93753732-biNDPqIdI10bYjL26AAZTf4BUpOo1JoWApXs7XJk2",
			'oauth_access_token_secret' => "rlyBFdSpMt6zWkAHbTTxjm0ldiEN6lWIrfffdOZt7Y4fT",
			'consumer_key' => "h51v6StKUWbdxdlfa6jqCg",
			'consumer_secret' => "XNksvb5nE6ECWEtblBUgLsA6DqRiraTfhYmMuFI3c"
			);

		$busqueda = $this->input->post("busqueda");
		$latitud = $this->input->post("latitud");
		$longitud = $this->input->post("longitud");


		$url = 'https://api.twitter.com/1.1/search/tweets.json';
		$getfield = '?q='.$busqueda.'&geocode='.$latitud.','.$longitud.',1km&count=30';
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		echo $twitter->setGetfield($getfield)
		->buildOauth($url, $requestMethod)
		->performRequest();


	}
}


include("TwitterAPIExchange.php");
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */	