<?php

	require_once '../model/model_orders.php';

	$m_orders = new model_orders();

	$elegir = $_POST['elegir'];

	if ($elegir == 1) {

		$codigoVenta = $_POST['order_codigo'];
		$precioVenta = $_POST['distribuidor_total'];
		$fechaVenta = $_POST['order_fecha'];
		$horaVenta = $_POST['order_hora'];
		$tipoVenta = $_POST['order_tipo'];
		$grupoVenta = $_POST['order_grupo'];
		$codigoDistribuidor = $_POST['distribuidor_codigo'];
		$codigoCliente = $_POST['cliente_codigo'];
		$arrayDatosOrder = $_POST['order_array'];

		$response_order = $m_orders->registrarOrder($codigoVenta, $precioVenta, $fechaVenta, $horaVenta, $tipoVenta, $grupoVenta, $codigoDistribuidor, $codigoCliente);

		if($response_order)
		{
			for ($contadorFilas=0; $contadorFilas < count($arrayDatosOrder); $contadorFilas++)
			{ 
				
				$codigoProducto = $arrayDatosOrder[$contadorFilas][0];
				$cantidadProducto = $arrayDatosOrder[$contadorFilas][1];
				$anchoProducto = $arrayDatosOrder[$contadorFilas][2];
				$altoProducto = $arrayDatosOrder[$contadorFilas][3];
				$precioProducto = $arrayDatosOrder[$contadorFilas][4];
				
				$response_productos_order = $m_orders->registrarProductosOrder($grupoVenta, $codigoProducto, $cantidadProducto, $anchoProducto, $altoProducto, $precioProducto);
			}

			if ($response_productos_order)
			{
				$response["Success"] = 1;
				echo json_encode($response);
			}
			else
			{
				$response["Success"] = 0;
				echo json_encode($response);
			}
		}

	}

?>