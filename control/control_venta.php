<?php

	require_once '../model/model_ventas.php';

	$m_ventas = new model_ventas();

	$elegir = $_POST['elegir'];

	if ($elegir == 1) {

		$codigoVenta = $_POST['codigoVenta'];
		$grupoVenta = $_POST['grupoVenta'];
		$fechaVenta = $_POST['fechaVenta'];
		$horaVenta = $_POST['horaVenta'];
		$totalVenta = $_POST['totalVenta'];
		$observacionVenta = $_POST['observacionVenta'];
		$tipoVenta = $_POST['tipoVenta'];
		$codigoProducto = $_POST['codigoProducto'];
		$cantidadProducto = $_POST['cantidadProducto'];
		$anchoProducto = $_POST['anchoProducto'];
		$altoProducto = $_POST['altoProducto'];
		$descuentoDistribuidorProducto = $_POST['descuentoDistribuidorProducto'];
		$descuentoAdicionalProducto = $_POST['descuentoAdicionalProducto'];
		$codigoDistribuidor = $_POST['codigoDistribuidor'];
		$codigoCliente = $_POST['codigoCliente'];

		
		$response_ventas = $m_ventas->registrarVenta($codigoVenta, $grupoVenta, $fechaVenta, $horaVenta, $totalVenta, $observacionVenta, $tipoVenta, $codigoProducto, $cantidadProducto, $anchoProducto, $altoProducto, $descuentoDistribuidorProducto, $descuentoAdicionalProducto, $codigoDistribuidor, $codigoCliente);

		if ($response_ventas) {
			$response["Success"] = 1;
			$response["Mensaje"] = '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button><strong>Correcto!</strong> Registro anterior satisfactorio.</div>';
			echo json_encode($response);
		} else {
			$response["Success"] = 0;
			$response["Mensaje"] = '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button><strong>Error!</strong> Registro invalido.</div>';
			echo json_encode($response);
		}


	} else if ($elegir == 2) {

		$codigo = $_POST['codigo'];

		$user_cadetes = $m_cadetes->consultarCadete($codigo);
		if ($user_cadetes) {
			
			$response["Success"] = 1;
			$response["Codigo"] = $user_cadetes["codigo"];
			$response["Nombres"] = $user_cadetes["nombres"];
			$response["Apellidos"] = $user_cadetes["apellidos"];
			$response["Telefono"] = $user_cadetes["telefono"];
			$response["Email"] = $user_cadetes["email"];
			$response["Password"] = $user_cadetes["password"];
			$response["Fecha_Nacimiento"] = $user_cadetes["fecha_nacimiento"];
			$response["Foto"] = $user_cadetes["foto"];
			echo json_encode($response);

		} else {

			$response["Success"] = 0;
			$response["Mensaje_Error"] = "No se encontro cadete";
			echo json_encode($response);

		}

	} else if ($elegir == 3) {
		
		$codigo = $_POST['codigo'];
		$nombre = $_POST['nombre'];
		$direccion = $_POST['direccion'];
		$email = $_POST['email'];

		$user_cliente = $m_clientes->actualizarCliente($codigo, $nombre, $direccion, $email);

		if ($user_cliente) {
			
?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Correcto!</strong> Datos del Cliente con el NIT: <?php echo $user_cliente["NIT"]; ?> actualizado satisfactoriamente. 
			</div>
			
<?php

		} else {

?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Error!</strong> No se pudo actualizar los datos del Cliente.
			</div>

<?php
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
		
		$user_cadetes = $m_cadetes->listarCadetes();

		if ($user_cadetes) {
			
			while ($row = mysql_fetch_array($user_cadetes)) {
				$res = array(
				$response["Codigo"] = $row["codigo"],
				$response["Nombres"] = $row["nombres"],
				$response["Apellidos"] = $row["apellidos"],
				$response["Telefono"] = $row["telefono"],
				$response["Email"] = $row["email"],
				$response["Password"] = $row["password"],
				$response["Fecha_Nacimiento"] = $row["fecha_nacimiento"],
				$response["Foto"] = $row["foto"]);
				$json["Cadetes"][] = $response;
			}
			echo json_encode($json);
			

		} else {

			$response["Success"] = 0;
			$response["Mensaje_Error"] = "No se encontraron cadetes registrado";
			echo json_encode($response);

		}

	} else if ($elegir == 6) {

		$buscar_cliente= $_POST['cliente'];

		$datos_clientes = $m_clientes->consultarClienteAutocomplete($buscar_cliente);
		if ($datos_clientes) {

			while ($row = mysql_fetch_array($datos_clientes)) {
				$response["Codigo"] = $row["NIT"];
				$response["Nombre"] = $row["NOMBRE"];
				$json[] = $response;
			}
			echo json_encode($json);

		} else {

			

		}

	} else if ($elegir == 7) {

		$codigoCliente = $_POST['codigoCliente'];

		$response_ventas = $m_ventas->listarVentasCliente();
		if ($response_ventas) {

			while ($row = mysql_fetch_array($response_ventas)) {


				$response["Venta_Codigo"] = $row["GRUPO_COTIZACION"];
				$response["Venta_Usuario"] = $row["NOMBRE_DISTRIBUIDOR_COTIZACION"];
				$response["Venta_Fecha"] = $row["FECHA_COTIZACION"];
				$response["Venta_Total"] = $row["TOTAL_COTIZACION"];
				$response["Venta_Estado"] = $row["ESTADO_COTIZACION"];

				$response["Venta_Tipo"] = $row["TIPO_COTIZACION"];

				$json[] = $response;			
			}
			echo json_encode($json);

		} else {

			echo ("Error");

		}

	} else if ($elegir == 8) {

		$codigo = $_POST['codigo'];

		$response_cotizaciones = $m_cotizaciones->eliminarProductosCotizacion($codigo);
		if (!$response_cotizaciones) {

			$arrayDatosCotizacion = $_POST['arrayDatosVenta'];

			for ($contadorFilas=0; $contadorFilas < count($arrayDatosCotizacion); $contadorFilas++) { 
			
				$codigoCotizacion = $arrayDatosCotizacion[$contadorFilas][0];
				$grupoCotizacion = $arrayDatosCotizacion[$contadorFilas][1];
				$subtotalCotizacion = $arrayDatosCotizacion[$contadorFilas][2];
				$totalCotizacion = $arrayDatosCotizacion[$contadorFilas][3];
				$fechaCotizacion = $arrayDatosCotizacion[$contadorFilas][4];
				$tipoCotizacion = $arrayDatosCotizacion[$contadorFilas][5];
				$codigoDistribuidor = $arrayDatosCotizacion[$contadorFilas][6];
				$codigoCliente = $arrayDatosCotizacion[$contadorFilas][7];
				$codigoProducto = $arrayDatosCotizacion[$contadorFilas][8];
				$cantidadProducto = $arrayDatosCotizacion[$contadorFilas][9];
				$anchoProducto = $arrayDatosCotizacion[$contadorFilas][10];
				$altoProducto = $arrayDatosCotizacion[$contadorFilas][11];
				$subtotalProducto = $arrayDatosCotizacion[$contadorFilas][12];
				
				$response_registrarventa = $m_cotizaciones->registrarCotizacion($codigoCotizacion, $grupoCotizacion, $subtotalCotizacion, $totalCotizacion, $fechaCotizacion, $tipoCotizacion, $cantidadProducto, $anchoProducto, $altoProducto, $subtotalProducto, $codigoProducto, $codigoDistribuidor, $codigoCliente);
			}

			if ($response_registrarventa) {
				$response["Success"] = 1;
				$response["Mensaje"] = '<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button><strong>Correcto!</strong> La Cotización se a convertido en Pedido.</div>';
				echo json_encode($response);
			} else {
				$response["Success"] = 0;
				$response["Mensaje"] = '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button><strong>Error!</strong> No se pudo convertir la Cotizacion.</div>';
				echo json_encode($response);
			}

		} else {

		}

	}


?>