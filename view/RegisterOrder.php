<?php
	include('../utilities/db/db_session.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uno x Uno</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <script>
		$(document).ready(function(){
	    	
			/* /SELECTS AUTOCOMPLETES */
	    	$('#distribuidor_buscar').select2({
	    		placeholder: "Buscar Distribuidor",
				allowClear: true,
			    minimumInputLength: 1,
			    language: {
				  inputTooShort: function () {
				    return "Escriba al menos 1 caracter...";
				  }
				},
			    ajax: {
			    	delay: 250,
			        dataType: "json",
			        type: "POST",
			        url: "../control/control_distribuidor.php",
			        data: function (params) {
			            var queryParameters = {
			            	elegir: 6,
			                distribuidor: params.term
			            }
			            return queryParameters;
			        },
			        processResults: function (data) {
			            return {
			                results: $.map(data, function (item) {
			                    return {
			                    	id: item.Codigo,
			                        text: item.Nombre
			                    };
			                })
			            };
			        }
			    }
			});

			$('#cliente_buscar').select2({
	    		placeholder: "Buscar Cliente",
				allowClear: true,
			    minimumInputLength: 1,
			    language: {
				  inputTooShort: function () {
				    return "Escriba al menos 1 caracter...";
				  }
				},
			    ajax: {
			    	delay: 250,
			        dataType: "json",
			        type: "POST",
			        url: "../control/control_cliente.php",
			        data: function (params) {
			            var queryParameters = {
			            	elegir: 6,
			                cliente: params.term
			            }
			            return queryParameters;
			        },
			        processResults: function (data) {
			            return {
			                results: $.map(data, function (item) {
			                    return {
			                    	id: item.Codigo,
			                        text: item.Nombre
			                    };
			                })
			            };
			        }
			    }
			});

			$('#producto_buscar').select2({
	    		placeholder: "Buscar Producto",
				allowClear: true,
			    minimumInputLength: 1,
			    language: {
				  inputTooShort: function () {
				    return "Escriba al menos 1 caracter...";
				  }
				},
			    ajax: {
			    	delay: 250,
			        dataType: "json",
			        type: "POST",
			        url: "../control/control_producto.php",
			        data: function (params) {
			            var queryParameters = {
			            	elegir: 6,
			                producto: params.term
			            }
			            return queryParameters;
			        },
			        processResults: function (data) {
			            return {
			                results: $.map(data, function (item) {
			                    return {
			                    	id: item.Codigo,
			                        text: item.Nombre
			                    };
			                })
			            };
			        }
			    }
			});
			/* /SELECTS AUTOCOMPLETES */

			agregarProductos(<?php echo $_POST['arrayDatosProductos']; ?>);

		});
	</script>
    <style type="text/css">
	    @media (min-width: 768px) {
			.navbar-collapse {
				height: auto;
				border-top: 0;
				box-shadow: none;
				max-height: none;
				padding-left:0;
				padding-right:0;
			}
			.navbar-collapse.collapse {
				display: block !important;
				width: auto !important;
				padding-bottom: 0;
				overflow: visible !important;
			}
			.navbar-collapse.in {
				overflow-x: visible;
			}
			.navbar {
			    max-width:300px;
			    margin-right: 0;
			    margin-left: 0;
			}   
			.navbar-nav,
			.navbar-nav > li,
			.navbar-left,
			.navbar-right,
			.navbar-header
			{float:none !important;}

			.navbar-right .dropdown-menu {left:0;right:auto;}
			.navbar-collapse .navbar-nav.navbar-right:last-child {
			    margin-right: 0;
			}
		}
	</style>

  </head>
  <body>
    <div class="col-sm-3">
			<!-- MENU_NAV -->
			<nav class="navbar navbar-default" role="navigation">
	      		<div class="navbar-header">
	        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	          		<span class="sr-only">Toggle navigation</span>
	          		<span class="icon-bar"></span>
	          		<span class="icon-bar"></span>
	          		<span class="icon-bar"></span>
	        		</button>
	        		<a href="MyOrders.php"><img src="../utilities/images/logo.jpg" alt="UnoxUno" class="navbar-brand" align="top" style="width:100%; height:100%;"></a>
	      		</div>

	      		<div class="collapse navbar-collapse navbar-ex1-collapse">
	        		<ul class="nav navbar-nav">
			      		<li><a href="MyOrders.php">Pedidos y Cotizaciones</a></li>
			      		<li><a href="AddProduct.php">Nuevo Pedido/Cotización</a></li>
			      		<li><a href="AdminPrices.php">Administrador de Precios</a></li>
			      		<li><a href="#">Consulta de Inventario</a></li>
	        		</ul>
	        		<hr>
	        		<ul class="nav navbar-nav navbar-right">
	          			<li><a href="#">Mis datos de acceso</a></li>
	          			<li><a href="#">Datos de Cotización</a></li>
	          			<li><a href="../utilities/db/db_logout.php">Salir</a></li>
	        		</ul>
	      		</div>
    		</nav>
    		<!-- /MENU_NAV -->
		</div>


		<div class="col-sm-9">

		    <div class="panel panel-primary">
			 	<div class="panel-heading" style="background-color:#0088CC !important;">
			    	<h3 class="panel-title" style="color:#FFF !important;"><strong>Detalles</strong></h3>
				</div>
				<div class="panel-body">

					<div class="form-group col-sm-12">
						<div class="col-sm-4">
							<label>Distribuidor:</label>
						</div>

						<div class="col-sm-8">
				            <label id="ro_detalle_distribuidor"></label>
						</div>

						<div class="col-sm-4">
							<label>Fecha:</label>
						</div>

						<div class="col-sm-8">
				            <label id="ro_detalle_fecha"></label>
						</div>

						<div class="col-sm-4">
							<label>Hora:</label>
						</div>

						<div class="col-sm-8">
				            <label id="ro_detalle_hora"></label>
						</div>

						<div class="col-sm-4">
							<label>Codigo:</label>
						</div>

						<div class="col-sm-8">
				            <label id="ro_detalle_codigo"></label>
						</div>

						<div class="col-sm-4">
							<label>Cliente:</label>
						</div>

						<div class="col-sm-8">
				            <label id="ro_detalle_cliente"></label>
						</div>

						<div class="col-sm-12">
				            <label id="ro_detalle_cliente_codigo" style="display:none"></label>
						</div>
					</div>
				    
				    <div id="notificacion"></div>

				    <div class="form-group col-sm-12">
					    <div class="panel panel-danger">
						 	<div class="panel-heading" style="background-color:#CA0707 !important;">
						    	<h3 class="panel-title" style="color:#FFF !important;"><strong>Lista de Productos</strong></h3>
							</div>
							<div class="panel-body">
							
						  		<div class="table-responsive">
								  	<table id="tableProductos" class="table table-condensed">
										<thead>
											<tr>
												<th style="text-align:center;" width="10%">Item</th>
											    <th style="text-align:center;" width="15%">Nombre</th>
											    <th style="text-align:center;" width="15%">Cantidad</th>
											    <th style="text-align:center;" width="10%">Ancho</th>
											    <th style="text-align:center;" width="5%">Alto</th>
											    <th style="text-align:center;" width="10%">Precio</th>
											    <th style="text-align:center;" width="10%">Características</th>
											    <th style="text-align:center;" width="15%">Disponibilidad</th>
											    <th style="text-align:center;" width="10%">Seleccione</th>
											</tr>
										</thead>
										<tbody id="detalleProducto">
										</tbody>
										<tfoot>
										</tfoot>
							        </table>
								</div>

					    	</div>
						</div>
					</div>

					<div class="form-group col-sm-12">

						<div class="col-sm-4"></div>

					    <div class="col-sm-4" style="text-align:right;">
						    <label style="color:#CA0707;">Total Distribuidor</label>
					    </div>

					    <div class="col-sm-4" style="text-align:right;">
						    <label style="color:#CA0707;">Total Cliente</label>
					    </div>

					    <div class="col-sm-4">
						    <label style="color:#CA0707;">SubTotal</label>
					    </div>

				    	<div class="col-sm-4" style="text-align:right;">
						    <label style="color:#CA0707;">$ <label><label style="color:#CA0707;" id="ro_subtotal_distribuidor">0.00</label>
					    </div>

					    <div class="col-sm-4" style="text-align:right;">
						    <label style="color:#CA0707;">$ <label><label style="color:#CA0707;" id="ro_subtotal_cliente">0.00</label>
					    </div>

					    <div class="col-sm-4">
						    <label style="color:#CA0707;">IVA</label>
					    </div>

					    <div class="col-sm-4" style="text-align:right;">
						    <label style="color:#CA0707;">$ <label><label style="color:#CA0707;" id="ro_iva_distribuidor">0.00</label>
					    </div>

					    <div class="col-sm-4" style="text-align:right;">
						    <label style="color:#CA0707;">$ <label><label style="color:#CA0707;" id="ro_iva_cliente">0.00</label>
					    </div>

					    <div class="col-sm-12">
						    <hr>
					    </div>

					    <div class="col-sm-4">
						    <label style="color:#CA0707;">Total Pedido</label>
					    </div>

					    <div class="col-sm-4" style="text-align:right;">
						    <label style="color:#CA0707;">$ <label><label style="color:#CA0707;" id="ro_total_distribuidor">0.00</label>
					    </div>

					    <div class="col-sm-4" style="text-align:right;">
						    <label style="color:#CA0707;">$ <label><label style="color:#CA0707;" id="ro_total_cliente">0.00</label>
					    </div>

					</div>

					<div class="form-group col-sm-12">
						<hr>
					</div>

					<div class="form-group col-sm-12">
						<div class="form-group col-sm-4">
							<label>Referencias</label>
						</div>

						<div class="form-group col-sm-8">
				            <input id="referencias_order" class="form-control" type="text"></input>
				            <p style="font-size:85%;">Ingrese aquí el nombre de su cliente o palabras claves para encontrar su pedido</p>
						</div>

						<div class="form-group col-sm-4">
							<label>Observaciones Generales</label>
						</div>

						<div class="form-group col-sm-8">
				            <textarea class="form-control" id="observaciones_order" rows="3" maxlength="200"></textarea>
						</div>
					</div>

					<div class="col-sm-12">
			    		<button class="btn btn-danger" type="button" onclick="realizarCotizacion()" style="background-color:#CA0707 !important;">Guardar como Cotización</button>
			    		<button class="btn btn-danger" type="button" onclick="realizarPedido()" style="background-color:#CA0707 !important;">Realizar Pedido</button>
			    	</div>
				    
		    	</div>
		    </div>

		</div>
	</div>
    
    <script type="text/javascript">

    	function agregarProductos(datosProductos)
    	{
    		/* DETALLES */
    		var date = new Date();
    		var dia = date.getDate();
    		var mes = date.getMonth()+1;
    		var anio = date.getFullYear();
    		if (dia < 10) { dia = "0" + dia }
			if (mes < 10) { mes = "0" + mes }
    		var fechaOrder = dia + "/" + mes + "/" + date.getFullYear();
    		var horas = date.getHours();
    		var minutos = date.getMinutes();
    		var segundos = date.getSeconds();
		    if (horas < 10) { horas = "0" + horas }
			if (minutos < 10) { minutos = "0" + minutos }
			if (segundos < 10) { segundos = "0" + segundos }
    		var horaOrder = horas + ":" + minutos + ":" + segundos;
    		var codigoOrder = "order-" + dia + "" + mes + "" + anio + "" + horas + "" + minutos + "" + segundos;
    		
    		$("#ro_detalle_fecha").html(fechaOrder);
    		$("#ro_detalle_hora").html(horaOrder);
    		$("#ro_detalle_codigo").html(codigoOrder);
    		$("#ro_detalle_distribuidor").html("<?php print_r($_SESSION['usuario_nombre']); ?>");
    		$("#ro_detalle_cliente").html(datosProductos[0].cliente_nombre);
    		$("#ro_detalle_cliente_codigo").html(datosProductos[0].cliente_codigo);
    		/* /DETALLES */

    		/* PRODUCTOS */
    		var rowItemProducto, rowNombreProducto, rowCantidadProducto, rowAnchoProducto, rowAltoProducto, rowPrecioProducto, rowCaracteristicasProducto, rowDisponibilidadProducto, rowOpcionesProducto;
    		var caracteristicasProducto, disponibilidadProducto, opcionesProducto;
    		/* /PRODUCTOS */

    		for (var i = 0; i < datosProductos.length; i++) {
    			caracteristicasProducto = "";
    			disponibilidadProducto = "Disponible";
    			opcionesProducto = "";

    			/* HIDDENS TD*/
				rowHiddenCodigoProducto = '<td style="text-align:center;display:none;">'+(datosProductos[i].producto_codigo)+'</td>';
				/* /HIDDENS TD*/

    			rowItemProducto = '<td style="text-align:center" id="td_itemProducto'+(datosProductos[i].venta_codigo)+'">'+(i+1)+'</td>';
    			rowNombreProducto = '<td style="text-align:center">'+(datosProductos[i].producto_nombre)+'</td>';
    			rowCantidadProducto = '<td style="text-align:center">'+(datosProductos[i].producto_cantidad)+'</td>';
    			rowAnchoProducto = '<td style="text-align:center">'+(datosProductos[i].producto_ancho)+'</td>';
    			rowAltoProducto = '<td style="text-align:center">'+(datosProductos[i].producto_alto)+'</td>';
    			rowPrecioProducto = '<td style="text-align:center">'+(datosProductos[i].venta_producto_total)+'</td>';
    			rowCaracteristicasProducto = '<td style="text-align:center">'+caracteristicasProducto+'</td>';
    			rowDisponibilidadProducto = '<td style="text-align:center">'+disponibilidadProducto+'</td>';
    			
				var buttonModificarP = '<button id="bModificarP'+(datosProductos[i].venta_codigo)+'" class="btn btn-warning" title="Modificar" data-toggle="modal" data-target="#modal_modificar_producto'+(datosProductos[i].venta_codigo)+'"><span class="glyphicon glyphicon-list-alt"></span></button>';
    			var buttonEliminarP = '<button id="bEliminarP'+(datosProductos[i].venta_codigo)+'" class="btn btn-danger" title="Eliminar" onclick=eliminarRowProducto("'+(datosProductos[i].venta_codigo)+'")><span class="glyphicon glyphicon-remove"></span></button>';
    			
    			rowOpcionesProducto = '<td style="text-align:center">'+buttonEliminarP+'</td>';
    			rowHiddenColumns = rowHiddenCodigoProducto;
				var detalleProducto = '<tr id="tr_'+(datosProductos[i].venta_codigo)+'">'+rowHiddenColumns+rowItemProducto+rowNombreProducto+rowCantidadProducto+rowAnchoProducto+rowAltoProducto+rowPrecioProducto+rowCaracteristicasProducto+rowDisponibilidadProducto+rowOpcionesProducto+rowHiddenColumns+'</tr>';
				
				$('#detalleProducto').append(detalleProducto);
				calcularValores();
    		}

    	}

    	function eliminarRowProducto(codigoVenta)
    	{
    		$("#tr_"+codigoVenta).remove();
    		calcularValores();
    	}

    	function calcularValores()
    	{
    		var filas = document.getElementById("detalleProducto").rows.length;
    		var subtotal = 0; var iva = 0; var total = 0;

    		for (var contadorFilas = 0; contadorFilas < filas; contadorFilas++)
    		{
    			subtotal += parseFloat(document.getElementById("detalleProducto").rows[contadorFilas].cells[6].innerHTML, 10);
    			iva = subtotal * 0.16;
    			total = subtotal + iva;
	    	}

	    	$('#ro_subtotal_distribuidor').html(subtotal);
	    	$('#ro_iva_distribuidor').html(iva);
	    	$('#ro_total_distribuidor').html(total);
    	}

    	function guardarOrder(tipo_order)
    	{
    		var codigoDistribuidor, fechaOrder, horaOrder, tipoOrder, codigoOrder, grupoOrder, codigoCliente, subtotalOrderDistribuidor, ivaOrderDistribuidor, totalOrderDistribuidor;
    		var referenciasOrder, observacionesOrder;

    		codigoDistribuidor = "<?php print_r($_SESSION['usuario_codigo']); ?>";
    		fechaOrder = $('#ro_detalle_fecha').text();
    		horaOrder = $('#ro_detalle_hora').text();
    		tipoOrder = tipo_order;
    		codigoOrder = $('#ro_detalle_codigo').text();
    		grupoOrder = "grupo-" + codigoOrder;
    		codigoCliente = $('#ro_detalle_cliente_codigo').text();
    		subtotalOrderDistribuidor = $('#ro_subtotal_distribuidor').text();
    		ivaOrderDistribuidor = $('#ro_iva_distribuidor').text();
    		totalOrderDistribuidor = $('#ro_total_distribuidor').text();
    		referenciasOrder = $('#referencias_order').val();
    		observacionesOrder = $('#observaciones_order').val();
    		
    		var arrayFinalDatos = new Array();
    		var filas = document.getElementById("detalleProducto").rows.length;
    		var columnas = document.getElementById("detalleProducto").rows[filas-1].cells.length;
    		for (var contadorFilas = 0; contadorFilas < filas; contadorFilas++)
    		{
    			var arrayDatos = new Array();
    			var posicionArray = 0;

	    		for (var contadorColumnas = 0; contadorColumnas < columnas; contadorColumnas++) {

	    			if (contadorColumnas == 0 || contadorColumnas == 3 || contadorColumnas == 4 || contadorColumnas == 5 || contadorColumnas == 6) {
		    			arrayDatos[posicionArray] = document.getElementById("detalleProducto").rows[contadorFilas].cells[contadorColumnas].innerHTML;
	    				posicionArray++;
	    			}
	    			
	    		}

	    		arrayFinalDatos[contadorFilas] = arrayDatos;
	    	}

	    	$.ajax({
    			type: "POST",
    			url: "../control/control_order.php",
    			data: { elegir:1, order_codigo:codigoOrder, order_grupo:grupoOrder, order_fecha: fechaOrder, order_hora:horaOrder, order_tipo:tipoOrder, 
    				order_referencias:referenciasOrder, order_observaciones: observacionesOrder, distribuidor_codigo:codigoDistribuidor, distribuidor_subtotal:subtotalOrderDistribuidor, 
    				distribuidor_iva: ivaOrderDistribuidor, distribuidor_total:totalOrderDistribuidor, cliente_codigo:codigoCliente, order_array: arrayFinalDatos }
    		}).done(function(data) {    			
    			var jsonResponse = JSON.parse(data);
                if (jsonResponse.Success == 0) {
                	var mensaje = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> No se pudo registrar el Pedido.</div>'
                	$('#notificacion').html(mensaje);
    			} else if (jsonResponse.Success == 1) {
                    window.location="MyOrders.php";
    			}
    		});
    	}

    	function realizarCotizacion()
    	{
    		var tipoOrder = "COTIZACION";
    		guardarOrder(tipoOrder);
    	}

    	function realizarPedido()
    	{
    		var tipoOrder = "PEDIDO";
    		guardarOrder(tipoOrder);
    	}





























		function consultarCotizacion(codigoCotizacion) {

    		$.ajax({
    			type: "POST",
    			url: "../control/control_cotizacion.php",
    			data: { elegir: 7, codigo: codigoCotizacion },
    			success: function(data) {
    				var jsonProductosCotizacion = JSON.parse(data);

					for (var i = 0; i < jsonProductosCotizacion.length; i++) {

						var rowProductoCodigo = '<td style="text-align:center">'+Object(jsonProductosCotizacion[i].Producto_Codigo)+'</td>';
						var rowProductoDescripcion = '<td style="text-align:center">'+Object(jsonProductosCotizacion[i].Producto_Descripcion)+'</td>';
						var rowProductoPrecio = '<td style="text-align:center">'+Object(jsonProductosCotizacion[i].Producto_Precio)+'</td>';
		    			var rowProductoIva = '<td style="text-align:center">'+Object(jsonProductosCotizacion[i].Producto_Iva)+'</td>';
		    			var rowProductoCantidad = '<td style="text-align:center"><input id="detalle_producto_cantidad'+Object(jsonProductosCotizacion[i].Producto_Codigo)+'" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" type="number" min="1" value="'+Object(jsonProductosCotizacion[i].Producto_Cantidad)+'" placeholder="Cantidad"></td>';
			    		var rowProductoAncho = '<td style="text-align:center"><input id="detalle_producto_ancho'+Object(jsonProductosCotizacion[i].Producto_Codigo)+'" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" type="number" min="0" value="'+Object(jsonProductosCotizacion[i].Producto_Ancho)+'" placeholder="Ancho"></td>';
			    		var rowProductoAlto = '<td style="text-align:center"><input id="detalle_producto_alto'+Object(jsonProductosCotizacion[i].Producto_Codigo)+'" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" type="number" min="0" value="'+Object(jsonProductosCotizacion[i].Producto_Alto)+'" placeholder="Alto"></td>';
			    		var rowProductoSubtotal = '<td style="text-align:center">'+Object(jsonProductosCotizacion[i].Producto_Subtotal)+'</td>';
						
						var buttonAdicionalP = '<button id="bAdicionalP'+Object(jsonProductosCotizacion[i].Cotizacion_Codigo)+'" class="btn btn-warning" title="Información Adicional" data-toggle="modal" data-target="#modal_adicional_producto'+Object(jsonProductosCotizacion[i].Cotizacion_Codigo)+'"><span class="glyphicon glyphicon-list-alt"></span></button>';
						var buttonEliminarP = '<button id="bEliminarP'+Object(jsonProductosCotizacion[i].Producto_Codigo)+'" class="btn btn-danger" title="Eliminar" onclick="eliminarRowProducto('+Object(jsonProductosCotizacion[i].Producto_Codigo)+')"><span class="glyphicon glyphicon-remove"></span></button>';
		    			var modalAdicionalP = '<div class="modal fade" id="modal_adicional_producto'+Object(jsonProductosCotizacion[i].Cotizacion_Codigo)+'" tabindex="-1" role="dialog" aria-labelledby="modal_adicional_producto_label'+Object(jsonProductosCotizacion[i].Cotizacion_Codigo)+'"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="modal_adicional_producto_label'+Object(jsonProductosCotizacion[i].Cotizacion_Codigo)+'">Modificar Datos Adicionales</h4></div><div class="modal-body"><form><div class="form-group"><label>Perfil</label><select id="selectPerfilAdicional" style="width:20%"><option value="si">Si</option><option value="no">No</option></select><input type="number" min=0 max=100 id="porcentajePerfilAdicional" value="0" style="max-width:20%"><label>%</label><label>$0.0</label></div><div class="form-group"><label>Mando</label><select id="selectMandoAdicional" style="width:20%"><option value="si">Si</option><option value="no">No</option></select><input type="number" min=0 max=100 id="porcentajeMandoAdicional" value="0" style="max-width:20%"><label>%</label><label>$0.0</label></div><div class="form-group"><label>Fijación</label><select id="selectFijacionAdicional" style="width:20%"><option value="si">Si</option><option value="no">No</option></select><input type="number" min=0 max=100 id="porcentajeFijacionAdicional" value="0" style="max-width:20%"><label>%</label><label>$0.0</label></div><div class="form-group"><label>Soporte Adicional</label><select id="selectSoporteAdicional" style="width:20%"><option value="si">Si</option><option value="no">No</option></select><input type="number" min=0 max=100 id="porcentajeSoporteAdicional" value="0" style="max-width:20%"><label>%</label><label>$0.0</label></div><div class="form-group"><label>Dirección de la tela</label><select id="selectDireccionTelaAdicional" style="width:20%"><option value="si">Si</option><option value="no">No</option></select><input type="number" min=0 max=100 id="porcentajeDireccionTelaAdicional" value="0" style="max-width:20%"><label>%</label><label>$0.0</label></div><div class="form-group"><label>Unión Intermedia</label><select id="selectUnionIntermediaAdicional" style="width:20%"><option value="si">Si</option><option value="no">No</option></select><input type="number" min=0 max=100 id="porcentajeUnionIntermediaAdicional" value="0" style="max-width:20%"><label>%</label><label>$0.0</label></div><div class="form-group"><label>Junto a otro item?</label><select id="selectOtroItemAdicional" style="width:20%"><option value="si">Si</option><option value="no">No</option></select><input type="number" min=0 max=100 id="porcentajeOtroItemAdicional" value="0" style="max-width:20%"><label>%</label><label>$0.0</label></div><div class="form-group"><label>Cover Light</label><select id="selectCoverLightAdicional" style="width:20%"><option value="si">Si</option><option value="no">No</option></select><input type="number" min=0 max=100 id="porcentajeCoverLightAdicional" value="0" style="max-width:20%"><label>%</label><label>$0.0</label></div><div class="form-group"><label>Motor</label><select id="selectMotorAdicional" style="width:20%"><option value="si">Si</option><option value="no">No</option></select><input type="number" min=0 max=100 id="porcentajeMotorAdicional" value="0" style="max-width:20%"><label>%</label><label>$0.0</label></div></form></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="actualizarDatosAdicionalesProducto('+Object(jsonProductosCotizacion[i].Cotizacion_Codigo)+')">Guardar</button></div></div></div></div>';
		    			
		    			var rowProductoAccion = '<td style="text-align:center">'+buttonAdicionalP+buttonEliminarP+modalAdicionalP+'</td>';

						var detalleProducto = '<tr>'+rowProductoCodigo+rowProductoDescripcion+rowProductoPrecio+rowProductoIva+rowProductoCantidad+rowProductoAncho+rowProductoAlto+rowProductoSubtotal+rowProductoAccion+'</tr>';
						
						$('#detalleProducto').append(detalleProducto);


						//modal
						


						//modal
					}

    			}
	    	}).done(function(data) {    			
    			calcularValores();
    			/*$('#producto_buscar').select2("val", "");
	    		$("#producto_cantidad").val("");
	    		$("#notificacion").html("");*/
    		});

		}

		function actualizarDatosAdicionalesProducto(datosAdicionalCodigoProducto) {
			alert(datosAdicionalCodigoProducto);

		}

    	function agregarProducto() {

    		var productoCodigo = $('#producto_buscar').val();
    		var productoTexto = $('#producto_buscar :selected').text();
    		var productoCantidad = $('#producto_cantidad').val();
    		var productoAncho = $('#producto_ancho').val();
    		var productoAlto = $('#producto_alto').val();
    		var productoDescuento = $('#producto_descuento').val();

    		var elegir = 2;
    		var consultarProducto = "elegir="+elegir+"&codigo="+productoCodigo;
    		$.ajax({
    			type: "POST",
    			url: "../control/control_producto.php",
    			data: consultarProducto,
    			success: function(data) {
    				var json = JSON.parse(data);
    				var productoIva = json.Iva;
    				var productoPrecio = json.Precio;

		    		var rowProductoCodigo = '<td style="text-align:center">'+productoCodigo+'</td>';
		    		var rowProductoDescripcion = '<td style="text-align:center">'+productoTexto+'</td>';
		    		var rowProductoPrecio = '<td style="text-align:center">'+productoPrecio+'</td>';
		    		var rowProductoIva = '<td style="text-align:center">'+productoIva+'</td>';
		    		var rowProductoCantidad = '<td style="text-align:center"><input id="detalle_producto_cantidad'+productoCodigo+'" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" type="number" min="1" value="'+productoCantidad+'" placeholder="Cantidad"></td>';
		    		var rowProductoAncho = '<td style="text-align:center"><input id="detalle_producto_ancho'+productoCodigo+'" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" type="number" min="1" value="'+productoAncho+'" placeholder="Ancho"></td>';
		    		var rowProductoAlto = '<td style="text-align:center"><input id="detalle_producto_alto'+productoCodigo+'" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" type="number" min="0" value="'+productoAlto+'" placeholder="Alto"></td>';
		    		var rowProductoSubtotal = '<td style="text-align:center">'+(productoPrecio*productoCantidad)+'</td>';
		    		var buttonAdicionalP = '<button id="bAdicionalP'+productoCodigo+'" class="btn btn-warning" title="Información Adicional" data-toggle="modal" data-target="#modal_adicional_producto'+productoCodigo+'"><span class="glyphicon glyphicon-list-alt"></span></button>';
					var buttonEliminarP = '<button id="bEliminarP'+productoCodigo+'" class="btn btn-danger" title="Eliminar" onclick="eliminarRowProducto('+productoCodigo+')"><span class="glyphicon glyphicon-remove"></span></button>';
					var modalAdicionalP = '<div class="modal fade" id="modal_adicional_producto'+productoCodigo+'" tabindex="-1" role="dialog" aria-labelledby="modal_adicional_producto_label'+productoCodigo+'"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="modal_adicional_producto_label'+productoCodigo+'">Datos Adicionales</h4></div><div class="modal-body"><form><input type="email" class="form-control" id="email" placeholder="Enter email" style="max-width:20%"><input type="email" class="form-control" id="porcentaje" placeholder="Enter email" style="max-width:20%"></form></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="guardarDatosAdicionalesProducto('+productoCodigo+')">Guardar</button></div></div></div></div>';


""
		    		var rowProductoAccion = '<td style="text-align:center">'+buttonAdicionalP+buttonEliminarP+modalAdicionalP+'</td>';

		    		var detalleProducto = '<tr>'+rowProductoCodigo+rowProductoDescripcion+rowProductoPrecio+rowProductoIva+rowProductoCantidad+rowProductoAncho+rowProductoAlto+rowProductoSubtotal+rowProductoAccion+'</tr>';

		    		$('#detalleProducto').append(detalleProducto);
    			}
	    	}).done(function(data) {    			
    			calcularValores();
    			$('#producto_buscar').select2("val", "");
	    		$("#producto_cantidad").val("");
	    		$("#notificacion").html("");
    		});

			

    		/*if (productoCodigo != null && productoCantidad != 0) {
    			alert(productoCodigo + " - " + productoTexto + " - " + productoCantidad);
    			$('#producto_cantidad').val("2");
    		} else {
				alert("Por favor, seleccione un producto");
    		}*/
    		
    		
    	}

    	function guardarDatosAdicionalesProducto(codigoProductoAdicional) {
    		var nombreCliente = $('#modal_nombrecliente'+codigoCliente).val();
    		var direccionCliente = $('#modal_direccioncliente'+codigoCliente).val();
    		var emailCliente = $('#modal_emailcliente'+codigoCliente).val();
    	}

    	

    	function vaciarRegistroVenta() {
    		$('#distribuidor_buscar').select2("val", "");
    		$('#cliente_buscar').select2("val", "");
    		$('#producto_buscar').select2("val", "");
    		$("#producto_cantidad").val("");
    		$("#notificacion").html("");

    		//TABLA

    	}

    	

    	function guardarModificaciones() {
    		var guardarTipoVenta = $('#tipo_documento').val();
    		if (guardarTipoVenta == "pd") {
    			alert(guardarTipoVenta+"   "+$('#grupo_venta').val());
    		}
    		
    		var arrayFinalDatos = new Array();
    		var dFechaVenta = new Date();
    		var guardarGrupoVenta = $('#grupo_venta').val();
    		var guardarCodigoDistribuidor = $('#distribuidor_buscar').val();
    		var guardarCodigoCliente = $('#cliente_buscar').val();

    		// Table detalleProducto
    		var filas = document.getElementById("detalleProducto").rows.length;
    		var columnas = document.getElementById("detalleProducto").rows[filas-1].cells.length;
    		for (var contadorFilas = 0; contadorFilas < filas; contadorFilas++) {
    			var random = Math.floor((Math.random() * 1000) + 1);
    			var dCodigoVenta = new Date();
    			var guardarCodigoVenta = dCodigoVenta.getDate() + "" + (dCodigoVenta.getMonth()+1) + "" + dCodigoVenta.getFullYear() + random + dCodigoVenta.getHours() + dCodigoVenta.getMinutes() + "" + dCodigoVenta.getSeconds() + "" + dCodigoVenta.getMilliseconds();
    			var guardarSubtotalVenta = $('#cotizacionSubtotal').text();
	    		var guardarTotalVenta = $('#cotizacionTotal').text();
	    		var guardarFechaVenta = dFechaVenta.getDate() + "/" + (dFechaVenta.getMonth()+1) + "/" + dFechaVenta.getFullYear();
    			var arrayDatosVenta = new Array();
    			var posicionArray = 0;

	    		for (var contadorColumnas = 0; contadorColumnas < columnas; contadorColumnas++) {

	    			if (contadorColumnas == 0 || contadorColumnas == 4 || contadorColumnas == 5 || contadorColumnas == 6 || contadorColumnas == 7) {
	    				if (contadorColumnas == 4) {
	    					arrayDatosVenta[posicionArray] = $('#detalle_producto_cantidad'+document.getElementById("detalleProducto").rows[contadorFilas].cells[0].innerHTML).val();
		    			}
		    			else if (contadorColumnas == 5) {
		    				arrayDatosVenta[posicionArray] = $('#detalle_producto_ancho'+document.getElementById("detalleProducto").rows[contadorFilas].cells[0].innerHTML).val();
		    			}
		    			else if (contadorColumnas == 6) {
		    				arrayDatosVenta[posicionArray] = $('#detalle_producto_alto'+document.getElementById("detalleProducto").rows[contadorFilas].cells[0].innerHTML).val();
		    			}
		    			else {
		    				arrayDatosVenta[posicionArray] = document.getElementById("detalleProducto").rows[contadorFilas].cells[contadorColumnas].innerHTML;
		    			}
	    				posicionArray++;
	    			}
	    			
	    		};

	    		arrayFinalDatos[contadorFilas] = (guardarCodigoVenta + "," + guardarGrupoVenta + "," + guardarSubtotalVenta + "," + guardarTotalVenta + "," + guardarFechaVenta + "," + guardarTipoVenta + "," + guardarCodigoDistribuidor + "," + guardarCodigoCliente + "," + arrayDatosVenta).split(",");
	    		
	    	};
	    	// /Table detalleProducto

	    	$.ajax({
    			type: "POST",
    			url: "../control/control_cotizacion.php",
    			data: { elegir: 8, codigo: guardarGrupoVenta, arrayDatosVenta: arrayFinalDatos },
    		}).done(function(data) {    			
    			var jsonResponse = JSON.parse(data);
    			if (jsonResponse.Success == 0) {
    				$('#notificacion').html(jsonResponse.Mensaje);
    			}
    			if (jsonResponse.Success == 1) {
    				$('#notificacion').html(jsonResponse.Mensaje);
    			}
    			
    		});
    	}

    	var elegir;
    	var producto;
    	var buscarProductoDatos;
    	
    	function autocomplete_buscarProducto() {

    		var min_caracteres = 0;
    		elegir = 2;
    		producto = $('#producto_buscar').val();

    		buscarProductoDatos = "elegir="+elegir+"&producto="+producto;

    		if (producto.length > min_caracteres) {
    			$.ajax({
	    			type: "POST",
	    			url: "../control/control_producto.php",
	    			data: buscarProductoDatos,
	    			success: function(data) {
	    				if (data) {

		    $('.producto_buscar').select2({
				placeholder: "Buscar producto",
				allowClear: true,
			});
	    					
	    					var arre = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];

	    					//$('#producto_buscar_lista').show();
	    					var json = JSON.parse(data);

	    					for (var i = 0; i < json.Productos.length; i++) {

	    						var jsondatos = '<li onclick="seleccionar_buscarProducto()">'+Object(json.Productos[i]).Nombre+'</li>';
	    						arre.push(Object(json.Productos[i]).Nombre);
	    						//$('#producto_buscar_lista').html(jsondatos);
	    						
	    					}

	    					$('#producto_buscar').select2({
	    						placeholder: "Buscar producto",
  								allowClear: true,
								data: arre
							});

	    				}
	    				
	    			}
	    		});
    		}
    		else {
    			$('#producto_buscar_lista').hide();
    		}
    	}

    	function seleccionar_buscarProducto(item) {
    		$('#producto_buscar').val(item);
    		$('#producto_buscar_lista').hide();
    	}

    	/*function agregarProducto() {
	 		elegir = 1;
    		var codigoProducto = $('#producto_buscar').val();
    		buscarProductoDatos = "elegir="+elegir+"&producto="+codigoProducto;

    		$.ajax({
    			type: "POST",
    			url: "../control/control_producto.php",
    			data: buscarProductoDatos,
    			success: function(data) {
    				$('#tableProducto').show();
    				$('#detalleProducto').html(data);
    			}
	    	});
    	}*/

    </script>

  </body>
</html>