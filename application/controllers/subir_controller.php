<?php 
 public function addClient()
 {



    $config['upload_path'] = $this->folder;
           $config['allowed_types'] = 'zip|rar|pdf|docx|txt|jpg';
            $config['remove_spaces']=TRUE;
           $config['max_size']    = '100000';
          $config['overwrite'] = FALSE;
          $config['encrypt_name'] = TRUE;

           $this->load->library('upload', $config);
           
    
           if(!$this->upload->do_upload('cer')){
               $error = array('error' => $this->upload->display_errors());
               echo $this->upload->display_errors();
               //$this->load->view('plantilla', $error);
               }
           else{
               $upload_data = $this->upload->data(); 
               $foto =   $upload_data['file_name'];
           }
           
           
                  
         
           $data = array(
                  "Nombre" => $this->input->post('NombreCliente'),
                   "Apellido" => $this->input->post('apellidos'),
                   "RFC" => $this->input->post('RFC'),
                 "foto" => $nombreCertificado
                   
                   
           );
      
           
           //USANDO LA FUNCION DEL MODELO
           
         $this->clientsModel->insertClient($data);
           
         
    
 }

?>