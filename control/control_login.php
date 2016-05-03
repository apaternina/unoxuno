<?php

	require_once '../model/model_mtprocli.php';

	$m_mtprocli = new model_mtprocli();

	/*header ("Location: ../view/MyOrders.php");*/

	$codigo = $_POST['codigo'];
	$password = $_POST['password'];//0001S01

	$response_login = $m_mtprocli->loginUsuario($codigo, $password);

	if ($response_login) {
		$response["Success"] = 1;
		$response["Nit"] = $response_login["NIT"];
		$response["Nombre"] = $response_login["NOMBRE"];
		$response["Email"] = $response_login["EMAIL"];
		echo json_encode($response);

	} else {
		$response["Success"] = 0;
		$response["Mensaje"] = '<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
		</button><strong>Error!</strong> Combinación de codigo y contraseña incorrecta.</div>';
		echo json_encode($response);
	}


?>