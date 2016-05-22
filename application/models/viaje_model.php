<?php

class viaje_model extends CI_Model {

	function contar($hora){
		$this->db->where('horaSalida', $hora);
		$query=$this->db->count_all_results('registro');
        return $query; //->result_array();
    }

    function getRegistrosSalida($hora){
    	$this->db->select('latitude,longitude');
    	$this->db->from('registro');
    	$this->db->where('horaSalida', $hora);
    	$this->db->join('estacion', 'estacion.id = registro.stationRemoved', 'left');

    	$query = $this->db->get();

    	return $query->result_array();
    }

    function getRegistrosLlegada($hora){
    	$this->db->select('latitude,longitude');
    	$this->db->from('registro');
    	$this->db->where('horaSalida', $hora);
    	$this->db->join('estacion', 'estacion.id = registro.stationArrived', 'left');

    	$query = $this->db->get();

    	return $query->result_array();
    }

}
?>