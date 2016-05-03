<?php

	require_once 'db_connect.php';
	$db = new db_connect();
	$db->connect();

	session_start();

	if (empty($_POST['codigo_usuario']) || empty($_POST['password_usuario']))
	{
		if(!isset($_SESSION['usuario_codigo']))
		{
			header("Location: ../index.php");
		}
	}
	
	else
	{

		$codigoUsuario = $_POST['codigo_usuario'];
		$passwordUsuario = $_POST['password_usuario'];

		$codigoUsuario = stripslashes($codigoUsuario);
		$passwordUsuario = stripslashes($passwordUsuario);
		$codigoUsuario = mysql_real_escape_string($codigoUsuario);
		$passwordUsuario = mysql_real_escape_string($passwordUsuario);

		$sql = " SELECT CODIGO, NOMBRE, EMAIL FROM distribuidores 
		WHERE EMAIL = '$codigoUsuario' AND PASSWORD = '$passwordUsuario' ";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);

		if ($row) {
			$_SESSION['usuario_codigo'] = $row["CODIGO"];
			$_SESSION['usuario_nombre'] = $row["NOMBRE"];
			$_SESSION['usuario_email'] = $row["EMAIL"];
			$response["Success"] = 1;
			echo json_encode($response);

		} else {
			$response["Success"] = 0;
			$response["Mensaje"] = '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
			</button><strong>Error!</strong> Combinación de usuario y contraseña incorrecta.</div>';
			echo json_encode($response);
		}
	}

?>