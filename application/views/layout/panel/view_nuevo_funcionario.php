<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: Nuevo Funcionario :.</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  //echo form_open("clientes/Save", $attributes);
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';
	  
	#dibujamos campos texto
	  $id  = 
	$Cedula	  = array(
	'name'        => 'CEDULA',
	'id'          => 'CEDULA',
	'size'        => 50,
	'value'		  => set_value('CEDULA',@$datos_funcionarios[0]->CEDULA),
	'placeholder' => 'Cedula',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Cedula:",'CEDULA').'</td>';
	echo '<td>';
	echo form_input($Cedula);
	echo '</td>';
	echo '<td><font color="red">'.form_error('CEDULA').'</font></td>';
	echo '</tr>';

	$Nombre 	  = array(
	'name'        => 'NOMBRE',
	'id'          => 'NOMBRE',
	'size'        => 50,
	'value'		  => set_value('NOMBRE',@$datos_funcionarios[0]->NOMBRE),
	'placeholder' => 'Nombre',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Nombre:",'NOMBRE').'</td>';
	echo '<td>';
	echo form_input($Nombre);
	echo '</td>';
	echo '<td><font color="red">'.form_error('NOMBRE').'</font></td>';
	echo '</tr>';
	
	$Apellido = array(
	'name'        => 'APELLIDO',
	'id'          => 'APELLIDO',
	'size'        => 50,
	'value'		  => set_value('APELLIDO',@$datos_funcionarios[0]->APELLIDO),
	'placeholder' => 'Apellido',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Apellido:",'APELLIDO').'</td>';
	echo '<td>';
	echo form_input($Apellido);
	echo '</td>';
	echo '<td><font color="red">'.form_error('APELLIDO').'</font></td>';
	echo '</tr>';
	
	$Email 		  = array(
	'name'        => 'EMAIL',
	'id'          => 'EMAIL',
	'size'        => 50,
	'value'		  => set_value('EMAIL',@$datos_funcionarios[0]->EMAIL),
	'placeholder' => 'Email',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Email:",'EMAIL').'</td>';
	echo '<td>';
	echo form_input($Email);
	echo '</td>';
	echo '<td><font color="red">'.form_error('EMAIL').'</font></td>';
	echo '</tr>';

	$Cargo 		  = array(
	'name'        => 'CARGO',
	'id'          => 'CARGO',
	'size'        => 50,
	'value'		  => set_value('CARGO',@$datos_funcionarios[0]->CARGO),
	'placeholder' => 'Cargo',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Cargo:",'CARGO').'</td>';
	echo '<td>';
	echo form_input($Cargo);
	echo '</td>';
	echo '<td><font color="red">'.form_error('CARGO').'</font></td>';
	echo '</tr>';
	

	
	   
		
	echo '<tr>';
	echo '<td colspan=3>'.$this->session->flashdata('msg').'</td>';
	echo '</tr>';
	echo '<tr><td colspan=3><hr/></td></tr>';
	echo '<tr>';
	echo '<td colspan=3><center>';
	echo '<input type="submit" class="btn btn-success" value="Guardar">';
    echo '</center></td></tr>';
    echo '</table></center>';
    echo form_close(); 
    echo '</td></tr>';
    echo '</table>';
    echo '</center>';
?>