<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

	public function index(){
		//$this->load->view('index');
	}

	public function usuarios(){
		//get variables
		$sexo = $this->input->post('sexo');

		$this->load->model("usuarios_model");
		//regresar total usuarios
		$usuariosResult["total"] = $this->usuarios_model->contar($sexo);
		
		//regresar delegacion
		$usuariosResult["delegacion"] = $this->usuarios_model->delegacion($sexo);
		//regresar promedio de uso
		$usuariosResult["promedio"] = $this->usuarios_model->promedio($sexo);

		echo json_encode($usuariosResult);
	}

	public function horaDia(){
		$hora = $this->input->post("hora");	
		$this->load->model("viaje_model");
		$viajeResult["hora"] = $this->viaje_model->contar($hora);

		$viajeResult["estaciones"]["salida"] = $this->viaje_model->getRegistrosSalida($hora);
		$viajeResult["estaciones"]["llegada"] = $this->viaje_model->getRegistrosLlegada($hora);
		
		echo json_encode($viajeResult);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */	