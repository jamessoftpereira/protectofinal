<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<br><br>
<?php
    if ($this->session->userdata('is_logged_in')){
      echo '<h4 align="right">';
      echo '<small>';
      echo 'Bienvenido: <strong>'.$this->session->userdata('NOMBRE').' '.$this->session->userdata('APELLIDOS').'</strong>&nbsp;|&nbsp;';
      echo 'Tipo Usuario: <strong>'.$this->session->userdata('TIPOUSUARIO').'</strong>&nbsp;|&nbsp;';
      echo anchor("login/CerrarSesion/", "Salir").'&nbsp;&nbsp;</small></h4>';
      echo '<hr/>';
      echo '<p align="right">';
      echo '<table align="right">';
      echo '<tr>';


     
                                  
            echo '</tr>';
      echo '</table>';   

      php?>
         <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

      <?php
      echo '</p>';
      echo '<hr/>'; 
      

     
    
   ?>
   </div>
   </section>

  
      <!--<section class="content">
        <!-- Small boxes (Stat box) --
        <div class="row">

              

        <!-- Small boxes (Stat box) --
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box --
            <div class="small-box bg-orange">
              <div class="inner">
                <h3>#</h3>

                <p>Gestionar Tecnicos</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="http://localhost/ProyectoDocfis/index.php/tecnicos" class="small-box-footer">Acceder<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div></section>-->
      
    
  



 