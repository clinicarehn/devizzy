<?php	
	$peticionAjax = true;
	require_once "configGenerales.php";
	require_once "mainModel.php";
	
	$insMainModel = new mainModel();
	
	$result = $insMainModel->getCategoriaProductos();
	
	if($result->num_rows>0){
		echo '<option value="">Seleccione</option>';
		while($consulta2 = $result->fetch_assoc()){
			 echo '<option value="'.$consulta2['categoria_id'].'">'.$consulta2['nombre'].'</option>';
		}
	}
	