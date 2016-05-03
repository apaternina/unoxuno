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
	    		<!-- Brand and toggle get grouped for better mobile display -->
	      		<div class="navbar-header">
	        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	          		<span class="sr-only">Toggle navigation</span>
	          		<span class="icon-bar"></span>
	          		<span class="icon-bar"></span>
	          		<span class="icon-bar"></span>
	        		</button>
	        		<a href="MyOrders.php"><img src="../utilities/images/logo.jpg" alt="UnoxUno" class="navbar-brand" align="top" style="width:100%; height:100%;"></a>
	      		</div>

	      		<!-- Collect the nav links, forms, and other content for toggling -->
	      		<div class="collapse navbar-collapse navbar-ex1-collapse">
	        		<ul class="nav navbar-nav">
			      		<li class="active"><a href="#">Pedidos y Cotizaciones</a></li>
			      		<li><a href="#">Consulta de Guías</a></li>
			      		<li><a href="#">Consulta de Inventario</a></li>
			      		<li><a href="#">PQS</a></li>
			      		<li><a href="#">Asistencia Tecnica</a></li>
			      		<li><a href="#">Test de Conocimiento</a></li>
	        		</ul>
	        		<hr>
	        		<ul class="nav navbar-nav navbar-right">
	          			<li><a href="#">Mis datos de acceso</a></li>
	          			<li><a href="#">Datos de Cotización</a></li>
	          			<li><a href="#">Salir</a></li>
	        		</ul>
	      		</div>
    		</nav>
    		<!-- /MENU_NAV -->
		</div>


		<div class="col-sm-9">

			<div id="notificacion"></div>

		    <div class="panel panel-primary">
			 	<div class="panel-heading" style="background-color:#1E93FF !important;">
			    	<h3 class="panel-title">Registro de nuevo Distribuidor</h3>
				</div>

				<div class="panel-body">

					<form class="form-horizontal" role="form" action="registrarDistribuidor()">

						<p style="color:red; font-weight:bold; text-align:center;">Por favor diligencie los siguientes datos que permitirán su posterior registro en nuestro sistema. Los datos aquí suministrados serán verificados por nuestros asesores que luego le enviarán a su correo electrónico el correspondiente usuario y contraseña del ingreso al portal.</p>

						<div class="form-group">
							<div class="col-sm-10">
				    			<label>Nit o Cédula:</label>
				    			<input type="text" id="codigo_distribuidor" class="form-control" placeholder="Nit o Cédula" required>
				    		</div>
				    	</div>

				    	<div class="form-group">
				    		<div class="col-sm-10">
				    			<label>Nombre del Distribuidor:</label>
				    			<input type="text" id="nombre_distribuidor" class="form-control" placeholder="Nombre del Distribuidor" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Dirección:</label>
				    			<input type="text" id="direccion_distribuidor" class="form-control" placeholder="Dirección"></input>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Ciudad:</label>
								<input type="text" id="ciudad_distribuidor" class="form-control" placeholder="Ciudad"></input>
							</div>
						</div>
				    						
						<div class="form-group">
							<div class="col-sm-10">
								<label>Persona de Contacto 1:</label>
								<input type="text" id="persona_contacto1_distribuidor" class="form-control" placeholder="Persona de Contacto 1"></input>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Teléfono de Primer Contacto:</label>
								<input type="number" id="telefono_contacto1_distribuidor" class="form-control" placeholder="Teléfono de Primer Contacto"></input>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Persona de Contacto 2:</label>
								<input type="text" id="persona_contacto2_distribuidor" class="form-control" placeholder="Persona de Contacto 2"></input>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Teléfono de Segundo Contacto:</label>
								<input type="number" id="telefono_contacto2_distribuidor" class="form-control" placeholder="Teléfono de Segundo Contacto"></input>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Persona de Contacto 3:</label>
								<input type="text" id="persona_contacto3_distribuidor" class="form-control" placeholder="Persona de Contacto 3"></input>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Teléfono de Tercer Contacto:</label>
								<input type="number" id="telefono_contacto3_distribuidor" class="form-control" placeholder="Teléfono de Tercer Contacto"></input>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>¿El Distribuidor tiene almacén?</label>
								<input type="radio" name="almacen" value="si" checked> Si
	  							<input type="radio" name="almacen" value="no"> No
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>¿Cuántos almacenes tiene?</label>
								<select id="almacen_cantidad_distribuidor" class="form-control">
					    			<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option>
					    			<option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option>
									<option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option>
					    			<option value="30">30</option>
					    		</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Usuario (Correo Electrónico):</label>
								<input type="email" id="usuario_distribuidor" class="form-control" placeholder="Usuario (Correo Electrónico)" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Confirmar Usuario:</label>
								<input type="email" id="confirmar_usuario_distribuidor" class="form-control" placeholder="Confirmar Usuario" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Clave Personal o Password:</label>
								<input type="password" id="password_distribuidor" class="form-control" placeholder="Ingrese su Clave Personal" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10">
								<label>Confirme su Clave Personal:</label>
								<input type="password" id="confirmar_password_distribuidor" class="form-control" placeholder="Confirme su Clave Personal" required>
							</div>
						</div>
				    		
				    	<div class="checkbox">
							<label><input type="checkbox" id="terminos_distribuidor">Acepto los <a href="" style="color:red; font-weight:bold;" data-toggle="modal" data-target="#myModal">Términos de Servicio y condiciones de privacidad.</a></label>
							<label><input type="checkbox" id="responsable_distribuidor">Acepto que me hago responsable del uso correcto de mi usuario y contraseña y que he leído el acuerdo de servicio y las condiciones de privacidad.</label>
						</div>

				    	<button class="btn btn-default" type="submit" title="Guardar" onclick="registrarDistribuidor()">Guardar</button>
				    	<button class="btn btn-default" type="button" title="Regresar" onclick="cancelarRegistro()">Regresar</button>

				    	<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
						    	<div class="modal-content">
						    		<div class="modal-header">
						        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        		<h4 class="modal-title" id="myModalLabel">Acuerdo de Servicio</h4>
						    		</div>
						    		<div class="modal-body">
						        		<p>El Usuario es responsable de su cuenta de servicio

										Sólo usted está autorizado a usar su cuenta del Portal. Usted es responsable de todas las actividades que se realicen con su cuenta del portal o con una cuenta asociada. No podrá dar autorización a terceros para obtener acceso al Portal o para utilizarlo en su nombre, excepto en el caso de que Pentagrama proporcione un mecanismo para el acceso de terceros a dicho servicio en su nombre.

										Cambios en el servicio, cancelación del servicio, versión preliminar.

										Podemos cambiar el servicio o cancelarlo en cualquier momento. Dicha cancelación o suspensión puede realizarse sin motivo o sin aviso previo. Tras la cancelación del servicio, su derecho de uso del servicio queda inmediatamente interrumpido. Una vez cancelado o suspendido el servicio, los datos que haya almacenado en el mismo no podrán recuperarse posteriormente. Un servicio concreto puede ser una versión preliminar y es posible que no funcione correctamente o de la manera que podría funcionar una versión final. Puede haber interrupciones o períodos de inactividad prolongados. De hecho, podemos hacer grandes cambios en la versión final o decidir incluso no lanzar una versión final.

										Condiciones de privacidad

										Privacidad

										La compañía recopilará cierta información sobre usted necesaria para el funcionamiento y prestación del servicio. Esta información se utilizará y se tratará de manera confidencial. En especial, podemos obtener acceso a información sobre usted o divulgarla, incluido el contenido de sus comunicaciones, a fin de: (a) cumplir con la ley o responder a solicitudes o procesos legales; (b) proteger los derechos de propiedad de Pentagrama S.A, lo que incluye el cumplimiento de los acuerdos o directivas que rigen su uso de nuestro servicio; o (c) actuar con el convencimiento de buena fé de que dicho acceso o divulgación es necesario para proteger la seguridad personal de los empleados o clientes de Pentagrama S.A u otras personas.

										Recopilación de su información personal

										En algunos sitios de Pentagrama S.A, se le solicita que proporcione datos personales, como su dirección de correo electrónico, nombre, dirección del trabajo o de casa, o el número de teléfono. También se puede recopilar información demográfica; como su código postal, edad, género, preferencias, intereses y favoritos.

										Para obtener acceso a algunos servicios de Pentagrama, se le solicitará que inicie sesión con una dirección de correo electrónico y una contraseña, a las que hacemos referencia como su ID. Como parte del proceso de creación de su cuenta, puede que se le solicite también que indique preguntas y respuestas secretas, que usaremos para comprobar su identidad y ayudarle a restablecer su contraseña, así como una dirección de correo electrónico alternativa. Algunos servicios pueden requerir una mayor seguridad, en cuyo caso se le solicitará que cree una clave de seguridad adicional. Finalmente, se asignará a su cuenta un número de identificación exclusivo que se usará para identificar su cuenta y la información asociada.

										Podemos recopilar información acerca de su interacción con los sitios y servicios. Por ejemplo, podemos usar herramientas de análisis de sitios web para obtener información de su explorador, como el sitio desde el que se obtuvo acceso, los motores de búsqueda y las palabras clave que usó para encontrar nuestro sitio, las páginas que visitó en nuestro sitio, los complementos de su explorador e incluso las dimensiones de la ventana de su explorador. Asimismo, podemos emplear tecnologías, como cookies y balizas web para recopilar información acerca de las páginas que visita, los vínculos en los que hace clic y otras acciones que realiza en nuestros sitios y servicios.

										Al recibir boletines o mensajes de correo electrónico promocionales de Pentagrama, podemos usar balizas web, vínculos personalizados o tecnologías similares para determinar si se ha abierto el mensaje y en qué vínculos ha hecho clic para proporcionarle comunicaciones específicas u otro tipo de información.

										Uso de su información personal

										Pentagrama recopila y usa su información personal para trabajar y mejorar sus sitios y servicios. Estos usos pueden incluir un servicio más efectivo al cliente, la modificación de sitios o servicios para que sean fáciles de usar al eliminar la necesidad de que usted escriba repetidamente los mismos datos; también se incluye la realización de investigaciones y análisis dirigidos a mejorar nuestros productos, servicios y tecnologías; y, finalmente, la visualización de contenidos y anuncios publicitarios personalizados, según sus intereses y preferencias.

										También usamos su información personal para comunicarnos con usted. Puede que le enviemos determinadas comunicaciones de servicio obligatorias tal como cartas de bienvenida, recordatorios de pago, información acerca de asuntos de servicio técnico y anuncios de seguridad.

										Seguridad de su información personal

										Pentagrama expresa su compromiso de proteger la seguridad de la información personal de los usuarios. Se usa una amplia variedad de tecnologías y procedimientos de seguridad para proteger la información personal contra un acceso, uso o una divulgación no autorizados. Por ejemplo, almacenamos la información personal que nos proporciona en sistemas informáticos con acceso limitado, ubicados en instalaciones controladas. Cuando transmitimos información altamente confidencial (como números de tarjetas de crédito o contraseñas) a través de Internet, la protegemos mediante encriptación, como el protocolo (SSL Secure Socket Layer, Nivel de socket seguro).

										Si se usa una contraseña para ayudar a proteger sus cuentas e información personal, es su responsabilidad que dicha contraseña sea confidencial. No comparta esta información con nadie. Si comparte algún equipo siempre debe cerrar la sesión antes de salir de un sitio o servicio para evitar que otros usuarios puedan obtener acceso a su información

										Aplicación de la declaración de privacidad

										Si tiene alguna pregunta acerca de esta declaración, póngase en contacto con nosotros mediante nuestro formulario web. Si no recibe respuesta a su solicitud o considera que no se ha contestado de forma satisfactoria a su solicitud, puede ponerse en contacto con nosotros en los siguientes teléfonos: (1) 6120266, (6) 3295555 o nuestra línea nacional 018000111555.</p>
						    		</div>
						    		<div class="modal-footer">
						    			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						    		</div>
								</div>
							</div>
						</div>
						<!-- /Modal -->

				    </form>

				</div>
		  		
			</div>

		</div>
    	
	</div>

    <script type="text/javascript">

    	function cancelarRegistro() {
    		window.location="../../index.php";
    	}

    	function registrarDistribuidor() {
    		var codigoDistribuidor = $('#codigo_distribuidor').val();
    		var nombreDistribuidor = $('#nombre_distribuidor').val();
    		var direccionDistribuidor = $('#direccion_distribuidor').val();
    		var ciudadDistribuidor = $('#ciudad_distribuidor').val();
    		var personaContacto1Distribuidor = $('#persona_contacto1_distribuidor').val();
    		var telefonoContacto1Distribuidor = $('#telefono_contacto1_distribuidor').val();
    		var personaContacto2Distribuidor = $('#persona_contacto2_distribuidor').val();
    		var telefonoContacto2Distribuidor = $('#telefono_contacto2_distribuidor').val();
    		var personaContacto3Distribuidor = $('#persona_contacto3_distribuidor').val();
    		var telefonoContacto3Distribuidor = $('#telefono_contacto3_distribuidor').val();
			var almacenDistribuidor = $('input[name=almacen]:checked').val();
			var almacenCantidadDistribuidor = $('#almacen_cantidad_distribuidor').val();
			var usuarioDistribuidor = $('#usuario_distribuidor').val();
			var confirmarUsuarioDistribuidor = $('#confirmar_usuario_distribuidor').val();
			var passwordDistribuidor = $('#password_distribuidor').val();
			var confirmarPasswordDistribuidor = $('#confirmar_password_distribuidor').val();

			if ($('#terminos_distribuidor').is(':checked') && $('#responsable_distribuidor').is(':checked')) {
				$.ajax({
	    			type: "POST",
	    			url: "../control/control_distribuidor.php",
	    			data: { elegir: 1,},
	    		}).done(function(data) {
	    		});
			}
			else {
				alert("Por favor, acepte los terminos y condiciones.");
			}

    </script>
  </body>
</html>