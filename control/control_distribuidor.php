<?php

	require_once '../model/model_distribuidores.php';

	$m_distribuidores = new model_distribuidores();

	$elegir = $_POST['elegir'];

	if ($elegir == 1) {

		$codigo = $_POST['codigo'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$fecha_nacimiento = $_POST['fecha_nacimiento'];
		$foto = $_POST['foto'];
		if (empty($foto)) {
			$foto = "defecto.jpg";
		} else {}

		$user_cadetes = $m_cadetes->existeCadete($codigo);
		if($user_cadetes){
			$response["Success"] = 0;
			$response["Mensaje_Error"] = "Codigo ya utilizado en otro registro";
			echo json_encode($response);

		} else {
			$user_cadetes = $m_cadetes->registrarCadete($codigo, $nombres, $apellidos, $telefono, $email, $password, $fecha_nacimiento, $foto);
			if ($user_cadetes) {
				 
				$response["Success"] = 1;
				$response["Tipo"] = "Cadete";
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
				$response["Mensaje_Error"] = "No se pudo registrar el cadete";
				echo json_encode($response);
			}

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

		$buscar_distribuidor = $_POST['distribuidor'];

		$datos_distribuidores = $m_distribuidores->consultarDistribuidorAutocomplete($buscar_distribuidor);
		if ($datos_distribuidores) {

			while ($row = mysql_fetch_array($datos_distribuidores)) {
				$response["Codigo"] = $row["NIT"];
				$response["Nombre"] = $row["NOMBRE"];
				$json[] = $response;			
			}
			echo json_encode($json);

		} else {

			

		}

	}


?>