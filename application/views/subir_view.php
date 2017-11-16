 <form id="registro" name="registro"  action="<?=base_url()?>index.php/ctrClientes/addClient" method="POST" enctype="multipart/form-data">
     
     
     <b><label for="login">Nombres:</label></b>
     <input type="text" name="NombreCliente" id="NombreCliente" onchange=""/> <br />
     
     
     <b><label for="nom_usu">Apellidos:</label></b>
     <input type="text" name="apellidos" id="apellidos"/><br />
     
     <b><label for="RFC">RFC:</label></b>
     <input type="text" name="RFC" id="RFC" /><br />
     
     
     <b><label for="psw1">Foto:</label></b>
    <input type="text" name="Foto" id="Foto"/><br />
     
     
     
     
    
   
     <input type="submit" name="submit" value="Registrar"/><br />