<?php
	

	class model_orders {

		private $db;

		function __construct() {
			require_once '../utilities/db/db_connect.php';
			$this->db = new db_connect();
			$this->db->connect();
		}

		function __destruct() {}

		public function registrarOrder($codigoVenta, $precioVenta, $fechaVenta, $horaVenta, $tipoVenta, $grupoVenta, $codigoDistribuidor, $codigoCliente)
		{
			$sql = " INSERT INTO venta(codigoVenta, precioVenta, fechaVenta, horaVenta, tipoVenta, grupoVenta_Productos, codigoDistribuidores, codigoClientes) 
			VALUES('$codigoVenta', '$precioVenta', '$fechaVenta', '$horaVenta', '$tipoVenta', '$grupoVenta', '$codigoDistribuidor', '$codigoCliente') ";
			$result = mysql_query($sql);
			if ($result)
			{
				$sql = " SELECT codigoVenta FROM venta WHERE codigoVenta = '$codigoVenta' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
				return $row;
			} else {
				return false;
			}
		}

		public function registrarProductosOrder($grupoVenta, $codigoProducto, $cantidadProducto, $anchoProducto, $altoProducto, $precioProducto)
		{
			$sql = " INSERT INTO venta_productos(grupoVenta_Productos, codigoProductoVenta_Productos, cantidadProductoVenta_Productos, anchoProductoVenta_Productos, altoProductoVenta_Productos, precioProductoVenta_Productos) 
			VALUES('$grupoVenta', '$codigoProducto', '$cantidadProducto', '$anchoProducto', '$altoProducto', '$precioProducto') ";
			$result = mysql_query($sql);
			if ($result)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function consultarPedido($codigoPedido) {
			$sql = " SELECT p.codigoPedidos AS p_codigoPedidos, p.fechaPedidos AS p_fechaPedidos, p.horaPedidos AS p_horaPedidos, p.totalPedidos AS p_totalPedidos, 
			c.nombreClientes AS c_nombreClientes, ep.proceso_estado_pedidos AS ep_proceso_estado_pedidos FROM pedidos AS p INNER JOIN 
			clientes AS c ON p.clientes_codigoClientes = c.codigoClientes INNER JOIN estado_pedidos AS ep ON p.estado_pedidos_codigo_estado_pedidos = ep.codigo_estado_pedidos 
			WHERE p.codigoPedidos = '$codigoPedido' ";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			return $row;
		}

		public function actualizarEstadoPedido($codigoPedido, $estadoPedido, $procesoEstadoPedido) {
			$sql = " UPDATE pedidos AS p INNER JOIN estado_pedidos AS ep ON p.estado_pedidos_codigo_estado_pedidos = ep.codigo_estado_pedidos 
			SET ep.nombre_estado_pedidos = '$estadoPedido', ep.proceso_estado_pedidos = '$procesoEstadoPedido' 
			WHERE p.codigoPedidos = '$codigoPedido' ";
			$result = mysql_query($sql);
			if ($result) {
				$sql = " SELECT codigoPedidos FROM pedidos WHERE codigoPedidos = '$codigoPedido' ";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
				return $row;
			} else {
				return false;
			}
		}

		public function listarPedidosAdministrador($codigoUsuario) {
			$sql = " SELECT p.codigoPedidos AS p_codigoPedidos, p.fechaPedidos AS p_fechaPedidos, p.totalPedidos AS p_totalPedidos, 
			c.nombreClientes AS c_nombreClientes, ep.nombre_estado_pedidos AS ep_nombre_estado_pedidos FROM pedidos AS p INNER JOIN 
			clientes AS c ON p.clientes_codigoClientes = c.codigoClientes INNER JOIN estado_pedidos AS ep ON p.estado_pedidos_codigo_estado_pedidos = ep.codigo_estado_pedidos 
			WHERE p.administradores_codigoAdministradores = '$codigoUsuario' ORDER BY p.idPedidos DESC ";
			$result = mysql_query($sql);
			return $result;
		}

		public function listarPedidoProductos($codigoPedido) {
			$sql = " SELECT pp.productos_codigoProductos AS pp_productos_codigoProductos, pp.cantidad_productos_pedidos AS pp_cantidad_productos_pedidos, pp.total_productos_pedidos AS pp_total_productos_pedidos, 
			p.nombreProductos AS p_nombreProductos 
			FROM productos_pedidos AS pp INNER JOIN productos AS p ON pp.productos_codigoProductos = p.codigoProductos 
			WHERE pp.pedidos_codigoPedidos = '$codigoPedido' ";
			$result = mysql_query($sql);
			return $result;
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