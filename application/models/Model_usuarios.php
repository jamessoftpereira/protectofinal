<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_usuarios extends CI_Model {
	public function ListarUsuarios(){
		$this->db->order_by('ID ASC');
		return $this->db->get('usuarios')->result();
	}
	public function ExisteUser($Usuario){
          $this->db->from('usuarios');
          $this->db->where('USUARIO',$Usuario);
          return $this->db->count_all_results();
     }
     public function SaveUsuarios($arrayUsuario){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('usuarios', $arrayUsuario);
     	$this->db->trans_complete();	
     }
	 function BuscarID($Id){

		$query = $this->db->where('ID',$Id);
		$query = $this->db->get('usuarios');
		return $query->result();
		
	}
	function edit($data,$Id){

		$this->db->where('ID',$Id);
		$this->db->update('usuarios',$data);
		
	}
	function Eliminar($id){

		$this->db->where('ID',$id);
		$this->db->delete('usuarios');
		
	}
	function MenuCompleto(){
		$this->db->order_by('ORDENAMIENTO ASC');
		return $this->db->get('menu_sistema')->result();
		
	}
	function MiMenu($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_USUARIO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$this->db->where('ESTATUS',0);
		return $this->db->count_all_results();
	}
	function DesactivaPermisos($id){
		$this->db->where('ID_USUARIO',$id);
		$success = $this->db->update('permisosmenu',array('ESTATUS' => 1));
	}
	function ExistePermiso($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_USUARIO',$id);
		$this->db->where('ID_MENU',$id_menu);
		return $this->db->count_all_results();
	}
	function ActualizaPermiso($id,$id_menu){
		$this->db->where('ID_USUARIO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$success = $this->db->update('permisosmenu',array('ESTATUS' => 0));
	}
	function AgregaPermiso($arraypermisos){
		$this->db->trans_start();
     	$this->db->insert('permisosmenu', $arraypermisos);
     	$this->db->trans_complete();
	}
}
?>