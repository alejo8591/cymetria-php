<?php 
	
	$errors = array();
	$form_data = array();

	/* Validando info básica desde el servidor */
	if(empty($_POST['name'])){
		$errors['name'] = "El nombre no puede estar en blanco";
	}

	if(!empty($errors)){
		// Cuando hay error en formulario
		$form_data['success'] = false;
		$form_data['errors'] = $errors;
	} else {
		// Cuando la información del formulario es correcta y no hay errores
		$form_data['success'] = true;
		$form_data['posted'] = 'Información Correcta';
	}

	// retornando un objeto JSON
	echo json_encode($form_data);
?>