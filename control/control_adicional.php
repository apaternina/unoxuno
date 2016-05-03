<?php

	require_once '../model/model_adicionales.php';

	$m_adicionales = new model_adicionales();

	$elegir = $_POST['elegir'];

	if ($elegir == 0) {

		$nombreAdicional = $_POST['nombreAdicional'];
		$tipoProducto = $_POST['tipoProducto'];
		$tablaAdicional = $_POST['tablaAdicional'];

		$datos_adicional = $m_adicionales->consultarAdicional($nombreAdicional, $tipoProducto, $tablaAdicional);
		if ($datos_adicional)
		{
			$response_adicional["Success"] = 1;
			$response_adicional["Nombre"] = $datos_adicional["nombre".$tablaAdicional];
			$response_adicional["Precio"] = $datos_adicional["precio".$tablaAdicional];
			$response_adicional["Tipo_Producto"] = $datos_adicional["tipoProducto".$tablaAdicional];
			echo json_encode($response_adicional);
		}
		else
		{
			$response_adicional["Success"] = 0;
			$response_adicional["Mensaje"] = '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button><strong>Error!</strong> Error al consultar el Precio del adicional.</div>';
			echo json_encode($response_adicional);
		}

	} else if ($elegir == 1) {

		$nombreAdicional = $_POST['nombreAdicional'];
		$precioAdicional = $_POST['precioAdicional'];
		$tipoProducto = $_POST['tipoProducto'];
		$tablaAdicional = $_POST['tablaAdicional'];

		$datos_mando = $m_adicionales->actualizarAdicional($nombreAdicional, $precioAdicional, $tipoProducto, $tablaAdicional);
		if ($datos_mando)
		{
			$response_mando["Success"] = 1;
			$response_mando["Nombre"] = $datos_mando["nombre".$tablaAdicional];
			$response_mando["Precio"] = $datos_mando["precio".$tablaAdicional];
			$response_mando["Tipo_Producto"] = $datos_mando["tipoProducto".$tablaAdicional];
			echo json_encode($response_mando);
		}
		else
		{	
			$response_mando["Success"] = 0;
			$response_mando["Mensaje"] = '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button><strong>Error!</strong> No se pudo actualizar el Precio de este adicional.</div>';
			echo json_encode($response_mando);
		}

	} else if ($elegir == 2) {

		$codigo = $_POST['codigo'];

		$datos_producto = $m_productos->consultarProducto($codigo);
		if ($datos_producto) {

			$response["Codigo"] = $datos_producto["CODIGO"];
			$response["Nombre"] = $datos_producto["DESCRIPCIO"];
			$response["Iva"] = $datos_producto["IVA"];
			$response["Precio"] = $datos_producto["PRECIO"];
			echo json_encode($response);

		} else {

			

		}

	} else if ($elegir == 4) {
		
		$codigo = $_POST['codigo'];

		$user_cadetes = $m_cadetes->eliminarCadete($codigo);

		if ($user_cadetes) {
			
			$response["Success"] = 1;
			$response["Codigo"] = $codigo;
			echo json_encode($response);
		
		} else {

			$response["Success"] = 0;
			$response["Mensaje_Error"] = "No se pudo eliminar cadete";
			echo json_encode($response);

		}

	} else if ($elegir == 5) {
		
		$datos_productos = $m_productos->listarProductos();

		if ($datos_productos) {
			
			while ($row = mysql_fetch_array($datos_productos)) {
				
				$response["Codigo"] = $row["codigo"];
				$response["Nombres"] = $row["nombre"];
				$response["Apellidos"] = $row["descripcion"];
				$response["Telefono"] = $row["precio"];
				$json[] = $response;
			}
			echo json_encode($json);
			

		} else {

			$response["Success"] = 0;
			$response["Mensaje_Error"] = "No se encontraron cadetes registrado";
			echo json_encode($response);

		}

	} else if ($elegir == 6) {

		$buscar_producto = $_POST['producto'];

		$datos_productos = $m_productos->consultarProductoAutocomplete($buscar_producto);
		if ($datos_productos) {

			while ($row = mysql_fetch_array($datos_productos)) {
				$response["Codigo"] = $row["CODIGO"];
				$response["Nombre"] = $row["DESCRIPCIO"];
				$response["Iva"] = $row["IVA"];
				$json[] = $response;
			}
			echo json_encode($json);

		} else {

			

		}

	}


?>