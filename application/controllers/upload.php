<?php 

function index()
{
    // Revisamos si se ha subido algo
    if (isset($_POST['submit']))
    {
        // Cargamos la libreria Upload
        $this->load->library('upload');

        /*
         * Revisamos si el archivo fue subido
         * Comprobamos si existen errores en el archivo subido
         */
        if (!empty($_FILES['userfile']['name']))
        {
            // Configuración para el Archivo 1
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';       

            // Cargamos la configuración del Archivo 1
            $this->upload->initialize($config);

            // Subimos archivo 1
            if ($this->upload->do_upload('userfile'))
            {
                $data = $this->upload->data();
            }
            else
            {
                echo $this->upload->display_errors();
            }

        }

        // Revisamos si existe un segundo archivo
        if (!empty($_FILES['userfile1']['name']))
        {
            // La configuración del Archivo 2, debe ser diferente del archivo 1
            // si configuras como el Archivo 1 no hará nada
            $config['upload_path'] = 'uploads/dir2/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            // Cargamos la nueva configuración
            $this->upload->initialize($config);

            // Subimos el segundo Archivo
            if ($this->upload->do_upload('userfile1'))
            {
                $data = $this->upload->data();
            }
            else
            {
                echo $this->upload->display_errors();
            }

        }
    }
    else
    {
        $this->load->view("upload_form");
    }
}

?>