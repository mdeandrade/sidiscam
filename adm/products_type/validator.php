<?php


 
 
	function validate($values){
		$errors = array();
		$validator_values = array();
		
		$validator_values['name'] = array(
			
			"minlength" => 3,
			"maxlength" => 100,
			"type" => "text",
			"label" => "nombre",
			"required" => true
		);
		$validator_values['abr'] = array(
			
			"minlength" => 1,
			"maxlength" => 10,
			"type" => "text",
			"label" => "Abreviatura",
			"required" => false
		);
		$validator_values['description'] = array(
			
			"minlength" => 3,
			"maxlength" => 100,
			"type" => "text",
			"label" => "nombre",
			"required" => false
		);
		$validator_values['id_product'] = array(
			
			"type" => "number",
			"label" => "Producto",
			"required" => true
		);
		$ValidateBase = new ValidateBase();
		$errors = $ValidateBase->validate_base($validator_values, $values);
		return $errors;
		
		
	}
	