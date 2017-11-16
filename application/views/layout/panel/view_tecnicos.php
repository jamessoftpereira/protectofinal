






<script type="text/javascript">


                     /*CLIENTES*/
            $(document).ready(function() {
                $('#tecnicos').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
  <h2 align="center">Listado de Tecnicos</h2>
  <?php
if(isset($_GET['save'])){
  echo '<div class="alert alert-success text-center">La Información  se Almaceno Correctamente</div>';
}
if(isset($_GET['delete'])){
  echo '<div class="alert alert-warning text-center">La Información  se ha Eliminado Correctamente</div>';
}
if(isset($_GET['update'])){
  echo '<div class="alert alert-success text-center">La Información  se Actualizo Correctamente</div>';
}

?>

<a href="http://localhost/ProyectoDocfis/index.php/tecnicos/nuevo" class="btn btn-primary">Agregar tecnico</a><br><br>


<center>
<table id="tecnicos" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCION</th>
<!--<th>ID</th>-->
<th>CEDULA</th>
<th>NOMBRE</th>
<th>APELLIDOS</th>
<th>EMAIL</th>
<th>FECHA REGISTRO</th>
<th>CARGO</th>

</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
$contador = 0;
 if(!empty($tecnicos)){
  foreach($tecnicos as $Cedula){
    echo '<tr>';
    echo '<td>'
?>
    <a href="<?php echo base_url();?>index.php/tecnicos/editar/<?php echo $Cedula->ID;?>/" class="btn btn-success"><spam class="glyphicon glyphicon-edit"></spam></a>
  
    <a href="<?php echo base_url();?>index.php/tecnicos/eliminar/<?php echo $Cedula->ID ?>" class="btn btn-danger"><spam class="glyphicon glyphicon-trash"></spam></a>

<?php   
    echo '</td>';
    //echo '<td>'.$Cedula->ID.'</td>';
    echo '<td>'.$Cedula->CEDULA.'</td>';
    echo '<td>'.$Cedula->NOMBRE.'</td>';
    echo '<td>'.$Cedula->APELLIDO.'</td>';
    echo '<td>'.$Cedula->EMAIL.'</td>';
    echo '<td>'.$Cedula->FECHA_REGISTRO.'</td>';
    echo '<td>'.$Cedula->CARGO.'</td>';
   
  
    echo '</tr>';
  } 
 }

 ?>
</tbody>
</table>
</center>
</div>