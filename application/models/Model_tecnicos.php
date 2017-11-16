<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_tecnicos extends CI_Model {

	public function ListarTecnicos(){
		$this->db->order_by('ID ASC');
		return $this->db->get('tecnicos')->result();
	}
	public function ExisteTecnico($Cedula){
          $this->db->from('tecnicos');
          $this->db->where('CEDULA',$Cedula); 
          return $this->db->count_all_results();
     }
     public function SaveTecnicos($arrayTecnico){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('tecnicos', $arrayTecnico);
     	$this->db->trans_complete();	
     }
    
     function BuscarID($id){

		$query = $this->db->where('ID',$id);
		$query = $this->db->get('tecnicos');
		return $query->result();
		
	}
	function edit($data,$id){

		$this->db->where('ID',$id);
		$this->db->update('tecnicos',$data);
		
	}
	function Eliminar($id){

		$this->db->where('ID',$id);
		$this->db->delete('tecnicos');
		
	}
	
}
?>