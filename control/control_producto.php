<?php

	require_once '../model/model_productos.php';

	$m_productos = new model_productos();

	$elegir = $_POST['elegir'];

	if ($elegir == 1) {

		$codigo = $_POST['codigoProducto'];

		$datos_producto = $m_productos->consultarProducto($codigo);
		if ($datos_producto) {

?>
			<tr>
				<td style="text-align:center;"><?php echo $datos_producto["codigo"]; ?></td>
				<td style="text-align:center;"><?php echo $datos_producto["nombre"]; ?></td>
				<td style="text-align:center;"><?php echo $datos_producto["descripcion"]; ?></td>
				<td style="text-align:center;"><?php echo $datos_producto["precio"]; ?></td>
			</tr>
<?php

		} else {

			

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
?>
				<?php		
			

		} else {

			

		}

	} else if ($elegir == 3) {
		
		$codigo = $_POST['codigo'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$direccion = $_POST['password'];

		$user_vendedor = $m_vendedores->actualizarVendedor($codigo, $nombre, $apellido, $direccion);

		if ($user_vendedor) {

			$response["Codigo"] = $user_vendedor["codigo"];
?>

			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Correcto!</strong> Datos del Cliente con el codigo: <?php echo $user_vendedor["codigo"]; ?> actualizado satisfactoriamente. 
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