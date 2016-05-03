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
			$(document).ready(function() {

				/* /SELECTS AUTOCOMPLETES */
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

				consultarVentaCliente("<?php echo $_POST['codigo']; ?>");

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
			      		<li class="active"><a href="">Pedidos y Cotizaciones</a></li>
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

			<div id="notificacion"></div>

			<div class="panel panel-default">
			 	<div class="panel-heading">
			    	<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Mis pedidos y cotizaciones</strong></h4></div>
			    	<a href="AddProduct.php" style="color:#CA0707; background-color:transparent; text-decoration:underline;">Nuevo Pedido/Cotización</a>
				</div>
				<div class="panel-body">

					<div class="panel panel-default">
						<div class="panel-heading">
			    			<div class="panel-title">Criterios de búsqueda</div>
						</div>
						<div class="panel-body">
							<form>

								<div class="form-group col-sm-4">
							    	<div class="input_container">
							    		<label>Código Pedido</label>
							    		<input type="number" min="1" id="producto_cantidad" class="form-control" placeholder="Codigo del Pedido/Cotización"></input>
							    	</div>
						    	</div>

						    	<div class="form-group col-sm-4">
							    	<div class="input_container">
							    		<label>Tipo de Producto</label>
							    		<select id="producto_tipo" class="form-control">
							    			<option value="SELECCIONE">-- Seleccione --</option>
							    			<option value="ENROLLABLE">ENROLLABLE</option>
							    			<option value="SHEER">SHEER</option>
							    			<option value="PANEL JAPONES">PANEL JAPONES</option>
							    		</select>
							    	</div>
						    	</div>

						    	<div class="form-group col-sm-4">
							    	<div class="input_container">
							    		<label>Tipo de Presentación</label>
							    		<select id="producto_tipo_presentacion" class="form-control">
							    			<option value="SELECCIONE">-- Seleccione --</option>
							    			<option value="ESTANDAR">ESTANDAR</option>
							    			<option value="ELITE">ELITE</option>
							    			<option value="PREMIUM">PREMIUM</option>
							    		</select>
							    	</div>
						    	</div>

						    	<div class="form-group col-sm-4">
							    	<div class="input_container">
							    		<label>Tipo de Tela</label>
							    		<select id="producto_tipo_tela" class="form-control" onchange="cargarProductoTelas(this.value)">
							    			<option value="SELECCIONE">-- Seleccione --</option>
							    			<option value="BLACK OUT">BLACK OUT</option>
							    			<option value="DECORATIVA">DECORATIVA</option>
							    			<option value="SCREEN">SCREEN</option>
							    			<option value="SHEER">SHEER</option>
							    		</select>
							    	</div>
						    	</div>

						    	<div class="form-group col-sm-4">
							    	<div class="input_container">
							    		<label>Tipo de Pedido</label>
							    		<select id="tipo_documento" class="form-control">
							    			<option value="sl">-- Seleccione --</option>
							    			<option value="pd">Pedido</option>
							    			<option value="ct">Cotización</option>
							    			<option value="pr">Provisional</option>
							    		</select>
							    	</div>
						    	</div>

						    	<div class="form-group col-sm-4">
							    	<div class="input_container">
							    		<label>Fecha Inicial</label>
							    		<input type="number" min="0" id="producto_ancho" class="form-control" placeholder="Fecha Inicial"></input>
							    	</div>
						    	</div>

						    	<div class="form-group col-sm-4">
							    	<div class="input_container">
							    		<label>Fecha Final</label>
							    		<input type="number" min="0" id="producto_alto" class="form-control" placeholder="Fecha Final"></input>
							    	</div>
						    	</div>

						    	<div class="form-group col-sm-8">
							    	<div class="input_container">
							    		<label>Producto</label>
							    		<select id="producto_buscar" class="form-control"></select>
							    	</div>
						    	</div>

						    	<div class="form-group col-sm-2">
						    		<div class="input_container">
							    		<br>
						    			<button class="btn btn-danger" type="button" onclick="agregarProducto()" style="background-color:#CA0707 !important;">Buscar</button>
						    		</div>
						    	</div>
						    	
						    </form>
						</div>
					</div>

				    <div class="table-responsive">
				  		<table id="tableProductos" class="table table-condensed table-bordered table-hover">
				            
							<thead>
								<tr>
									<th style="text-align:center; background-color:#CA0707; color:#FFF;" width="20%">Cod. Portal</th>
								    <th style="text-align:center; background-color:#CA0707; color:#FFF;" width="25%">Usuario</th>
								    <th style="text-align:center; background-color:#CA0707; color:#FFF;" width="15%">Fecha</th>
								    <th style="text-align:center; background-color:#CA0707; color:#FFF;" width="20%">Total Cliente + IVA</th>
								    <th style="text-align:center; background-color:#CA0707; color:#FFF;" width="5%">Estado</th>
								    <th style="text-align:center; background-color:#CA0707; color:#FFF;" width="15%">Opciones</th>
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

		<script type="text/javascript">

			function consultarVentaCliente(codigoVentaCliente) {

				var rowVentaCodigo, rowVentaUsuario, rowVentaFecha, rowVentaTotal, rowVentaEstado;
				var indiceCodigo, rowVentaOpciones, buttonOpcionDetallePedido, buttonOpcionEstadoPedido, buttonOpcionGuiaPedido, buttonOpcionMensajePedido, buttonOpcionImprimirCotizacion;
				var detalleProducto;

	    		$.ajax({
	    			type: "POST",
	    			url: "../control/control_venta.php",
	    			data: { elegir: 7, codigoCliente: codigoVentaCliente },
	    			success: function(data) {
	    				var jsonVentas = JSON.parse(data);

						for (var i = 0; i < jsonVentas.length; i++) {

							rowVentaUsuario = '<td style="text-align:center">'+Object(jsonVentas[i].Venta_Usuario)+'</td>';
							rowVentaFecha = '<td style="text-align:center">'+Object(jsonVentas[i].Venta_Fecha)+'</td>';
							rowVentaTotal = '<td style="text-align:center">'+"$"+Object(jsonVentas[i].Venta_Total)+'</td>';
							rowVentaEstado = '<td style="text-align:center">'+Object(jsonVentas[i].Venta_Estado)+'</td>';

							if (Object(jsonVentas[i].Venta_Tipo) == "pd") {
								indiceCodigo = "Ped";
								buttonOpcionDetallePedido = '<a title="Ver Detalles"><form action="../control/exportarPDF.php" method="post"><input type="hidden" name="codigo" value="'+Object(jsonVentas[i].Venta_Codigo)+'"></input><button type="submit"><span class="glyphicon glyphicon-list-alt"></span></button></form></a>';
								buttonOpcionEstadoPedido = '<button id="bEstadoPedido'+Object(jsonVentas[i].Venta_Codigo)+'" title="Ver Estado" data-toggle="modal" data-target="#modal_estado_pedido'+Object(jsonVentas[i].Venta_Codigo)+'"><span class="glyphicon glyphicon-list-alt"></span></button>';
								buttonOpcionGuiaPedido = '<button id="bGuiaPedido'+Object(jsonVentas[i].Venta_Codigo)+'" title="Ver Guia" data-toggle="modal" data-target="#modal_guia_pedido'+Object(jsonVentas[i].Venta_Codigo)+'"><span class="glyphicon glyphicon-list-alt"></span></button>';
								buttonOpcionMensajePedido = '<a title="Enviar Mensaje"><form action="../control/exportarPDF.php" method="post"><input type="hidden" name="codigo" value="'+Object(jsonVentas[i].Venta_Codigo)+'"></input><button type="submit"><span class="glyphicon glyphicon-print"></span></button></form></a>';
								rowVentaOpciones = '<td style="text-align:center">'+buttonOpcionDetallePedido+buttonOpcionEstadoPedido+buttonOpcionGuiaPedido+buttonOpcionMensajePedido+'</td>';

							} else if (Object(jsonVentas[i].Venta_Tipo) == "ct") {
								indiceCodigo = "Cot";
								buttonOpcionImprimirCotizacion = '<a title="Expotar PDF"><form action="../control/exportarPDF.php" method="post"><input type="hidden" name="codigo" value="'+Object(jsonVentas[i].Venta_Codigo)+'"></input><button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-print"></span></button></form></a>';
								rowVentaOpciones = '<td style="text-align:center">'+buttonOpcionImprimirCotizacion+'</td>';
							}

							rowVentaCodigo = '<td style="text-align:center">'+indiceCodigo+"-"+Object(jsonVentas[i].Venta_Codigo)+'</td>';
							detalleProducto = '<tr>'+rowVentaCodigo+rowVentaUsuario+rowVentaFecha+rowVentaTotal+rowVentaEstado+rowVentaOpciones+'</tr>';
							$('#detalleProducto').append(detalleProducto);
						}

	    			}
		    	}).done(function(data) {    			
	    			//calcularValores();
	    			/*$('#producto_buscar').select2("val", "");
		    		$("#producto_cantidad").val("");
		    		$("#notificacion").html("");*/
	    		});

			}
		</script>

	</body>
</html>