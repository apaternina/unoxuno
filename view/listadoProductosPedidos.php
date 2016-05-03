<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Ofima</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
					            <li><a href="registrarCotizacion.php">Registrar Venta</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="listadoProductosCotizados.php">Cotizaciones</a></li>
					            <li class="active"><a href="listadoProductosPedidos.php">Pedidos</a></li>
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

    	<div id="notificacion"></div>

	    <div class="panel panel-primary">
		 	<div class="panel-heading" style="background-color:#1E93FF !important;">
		    	<h3 class="panel-title">PRODUCTOS PEDIDOS</h3>
			</div>

	  		<table id="tableProductosCotizados" class="table table-bordered table-hover">
	            
				<thead>
					<tr>
					    <th style="text-align:center; background-color:#1E93FF; color:#FFF;" width="25%">PRODUCTO</th>
					    <th style="text-align:center; background-color:#1E93FF; color:#FFF;;" width="10%">CANTIDAD</th>
					    <th style="text-align:center; background-color:#1E93FF; color:#FFF;;" width="20%">PRECIO TOTAL</th>
					    <th style="text-align:center; background-color:#1E93FF; color:#FFF;;" width="15%">FECHA</th>
					    <th style="text-align:center; background-color:#1E93FF; color:#FFF;;" width="10%">OPCIÓN</th>
					</tr>
				</thead>
				<tbody id="detalleProductosPedidos">
					<?php
						require_once '../model/model_pedidos.php';
						$m_pedidos = new model_pedidos();
						$response_pedido = $m_pedidos->listarProductosPedidos();

						if ($response_pedido) {
							while ($row_pedido = mysql_fetch_array($response_pedido)) {
					?>
								<tr>
									<td style="text-align:center;"><?php echo $row_pedido["DESCRIPCIO"]; ?></td>
									<td style="text-align:center;"><?php echo $row_pedido["CANTIDAD_PRODUCTO"]; ?></td>
									<td style="text-align:center;"><?php echo $row_pedido["SUBTOTAL_PRODUCTO"]; ?></td>
									<td style="text-align:center;"><?php echo $row_pedido["FECHA"]; ?></td>
									<td style="text-align:center;">
										<a class="btn btn-warning" title="Modificar" href="#" data-toggle="modal" data-target="#modal_modificarCliente<?php echo $row_cliente["NIT"]; ?>">
											<span class="glyphicon glyphicon-pencil"></span>
										</a>
										<a class="btn btn-info" title="Eliminar"><span class="glyphicon glyphicon-print"></span></a>

										<!-- Modal -->
										<div class="modal fade" id="modal_modificarCliente<?php echo $row_cliente["NIT"]; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_modificarClienteLabel<?php echo $row_cliente["NIT"]; ?>">
											<div class="modal-dialog" role="document">
										    	<div class="modal-content">
										    		<div class="modal-header">
										        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										        			<span aria-hidden="true">&times;</span>
										        		</button>
										        		<h4 class="modal-title" id="modal_modificarClienteLabel<?php echo $row_cliente["NIT"]; ?>">Modificar Datos del Cliente</h4>
										      		</div>
											    	<div class="modal-body">

											        	<form action="../control/control_cliente.php" method="post">
															<div class="form-group">
														    	<label>Codigo</label>
																<input type="text" id="modal_codigocliente<?php echo $row_cliente["NIT"]; ?>" class="form-control" placeholder="Nit" value="<?php echo $row_cliente["NIT"]; ?>">
															</div>
															<div class="form-group">
														    	<label>Nombre</label>
																<input type="text" id="modal_nombrecliente<?php echo $row_cliente["NIT"]; ?>" class="form-control" placeholder="Nombre" value="<?php echo $row_cliente["NOMBRE"]; ?>">
															</div>
															<div class="form-group">
														    	<label>Dirección</label>
																<input type="text" id="modal_direccioncliente<?php echo $row_cliente["NIT"]; ?>" class="form-control" placeholder="Dirección" value="<?php echo $row_cliente["DIRECCION"]; ?>">
															</div>
															<div class="form-group">
														    	<label>Email</label>
																<input type="text" id="modal_emailcliente<?php echo $row_cliente["NIT"]; ?>" class="form-control" placeholder="Email" value="<?php echo $row_cliente["EMAIL"]; ?>">
															</div>
														</form>

											    	</div>
											    	<div class="modal-footer">
											        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
											        	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="actualizarDatosCliente('<?php echo $row_cliente["NIT"]; ?>')">Guardar</button>
											    	</div>
										    	</div>
											</div>
										</div>
										<!-- /Modal -->
									</td>
		                        </tr>
		            <?php
							}
						} else {
							echo "No se encontraron Productos cotizados";
						}
						
					?>
				</tbody>
				<tfoot>
					
				</tfoot>
	        </table>
		</div>
    	
	</div>

    <script type="text/javascript">

    	function actualizarDatosCliente(codigoCliente) {

    		var elegir = 3;
    		var codigoCliente = codigoCliente;
    		var nombreCliente = $('#modal_nombrecliente'+codigoCliente).val();
    		var direccionCliente = $('#modal_direccioncliente'+codigoCliente).val();
    		var emailCliente = $('#modal_emailcliente'+codigoCliente).val();

    		var actualizar_datos = "elegir="+elegir+"&codigo="+codigoCliente+"&nombre="+nombreCliente+"&direccion="+direccionCliente+"&email="+emailCliente;

    		$.ajax({
    			type: "POST",
    			url: "../control/control_cliente.php",
    			data: actualizar_datos,
    		}).done(function(data) {
    			window.location.reload(false);
    			//$('#notificacion').html(data);

    		});

    	}

    </script>
  </body>
</html>