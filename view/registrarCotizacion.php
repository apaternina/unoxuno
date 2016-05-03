<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Ofima</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <script>
		$(document).ready(function(){

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

		});
	</script>
    <!--<style type="text/css">
    	
		.input_container input {
			width: 200px;
			padding: 3px;
			border-radius: 0;
		}
		.input_container ul {
			width: 206px;
			position: absolute;
			z-index: 9;
			background: #f3f3f3;
			list-style: none;
		}
		.input_container ul li {
			padding: 2px;
		}
		.input_container ul li:hover {
			background: #eaeaea;
		}
		#producto_buscar_lista {
			display: none;
		}

    </style>-->
  </head>
  <body style="">
    <div class="container">

    	<!-- MENU_NAV -->
    	<nav class="navbar navbar-inverse">
			<div class="container-fluid">

			    <div class="navbar-header">
			    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    	</button>
			    	<a class="navbar-brand" href="#">OfimaApp</a>
			    </div>

			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    	<ul class="nav navbar-nav">
			    		<li><a href="gestionarDistribuidores.php">Distribuidores</a></li>
				        <li><a href="gestionarClientes.php">Clientes</a></li>
				        <li><a href="gestionarProductos.php">Productos</a></li>
				        <li class="dropdown active">
				        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ventas <span class="caret"></span></a>
				        	<ul class="dropdown-menu">
					            <li class="active"><a href="registrarCotizacion.php">Registrar Venta</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="listadoProductosCotizados.php">Cotizaciones</a></li>
					            <li><a href="listadoProductosPedidos.php">Pedidos</a></li>
					            <li><a href="#">Facturas</a></li>
				        	</ul>
				        </li>
			    	</ul>

			    	<ul class="nav navbar-nav navbar-right">
				        <li class="dropdown">
				        	<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
				        	<ul class="dropdown-menu">
					            <li><a href="#">Perfil</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="../../index.php">Cerrar Sesión</a></li>
				          	</ul>
				        </li>
			    	</ul>

			    </div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
    	<!-- /MENU_NAV -->

    	<div class="panel panel-primary">
		 	<div class="panel-heading" style="background-color:#0088CC !important;">
		    	<h3 class="panel-title" style="color:#FFF !important;"><strong>DETALLES</strong></h3>
			</div>
			<div class="panel-body">

			    <form>
			    	<div class="form-group col-sm-6">
			    	<div class="input_container">
			    		<label>Distribuidor:</label>
			    		<select id="distribuidor_buscar" class="form-control"></select>
			    	</div>
			    	</div>

			    	<div class="form-group col-sm-6">
			    	<div class="input_container">
			    		<label>Cliente:</label>
			    		<select id="cliente_buscar" class="form-control"></select>
			    	</div>
			    	</div>

			    	<div class="form-group col-sm-4">
			    	<div class="input_container">
			    		<label>Producto:</label>
			    		<select id="producto_buscar" class="form-control"></select>
			    	</div>
			    	</div>

			    	<div class="form-group col-sm-2">
			    	<div class="input_container">
			    		<label>Cantidad:</label>
			    		<input type="number" min="1" id="producto_cantidad" class="form-control" placeholder="Cantidad del producto"></input>
			    	</div>
			    	</div>

			    	<div class="form-group col-sm-2">
			    	<div class="input_container">
			    		<label>Ancho:</label>
			    		<input type="number" min="0" id="producto_ancho" class="form-control" placeholder="Ancho del producto"></input>
			    	</div>
			    	</div>

			    	<div class="form-group col-sm-2">
			    	<div class="input_container">
			    		<label>Alto:</label>
			    		<input type="number" min="0" id="producto_alto" class="form-control" placeholder="Alto del producto"></input>
			    	</div>
			    	</div>

			    	<div class="form-group col-sm-2">
			    		<label>Descuento:</label>
			    		<input type="number" min="0" max="100" id="producto_descuento" class="form-control" placeholder="Descuento del producto"></input>
			    	</div>

			    	<div class="form-group col-sm-2">
			    	<button class="btn btn-info" type="button" onclick="agregarProducto()">Agregar Producto</button>
			    	</div>
			    </form>

	    	</div>
	    </div>

	    <div id="notificacion"></div>

	    <div class="panel panel-danger">
		 	<div class="panel-heading" style="background-color:#CA0707 !important;">
		    	<h3 class="panel-title" style="color:#FFF !important;"><strong>PRODUCTOS</strong></h3>
			</div>
			<div class="panel-body">

				<div class="table-responsive">
			  		<table id="tableProductos" class="table table-condensed">
			            
						<thead>
							<tr>
								<th style="text-align:center;" width="10%">CODIGO</th>
							    <th style="text-align:center;" width="15%">DESCRIPCIÓN</th>
							    <th style="text-align:center;" width="15%">PRECIO UNITARIO</th>
							    <th style="text-align:center;" width="10%">IVA</th>
							    <th style="text-align:center;" width="5%">CANTIDAD</th>
							    <th style="text-align:center;" width="10%">ANCHO</th>
							    <th style="text-align:center;" width="10%">ALTO</th>
							    <th style="text-align:center;" width="15%">SUBTOTAL</th>
							    <th style="text-align:center;" width="10%">OPCIÓN</th>
							</tr>
						</thead>
						<tbody id="detalleProducto">
						</tbody>
						<tfoot>
							<tr>
								<th colspan="6"></th>
							    <th style="text-align:right"><b>Subtotal</b></th>
							    <th style="text-align:center" id="cotizacionSubtotal"><b>0.00</b></th>
							    <th></th>
							</tr>
							<tr>
							    <th colspan="6"></th>
							    <th style="text-align:right"><b>Total</b></th>
							    <th style="text-align:center" id="cotizacionTotal"><b>0.00</b></th>
							    <th></th>
							</tr>
						</tfoot>
			        </table>
			    </div>

	    	</div>
		</div>

		<div class="form-group col-sm-9">
			<label>Observaciones:</label>
            <textarea class="form-control" id="descripcion_cotizacion" rows="3" maxlength="200"></textarea>
		</div>

		<div class="form-group col-sm-3">
			<label>Tipo de Documento:</label>
    		<select id="tipo_documento" class="form-control">
    			<option value="ct">Cotización</option>
    			<option value="fa">Factura</option>
				<option value="pd">Pedido</option>
    		</select>
    		<button class="btn btn-success" type="button" title="Guardar Cotización" onclick="guardarCotizacion()"><span class="glyphicon glyphicon-floppy-disk"></span>Guardar Venta</button>
		</div>
		
	</div>

    
    
    <script type="text/javascript">

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
		    		var modalAdicionalP = '<div class="modal fade" id="modal_adicional_producto'+productoCodigo+'" tabindex="-1" role="dialog" aria-labelledby="modal_adicional_producto_label'+productoCodigo+'"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="modal_adicional_producto_label'+productoCodigo+'">Modificar Datos Adicionales</h4></div><div class="modal-body"><form><input type="email" class="form-control" id="email" placeholder="Enter email" style="max-width:20%"><input type="email" class="form-control" id="porcentaje" placeholder="Enter email" style="max-width:20%"></form></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="actualizarDatosAdicionalesProducto('+productoCodigo+')">Guardar</button></div></div></div></div>';

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

    	function eliminarRowProducto(codigo) {
    		$("#bEliminarP"+codigo).parents('tr').remove();
    		calcularValores();
    	}

    	function vaciarRegistroVenta() {
    		$('#distribuidor_buscar').select2("val", "");
    		$('#cliente_buscar').select2("val", "");
    		$('#producto_buscar').select2("val", "");
    		$("#producto_cantidad").val("");
    		$("#notificacion").html("");

    		//TABLA

    	}

    	function calcularValores() {
    		var filas = document.getElementById("detalleProducto").rows.length;
    		var nuevoSubtotal = 0; var cSubtotal = 0; var cotizacionSubtotal = 0; var cotizacionTotal = 0;

    		for (var contadorFilas = 0; contadorFilas < filas; contadorFilas++) {
    			nuevoSubtotal = parseInt(document.getElementById("detalleProducto").rows[contadorFilas].cells[2].innerHTML, 10) * $('#detalle_producto_cantidad'+document.getElementById("detalleProducto").rows[contadorFilas].cells[0].innerHTML).val();
    			document.getElementById("detalleProducto").rows[contadorFilas].cells[7].innerHTML = nuevoSubtotal;
    			cSubtotal = parseInt(document.getElementById("detalleProducto").rows[contadorFilas].cells[7].innerHTML, 10);
	    		cotizacionSubtotal += cSubtotal;
	    		cotizacionTotal += cSubtotal + (cSubtotal * (parseInt(document.getElementById("detalleProducto").rows[contadorFilas].cells[3].innerHTML, 10)/100));
	    	};

	    	$('#cotizacionSubtotal').html(cotizacionSubtotal);
	    	$('#cotizacionTotal').html(cotizacionTotal);
    	}

    	function guardarCotizacion() {

    		var arrayFinalDatos = new Array();
    		var dGrupoCotizacion = new Date();
    		var guardarGrupoCotizacion = dGrupoCotizacion.getDate() + "" + (dGrupoCotizacion.getMonth()+1) + "" + dGrupoCotizacion.getFullYear() + "" + dGrupoCotizacion.getHours() + "" + dGrupoCotizacion.getMinutes() + "" + dGrupoCotizacion.getSeconds() + "" + dGrupoCotizacion.getMilliseconds();
    		var guardarTipoCotizacion = $('#tipo_documento').val();
    		var guardarCodigoDistribuidor = $('#distribuidor_buscar').val();
    		var guardarCodigoCliente = $('#cliente_buscar').val();

    		// Table detalleProducto
    		var filas = document.getElementById("detalleProducto").rows.length;
    		var columnas = document.getElementById("detalleProducto").rows[filas-1].cells.length;
    		for (var contadorFilas = 0; contadorFilas < filas; contadorFilas++) {
    			var random = Math.floor((Math.random() * 1000) + 1);
    			var dCodigoCotizacion = new Date();
    			var guardarCodigoCotizacion = dCodigoCotizacion.getDate() + "" + (dCodigoCotizacion.getMonth()+1) + "" + dCodigoCotizacion.getFullYear() + random + dCodigoCotizacion.getHours() + dCodigoCotizacion.getMinutes() + "" + dCodigoCotizacion.getSeconds() + "" + dCodigoCotizacion.getMilliseconds();
    			var guardarSubtotalCotizacion = $('#cotizacionSubtotal').text();
	    		var guardarTotalCotizacion = $('#cotizacionTotal').text();
	    		var guardarFechaCotizacion = dGrupoCotizacion.getDate() + "/" + (dGrupoCotizacion.getMonth()+1) + "/" + dGrupoCotizacion.getFullYear();
    			var arrayDatosCotizacion = new Array();
    			var posicionArray = 0;

	    		for (var contadorColumnas = 0; contadorColumnas < columnas; contadorColumnas++) {

	    			if (contadorColumnas == 0 || contadorColumnas == 4 || contadorColumnas == 5 || contadorColumnas == 6 || contadorColumnas == 7) {
	    				if (contadorColumnas == 4) {
	    					arrayDatosCotizacion[posicionArray] = $('#detalle_producto_cantidad'+document.getElementById("detalleProducto").rows[contadorFilas].cells[0].innerHTML).val();
		    			}
		    			else if (contadorColumnas == 5) {
		    				arrayDatosCotizacion[posicionArray] = $('#detalle_producto_ancho'+document.getElementById("detalleProducto").rows[contadorFilas].cells[0].innerHTML).val();
		    			}
		    			else if (contadorColumnas == 6) {
		    				arrayDatosCotizacion[posicionArray] = $('#detalle_producto_alto'+document.getElementById("detalleProducto").rows[contadorFilas].cells[0].innerHTML).val();
		    			}
		    			else {
		    				arrayDatosCotizacion[posicionArray] = document.getElementById("detalleProducto").rows[contadorFilas].cells[contadorColumnas].innerHTML;
		    			}
	    				posicionArray++;
	    			}
	    			
	    		};

	    		arrayFinalDatos[contadorFilas] = (guardarCodigoCotizacion + "," + guardarGrupoCotizacion + "," + guardarSubtotalCotizacion + "," + guardarTotalCotizacion + "," + guardarFechaCotizacion + "," + guardarTipoCotizacion + "," + guardarCodigoDistribuidor + "," + guardarCodigoCliente + "," + arrayDatosCotizacion).split(",");
	    		
	    	};
	    	// /Table detalleProducto

	    	$.ajax({
    			type: "POST",
    			url: "../control/control_cotizacion.php",
    			data: { elegir: 1, arrayDatosCotizacion: arrayFinalDatos},
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