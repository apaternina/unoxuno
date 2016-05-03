<?php
	

	class model_pedidos {

		private $db;

		function __construct() {
			require_once '../../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {

		}

		public function existeCotizacion($codigo) {
			$sql = " SELECT CODIGO, DESCRIPCIO, IVA FROM mtmercia WHERE CODIGO = '$codigo' ";
			$result = mysql_query($sql);
			$num_rows = mysql_num_rows($result);
			if ($num_rows > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function registrarCotizacion($codigo, $grupo, $subtotal, $total, $fecha, $tipo, $cantidad_producto, $subtotal_producto, $codigo_producto, $codigo_distribuidor, $codigo_cliente) {
			$sql = " INSERT INTO cotizaciones(CODIGO, GRUPO, SUBTOTAL, TOTAL, FECHA, TIPO, CANTIDAD_PRODUCTO, SUBTOTAL_PRODUCTO, CODIGO_PRODUCTO, CODIGO_DISTRIBUIDOR, CODIGO_CLIENTE) VALUES('$codigo', '$grupo', '$subtotal', '$total', '$fecha', '$tipo', '$cantidad_producto', '$subtotal_producto', '$codigo_producto', '$codigo_distribuidor', '$codigo_cliente') ";
			$result = mysql_query($sql);
			if ($result) {
				$sql = " SELECT CODIGO, GRUPO, TOTAL FROM cotizaciones WHERE CODIGO = '$codigo' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
				return $row;
			} else {
				return false;
			}
		}

		public function consultarCotizacion($codigo) {
			$sql = " SELECT CODIGO, DESCRIPCIO, IVA, PRECIO FROM mtmercia INNER JOIN mvprecio ON CODIGO = CODPRODUC WHERE CODIGO = '$codigo' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			return $row;
		}

		public function listarProductosPedidos() {
			$sql = " SELECT DESCRIPCIO, CANTIDAD_PRODUCTO, SUBTOTAL_PRODUCTO, FECHA FROM cotizaciones AS cot INNER JOIN mtmercia AS pro ON cot.CODIGO_PRODUCTO = pro.CODIGO WHERE TIPO = 'pd' ORDER BY SUBTOTAL_PRODUCTO ASC ";
			$result = mysql_query($sql);
			return $result;
		}

	}

?>