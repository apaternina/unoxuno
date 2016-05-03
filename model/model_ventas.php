<?php
	

	class model_ventas {

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

		public function registrarCotizacion($codigo, $grupo, $subtotal, $total, $fecha, $tipo, $cantidad_producto, $ancho_producto, $alto_producto, $subtotal_producto, $codigo_producto, $codigo_distribuidor, $codigo_cliente) {
			$sql = " INSERT INTO cotizaciones(CODIGO, GRUPO, SUBTOTAL, TOTAL, FECHA, TIPO, CANTIDAD_PRODUCTO, ANCHO_PRODUCTO, ALTO_PRODUCTO, SUBTOTAL_PRODUCTO, CODIGO_PRODUCTO, CODIGO_DISTRIBUIDOR, CODIGO_CLIENTE) VALUES('$codigo', '$grupo', '$subtotal', '$total', '$fecha', '$tipo', '$cantidad_producto', '$ancho_producto', '$alto_producto', '$subtotal_producto', '$codigo_producto', '$codigo_distribuidor', '$codigo_cliente') ";
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

		public function listarCotizaciones() {
			$sql = " SELECT cot.GRUPO AS GRUPO, COUNT(pro.CODIGO) AS TIPOS_PRODUCTOS, SUM(cot.CANTIDAD_PRODUCTO) AS NUMEROS_PRODUCTOS, cot.TOTAL AS TOTAL, cot.FECHA AS FECHA FROM cotizaciones AS cot INNER JOIN mtmercia AS pro ON cot.CODIGO_PRODUCTO = pro.CODIGO WHERE cot.TIPO = 'ct' GROUP BY cot.GRUPO ";
			$result = mysql_query($sql);
			return $result;
		}

		public function consultarProductosCotizacion($codigo) {
			$sql = " SELECT cot.CODIGO AS CODIGO_COTIZACION, cot.SUBTOTAL AS SUBTOTAL_COTIZACION, cot.TOTAL AS TOTAL_COTIZACION, cot.FECHA AS FECHA_COTIZACION, cot.TIPO AS TIPO_COTIZACION, cot.CANTIDAD_PRODUCTO AS CANTIDAD_PRODUCTO_COTIZACION, cot.ANCHO_PRODUCTO AS ANCHO_PRODUCTO_COTIZACION, cot.ALTO_PRODUCTO AS ALTO_PRODUCTO_COTIZACION, cot.SUBTOTAL_PRODUCTO AS SUBTOTAL_PRODUCTO_COTIZACION, cot.CODIGO_PRODUCTO AS CODIGO_PRODUCTO_COTIZACION, cot.CODIGO_DISTRIBUIDOR AS CODIGO_DISTRIBUIDOR_COTIZACION, cot.CODIGO_CLIENTE AS CODIGO_CLIENTE_COTIZACION, cot.ESTADO AS ESTADO_COTIZACION, pro.DESCRIPCIO AS DESCRIPCION_PRODUCTO, pro.IVA AS IVA_PRODUCTO, mvp.PRECIO AS PRECIO_PRODUCTO 
					FROM cotizaciones AS cot INNER JOIN mtmercia AS pro ON cot.CODIGO_PRODUCTO = pro.CODIGO INNER JOIN mvprecio AS mvp ON pro.CODIGO = mvp.CODPRODUC 
					WHERE cot.TIPO = 'ct' AND cot.GRUPO = '$codigo' ORDER BY cot.SUBTOTAL_PRODUCTO ASC ";
			$result = mysql_query($sql);
			return $result;
		}

		public function eliminarProductosCotizacion($codigo) {
			$sql = " DELETE FROM cotizaciones WHERE GRUPO = '$codigo' ";
			$result = mysql_query($sql);
			
		}

		public function registrarVenta($codigo_venta, $grupo_venta, $fecha_venta, $hora_venta, $total_venta, $observacion_venta, $tipo_venta, $codigo_producto, $cantidad_producto, $ancho_producto, $alto_producto, $descuentoDistribuidorProducto, $descuentoAdicionalProducto, $codigo_distribuidor, $codigo_cliente) {
			$sql = " INSERT INTO cotizaciones(CODIGO, GRUPO, TOTAL, FECHA, HORA, TIPO, CANTIDAD_PRODUCTO, ANCHO_PRODUCTO, ALTO_PRODUCTO, DESCUENTO_DISTRIBUIDOR, DESCUENTO_ADICIONAL, CODIGO_PRODUCTO, CODIGO_DISTRIBUIDOR, CODIGO_CLIENTE, OBSERVACION) VALUES('$codigo_venta', '$grupo_venta', '$total_venta', '$fecha_venta', '$hora_venta', '$tipo_venta', '$cantidad_producto', '$ancho_producto', '$alto_producto', '$descuentoDistribuidorProducto', '$descuentoAdicionalProducto', '$codigo_producto', '$codigo_distribuidor', '$codigo_cliente', '$observacion_venta') ";
			$result = mysql_query($sql);
			if ($result) {
				$sql = " SELECT CODIGO, GRUPO, TOTAL FROM cotizaciones WHERE CODIGO = '$codigo_venta' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
				return $row;
			} else {
				return false;
			}
		}

		public function listarVentasCliente() {
			$sql = " SELECT cot.GRUPO AS GRUPO_COTIZACION, dis.NOMBRE AS NOMBRE_DISTRIBUIDOR_COTIZACION, cot.FECHA AS FECHA_COTIZACION, cot.TOTAL AS TOTAL_COTIZACION, cot.ESTADO AS ESTADO_COTIZACION, cot.TIPO AS TIPO_COTIZACION FROM cotizaciones AS cot INNER JOIN distribuidores AS dis ON cot.CODIGO_DISTRIBUIDOR = dis.NIT GROUP BY cot.GRUPO ORDER BY cot.ID DESC ";
			$result = mysql_query($sql);
			return $result;
		}

	}

?>