<?php include("../../autoload.php");?>	
<?php include("validator.php");?>	
<?php $action = "";

if(isset($_REQUEST["action"]) and $_REQUEST["action"]!=""){
	$action = $_REQUEST["action"];
}

$values = $_REQUEST;
	switch ($action) {
		case "index":
			executeIndex($values);	
		break;
		case "new":
			executeNew($values);	
		break;
		case "add":
			executeSave($values);	
		break;
		case "edit":
			executeEdit($values);	
		break;
		case "update":
			executeUpdate($values);	
		break;		
		case "shipping_lines_list_json":
			executeShippingLinesListJson($values);	
		break;	
		default:
			executeIndex($values);
		break;
	}
	function executeIndex($values = null)
	{
	require('shipping_lines_list_view.php');
	}
	function executeNew($values = null)
	{
        $values['status'] = '1';
		$values['action'] = 'add';
		
		require('shipping_lines_form_view.php');
	}
	function executeSave($values = null)
	{
		
		$ShippingLines = new ShippingLines();
		$values = $ShippingLines->saveShippingLines($values);
		executeEdit($values,message_created);die;
	}
	function executeEdit($values = null,$msg = null)
	{
		$ShippingLines = new ShippingLines();
		$values = $ShippingLines->getShippingLinesById($values);
                $id_shipping_lines = $values['id_shipping_lines'];
                $values['action'] = 'update';
                $values['msg'] = $msg;
		require('shipping_lines_form_view.php');
	}
	function executeUpdate($values = null)
	{
		
		$ShippingLines = new ShippingLines();
		$ShippingLines->updateShippingLines($values);			
		executeEdit($values,message_updated);die;
	}	
	function executeShippingLinesListJson($values)
	{
		$ShippingLines = new ShippingLines();
		$shipping_lines_list_json = $ShippingLines ->getShippingLinesList($values);
		$shipping_lines_list_json_cuenta = $ShippingLines ->getCountShippingLinesList($values);
		$array_json = array();
		$array_json['recordsTotal'] = $shipping_lines_list_json_cuenta;
		$array_json['recordsFiltered'] = $shipping_lines_list_json_cuenta;
		if(count($shipping_lines_list_json)>0)
		{
			foreach ($shipping_lines_list_json as $shipping_lines) 
			{
				$status = $shipping_lines['status'];
				if($status == 0)
				{
					$message_status = "<label class='label label-danger'>Desactivado</label>";
				}
				if($status == 1)
				{
					$message_status = "<label class='label label-success'>Activo</label>";
				}
				$id_shipping_lines= $shipping_lines['id_shipping_lines'];
				$array_json['data'][] = array(
					"id_shipping_lines" => $id_shipping_lines,
					"name" => $shipping_lines['name'],
					"status" => $message_status,
					"date_created" => $shipping_lines['date_created'],
					"date_updated" => $shipping_lines['date_updated'],
					"actions" => 
                                       
                                       '<form method="POST" action = "'.full_url.'/adm/shipping_lines/index.php" >'
                                       .'<input type="hidden" name="action" value="edit">  '
                                       .'<input type="hidden" name="id_shipping_lines" value="'.$id_shipping_lines.'">  '
                                       .'<button class="btn btn-default btn-sm" type="submit"><i class="fa fa-edit  fa-pull-left fa-border"></i></button>'
                                       .'</form>'
					);	
			}	
		}else{
			$array_json['recordsTotal'] = 0;
			$array_json['recordsFiltered'] = 0;
			$array_json['data'][0] = array("id_shipping_lines"=>null,"name"=>"","status"=>"","date_created"=>"","date_updated"=>"","actions"=>"");
		}

		echo json_encode($array_json);die;
		
	}