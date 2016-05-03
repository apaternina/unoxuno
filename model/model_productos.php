<?php
	

	class model_productos {

		private $db;

		function __construct() {
			require_once '../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function existeProducto($codigo) {
			$sql = " SELECT CODIGO, DESCRIPCIO, IVA FROM mtmercia WHERE CODIGO = '$codigo' ";
			$result = mysql_query($sql);
			$num_rows = mysql_num_rows($result);
			if ($num_rows > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function registrarProducto($codigo, $descripcion, $iva) {
			$sql = " INSERT INTO mtmercia(CODIGO, DESCRIPCIO, IVA) VALUES('$codigo', '$descripcion', '$iva') ";
			$result = mysql_query($sql);
			if ($result) {
				$sql = " SELECT CODIGO, DESCRIPCIO, IVA FROM mtmercia WHERE CODIGO = '$codigo' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
				return $row;
			} else {
				return false;
			}
		}

		public function consultarProducto($codigo) {
			$sql = " SELECT CODIGO, DESCRIPCIO, IVA, PRECIO FROM mtmercia INNER JOIN mvprecio ON CODIGO = CODPRODUC WHERE CODIGO = '$codigo' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			return $row;
		}

		public function consultarProductoAutocomplete($buscar_producto) {
			$sql = " SELECT CODIGO, DESCRIPCIO, IVA FROM mtmercia WHERE CODIGO LIKE '%$buscar_producto%' OR DESCRIPCIO LIKE '%$buscar_producto%' ORDER BY DESCRIPCIO DESC LIMIT 0, 5 ";
			$result = mysql_query($sql);
			return $result;
		}

		public function listarProductos() {
			$sql = " SELECT CODIGO, DESCRIPCIO, IVA FROM mtmercia ORDER BY DESCRIPCIO DESC LIMIT 0, 50 ";
			$result = mysql_query($sql);
			return $result;
		}

	}

?>