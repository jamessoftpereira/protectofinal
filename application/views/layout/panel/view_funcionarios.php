






<script type="text/javascript">


                     /*CLIENTES*/
            $(document).ready(function() {
                $('#funcionarios').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
  <h2 align="center">Listado de Funcionarios</h2>
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

<a href="http://localhost/ProyectoDocfis/index.php/funcionarios/nuevo" class="btn btn-primary">Agregar funcionario</a><br><br>


<center>
<table id="funcionarios" border="0" cellpadding="0" cellspacing="0" class="pretty">
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
 if(!empty($funcionarios)){
  foreach($funcionarios as $Cedula){
    echo '<tr>';
    echo '<td>'
?>
    <a href="<?php echo base_url();?>index.php/funcionarios/editar/<?php echo $Cedula->ID;?>/" class="btn btn-success"><spam class="glyphicon glyphicon-edit"></spam></a>
    <a href="#myModal" class="btn btn-success"><spam class="glyphicon glyphicon-upload" data-toggle="modal" data-target="#myModal"></spam></a>
    <!-- Modal -->


        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->

            <?php echo form_open_multipart('upload');  ?>
<p>
    <?php echo form_label('Archivo 1', 'userfile') ?>
    <?php echo form_upload('userfile') ?>
</p>
<p>
    <?php echo form_label('Archivo 2', 'userfile1') ?>
    <?php echo form_upload('userfile1') ?>
</p>
<p><?php echo form_submit('submit', 'Subir Archivos!') ?></p>
<?php form_close() ?>
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Subir a la Nube</h4>
              </div>
              <div class="modal-body">
                 <!-- form start -->
                    <form role="form" action="cargar_archivo" method="post" enctype="multipart/form-data">
                      <div class="box-body">
                        <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" class="form-control" id="txtNombreA" placeholder="Ingrese nombre archivo">
                        </div>
                        
                       <!-- textarea -->
                        <div class="form-group">
                          <label>Descripción</label>
                          <textarea class="form-control" rows="3" placeholder="Escribe aqui ..."></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputFile">Elegir archivo</label>
                          <input type="file" id="exampleInputFile" name="mi_archivo[]" multiple>

                          <p class="help-block">Tipo de archivos jpg.</p>
                        </div>
                        <div class="box-footer">
                        <button type="submit" value="Submit" class="btn btn-success">Subir</button>
                      </div>
                      <!-- /.box-body -->
                <p>El sistema permitira subir archivos en jpg solamente.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>

          </div>
        </div>
    <a href="<?php echo base_url();?>index.php/upload/<?php echo $Cedula->CEDULA;?>" class="btn btn-info"><spam class="glyphicon glyphicon-eye-open"></spam></a>
    <a href="<?php echo base_url();?>index.php/funcionarios/eliminar/<?php echo $Cedula->ID ?>" class="btn btn-danger"><spam class="glyphicon glyphicon-trash"></spam></a>

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