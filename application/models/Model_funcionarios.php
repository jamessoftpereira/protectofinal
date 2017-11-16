<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_funcionarios extends CI_Model {

	public function ListarFuncionarios(){
		$this->db->order_by('ID ASC');
		return $this->db->get('funcionarios')->result();
	}
	public function ExisteFuncionario($Cedula){
          $this->db->from('funcionarios');
          $this->db->where('CEDULA',$Cedula); 
          return $this->db->count_all_results();
     }
     public function SaveFuncionarios($arrayFuncionario){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('funcionarios', $arrayFuncionario);
     	$this->db->trans_complete();	
     }
    
     function BuscarID($id){

		$query = $this->db->where('ID',$id);
		$query = $this->db->get('funcionarios');
		return $query->result();
		
	}
	function edit($data,$id){

		$this->db->where('ID',$id);
		$this->db->update('funcionarios',$data);
		
	}
	function Eliminar($id){

		$this->db->where('ID',$id);
		$this->db->delete('funcionarios');
		
	}
	
}
?>