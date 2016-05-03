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
			      		<li><a href="AddProduct.php">Nuevo Pedido/Cotización</a></li>
			      		<li class="active"><a href="">Administrador de Precios</a></li>
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
							<button type="button" class="btn btn-danger" onclick="finalizarRegistro()">Finalizar Pedido o Cotización</button>
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
			    	<div class="panel-title" style="color:#CA0707 !important;"><h4><strong>Producto</strong></h4></div>
				</div>
				<div class="panel-body">

		    		<div class="form-group col-sm-4">
				    	<div class="input_container">
				    		<label>Tipo de Producto</label>
				    		<select id="producto_tipo" class="form-control" onchange="actualizarDatosAdicionales(this.value)">
				    			<option value="SELECCIONE">-- Seleccione --</option>
				    			<option value="ENROLLABLE">ENROLLABLE</option>
				    			<option value="SHEER">SHEER</option>
				    			<option value="PANEL JAPONES">PANEL JAPONES</option>
				    		</select>
				    	</div>
			    	</div>

				</div>
			</div>

			<div id="actualizar_datos_adicionales" style="display:none;">

				<div class="panel panel-default" id="panel_mando">
					<div class="panel-heading">
		    			<div class="panel-title">Mando</div>
					</div>
					<div class="panel-body">

						<div class="form-group col-sm-12" id="dap_mando">

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Tipo</label>
						    		<select class="form-control" id="da_mando" onchange="consultarPrecio(this.id)">
						    			<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="IZQUIERDO">IZQUIERDO</option>
				    					<option value="DERECHO">DERECHO</option>
							    	</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4" id="da_mando_precio" style="display:none;">
						    	<div class="input_container">
						    		<label>Precio</label>
						    		<input type="number" class="form-control" id="precio_mando" min="0" value="0" placeholder="Precio" style="text-align:right;">
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4" id="da_mando_button" style="display:none;">
						    	<div class="input_container">
						    		<label>Actualizar Precio</label>
						    		<button class="form-control btn btn-success" id="b_actualizar_mando" type="button" onclick="actualizarPrecio(this.id)">Actualizar</button>
						    	</div>
					    	</div>

						</div>

					</div>
				</div>

				<div class="panel panel-default" id="panel_perfil">
					<div class="panel-heading">
		    			<div class="panel-title">Perfil</div>
					</div>
					<div class="panel-body">

						<div class="form-group col-sm-12" id="dap_perfil">

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Tipo</label>
						    		<select id="da_perfil" class="form-control">
						    			<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="IZQUIERDO">IZQUIERDO</option>
				    					<option value="DERECHO">DERECHO</option>
							    	</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Precio</label>
						    		<input type="number" min="0" id="precio_mando" class="form-control" value="0" placeholder="Precio" style="text-align:right;">
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Actualizar Precio</label>
						    		<button class="form-control btn btn-success" type="button" onclick="">Actualizar</button>
						    	</div>
					    	</div>

						</div>

					</div>
				</div>

				<div class="panel panel-default" id="panel_direccion_tela">
					<div class="panel-heading">
		    			<div class="panel-title">Dirección de la Tela</div>
					</div>
					<div class="panel-body">

						<div class="form-group col-sm-12" id="dap_direccion_tela">

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Dirección</label>
						    		<select id="da_direccion_tela" class="form-control" onchange="consultarPrecio(this.id)">
						    			<option value="SELECCIONE">-- Seleccione --</option>
							    		<option value="NORMAL">NORMAL</option>
				    					<option value="ATRAVESADA">ATRAVESADA</option>
				    					<option value="ATRAVESADA Y ANADIDA">ATRAVESADA Y AÑADIDA</option>
							    	</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4" id="da_direccion_tela_precio" style="display:none;">
						    	<div class="input_container">
						    		<label>Precio</label>
						    		<input type="number" min="0" id="precio_direccion_tela" class="form-control" value="0" placeholder="Precio" style="text-align:right;">
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4" id="da_direccion_tela_button" style="display:none;">
						    	<div class="input_container">
						    		<label>Actualizar Precio</label>
						    		<button class="form-control btn btn-success" id="b_actualizar_direccion_tela" type="button" onclick="actualizarPrecio(this.id)">Actualizar</button>
						    	</div>
					    	</div>

						</div>

					</div>
				</div>

				<div class="panel panel-default" id="panel_sentido">
					<div class="panel-heading">
		    			<div class="panel-title">Sentido</div>
					</div>
					<div class="panel-body">

						<div class="form-group col-sm-12" id="dap_sentido">

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Sentido</label>
						    		<select id="da_sentido" class="form-control" onchange="consultarPrecio(this.id)">
							    		<option value="NORMAL">NORMAL</option>
				    					<option value="CONTRARIO-NVR">CONTRARIO-NVR</option>
							    	</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Precio</label>
						    		<input type="number" min="0" id="precio_sentido" class="form-control" value="0" placeholder="Precio" style="text-align:right;">
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Actualizar Precio</label>
						    		<button class="form-control btn btn-success" id="b_actualizar_sentido" type="button" onclick="actualizarPrecio(this.id)">Actualizar</button>
						    	</div>
					    	</div>

						</div>

					</div>
				</div>

				<div class="panel panel-default" id="panel_soporte_intermedio">
					<div class="panel-heading">
		    			<div class="panel-title">Soporte Intermedio</div>
					</div>
					<div class="panel-body">

						<div class="form-group col-sm-12" id="dap_soporte_intermedio">

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Tipo</label>
						    		<select id="da_soporte_intermedio" class="form-control" onchange="consultarPrecio(this.id)">
							    		<option value="DEPENDIENTE">DEPENDIENTE</option>
				    					<option value="INDEPENDIENTE">INDEPENDIENTE</option>
							    	</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Precio</label>
						    		<input type="number" min="0" id="precio_soporte_intermedio" class="form-control" value="0" placeholder="Precio" style="text-align:right;">
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Actualizar Precio</label>
						    		<button class="form-control btn btn-success" id="b_actualizar_soporte_intermedio" type="button" onclick="actualizarPrecio(this.id)">Actualizar</button>
						    	</div>
					    	</div>

						</div>

					</div>
				</div>

				<div class="panel panel-default" id="panel_cover_light">
					<div class="panel-heading">
		    			<div class="panel-title">Cover Light</div>
					</div>
					<div class="panel-body">

						<div class="form-group col-sm-12" id="dap_cover_light">

					    	<div class="form-group col-sm-8">
						    	<div class="input_container">
						    		<label>Precio</label>
						    		<input type="number" min="0" id="precio_cover_light" class="form-control" value="0" placeholder="Precio" style="text-align:right;">
						    	</div>
					    	</div>


					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Actualizar Precio</label>
						    		<button class="form-control btn btn-success" type="button" onclick="">Actualizar</button>
						    	</div>
					    	</div>

						</div>

					</div>
				</div>

				<div class="panel panel-default" id="panel_junto_item">
					<div class="panel-heading">
		    			<div class="panel-title">Junto a otro Item</div>
					</div>
					<div class="panel-body">

						<div class="form-group col-sm-12" id="dap_junto_item">

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Lugar</label>
						    		<select id="da_junto_item" class="form-control">
							    		<option value="AL SIGUIENTE ITEM">AL SIGUIENTE ITEM</option>
							    		<option value="AL SIGUIENTE ITEM">AL ANTERIOR ITEM</option>
							    	</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Precio</label>
						    		<input type="number" min="0" id="precio_junto_item" class="form-control" value="0" placeholder="Precio" style="text-align:right;">
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Actualizar Precio</label>
						    		<button class="form-control btn btn-success" type="button" onclick="">Actualizar</button>
						    	</div>
					    	</div>

						</div>

					</div>
				</div>

				<div class="panel panel-default" id="panel_mismo_cabezal">
					<div class="panel-heading">
		    			<div class="panel-title">Mismo Cabezal</div>
					</div>
					<div class="panel-body">

						<div class="form-group col-sm-12" id="dap_mismo_cabezal">

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Lugar</label>
						    		<select id="da_mismo_cabezal" class="form-control">
							    		<option value="JUNTO AL SIGUIENTE">JUNTO AL SIGUIENTE</option>
							    		<option value="JUNTO AL ANTERIOR">JUNTO AL ANTERIOR</option>
							    		<option value="JUNTO CON EL ANTERIOR Y SIGUIENTE">JUNTO CON EL ANTERIOR Y SIGUIENTE</option>
							    	</select>
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Precio</label>
						    		<input type="number" min="0" id="precio_mismo_cabezal" class="form-control" value="0" placeholder="Precio" style="text-align:right;">
						    	</div>
					    	</div>

					    	<div class="form-group col-sm-4">
						    	<div class="input_container">
						    		<label>Actualizar Precio</label>
						    		<button class="form-control btn btn-success" type="button" onclick="">Actualizar</button>
						    	</div>
					    	</div>

						</div>

					</div>
				</div>

				<div class="panel panel-default" id="panel_cassetera">
					<div class="panel-heading">
		    			<div class="panel-title">Cassetera</div>
					</div>
					<div class="panel-body">

						<div class="form-group col-sm-12" id="dap_cassetera">

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
				</div>

				<div class="panel panel-default" id="panel_sistema">
					<div class="panel-heading">
		    			<div class="panel-title">Sistema</div>
					</div>
					<div class="panel-body">

						<div class="form-group col-sm-12" id="dap_sistema">

							<div class="form-group col-sm-3">
						    	<div class="input_container">
						    		<label>Motor</label>
						    		<select id="da_motor" class="form-control" onchange="cargarNombreCassetera(this.value)">
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
				</div>

			<div>
		    
		</div>

		<script type="text/javascript">

			function actualizarDatosAdicionales(tipoProducto)
			{
				if (tipoProducto == "SELECCIONE")
				{
					document.getElementById("actualizar_datos_adicionales").style.display = "none";
				}
				else
				{
					document.getElementById("actualizar_datos_adicionales").style.display = "block";
					if (tipoProducto == "ENROLLABLE")
					{
						document.getElementById("panel_junto_item").style.display = "none";
						document.getElementById("panel_mismo_cabezal").style.display = "none";

						document.getElementById("panel_mando").style.display = "block";
						document.getElementById("panel_perfil").style.display = "block";
						document.getElementById("panel_direccion_tela").style.display = "block";
						document.getElementById("panel_sentido").style.display = "block";
						document.getElementById("panel_soporte_intermedio").style.display = "block";
						document.getElementById("panel_cover_light").style.display = "block";
						document.getElementById("panel_cassetera").style.display = "block";
					}
					else if (tipoProducto == "SHEER")
					{
						document.getElementById("panel_perfil").style.display = "none";
						document.getElementById("panel_direccion_tela").style.display = "none";
						document.getElementById("panel_cover_light").style.display = "none";

						document.getElementById("panel_mando").style.display = "block";
						document.getElementById("panel_sentido").style.display = "block";
						document.getElementById("panel_soporte_intermedio").style.display = "block";
						document.getElementById("panel_junto_item").style.display = "block";
						document.getElementById("panel_mismo_cabezal").style.display = "block";
					}
				}
				
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

			function consultarPrecio(nombre)
			{

				var tipoProducto = $('#producto_tipo').val();
				if(nombre == "da_mando")
				{
					var nombreAdicional = $('#da_mando').val();
					if (nombreAdicional == "SELECCIONE")
					{
						document.getElementById("da_mando_precio").style.display = "none";
						document.getElementById("da_mando_button").style.display = "none";
					}
					else
					{
						document.getElementById("da_mando_precio").style.display = "block";
						document.getElementById("da_mando_button").style.display = "block";
					}
					var precioAdicional = $('#precio_mando');
					var tablaAdicional = "mando";
				}
				else if(nombre == "da_direccion_tela")
				{
					var nombreAdicional = $('#da_direccion_tela').val();
					if (nombreAdicional == "SELECCIONE")
					{
						document.getElementById("da_direccion_tela_precio").style.display = "none";
						document.getElementById("da_direccion_tela_button").style.display = "none";
					}
					else
					{
						document.getElementById("da_direccion_tela_precio").style.display = "block";
						document.getElementById("da_direccion_tela_button").style.display = "block";
					}
					var precioAdicional = $('#precio_direccion_tela');
					var tablaAdicional = "direccion_tela";
				}
				else if(nombre == "da_sentido")
				{
					var nombreAdicional = $('#da_sentido').val();
					var precioAdicional = $('#precio_sentido');
					var tablaAdicional = "sentido";
				}
				else if(nombre == "da_soporte_intermedio")
				{
					var nombreAdicional = $('#da_soporte_intermedio').val();
					var precioAdicional = $('#precio_soporte_intermedio');
					var tablaAdicional = "soporte_intermedio";
				}

				$.ajax({
	    			type: "POST",
	    			url: "../control/control_adicional.php",
	    			data: { elegir: 0, tipoProducto: tipoProducto, nombreAdicional: nombreAdicional, tablaAdicional: tablaAdicional },
	    			success: function(data) {}
		    	}).done(function(data) {
		    		var jsonResponse = JSON.parse(data);
                    if (jsonResponse.Success == 1) {
                    	precioAdicional.val(jsonResponse.Precio);
                    }
	    		});
			}

			function actualizarPrecio(button)
			{
				var tipoProducto = $('#producto_tipo').val();
				if (button == "b_actualizar_mando")
				{
					var nombreAdicional = $('#da_mando').val();
					var precioAdicional = $('#precio_mando').val();
					var tablaAdicional = "mando";
				}
				else if (button == "b_actualizar_direccion_tela")
				{
					var nombreAdicional = $('#da_direccion_tela').val();
					var precioAdicional = $('#precio_direccion_tela').val();
					var tablaAdicional = "direccion_tela";
				}
				else if (button == "b_actualizar_sentido")
				{
					var nombreAdicional = $('#da_sentido').val();
					var precioAdicional = $('#precio_sentido').val();
					var tablaAdicional = "sentido";
				}
				else if (button == "b_actualizar_soporte_intermedio")
				{
					var nombreAdicional = $('#da_soporte_intermedio').val();
					var precioAdicional = $('#precio_soporte_intermedio').val();
					var tablaAdicional = "soporte_intermedio";
				}

				$.ajax({
	    			type: "POST",
	    			url: "../control/control_adicional.php",
	    			data: { elegir: 1, tipoProducto: tipoProducto, nombreAdicional: nombreAdicional, precioAdicional: precioAdicional, tablaAdicional: tablaAdicional },
	    			success: function(data) {}
		    	}).done(function(data) {
		    		var jsonResponse = JSON.parse(data);
		    		if (jsonResponse.Success == 0) {
                        $('#notificacion').html(jsonResponse.Mensaje);
                    } else if (jsonResponse.Success == 1) {
                    	var mensaje = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Correcto!</strong> Se actualizó el tipo: <strong>'+jsonResponse.Nombre+'</strong> en el producto: <strong>'+jsonResponse.Tipo_Producto+'</strong>.</div>';
                        $('#notificacion').html(mensaje);
                    }
	    		});
			}

			

			function registrarVenta() {

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
					dateGrupoVenta = new Date();
					random = Math.floor((Math.random() * 1000) + 1);
					guardarCodigoVenta = String(dateGrupoVenta.getDate() + "" + (dateGrupoVenta.getMonth()+1) + "" + dateGrupoVenta.getFullYear() + "" + random + "" + dateGrupoVenta.getHours() + "" + dateGrupoVenta.getMinutes() + "" + dateGrupoVenta.getSeconds() + "" + dateGrupoVenta.getMilliseconds());
	    			
	    			if (guardarGrupoVenta == null)
	    			{
		    			guardarGrupoVenta = dateGrupoVenta.getDate() + "" + (dateGrupoVenta.getMonth()+1) + "" + dateGrupoVenta.getFullYear() + "" + dateGrupoVenta.getHours() + "" + dateGrupoVenta.getMinutes() + "" + dateGrupoVenta.getSeconds() + "" + dateGrupoVenta.getMilliseconds();
		    		}
	    			
	    			guardarFechaVenta = dateGrupoVenta.getDate() + "/" + (dateGrupoVenta.getMonth()+1) + "/" + dateGrupoVenta.getFullYear();
	    			guardarHoraVenta = dateGrupoVenta.getHours() + ":" + dateGrupoVenta.getMinutes() + ":" + dateGrupoVenta.getSeconds();
	    			guardarTotalVenta = $('#da_producto_total').text();
	    			guardarObservacionVenta = $('#dc_venta_observaciones').val();
	    			guardarTipoVenta = $('#dc_tipo_documento').val();

					productoCodigo = $('#producto_buscar').val();
		    		productoNombre = $('#producto_buscar :selected').text();
		    		productoCantidad = $('#producto_cantidad').val();
		    		productoAncho = $('#producto_ancho').val();
		    		productoAlto = $('#producto_alto').val();
		    		productoDescuentoDistribuidor = $('#producto_descuento_distribuidor').val();
		    		productoDescuentoAdicional = $('#producto_descuento_adicional').val();

		    		distribuidorCodigo = "1143374565";
		    		clienteCodigo = $('#cliente_buscar').val();

		    		objectDatosProducto = { codigoVenta: guardarCodigoVenta, grupoVenta: guardarGrupoVenta, fechaVenta: guardarFechaVenta, horaVenta: guardarHoraVenta, totalVenta: guardarTotalVenta, observacionVenta: guardarObservacionVenta, tipoVenta: guardarTipoVenta, codigoProducto: productoCodigo, nombreProducto: productoNombre, cantidadProducto: productoCantidad, anchoProducto: productoAncho, altoProducto: productoAlto, descuentoDistribuidorProducto: productoDescuentoDistribuidor, descuentoAdicionalProducto: productoDescuentoAdicional, codigoDistribuidor: distribuidorCodigo, codigoCliente: clienteCodigo };
					arrayObjectProducto.push(objectDatosProducto);
					
					$('#modalRegistroVenta').modal({backdrop: 'static', keyboard: false});
				}
			}

			function finalizarRegistro() {
				var stringArrayObjectProducto = "'"+JSON.stringify(arrayObjectProducto, null, "")+"'";
				var form = '<form action="RegisterOrder.php" method="POST">'+'<input type="hidden" name="arrayDatosProductos" value='+stringArrayObjectProducto+'></input>'+'</form>';
				$(form).submit();
			}


			function calcularValores() {
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

		</script>

	</body>
</html>