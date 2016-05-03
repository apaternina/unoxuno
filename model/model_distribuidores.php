<?php
	

	class model_distribuidores {

		private $db;

		function __construct() {
			require_once '../../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {

		}

		public function loginDistribuidor($codigo, $password) {
			$sql = " SELECT NIT, NOMBRE FROM distribuidores WHERE NIT = '$codigo' AND PASSWORD = '$password' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			return $row;
		}

		public function existeDistribuidor($codigo) {
			$sql = " SELECT NIT, NOMBRE FROM distribuidores WHERE NIT = '$codigo' ";
			$result = mysql_query($sql);
			$num_rows = mysql_num_rows($result);
			if ($num_rows > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function consultarDistribuidorAutocomplete($buscar_distribuidor) {
			$sql = " SELECT NIT, NOMBRE FROM distribuidores WHERE NIT LIKE '%$buscar_distribuidor%' OR NOMBRE LIKE '%$buscar_distribuidor%' OR EMAIL LIKE '%$buscar_distribuidor%' ORDER BY NOMBRE DESC LIMIT 0, 5 ";
			$result = mysql_query($sql);
			return $result;
		}

		public function actualizarDistribuidor($codigo, $nombre, $direccion, $password) {
			$sql = " UPDATE distribuidores SET NOMBRE = '$nombre', DIRECCION = '$direccion', PASSWORD = '$password' WHERE NIT = '$codigo' ";
			$result = mysql_query($sql);
			if ($result) {
				$sql = " SELECT NIT, NOMBRE FROM distribuidores WHERE NIT = '$codigo' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
				return $row;
			} else {
				return false;
			}
		}

		public function listarVendedores() {
			$sql = " SELECT NIT, NOMBRE, EMAIL, ESTADO FROM distribuidores ";
			$result = mysql_query($sql);
			return $result;
		}

	}

?>