<?php


	class model_mtprocli {

		private $db;

		function __construct() {
			require_once '../../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function loginUsuario($codigo, $password) {
			$sql = " SELECT NIT, NOMBRE, EMAIL FROM mtprocli WHERE NIT = '$codigo' OR EMAIL = '$codigo' AND PASSWORD = '$password' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			return $row;
		}

		public function existeCliente($codigo) {
			$sql = " SELECT NIT, NOMBRE, APELLIDO1, DIRECCION, EMAIL, VENDEDOR FROM mtprocli WHERE NIT = '$codigo' ";
			$result = mysql_query($sql);
			$num_rows = mysql_num_rows($result);
			if ($num_rows > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function consultarCliente($codigo) {
			$sql = " SELECT NIT, NOMBRE, APELLIDO1, DIRECCION, EMAIL, VENDEDOR FROM mtprocli WHERE NIT = '$codigo' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			return $row;
		}


		public function consultarClienteAutocomplete($buscar_cliente) {
			$sql = " SELECT NIT, NOMBRE, APELLIDO1 FROM mtprocli WHERE NIT LIKE '%$buscar_cliente%' OR NOMBRE LIKE '%$buscar_cliente%' ORDER BY NOMBRE DESC LIMIT 0, 5 ";
			$result = mysql_query($sql);
			return $result;
		}

		public function actualizarCliente($codigo, $nombre, $direccion, $email) {
			$sql = " UPDATE mtprocli SET NOMBRE = '$nombre', DIRECCION = '$direccion', EMAIL = '$email' WHERE NIT = '$codigo' ";
			$result = mysql_query($sql);
			if ($result) {
				$sql = " SELECT NIT, NOMBRE, DIRECCION FROM mtprocli WHERE NIT = '$codigo' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
				return $row;
			} else {
				return false;
			}
		}

		public function listarClientes() {
			$sql = " SELECT NIT, NOMBRE, APELLIDO1, DIRECCION, EMAIL, VENDEDOR FROM mtprocli ORDER BY NOMBRE DESC LIMIT 0, 50 ";
			$result = mysql_query($sql);
			return $result;
		}

	}

?>