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
				}).on("change", function(e) {
					if ($('#producto_buscar').val() != null) {
						seleccionarProducto($('#producto_buscar').val());
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
				/* /SELECTS AUTOCOMPLETES */

				/* CODIGO_GRUPO DE LA VENTA A GESTIONAR*/ 
				/*$('#grupo_venta').val(<?php echo $_REQUEST['codigo']; ?>);*/
				/* INVOCACIÓN DE METODOS */
				/*consultarVentaCliente("1143374565");*/

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
			      		<li class="active"><a href="">Nuevo Pedido/Cotización</a></li>
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

			<div class="modal fade" id="modalRegistroVenta" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Resultado</h4>
						</div>
						<div class="modal-body">
							<div class="alert alert-success" role="alert">
								<p>Se agregó el Producto correctamente al <strong>Pedido/Cotización</strong>.</p>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Continuar Agregando</button>
							<button type="button" class="btn btn-danger" onclick="finalizarRegistro()">Finalizar Pedido/Cotización</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modalError" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Ha ocurrido un error!</h4>
						</div>
						<div class="modal-body">
							<div class="alert alert-warning" role="alert" id="modal_error_mensaje">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-warning" data-dismiss="modal">Entendido</button>
						</div>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
			 	<div class="panel-heading">
			    	<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Seleccionar Producto</strong></h4></div>
				</div>
				<div class="panel-body">

						<div class="col-sm-12">
					    	<label>Nombre del Espacio</label>
				    	</div>
				    	<div class="col-sm-6">
					    	<input type="text" id="producto_nombre_espacio" class="form-control" placeholder="Espacio donde se instalará el producto">
				    	</div>
				    	<div class="form-group col-sm-6">
				    		<p style="font-size:85%;">Ejemplo: Habitación, Sala, Corredor. Este nombre saldrá en el sticker del empaque para facilitar la distribución de la mercancia.</p>
			    		</div>

		    		<div class="form-group col-sm-4">
				    	<div class="input_container">
				    		<label>Tipo de Producto</label>
				    		<select id="producto_tipo" class="form-control" onchange="seleccionarTipoProducto(this.value)">
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
				    		<select id="producto_tipo_presentacion" class="form-control" onchange="seleccionarTipoPresentacion(this.value)">
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

			    	<div class="form-group col-sm-8">
				    	<div class="input_container">
				    		<label>Tela</label>
				    		<select id="producto_tela" class="form-control" onchange="cargarTelaColores(this.value)">
				    			<option value="SELECCIONE">-- Seleccione --</option>
				    		</select>
				    	</div>
			    	</div>

			    	<div class="form-group col-sm-4">
				    	<div class="input_container">
				    		<label>Color</label>
				    		<select id="producto_tela_color" class="form-control">
				    			<option value="SELECCIONE">-- Seleccione --</option>
				    		</select>
				    	</div>
			    	</div>

					<div class="form-group col-sm-6">
			    		<label>Producto</label>
			    		<select id="producto_buscar" class="form-control"></select>
			    	</div>
			    	
			    	<div class="form-group col-sm-6">
			    		<label>Cliente</label>
			    		<select id="cliente_buscar" class="form-control"></select>
			    	</div>

			    	<div class="form-group col-sm-6">
				    	<div class="input_container">
				    		<label>Dirección Envio Final</label>
				    		<input type="text" id="direccion_envio_final" class="form-control" placeholder="Lugar donde recibiran la entrega">
				    	</div>
			    	</div>

			    	<div class="form-group col-sm-6">
				    	<div class="input_container">
				    		<label>Nombre Cliente Final</label>
				    		<input type="text" id="nombre_cliente_final" class="form-control" placeholder="Cliente que recibirá la entrega">
				    	</div>
			    	</div>
			    	<!--<button class="btn btn-danger" type="button" onclick="limpiarCampos()">Limpiar</button>-->

				</div>
			</div>

			    	
	    	<div class="panel panel-default" id="datos_iniciales" style="display:none;">
				<div class="panel-heading">
	    			<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Datos Iniciales</strong></h4></div>
				</div>
				<div class="panel-body">
					<form>

						<div class="form-group col-sm-12">
							<div class="form-group col-sm-3">
						    	<label>Cantidad</label>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<input type="number" min="1" id="producto_cantidad" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" value="1" placeholder="Cantidad">
					    	</div>

					    	<div class="form-group col-sm-6">
					    		<p style="font-size:85%;">Ingrese la cantidad de productos deseada.<br>Por ejemplo: 1</p>
				    		</div>

					    	<div class="form-group col-sm-3">
						    	<label>Ancho</label>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<input type="number" min="0" id="producto_ancho" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" value="1" placeholder="Ancho">
					    	</div>

					    	<div class="form-group col-sm-6">
					    		<p style="font-size:85%;">Ingrese el ancho en Metros con 3 decimales.<br>Por ejemplo: 1,25</p>
				    		</div>

					    	<div class="form-group col-sm-3">
						    	<label>Alto</label>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<input type="number" min="0" id="producto_alto" onkeyup="calcularValores()" onchange="calcularValores()" class="form-control" value="1" placeholder="Alto">
					    	</div>

					    	<div class="form-group col-sm-6">
					    		<p style="font-size:85%;">Ingrese el ancho en Metros con 3 decimales.<br>Por ejemplo: 1,25</p>
					    	</div>
				    	</div>

				    	<div class="form-group col-sm-12">
				    		<div class="form-group col-sm-6"></div>

				    		<div class="form-group col-sm-3">
						    	<p style="font-size:85%;">Ingrese el descuento adicional en caso de que aplique</p>
					    	</div>
					    	
					    	<div class="form-group col-sm-3" style="text-align:right;">
						    	<label style="color:#CA0707;">Total</label>
					    	</div>

				    		<div class="form-group col-sm-9">
						    	<label>Precio de Lista</label>
					    	</div>
					    	
					    	<div class="form-group col-sm-3" style="text-align:right;">
						    	<label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="producto_precio_lista">0.00</label>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<label>Precio con Descuento</label>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<input type="number" min="0" max="100" id="producto_descuento_distribuidor" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento Distribuidor">
						    	<p style="font-size:85%;">% (Dto. Distribuidor.)</p>
					    	</div>

					    	<div class="form-group col-sm-3">
						    	<input type="number" min="0" max="100" id="producto_descuento_adicional" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento Adicional">
						    	<p style="font-size:85%;">% (Dto. Adicional.)</p>
					    	</div>

					    	<div class="form-group col-sm-3" style="text-align:right;">
						    	<label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="producto_precio_descuento">0.00</label>
					    	</div>
					    </div>
				    	
				    </form>
				</div>
			</div>

			<div class="panel panel-default" id="datos_adicionales" style="display:none;">
				<div class="panel-heading">
	    			<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Datos Adicionales</strong></h4></div>
				</div>
				<div class="panel-body">

					<div class="panel panel-default">
						<div class="panel-heading">
			    			<div class="panel-title">Principales</div>
						</div>
						<div class="panel-body">

							<div class="form-group col-sm-12" id="dap_mando" style="display:none;">
							    <div class="col-sm-3">
								    <label>Mando</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_mando" class="form-control" onchange="consultarPrecio(this.id)">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="IZQUIERDO">IZQUIERDO</option>
				    					<option value="DERECHO">DERECHO</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_mando_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento">
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_mando_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_mando_precio">0</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_perfil" style="display:none;">
							    <div class="col-sm-3">
								    <label>Perfil</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_perfil" class="form-control" onchange="consultarPrecio(this.id)">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="ESTANDAR">ESTANDAR</option>
				    					<option value="ELITE">ELITE</option>
				    					<option value="PREMIUM">PREMIUM</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_perfil_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento">
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_perfil_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_perfil_precio">0</label>
							    </div>
							</div>
							    
							<div class="form-group col-sm-12" id="dap_direccion_tela" style="display:none;">
								<div class="col-sm-3">
								    <label>Dirección de la Tela</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_direccion_tela" class="form-control" onchange="consultarPrecio(this.id)">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="NORMAL">NORMAL</option>
				    					<option value="ATRAVESADA">ATRAVESADA</option>
				    					<option value="ATRAVESADA Y ANADIDA">ATRAVESADA Y AÑADIDA</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_direccion_tela_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento">
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_direccion_tela_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_direccion_tela_precio">0</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_sentido" style="display:none;">
								<div class="col-sm-3">
								    <label>Sentido</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_sentido" class="form-control" onchange="consultarPrecio(this.id)">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="NORMAL">NORMAL</option>
							    		<option value="CONTRARIO-NVR">CONTRARIO-NVR</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_sentido_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento">
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_sentido_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_sentido_precio">0</label>
							    </div>
							</div>
							    
							<div class="form-group col-sm-12" id="dap_soporte_intermedio" style="display:none;">
							    <div class="col-sm-3">
								    <label>Soporte Intermedio</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_soporte_intermedio" class="form-control" onchange="consultarPrecio(this.id)">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="DEPENDIENTE">DEPENDIENTE</option>
							    		<option value="INDEPENDIENTE">INDEPENDIENTE</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_soporte_intermedio_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento">
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
								    <label id="h_soporte_intermedio_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_soporte_intermedio_precio">0</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_cover_light" style="display:none;">
							    <div class="col-sm-3">
								    <label>Cover Light</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_cover_light" class="form-control" onchange="consultarPrecio(this.id)">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="SI">SI</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_cover_light_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento">
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_cover_light_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_cover_light_precio">0</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_junto_item" style="display:none;">
							    <div class="col-sm-3">
								    <label>Junto Item</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_junto_item" class="form-control" onchange="consultarPrecio(this.id)">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="AL SIGUIENTE ITEM">AL SIGUIENTE ITEM</option>
							    		<option value="AL ANTERIOR ITEM">AL ANTERIOR ITEM</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_junto_item_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento">
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_junto_item_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_junto_item_precio">0</label>
							    </div>
							</div>

							<div class="form-group col-sm-12" id="dap_mismo_cabezal" style="display:none;">
							    <div class="col-sm-3">
								    <label>Mismo Cabezal</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_mismo_cabezal" class="form-control" onchange="consultarPrecio(this.id)">
							    		<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="JUNTO AL SIGUIENTE">JUNTO AL SIGUIENTE</option>
							    		<option value="JUNTO AL ANTERIOR">JUNTO AL ANTERIOR</option>
							    		<option value="JUNTO CON EL ANTERIOR Y SIGUIENTE">JUNTO CON EL ANTERIOR Y SIGUIENTE</option>
							    	</select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" max="100" id="da_mismo_cabezal_descuento" onkeyup="validarDescuento(this.id)" onchange="validarDescuento(this.id)" class="form-control" value="0" placeholder="Descuento">
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
						    		<label id="h_mismo_cabezal_precio" style="display:none;">0</label>
								    <label style="color:#CA0707;">$</label><label style="color:#CA0707;" id="da_mismo_cabezal_precio">0</label>
							    </div>
							</div>

						</div>
					</div>

					<div class="panel panel-default" id="panel_cassetera" style="display:none;">
						<div class="panel-heading">
			    			<div class="panel-title">Cassetera</div>
						</div>
						<div class="panel-body">

							<div class="form-group col-sm-3">
						    	<div class="input_container">
						    		<label>Referencia</label>
						    		<select id="da_cassetera_referencia" class="form-control" onchange="cargarNombreCassetera(this.value)">
						    			<option value="PLANA">PLANA</option>
						    			<option value="NORMAL">NORMAL</option>
						    		</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-6">
						    	<div class="input_container">
						    		<label>Nombre</label>
						    		<select id="da_cassetera_nombre" class="form-control" onchange="cargarTipoCassetera(this.value)">
						    			<option value="CASSETERA 100MM PLANA NEGRO">CASSETERA 100MM PLANA NEGRO</option>
						    			<option value="CASSETERA 100MM PLANA BRONCE">CASSETERA 100MM PLANA BRONCE</option>
						    			<option value="CASSETERA 100MM PLANA IVORY">CASSETERA 100MM PLANA IVORY</option>
						    			<option value="CASSETERA 100MM PLANA SATIN">CASSETERA 100MM PLANA SATIN</option>
						    			<option value="CASSETERA 100MM PLANA BLANCO">CASSETERA 100MM PLANA BLANCO</option>
						    		</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-3" style="text-align:right;">
						    	<label>Precio</label><br>
						    	<label style="color:#CA0707;">$0.00</label>
					    	</div>
						
						</div>
					</div>

					<div class="panel panel-default" id="panel_sistema">
						<div class="panel-heading">
			    			<div class="panel-title">Sistema</div>
						</div>
						<div class="panel-body">

							<div class="form-group col-sm-12">
							    <div class="col-sm-3">
								    <label>Motor</label>
							    </div>

							    <div class="col-sm-4">
							    	<select id="da_motor" class="form-control"></select>
						    	</div>

							    <div class="col-sm-2">
								    <input type="number" min="0" id="producto_ancho" class="form-control" value="0" placeholder="Ancho">
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
								    <label style="color:#CA0707;">$0.00</label>
							    </div>
							</div>
						
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
			    			<div class="panel-title">Cotización</div>
						</div>
						<div class="panel-body">

							<div class="form-group col-sm-12">
							    <div class="col-sm-9">
								    <label>SubTotal</label>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
								    <label style="color:#CA0707;">$<label><label style="color:#CA0707;" id="da_producto_subtotal">0.00</label>
							    </div>

							    <div class="col-sm-9">
								    <label>IVA</label>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
								    <label style="color:#CA0707;">$<label><label style="color:#CA0707;" id="da_producto_iva">0.00</label>
							    </div>

							    <div class="col-sm-9">
								    <label>Total</label>
							    </div>

						    	<div class="col-sm-3" style="text-align:right;">
								    <label style="color:#CA0707;">$<label><label style="color:#CA0707;" id="da_producto_total">0.00</label>
							    </div>
							</div>

						</div>
					</div>
				    
				</div>
			</div>

			<div class="panel panel-default" id="datos_complementarios" style="display:none;">
				<div class="panel-heading">
	    			<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Datos Complementarios</strong></h4></div>
				</div>
				<div class="panel-body">
					<div class="form-group col-sm-12">
						<div class="col-sm-3">
							<label>Observaciones</label>
						</div>

						<div class="col-sm-9">
							<textarea class="form-control" id="dc_producto_observaciones" rows="3" maxlength="200"></textarea>
				            <p style="font-size:85%;">Ingrese las consideraciones adicionales a tener en cuenta para el producto.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group col-sm-12">
	    		<button class="btn btn-danger" type="button" onclick="registrarVenta()" style="background-color:#CA0707 !important;">Confirmar Producto</button>
	    	</div>

		    
		</div>

		<script type="text/javascript">

			var dateGrupoVenta, random, guardarCodigoVenta, guardarGrupoVenta;
			var nombreEspacio, tipoProducto, tipoPresentacion, tipoTela, telaProducto, colorTela;
			var productoCodigo, productoNombre, productoCantidad, productoAncho, productoAlto, productoDescuentoDistribuidor, productoDescuentoAdicional, productoObservaciones;
			var clienteCodigo, clienteNombre, clienteDireccion, clienteFinal;
			var ventaProductoSubtotal, ventaProductoIva, ventaProductoTotal;
			var objectDatosProducto, arrayObjectProducto = [];

			function seleccionarTipoPresentacion(tipoPresentacion)
			{
				if (tipoPresentacion == "PREMIUM") {
					document.getElementById("panel_cassetera").style.display = "block"; }
				else { document.getElementById("panel_cassetera").style.display = "none"; }
			}

			function seleccionarTipoProducto(tipoProducto)
			{
				if (tipoProducto == "ENROLLABLE")
				{
					document.getElementById("dap_junto_item").style.display = "none";
					document.getElementById("dap_mismo_cabezal").style.display = "none";

					document.getElementById("dap_mando").style.display = "block";
					document.getElementById("dap_perfil").style.display = "block";
					document.getElementById("dap_direccion_tela").style.display = "block";
					document.getElementById("dap_sentido").style.display = "block";
					document.getElementById("dap_soporte_intermedio").style.display = "block";
					document.getElementById("dap_cover_light").style.display = "block";

					/*var select_mando = document.getElementById('da_mando');
					while(select_mando.options.length > 0) { select_mando.remove(0); }
					var select_direccion_tela = document.getElementById('da_direccion_tela');
					while(select_direccion_tela.options.length > 0) { select_direccion_tela.remove(0); }
					var select_sentido = document.getElementById('da_sentido');
					while(select_sentido.options.length > 0) { select_sentido.remove(0); }
					var select_soporte_intermedio = document.getElementById('da_soporte_intermedio');
					while(select_soporte_intermedio.options.length > 0) { select_soporte_intermedio.remove(0); }
					var select_cover_light = document.getElementById('da_cover_light');
					while(select_cover_light.options.length > 0) { select_cover_light.remove(0); }

					var array_mando = ["IZQUIERDO", "DERECHO"];
					for (var i = 0; i < array_mando.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_mando[i];
			    		option.text = array_mando[i];
			    		select_mando.add(option);
					}

					var array_direccion_tela = ["NORMAL", "ATRAVESADA", "ATRAVESADA Y AÑADIDA"];
					for (var i = 0; i < array_direccion_tela.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_direccion_tela[i];
			    		option.text = array_direccion_tela[i];
			    		select_direccion_tela.add(option);
					}

					var array_sentido = ["NORMAL", "CONTRARIO-NVR"];
					for (var i = 0; i < array_sentido.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_sentido[i];
			    		option.text = array_sentido[i];
			    		select_sentido.add(option);
					}

					var array_soporte_intermedio = ["DEPENDIENTE", "INDEPENDIENTE"];
					for (var i = 0; i < array_soporte_intermedio.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_soporte_intermedio[i];
			    		option.text = array_soporte_intermedio[i];
			    		select_soporte_intermedio.add(option);
					}

					var array_cover_light = ["SI", "NO"];
					for (var i = 0; i < array_cover_light.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_cover_light[i];
			    		option.text = array_cover_light[i];
			    		select_cover_light.add(option);
					}*/
				}

				else if (tipoProducto == "SHEER")
				{
					document.getElementById("dap_perfil").style.display = "none";
					document.getElementById("dap_direccion_tela").style.display = "none";
					document.getElementById("dap_cover_light").style.display = "none";

					document.getElementById("dap_mando").style.display = "block";
					document.getElementById("dap_sentido").style.display = "block";
					document.getElementById("dap_soporte_intermedio").style.display = "block";
					document.getElementById("dap_junto_item").style.display = "block";
					document.getElementById("dap_mismo_cabezal").style.display = "block";
				}
				
			}

			function validacionesRegistrar()
			{
				var estadoValidacion = true;
				if ($('#producto_buscar').val() == "" || $('#producto_buscar').val() == null)
				{
					$('#modal_error_mensaje').html("<p>Por favor, Seleccione un <strong>Producto</strong>.</p>");
					$('#modalError').modal({backdrop: 'static', keyboard: false});
				}
				else if ($('#cliente_buscar').val() == "" || $('#cliente_buscar').val() == null)
				{
					$('#modal_error_mensaje').html("<p>Por favor, Seleccione un <strong>Cliente</strong>.</p>");
					$('#modalError').modal({backdrop: 'static', keyboard: false});
				}
				else
				{
					estadoValidacion = false;
				}
				return estadoValidacion;
			}

			function registrarVenta()
			{
				if (validacionesRegistrar() != true)
				{
					$('#cliente_buscar').prop("disabled", true);

					dateGrupoVenta = new Date();
					random = Math.floor((Math.random() * 1000) + 1);
					guardarCodigoVenta = "vent-" + dateGrupoVenta.getDate() + "" + (dateGrupoVenta.getMonth()+1) + "" + dateGrupoVenta.getFullYear() + "" + random + dateGrupoVenta.getHours() + "" + dateGrupoVenta.getMinutes() + "" + dateGrupoVenta.getSeconds() + "" + dateGrupoVenta.getMilliseconds();
					if (guardarGrupoVenta == null)
	    			{ guardarGrupoVenta = "grup-" + dateGrupoVenta.getDate() + "" + (dateGrupoVenta.getMonth()+1) + "" + dateGrupoVenta.getFullYear() + "" + dateGrupoVenta.getHours() + "" + dateGrupoVenta.getMinutes() + "" + dateGrupoVenta.getSeconds() + "" + dateGrupoVenta.getMilliseconds(); }

	    			/* Seleccionar Producto */
		    		nombreEspacio = $('#producto_nombre_espacio').val();
		    		tipoProducto = $('#producto_tipo').val();
		    		tipoPresentacion = $('#producto_tipo_presentacion').val();
		    		tipoTela = $('#producto_tipo_tela').val();
		    		telaProducto = $('#producto_tela').val();
		    		colorTela = $('#producto_tela_color').val();
		    		productoCodigo = $('#producto_buscar').val();
		    		productoNombre = $('#producto_buscar :selected').text();
		    		clienteCodigo = $('#cliente_buscar').val();
		    		clienteNombre = $('#cliente_buscar :selected').text();
		    		clienteDireccion = $('#direccion_envio_final').val();
		    		clienteFinal = $('#nombre_cliente_final').val();
		    		/* /Seleccionar Producto */

		    		/* Datos Iniciales */
		    		productoCantidad = $('#producto_cantidad').val();
		    		productoAncho = $('#producto_ancho').val();
		    		productoAlto = $('#producto_alto').val();
		    		productoDescuentoDistribuidor = $('#producto_descuento_distribuidor').val();
		    		productoDescuentoAdicional = $('#producto_descuento_adicional').val();
		    		/* /Datos Iniciales */

		    		/* Cotización */
		    		ventaProductoSubtotal = $('#da_producto_subtotal').text();
		    		ventaProductoIva = $('#da_producto_iva').text();
		    		ventaProductoTotal = $('#da_producto_total').text();
		    		/* /Cotización */

		    		/* Datos Complementarios */
		    		productoObservaciones = $('#dc_producto_observaciones').val();
		    		/* /Datos Complementarios */

		    		objectDatosProducto = { venta_codigo:guardarCodigoVenta, venta_grupo:guardarGrupoVenta, espacio_nombre:nombreEspacio, producto_tipo:tipoProducto, 
		    			producto_codigo:productoCodigo, producto_nombre:productoNombre, cliente_codigo:clienteCodigo, cliente_nombre:clienteNombre, 
		    			cliente_direccion:clienteDireccion, cliente_final:clienteFinal, producto_cantidad:productoCantidad, producto_ancho:productoAncho, 
		    			producto_alto:productoAlto, producto_descuento_distribuidor:productoDescuentoDistribuidor, producto_descuento_adicional:productoDescuentoAdicional, 
		    			venta_producto_subtotal:ventaProductoSubtotal, venta_producto_iva:ventaProductoIva, venta_producto_total:ventaProductoTotal, 
		    			producto_observaciones:productoObservaciones };
		    		arrayObjectProducto.push(objectDatosProducto);

		    		$('#modalRegistroVenta').modal({backdrop: 'static', keyboard: false});

		    		//alert(guardarCodigoVenta + "\n" + guardarGrupoVenta);
				}
			}

			function finalizarRegistro()
			{
				var stringArrayObjectProducto = "'"+JSON.stringify(arrayObjectProducto, null, "")+"'";
				var form = '<form action="RegisterOrder.php" method="POST">'+'<input type="hidden" name="arrayDatosProductos" value='+stringArrayObjectProducto+'></input>'+'</form>';
				$(form).submit();
			}

			function seleccionarProducto(codigoProducto)
			{
				$.ajax({
	    			type: "POST",
	    			url: "../control/control_producto.php",
	    			data: { elegir: 2, codigo: codigoProducto },
	    			success: function(data) {}
		    	}).done(function(data) {
		    		document.getElementById("datos_iniciales").style.display = "block";
		    		document.getElementById("datos_adicionales").style.display = "block";
		    		document.getElementById("datos_complementarios").style.display = "block";

		    		var json = JSON.parse(data);
	    			productoIva = json.Iva;
	    			productoPrecio = json.Precio;
		    		$('#producto_precio_lista').html(parseInt(productoPrecio));
	    			calcularValores();
	    		});
			}

			function consultarPrecio(nombre)
			{

				var tipoProducto = $('#producto_tipo').val();
				if(nombre == "da_mando")
				{
					var nombreAdicional = $('#da_mando').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_mando_precio").style.display = "none";
						//document.getElementById("da_mando_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_mando_precio").style.display = "block";
						//document.getElementById("da_mando_button").style.display = "block";
					}
					var precioAdicional = $('#da_mando_precio');
					var tablaAdicional = "mando";
					var hAdicional = $('#h_mando_precio');
				}
				else if(nombre == "da_perfil")
				{
					var nombreAdicional = $('#da_perfil').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_perfil');
					var tablaAdicional = "perfil";
					var hAdicional = $('#h_perfil_precio');
				}
				else if(nombre == "da_direccion_tela")
				{
					var nombreAdicional = $('#da_direccion_tela').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_direccion_tela');
					var tablaAdicional = "direccion_tela";
					var hAdicional = $('#h_direccion_tela_precio');
				}
				else if(nombre == "da_sentido")
				{
					var nombreAdicional = $('#da_sentido').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_sentido');
					var tablaAdicional = "sentido";
					var hAdicional = $('#h_sentido_precio');
				}
				else if(nombre == "da_soporte_intermedio")
				{
					var nombreAdicional = $('#da_soporte_intermedio').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_soporte_intermedio');
					var tablaAdicional = "soporte_intermedio";
					var hAdicional = $('#h_soporte_intermedio_precio');
				}
				else if(nombre == "da_cover_light")
				{
					var nombreAdicional = $('#da_cover_light').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_cover_light');
					var tablaAdicional = "cover_light";
					var hAdicional = $('#h_cover_light_precio');
				}
				else if(nombre == "da_junto_item")
				{
					var nombreAdicional = $('#da_junto_item').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_junto_item');
					var tablaAdicional = "junto_item";
					var hAdicional = $('#h_junto_item_precio');
				}
				else if(nombre == "da_mismo_cabezal")
				{
					var nombreAdicional = $('#da_mismo_cabezal').val();
					if (nombreAdicional == "SELECCIONE")
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "none";
						//document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						//document.getElementById("da_direccion_tela_precio").style.display = "block";
						//document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_mismo_cabezal');
					var tablaAdicional = "mismo_cabezal";
					var hAdicional = $('#h_mismo_cabezal_precio');
				}

				$.ajax({
	    			type: "POST",
	    			url: "../control/control_adicional.php",
	    			data: { elegir: 0, tipoProducto: tipoProducto, nombreAdicional: nombreAdicional, tablaAdicional: tablaAdicional },
	    			success: function(data) {}
		    	}).done(function(data) {
		    		var jsonResponse = JSON.parse(data);
                    if (jsonResponse.Success == 1) {
                    	hAdicional.html(jsonResponse.Precio);
                    	cal();
                    }
	    		});
			}

			function validarDescuento(descuento)
			{
				if (document.getElementById(descuento).value < 0)
				{
					document.getElementById(descuento).value = 0;
				}
				else if (document.getElementById(descuento).value > 100)
				{
					document.getElementById(descuento).value = 100; 
				}
				else if (document.getElementById(descuento).value == "")
				{
					document.getElementById(descuento).value = 0;
				}
				cal();
			}

			function cal()
			{
				var precioAdicional, descuentoAdicional, precioTotalAdicional;
				var tipoProducto = $('#producto_tipo').val();
				
				if (tipoProducto == "ENROLLABLE")
				{
					precioAdicional = $('#h_mando_precio').text();
					descuentoAdicional = $('#da_mando_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_mando_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_perfil_precio').text();
					descuentoAdicional = $('#da_perfil_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_perfil_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_direccion_tela_precio').text();
					descuentoAdicional = $('#da_direccion_tela_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_direccion_tela_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_sentido_precio').text();
					descuentoAdicional = $('#da_sentido_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_sentido_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_soporte_intermedio_precio').text();
					descuentoAdicional = $('#da_soporte_intermedio_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_soporte_intermedio_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_cover_light_precio').text();
					descuentoAdicional = $('#da_cover_light_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_cover_light_precio').html(precioTotalAdicional);
				}
				else if (tipoProducto == "SHEER")
				{
					precioAdicional = $('#h_mando_precio').text();
					descuentoAdicional = $('#da_mando_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_mando_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_sentido_precio').text();
					descuentoAdicional = $('#da_sentido_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_sentido_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_soporte_intermedio_precio').text();
					descuentoAdicional = $('#da_soporte_intermedio_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_soporte_intermedio_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_junto_item_precio').text();
					descuentoAdicional = $('#da_junto_item_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_junto_item_precio').html(precioTotalAdicional);

					precioAdicional = $('#h_mismo_cabezal_precio').text();
					descuentoAdicional = $('#da_mismo_cabezal_descuento').val();
					precioTotalAdicional = precioAdicional - (precioAdicional * descuentoAdicional / 100);
					$('#da_mismo_cabezal_precio').html(precioTotalAdicional);
				}
			}

			function calcularValores()
			{
				/* DATOS INICIALES */
				var productoPrecioL = $('#producto_precio_lista').text();
				var productoCantidad = $('#producto_cantidad').val();
				var productoPrecioCantidad = productoPrecioL * productoCantidad;

				var productoDescuentoDistribuidor = $('#producto_descuento_distribuidor').val();
				var productoDescuentoAdicional = $('#producto_descuento_adicional').val();

				var productoPrecioDescuento = productoPrecioL - (productoPrecioL * (productoDescuentoDistribuidor / 100)) - (productoPrecioL * (productoDescuentoAdicional / 100));

				if (productoPrecioDescuento < 0) {
					productoPrecioDescuento = 0;
				}
				$('#producto_precio_descuento').html(productoPrecioDescuento);

				/* DATOS ADICIONALES */
				var daProductoSubtotal = productoPrecioDescuento * productoCantidad;
				var daProductoIva = productoPrecioDescuento * (productoIva / 100);
				var daProductoTotal = daProductoSubtotal + daProductoIva;

				$('#da_producto_subtotal').html(daProductoSubtotal);
				$('#da_producto_iva').html(daProductoIva);
				$('#da_producto_total').html(daProductoTotal);

				/* DATOS CLIENTE */
				var daProductoSubtotalCliente;
				var daProductoIvaCliente;
				var daProductoTotalCliente;

				var productoDescuentoCliente = $('#da_producto_descuento_cliente').val();

				$('#da_producto_precio_descuento_cliente');
				$('#da_producto_subtotal_cliente');
				$('#da_producto_iva_cliente');
				$('#da_producto_total_cliente');
	    	}

	    	function limpiarCampos()
	    	{
	    		$('#producto_buscar').select2("val", "");
	    		$('#cliente_buscar').select2("val", "");
	    		$('#producto_cantidad').val(1);
	    		$('#producto_ancho').val(1);
	    		$('#producto_alto').val(1);
	    		$('#producto_descuento_distribuidor').val(0);
	    		$('#producto_descuento_adicional').val(0);
	    		$('#producto_precio_lista').html(0.00);
				calcularValores();
	    	}

	    	function cargarNombreCassetera(referenciaCassetera)
			{
				var select_cassetera_referencia = document.getElementById('da_cassetera_nombre');
				while(select_cassetera_referencia.options.length > 0)
				{                
    				select_cassetera_referencia.remove(0);
    			}
    			if (referenciaCassetera == "PLANA")
				{
					var array_cassetera_nombre = ["CASSETERA 100MM PLANA NEGRO", "CASSETERA 100MM PLANA BRONCE", "CASSETERA 100MM PLANA IVORY", "CASSETERA 100MM PLANA SATIN", "CASSETERA 100MM PLANA BLANCO"];
					for (var i = 0; i < array_cassetera_nombre.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_cassetera_nombre[i];
			    		option.text = array_cassetera_nombre[i];
			    		select_cassetera_referencia.add(option);
					}
				}
				else if (referenciaCassetera = "NORMAL")
				{
					var array_cassetera_nombre = ["CASSETERA 120MM SHEER BRONCE", "CASSETERA 120MM SHEER SATIN", "CASSETERA 120MM SHEER NEGRO 19", "CASSETERA 120MM SHEER IVORY 19", "CASSETERA 120MM SHEER BLANCO 19", "CASSETERA 100MM SHEER NEGRO 19", "CASSETERA 100MM SHEER BRONCE 19", "CASSETERA 100MM SHEER IVORY 19", "CASSETERA 100MM SHEER SATIN 19", "CASSETERA 100MM SHEER BLANCO 19"];
					for (var i = 0; i < array_cassetera_nombre.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_cassetera_nombre[i];
			    		option.text = array_cassetera_nombre[i];
			    		select_cassetera_referencia.add(option);
					}
				}
			}

			function cargarProductoTelas(tipoTela)
			{
				var select = document.getElementById('producto_tela');
				while(select.options.length > 0)
				{                
    				select.remove(0);
    			}
    			var option = document.createElement('option');
				option.value = "SELECCIONE";
	    		option.text = "-- Seleccione --";
	    		select.add(option);

				if (tipoTela == "BLACK OUT")
				{
					var array_telas = ["ESTUCO", "NOLITE", "VINYL PLUS 1,8 MTS", "VINYL PLUS 3 MTS"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tipoTela == "DECORATIVA")
				{
					var array_telas = ["BAMBU", "ESTUCO", "MISTRAL", "NOLITA", "ODA", "ROMA"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tipoTela == "SCREEN")
				{
					var array_telas = ["CELICA", "ESTUCO", "NATURA", "SAHARA", "SCREEN 5%", "SCREEN 10%", "SCREEN 20%"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tipoTela == "SHEER")
				{
					var array_telas = ["CANCUN", "HORIZON", "LINEN", "LUXURY", "MYKONOS", "RUSTIC", "SCREEN", "SOFT"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
			}

			function cargarTelaColores(tela)
			{
				var select = document.getElementById('producto_tela_color');
				while(select.options.length > 0)
				{                
    				select.remove(0);
    			}
    			var option = document.createElement('option');
				option.value = "SELECCIONE";
	    		option.text = "-- Seleccione --";
	    		select.add(option);

				if (tela == "BAMBU")
				{
					var array_telas = ["BLANCO", "MARFIL", "NUEZ"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "CANCUN")
				{
					var array_telas = ["BLANCO", "CRUDO", "GRIS", "MADERA", "MARFIL"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "CELICA")
				{
					var array_telas = ["MOCA", "DUNA"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "ESTUCO")
				{
					var array_telas = ["ARENA", "BLANCO", "CAFÉ", "CENIZO", "LINO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "HORIZON")
				{
					var array_telas = ["BLANCO", "CREMA", "MADERA", "MARFIL"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "LINEN")
				{
					var array_telas = ["BLANCO", "NATURAL"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "LUXURY")
				{
					var array_telas = ["BLANCO", "CANELA", "CHAMPAÑA", "CHOCOLATE", "GRIS PERLA", "MARFIL"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "MISTRAL")
				{
					var array_telas = ["BLANCO", "CAFÉ", "CREMA"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "MYKONOS")
				{
					var array_telas = ["BLANCO", "CREMA", "GRIS", "MADERA", "NEGRO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "NATURA")
				{
					var array_telas = ["BLANCO", "BLANCO LINO", "PETROLEO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "NOLITA")
				{
					var array_telas = ["ARENA", "BLANCO", "CHOCOLATE", "CREMA", "NEGRO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "NOLITE")
				{
					var array_telas = ["BLANCO", "LINO", "MARFIL"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "ODA")
				{
					var array_telas = ["BLANCO", "NEGRO", "ORO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "ROMA")
				{
					var array_telas = ["ALGODÓN", "MARFIL", "NEGRO", "ROBLE"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "RUSTIC")
				{
					var array_telas = ["LATTE", "MARFIL", "TABACO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "SAHARA")
				{
					var array_telas = ["ARENA", "CAFÉ", "ROBLE"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "SCREEN")
				{
					var array_telas = ["BLANCO", "BLANCO CREMA", "BLANCO LINO", "CENIZO", "COCOA", "GRIS", "GRIS PERLA", "NEGRO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}

				else if (tela == "SCREEN 5%")
				{
					var array_telas = ["BLANCO", "BLANCO PERLA", "CHOCOLATE", "LINO", "NEGRO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "SCREEN 10%")
				{
					var array_telas = ["BLANCO", "BLANCO LINO", "BLANCO PERLA", "CHOCOLATE", "LINO", "NEGRO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "SCREEN 20%")
				{
					var array_telas = ["BLANCO", "BLANCO LINO", "BLANCO PERLA", "LINO", "NEGRO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "SOFT")
				{
					var array_telas = ["BLANCO", "CREMA", "MARRON", "NEGRO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "VINYL PLUS 1,8 MTS")
				{
					var array_telas = ["BLANCO", "CREMA", "CRUDO", "GRIS"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
				else if (tela == "VINYL PLUS 3 MTS")
				{
					var array_telas = ["BLANCO", "CRUDO"];
					for (var i = 0; i < array_telas.length; i++)
					{
						var option = document.createElement('option');
						option.value = array_telas[i];
			    		option.text = array_telas[i];
			    		select.add(option);
					}
				}
			}

		</script>

	</body>
</html>