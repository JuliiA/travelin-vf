<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<title>travelIN</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
			    <script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
						});
					});
				</script>
<!---- start-smoth-scrolling---->
 <!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<!----webfonts---->
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<!----//webfonts---->
	<!----- start-Share-instantly-slider---->
					 <!-- Prettify -->
						<link href="css/owl.carousel.css" rel="stylesheet">
					    <script src="js/owl.carousel.js"></script>
					    <script>
						    $(document).ready(function() {
						      $("#owl-demo , #owl-demo1").owlCarousel({
						        items : 1,
						        lazyLoad : true,
						        autoPlay : true,
						      });
						    });
					    </script>
					    <script>
						    $(document).ready(function() {
						      $("#owl-demo3").owlCarousel({
						        items : 4,
						        lazyLoad : true,
						        autoPlay : true,
						        navigation: false,
						        pagination: false,
						      });
						    });
					    </script>
					<!----- //End-Share-instantly-slider---->
             
				<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->

		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			</script>
<!--
	<link href="css/menuLateral1.css" rel='stylesheet' type='text/css' />
	<script src="js/menuLateral1.js" type="text/javascript"></script>
-->
	<link href="css/menuVertical1.css" rel='stylesheet' type='text/css' />
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
	<body>
		<?PHP
		  session_start();
		  include 'coneccion.php';
		  $db = new Conexion();
		  
	      include('reserva/classReservacion.php');
		  $rv = new reservacion();
		?>
    	<div class="header">
     		<div class="container">
		 		<div class="logo">
					<a href="index.php"><img src="imagenes/seven_1.png" class="img-responsive" alt="Travel In"/></a>
		 		</div>
            	<nav class="top-nav">
					<ul class="top-nav">
					<!--
						<li class="active"><a href="#home" class="scroll">Home <span> </span></a></li>
						<li class="page-scroll"><a href="#fea" class="scroll">Features<span> </span></a></li>
						<li class="page-scroll"><a href="#screen" class="scroll">Screenshots<span> </span></a></li>
						<li class="page-scroll"><a href="#about" class="scroll">About <span> </span></a></li>
						<li class="page-scroll"><a href="#price" class="scroll">Pricing<span> </span></a></li>
						<li class="page-scroll"><a href="#news" class="scroll">News<span> </span></a></li>
						<li class="contatct-active" class="page-scroll"><a href="#contact" class="scroll">Contact </a></li>
					-->
<?php
	if(!(isset($_SESSION['idUsuario'])))
	{
		echo '		<script language="javascript">
						window.location="login.php"
					</script>';
	}else {
			echo '	<li class="page-scroll"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
					<li class="active"><a href="panel.php" class="scroll_">Perfil<span> </span></a></li>
					<li class="page-scroll"><a href="diario.php" class="scroll_">Diarios<span> </span></a></li>
					<li class="page-scroll"><a href="mensajes.php" class="scroll_">Mensajes<span> </span></a></li>
					<li class="page-scroll"><a href="logout.php" class="scroll_">Salir<span> </span></a></li>';
			}
?>						
					</ul>
					<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
				</nav>			
            	<div class="clearfix"></div>
	  		</div>
	  	
   		</div>
   	
		<div class="main">
			<div class="featurelist2" id="news">
	   			<div class="container">
	   				<div class="contTitulo1">
						<h3><?php $_SESSION['nick'];?></h3>
					</div>
					<div class="lineaSeparadora"></div>

					<div class="contCuerpoConMenu">

						<div class="row affix-row">
							<div class="col-sm-3 col-md-2 affix-sidebar">
								<div class="sidebar-nav">
									<div class="navbar navbar-default" role="navigation">
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
											<span class="sr-only">Toggle navegacion</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											</button>
											<span class="visible-xs navbar-brand"> Men&uacute; lateral </span>
										</div>
										<div class="navbar-collapse collapse sidebar-navbar-collapse">
											<ul class="nav navbar-nav" id="sidenav01">
												<li class="active">
													<a href="#" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed">
														<h4>
														Panel de Usuario
														<br>
														<!--<small> <span class="caret"></span></small>-->
														</h4>
													</a>
													<!--<div class="collapse" id="toggleDemo0" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="#">ProfileSubMenu1</a></li>
															<li><a href="#">ProfileSubMenu2</a></li>
															<li><a href="#">ProfileSubMenu3</a></li>
														</ul>
													</div>-->
												</li>
												<!--<li>
													<a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-cloud"></span> Submenu 1 <span class="caret pull-right"></span>
													</a>
													<div class="collapse" id="toggleDemo" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="#">Submenu1.1</a></li>
															<li><a href="#">Submenu1.2</a></li>
															<li><a href="#">Submenu1.3</a></li>
														</ul>
													</div>
												</li>-->
												<li><a href="#" data-toggle="collapse" data-target="#toggleMiPublic" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-inbox"></span> Mi publicaci&oacute;n <span class="caret pull-right"></span>
													</a>
													<div class="collapse" id="toggleMiPublic" style="height: auto;">
														<ul class="nav nav-list">
															<li><a href="publicacion.php">Mi Publicación.</a></li>
															<li><a href="publicacionDescripcion.php">Descripción.</a></li>
															<li><a href="publicacionMapaP.php">Ubicar en Mapa.</a></li>
															<li><a href="publicacionGaleriaP.php">Fotos.</a></li>
														</ul>
													</div>
												</li>
												<li>
													<a href="#" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-inbox"></span> Diarios <span class="caret pull-right"></span>
													</a>
													<div  class="collapse" id="toggleDemo2" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="diarios.php">Mis diarios.</a></li>
															<li><a href="diarioNuevo.php">Crear diario.</a></li>
															<li><a href="resParadas.php">Buscar diarios.</a></li>
														</ul>
													</div>
												</li>
												<!--<li>
													<a href="#" data-toggle="collapse" data-target="#toggleDemo3" data-parent="#sidenav01" class="collapsed">
														<span class="glyphicon glyphicon-inbox"></span> Mensajes
													</a>
													<div class="collapse" id="toggleDemo3" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="mensajes.php">Recibidos.</a></li>
															<li><a href="mensajes.php">Enviados.</a></li>
														</ul>
													</div>
												</li>-->
												<li class="active">
													<a href="#" data-toggle="collapse" data-target="#toggleDemo4" data-parent="#sidenav01">
														<span class="glyphicon glyphicon-filter"></span> Reservas<span class="caret pull-right"></span> 
													</a>
													<div class="collapse" id="toggleDemo4" style="height: 0px;">
														<ul class="nav nav-list">
															<li><a href="reservacion.php">Mis Reservas.</a></li>
															<li><a href="altaReserva.php">Crear Reserva.</a></li>
															<li><a href="consultarReserva.php">Consultar Reserva.</a></li>
														</ul>
													</div>												
												</li>
<!--												<li><a href="#"><span class="glyphicon glyphicon-lock"></span> Normalmenu</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-calendar"></span> WithBadges <span class="badge pull-right">42</span></a></li>
												<li><a href=""><span class="glyphicon glyphicon-cog"></span> PreferencesMenu</a></li>-->
											</ul>
										</div><!--/.nav-collapse -->
									</div>
								</div>
							</div>
							<div class="col-sm-9 col-md-10 affix-content">
								<div class="container">

									<div class="page-header">
										<h3><span class="glyphicon glyphicon-th-list"></span> Reservas</h3>
									</div>
									<p>
									<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
									<script type="text/javascript" src="js/additional-methods.js"></script>
									<script src="js/jquery.validate.js"></script>
									<script src="js/messages_es.js"></script>
									<script type="text/javascript">
									  $(function()
									  {
										  $('.date-pick').datePicker({clickInput:true});
									  
									  
										  $('#reserva').validate({
											rules:{
												fechaInic : { required : true},
												fechaFin : { required : true},
											},
											//submitHandler: function() {
											//	reserva.submit();
											//}
											 highlight: function(element) {
												$(element).closest('.control-group').removeClass('success').addClass('error');
											  },
											  success: function(element) {
												element
												.text('OK!').addClass('valid')
												.closest('.control-group').removeClass('error').addClass('success');
												//reserva.submit();
											  }
										  });
									  });
									</script>
									<!-- Script Datapicker -->
									<div>
										<div id="contFormPublicacion" class="contFormulario1">
						   					<div id="agrupFormPublicacion" name="agrupFormPublicacion" class="contAgrupForm">

													<form class="form-horizontal" name="reserva" id="reserva" action="consultarReserva.php" method="post" enctype="multipart/form-data">
														<legend id="tituloForm">Reserva.</legend>
														<div class="form-group sep2">
															<div class="labelTitFormP">
															  <label class="control-label" for="fechaInic">Fecha de ingreso</label>
															</div>
															 <div class="elementFormP">
																<input type="text" class="date-pick" id="fechaInic" name="fechaInic" value="" required/>
															</div>
														</div>
														<div class="form-group sep2">
															<div class="labelTitFormP">
															  <label class="control-label" for="fechaFin">Fecha de salida</label>  
															 </div>
															 <div class="elementFormP">
																<input type="text" class="date-pick" id="fechaFin" name="fechaFin" value="" required />
															<i class="icon-calendar"></i>
															</div>
														</div>
														<input type="hidden" id="user" name="user" value="<?php echo $_SESSION['idUsuario']; ?>"/>
														</br>
														<div class="pull-centro col-md-9">
															<label></label>
															<input class="btn" type="submit" id="consultar" name="consultar" value="Consultar"/>
															<input class="btn btn-default" type="reset" id="cancelar" name="cancelar" value="Cancelar"/>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
			<?php
			//pregunto para mostrar mensaje
			if(isset($_GET['z']) && $_GET['z'] == 'nan'){
					echo('<div class="container"><div class="row"><h3>NO hay habitaciones disponibles para la b&uacute;squeda ingresada</h3></div></div>');
			 }
					
			if(isset($_POST['consultar']))
			{
				require('reserva/classDisponibilidad.php');
				$cl = new disponibilidad();
				$confi = $_POST['fechaInic'];
				$conff = $_POST['fechaFin'];
				$user = $_POST['user'];
				
				$mis = $cl->puedeReservar($confi,$conff,$user);
				
				$tiene = mysqli_num_rows($mis);
				
				if($tiene > 0)
				{
					//$url = $url."&z=is"; 
					$listaHabitaciones = array();
					echo ('<h6>[Resultado]</h6>');
					echo('<div class="container"><div class="row"><div class="col-md-1"></div>
							<div class="table-responsive margenTabla"> 
								<table class="shopping-cart">
								<thead>
									<tr>
										<th><h5 class="text-info">Tipo Habitacion</h5></th>
										<th><h5 class="text-info">Descripcion <h5></th>
										<th><h5 class="text-info">Cantidad Camas</h5></th>
									</tr>
								</thead>
								<tbody>');
								//var_dump($rs = mysqli_fetch_assoc($mis));
								while($rs = mysqli_fetch_assoc($mis))
								{
									$pr = $enReserva = $rv->periodEnReserva($confi,$conff,$rs['habi']);

									if($pr == false || $pr == 0)
										array_push($listaHabitaciones,$rs['habi']);
								}
								//var_dump($listaHabitaciones);
								require('reserva/classHabitacion.php');
								$hb = new habitacion();
								$newCon = $hb->listarHabitaciones($listaHabitaciones);
								while($col = mysqli_fetch_assoc($newCon))
								{
									switch($col['t'])
									{
										case '0': $tipo = "Publica";break;
										case '1': $tipo = "Privada";break;
									}
									
									echo('<tr>
									<td class="cart-item-title">'.$tipo.'</td>
									<td class="cart-item-title">'.$col['d'].'<a title="Crear Reserva" href="altaReserva.php?go='.$col['i'].'">{...}- <i class="glyphicon glyphicon-arrow-up"></i></a></td>
									<td class="cart-item-title">'.$col['c'].'</td>
									</tr>');
								}
								echo('</tbody></table></div></div></div>');
				}
				else
				{
					$url = $url."&z=nan";
					echo('<div class="row">
							<div class="container">
								<div class="col-sm-11">
									<div class="alert alert-warning">
										<h3>NO hay habitaciones disponibles para la b&uacute;squeda ingresada</h3>
									</div>
								</div>
							</div>
						  </div>');
				}
			 }?>
		</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	
		<div class="footer" id="contact">
			<div class="container containerPie">
				<div class="row footer-top">
		   			<div class="col-md-6 footer_grid"><!--<div class="col-md-3 footer_grid">-->

		   				<h3 class="m_13"><img class="imgGloboRed" src="imagenes/logoUnlam.png"><div class="titJuntoLogo">Sobre nosotros</div></h3>

						<p class="m_14">Travelin fu&eacute; creado como proyecto final de la "Tecnicatura en Desarrollo Web" de La Universidad Nacional de La Matanza, 
							por los alumnos Avellaneda, Juliana y Quipildor, Leandro.</p>
					</div>
					<div class="col-md-6 footer_grid"><!--<div class="col-md-3 footer_grid">-->
						<!--<ul class="f_grid1">-->
						<h3 class="m_13"><img class="imgGloboRed" src="imagenes/world.png"><div class="titJuntoLogo">Redes Sociales</div></h3>
	
								
							<p class="m_14"><!--aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut <span class="m_15">aliquip ex ea commodo</span> consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat-->
							<div id="contImgRedes">
								<div>
									<a href="#"><img class="logoRedes" src="imagenes/logoFace1.png"></a>
									<a href="#"><img class="logoRedes" src="imagenes/logoTwitter1.png"></a>
									<a href="#"><img class="logoRedes" src="imagenes/logoGoo1.png"></a>
									<a href="#"><img class="logoRedes" src="imagenes/logoPint1.png"></a>
								</div>
							</div>
							</p>
					</div>
	   		</div>
	   		<div class="footer_bottom">
		       	<div class="clearfix"> </div>
		    	</div>
		    	<script type="text/javascript">
					$(document).ready(function() {
					
						var defaults = {
			  				containerID: 'toTop', // fading element id
							containerHoverID: 'toTopHover', // fading element hover id
							scrollSpeed: 1200,
							easingType: 'linear' 
			 			};
					
					
						$().UItoTop({ easingType: 'easeOutQuart' });
					
					});
				</script>
		    	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;">Arriba </span></a>
	   	</div>
	   </div>
	</body>
</html>
