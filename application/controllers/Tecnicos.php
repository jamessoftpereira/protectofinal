<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Bogota_City'); 
class Tecnicos extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo del controlador
          
          $this->load->model('model_tecnicos');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
     }
     function Seguridad(){
     	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
         $this->model_seguridad->SessionActivo($url);
     }
     public function index(){
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $this->load->view('layout/panel/header');
          $data['tecnicos'] = $this->model_tecnicos->ListarTecnicos(); 
          $this->load->view('layout/panel/menu');
          $this->load->view('layout/panel/PanelAdmi'); 
		  $this->load->view('layout/panel/view_tecnicos', $data);       
          $this->load->view('layout/panel/footer');
          
		  
	}
	 public function nuevo(){
	      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		$hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
		$this->ValidaCampos();
		if($this->form_validation->run() == TRUE){
				//Verificamos si existe la cedula
			   $VerifyExist = $this->model_tecnicos->ExisteTecnico($this->input->post("CEDULA"));
               if($VerifyExist==0){
               	    $TecnicosInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    $TecnicosInsertar["FECHA_REGISTRO"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_tecnicos->SaveTecnicos($TecnicosInsertar);
               	    redirect("Tecnicos?save=true");
               }
			   
		}else{
			  $this->load->view('layout/panel/header');
			  $this->load->view('layout/panel/menu');
		      $this->load->view('layout/panel/PanelAdmi');
			  $this->load->view('layout/panel/view_nuevo_tecnico');
			  $this->load->view('layout/panel/footer');
		} 
     }
	 function ValidaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		 //$this->form_validation->set_rules("ID", "id", "trim|required");
		 $this->form_validation->set_rules("CEDULA", "Cedula", "trim|required");
		 $this->form_validation->set_rules("NOMBRE", "Nombre", "trim|required");
		 $this->form_validation->set_rules("APELLIDO", "Apellido", "trim|required");
		 $this->form_validation->set_rules("EMAIL", "Email", "trim|required|valid_email");
		 $this->form_validation->set_rules("CARGO", "Cargo", "trim|required");
		
	 }
	
	 public function editar($id = NULL){
		
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Tecnicos";
			$data['Error']   = "Error: El id <strong>".$id."</strong> No es Valida, Verifica tu Busqueda !!!!!!!";
			$this->load->view('layout/panel/header');
			$this->load->view('layout/panel/menu');
		    $this->load->view('layout/panel/PanelAdmi');
			$this->load->view('layout/panel/view_errors',$data);
			$this->load->view('layout/panel/footer');
			return;
		}
		if ($this->input->post()) {
			
			$this->ValidaCampos();
				
			if ($this->form_validation->run() == TRUE){
				$datos_update = $this->input->post();
				$id_insertado = $this->model_tecnicos->edit($datos_update,$id);
				redirect('Tecnicos?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
			$data['datos_tecnicos'] = $this->model_tecnicos->BuscarID($id);
			if (empty($data['datos_tecnicos'])){
				$data['Modulo']  = "Tecnicos";
				$data['Error']   = "Error: La cedula <strong>".$id."</strong> No es Valida, Verifica tu Busqueda !!!!!!!";
				$this->load->view('layout/panel/header');
			    $this->load->view('layout/panel/menu');
		        $this->load->view('layout/panel/PanelAdmi');
				$this->load->view('layout/panel/view_errors',$data);
				$this->load->view('layout/panel/footer');
			}else{
				$this->load->view('layout/panel/header');
			    $this->load->view('layout/panel/menu');
		        $this->load->view('layout/panel/PanelAdmi');
				$this->load->view('layout/panel/view_nuevo_tecnico',$data);
				$this->load->view('layout/panel/footer');
			}
		}
		
	}
	public function eliminar($id = NULL){
		if ($id == NULL OR !is_numeric($id)){
			$data['Modulo']  = "Tecnicos";
			$data['Error']   = "Error: El Id <strong>".$id."</strong> No es Valida, Verifica tu Busqueda !!!!!!!";
			$this->load->view('layout/panel/header');
			$this->load->view('layout/panel/menu');
		    $this->load->view('layout/panel/PanelAdmi');
			$this->load->view('layout/panel/view_errors',$data);
			$this->load->view('layout/panel/footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('ID');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("Tecnicos");
			}else{
                                $this->model_tecnicos->Eliminar($id_eliminar);
				redirect("Tecnicos?delete=true");
			}
		}else{
			$data['datos_tecnicos'] = $this->model_tecnicos->BuscarID($id);
			if (empty($data['datos_tecnicos'])){
				$data['Modulo']  = "Tecnicos";
				$data['Error']   = "Error: El Id <strong>".$id."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('layout/panel/header');
			    $this->load->view('layout/panel/menu');
		        $this->load->view('layout/panel/PanelAdmi');
				$this->load->view('layout/panel/view_errors',$data);
				$this->load->view('layout/panel/footer');
			}else{
				$this->load->view('layout/panel/header');
			    $this->load->view('layout/panel/menu');
		        $this->load->view('layout/panel/PanelAdmi');
				$this->load->view('layout/panel/view_deletet',$data);
				$this->load->view('layout/panel/footer');
			}
		}
	}
	
		
}
/* Archivo clientes.php */
/* Location: ./application/controllers/clientes.php */