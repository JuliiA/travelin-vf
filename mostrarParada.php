<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?PHP
	session_start();
	include 'coneccion.php';
	$db = new Conexion();

	$idUsuario = $_SESSION['idUsuario'];
	$idParada = $_GET['num'];

	$sqlParadaM0 = 'SELECT P.*, D.nombre nombreD, D.descripcion descripcionD FROM parada P INNER JOIN diarioDeViajero D ON P.idDiario = D.idDiario 
					WHERE P.idParada='.$idParada;

	if(!($consultaParadaM0 = mysqli_query($db->conectarse(), $sqlParadaM0)))
	{
		echo('Ocurrio un error ejecutando el query de busqueda de la parada [' . mysqli_error() . ']');
//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
	}else
		{
			$RsParadaM0 = mysqli_fetch_assoc($consultaParadaM0);
			$filasM0 = mysqli_num_rows($consultaParadaM0);

			if($filasM0 == 0)
			{
				echo ('<html><head>
							<script type="text/javascript">
								function confirm_alert()
								{
									alert("No se han encontrado datos de la parada.");
								}
							</script>
							</head><body>
							
							<script>
								confirm_alert();
								window.location="diarios.php"
							</script>
						</body></html>');
			}else
				{
					if(($RsParadaM0['idEstableci'] != 0 ) && ($RsParadaM0['idEstableci'] != 'NULL'))
					{
						$flag =1;
						$idEstableci = $RsParadaM0['idEstableci'];
						$sqlParadaM1 = 'SELECT C.idProvincia idProvincia, C.id idCiudad, C.descripcion ciudad, P.descripcion provincia, E.* 
										FROM establecimiento E INNER JOIN ciudad C ON C.id = E.idCiudad INNER JOIN provincia P ON P.id = C.idProvincia
										WHERE E.idEstableci = '.$RsParadaM0['idEstableci'];

						if(!$consultaParadaM1 = mysqli_query($db->conectarse(), $sqlParadaM1))
						{
							echo('Ocurrio un error ejecutando el query de busqueda [' . mysqli_error() . ']');
						}else
							{
								$filasPM1 = mysqli_num_rows($consultaParadaM1);
								if($filasPM1 == 1)
								{
									$RsParadaM1 = mysqli_fetch_assoc($consultaParadaM1);
									$idProvincia = $RsParadaM1['idProvincia'];
									$idCiudad = $RsParadaM1['idCiudad'];
								}else
									{
										$idProvincia = 0;
										$idCiudad = 0;
									}
							}
					}else
						{
							$flag = 0;
							$idProvincia = 0;
							$idCiudad = 0;
							$idEstableci = 0;
						}
				}
		}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<title>Seven Bootstarp Website Template | Home :: w3layouts</title>
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

	<script type="text/javascript" src="js/mapa.js"></script>
    <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
    <script type="text/javascript" src="js/api_js.js?sensor=false"></script><!-- este reemplaza al comentado arriba -->
	
    <script type="text/javascript" src="js/jquery.js"></script>
    
    <link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
    <script type="text/javascript" src="jquery.1.4.2.js"></script>
	<script type="text/javascript" src="jsDatePick.jquery.min.1.3.js"></script>
	<!--<script type="text/javascript" src="js/puntuacion1.js"></script>-->
	<script type="text/javascript">
		window.onload = function(){
			new JsDatePick({
				useMode:2,
				target:"fechaInic",
				dateFormat:"%d-%M-%Y"
				/*selectedDate:{				This is an example of what the full configuration offers.
					day:5,						For full documentation about these settings please see the full version of the code.
					month:9,
					year:2006
				},
				yearsRange:[1978,2020],
				limitToToday:false,
				cellColorScheme:"beige",
				dateFormat:"%m-%d-%Y",
				imgPath:"img/",
				weekStartDay:1*/
			});
			new JsDatePick({
				useMode:2,
				target:"fechaFin",
				dateFormat:"%d-%M-%Y"
			});
		};
	</script>


	<link rel="stylesheet" href="colorbox.css" />
	<script src="js/jquery.colorbox.js"></script>

	<script>
		$(document).ready(function(){
			//Examples of how to assign the Colorbox event to elements
			$(".group1").colorbox({rel:'group1'});
			$(".group2").colorbox({rel:'group2', transition:"fade"});
			$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
			$(".group4").colorbox({rel:'group4', slideshow:true});
			$(".ajax").colorbox();
			$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
			$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
			$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
			$(".inline").colorbox({inline:true, width:"50%"});
			$(".callbacks").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});

			$('.non-retina').colorbox({rel:'group5', transition:'none'})
			$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>
	<!--	Comentarios y Rating	-->
	<script type="text/javascript">
		$(':radio').change(  function(){    $('.choice').text( this.value + ' stars' );  } )
	</script>	
<!--    <script type="text/javascript" src="js/panelReviewAndRating.js"></script>-->
    <!--	Fin Comentarios y Rating	-->
</head>
	<body>
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
		echo '			<li class="active"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
						<li class="page-scroll"><a href="login.php" class="scroll_">Ingreso<span> </span></a></li>
						<li class="page-scroll"><a href="reg.php" class="scroll_">Registro<span> </span></a></li>';
	}else {
			echo '		<li class="active"><a href="index.php" class="scroll_">Inicio <span> </span></a></li>
						<li class="page-scroll"><a href="panel.php" class="scroll_">Panel<span> </span></a></li>
						<li class="page-scroll"><a href="diarios.php" class="scroll_">Diarios<span> </span></a></li>
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

   	
<!--
	<div id="contDivBusqueda1">
		<div id="contDivBusqueda2">
		    <?php
		    	//include("formBusqueda1.php");
		    ?>
	    </div>
	</div>

	<br>
-->
	<div class="main">

      	
<!--	************ Inicio de Busqueda *****************	-->

<?php
	//$parada = $_GET['num'];
	//$anuncio = 13;
/*
	$sql1 = 'SELECT E.idEstableci idE, E.nombre nombreE, E.descripcion descE, E.rutaFotoEstableci fotoE, E.precio precioE, E.lat lat, E.lng lng, C.descripcion ciudad, P.descripcion provincia 
				FROM establecimiento E INNER JOIN ciudad C ON E.idCiudad= C.id INNER JOIN provincia P ON C.idProvincia=P.id 
				WHERE E.idEstado = 2 AND E.idEstableci = '.$anuncio;

	if(!$result = mysqli_query($db->conectarse(), $sql1)){
		//echo('Ocurrio un error ejecutando el query [' . mysqli_error() . ']');
		echo("MALLLLL");
	}else
		{
			//echo '<div id="infoBusqueda" name="infoBusqueda">Cantidad de resultados encontrados: '.mysqli_num_rows($result).'<br/></div>';
			if(mysqli_num_rows($result) > 0)
			{
				$Rs = mysqli_fetch_array($result);

				$direFoto = "imagenes/Imagen-para-sin-imagen.jpg";
				//$contadorTotal += 1;

				//$textoRed = substr($Rs['descE'],0,280);

				if (!(($Rs['fotoE'] == '') || ($Rs['fotoE'] == null)))
				{
					$direFoto = $Rs['fotoE'];
				}
			}
		}
*/
?>

		<div class="featurelist2" id="news">
			<div class="container">
				<div class="contTitulo1">
					<h3><?php echo $RsParadaM0['nombreD']; ?></h3>
				</div>
				<div class="lineaSeparadora"></div>

				<div class="fechaIzq">
					<?php
						if($RsParadaM0['fecha'] != 'NULL') {
							$fecha2 = $RsParadaM0['fecha'];
							$fecha2 = strtotime($fecha2);
							$aaaa = date("Y", $fecha2);
							$mm = date("m", $fecha2);
							$dd = date("d", $fecha2);

							switch ($mm) {
								case 01:
									$mm = 'ENE';
									break;
								case 02:
									$mm = 'FEB';
									break;
								case 03:
									$mm = 'MAR';
									break;
								case 04:
									$mm = 'ABR';
									break;
								case 05:
									$mm = 'MAY';
									break;
								case 06:
									$mm = 'JUN';
									break;
								case 07:
									$mm = 'JUL';
									break;
								case 08:
									$mm = 'AGO';
									break;
								case 09:
									$mm = 'SEP';
									break;
								case 10:
									$mm = 'OCT';
									break;
								case 11:
									$mm = 'NOV';
									break;
								case 12:
									$mm = 'DIC';
									break;
							}

							$fechaFormateada2 = $dd.'/'.$mm.'/'.$aaaa;
							echo $fechaFormateada2;
						}
					?>
				</div>
				<div class="botonDer">
					Estado: <?php 
								switch ($RsParadaM0['idEstado']) {
									case 1:
										$estado = 'Pendiente';
										break;
									case 2:
										$estado = 'En Curso';
										break;
									case 5:
										$estado = 'Realizada';
										break;
								}
								echo $estado;
							?>
				</div>
				
	   			<h3 class="m_5 modif2"><?php echo($RsParadaM0['nombre']); ?></h3>
      			<?php 
					if($flag == 1)
					{
						echo '<p class="m_8 titCiudad">'.$RsParadaM1['ciudad'].', '.$RsParadaM1['provincia'].'</p>';
					}
				?>
	   			<div class="row">
	   				<div class="centrador2">
		   				<div class="centrador3 modif1">

		   					<?php
		   						if(($RsParadaM0['idEstableci'] != 'NULL') && ($RsParadaM0['idEstableci'] != '') && ($RsParadaM0['idEstableci'] != 0))
		   						{
		   							echo 'Establecimiento: <a href="verAnuncio.php?anuncio='.$RsParadaM0['idEstableci'].'&f=99" id="" target="_blank">'.$RsParadaM1['nombre'].'</a></br>';
		   						}else
		   							{
		   								if(($RsParadaM0['defaultLugar'] != 'NULL') && ($RsParadaM0['defaultLugar'] != ''))
		   								{
		   									echo 'Lugar: '.$RsParadaM0['defaultLugar'].'</br>';
		   								}
		   							}
		   						//echo $RsParadaM0['descripcion'];
		   					?>
		   				</div>

		   				<legend></legend>
		   				
		   			</div>

	   				<div id="agrup1">
	   					<div id="agrup2">
	   				
		   				</div>
		   			</div>

		   			<div class="centrador2">
		   				<div class="centrador3 modif1">
		   					<?php
		   						echo $RsParadaM0['descripcion'];
		   					?>
		   				</div>

		   				<legend></legend>
		   				
		   			</div>

	   			</div>
	   		</div>
<!--	*********************fin*************************	-->
			<div class="centrador2">
				<div class="centrador3">
					<div class="contGaleria1">
						<?php
							$sqlFotos1 = 'SELECT * FROM fotosViajero WHERE idParada ='.$idParada;
							if(!($consultaFotos1 = mysqli_query($db->conectarse(), $sqlFotos1)))
							{
								echo('Ocurrio un error ejecutando el query de busqueda de fotos [' . mysqli_error() . ']');
						//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
							}else
								{
									//$RsFotos1 = mysqli_fetch_assoc($consultaFotos1);
									$filas1 = mysqli_num_rows($consultaFotos1);

									if($filas1 == 0)
									{
										echo '<h3>La parada no posee fotos.</h3>';
									}else
										{
											while ($RsFotos1 = mysqli_fetch_assoc($consultaFotos1))
											{
												echo '<div class="contGaleria2">
														<a class="group2" href="fotosParada/'.$RsFotos1['nombre'].'" title="">
															<img src="fotosParada/miniaturas/'.$RsFotos1['nombre'].'" class="imgGaleria1">
														</a>
													</div>';
											}
										}

								}
						?>
						</div>

						<br>
				</div>
			</div>
			

			<br><br>
<?php
/*
			<div id="contMapaAnuncio" class="container">
				<script type="text/javascript">
					$(document).ready(function() {
					
					<?php
						if(($Rs['lat'] == null && $Rs['lng'] == null) || ($Rs['lat'] == '' && $Rs['lng'] == ''))
						{
							echo("initialize_sin_Marc();");
						}else
							{
								echo("initialize_Marc_Quieto(".$Rs['lat'].", ".$Rs['lng'].");");
							}
					?>

					});
				</script>

				<!--      <div class="row">-->
				<div class="span_6">
					<div id="contMapa1">
					<!--
					<div id="map_canvas" name="map_canvas" style="width:600px; height:400px;">
					</div>
					-->
						<div id="map_canvas" name="map_canvas" class="mapaDesc">

						</div>
					</div><!--  contMapa1 -->

				</div>

			</div>
*/
?>			
		<?php
			$sqlCalifP0 = 'SELECT * FROM calificacionParada WHERE idVotador = '.$idUsuario.' AND idParada = '.$idParada;
			if(!($consultaCalifP0 = mysqli_query($db->conectarse(), $sqlCalifP0)))
			{
				echo('Ocurrio un error ejecutando el query de busqueda del voto [' . mysqli_error() . ']');
		//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
			}else
				{
					//$RsDiario0 = mysqli_fetch_assoc($consultaDiario0);
					$filasCalifP0 = mysqli_num_rows($consultaCalifP0);
				}

			if($filasCalifP0 == 0)
			{
		?>
				<br><br>
				<div class="centrador2">
					<div class="centrador3">
						
						<div class="container">
							<!--<h3>Calificar</h3>-->

							<div class="contCrearOpinion">
								<div class="row" >

									<div class="well well-sm">
										<h3>Calificar esta parada.</h3>

										<div class="row" id="post-review-box">
											<div class="col-md-12">
												
												<div class="centrador2">
													<div class="centrador3">
														<form action="calificarParada.php" method="post" enctype="multipart/form-data">
															<span class="star-rating">
																<input type="radio" name="rating" class="rating" value="1"><i></i>
																<input type="radio" name="rating" class="rating" value="2"><i></i>
																<input type="radio" name="rating" class="rating" value="3"><i></i>
																<input type="radio" name="rating" class="rating" value="4"><i></i>
																<input type="radio" name="rating" class="rating" value="5"><i></i>
															</span>

															<br>
															<input type="hidden" name="numParada" id="numParada" value="<?php echo $idParada; ?>">
															<!--<strong class="choice">Choose a rating</strong>-->
															<button class="btn btn-sample" type="submit">Calificar</button>
														</form>
													</div>
												</div>

											</div>
										</div>
									</div> 

								</div>
							</div>
						</div>
					</div>
				</div>

		<?php
			}
		?>

			<br><br>
			<div class="centrador2">
				<div class="centrador3">
					
					<div class="container">
						<h3>Opiniones</h3>

						<div class="contCrearOpinion">
							<div class="row" >

								<div class="well well-sm">

									<div class="row" id="post-review-box">
										<div class="col-md-12">
											<form action="mostrarParadaC.php" method="post" enctype="multipart/form-data">
												<input id="ratings-hidden" name="rating" type="hidden"> 
												<textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Escriba su opinión aquí..." rows="4"></textarea>

												<input id="idParada" name="idParada" type="hidden" value="<?php echo $idParada; ?>"> 

												<div class="text-right">
													<div class="stars starrr" data-rating="0">
													</div>
													<a class="btn btn-danger btn-sm_" href="#" id="close-review-box" style="margin-right: 10px;">
														<span class="glyphicon glyphicon-remove"></span> Cancelar
													</a>
													<button class="btn btn-info btn-lg_" type="submit">Opinar</button>
												</div>
											</form>
										</div>
									</div>
								</div> 


							</div>
						</div>

						<?php
							$sqlParadaOpM0 = 'SELECT O.*, U.nombre nombreU, U.nombreFotoPerfil fotoU FROM opinionParada O INNER JOIN usuario U ON O.idAutor = U.idUsuario 
											WHERE O.idParada='.$idParada;

							if(!($consultaParadaOpM0 = mysqli_query($db->conectarse(), $sqlParadaOpM0)))
							{
								echo('Ocurrio un error ejecutando el query de busqueda de las opiniones [' . mysqli_error() . ']');
						//echo('nom= '.$nombre.' , direc= '.$direccion.', desc='.$descripcion.', idus='.$idUsuario.', tipoest='.$tipoEstablecimiento.', ciud='.$ciudad.', prov='.$provincia);
							}else
								{
									while ($RsParadaOpM0 = mysqli_fetch_assoc($consultaParadaOpM0))
									{
										if(($RsParadaOpM0['fotoU'] == 'NULL') || ($RsParadaOpM0['fotoU'] == ''))
										{
											$fotoUs = 'no_avatar.gif';
										}else
											{
												$fotoUs = $RsParadaOpM0['fotoU'];
											}
										$fecha3 = strtotime($RsParadaOpM0['fechaOpinion']);
										$aaaa3 = date("Y", $fecha3);
										$mm3 = date("m", $fecha3);
										$dd3 = date("d", $fecha3);
										$fechaFormateada3 = $dd3.'-'.$mm3.'-'.$aaaa3;

										echo '<div class="contOpiniones2">
												<div class="imgOpinion">
													<img src="imagenes/imgPerfil/'.$fotoUs.'" class="imgPerfilRadio">

												</div>
												<div class="fechaOpinion">
													'.$fechaFormateada3.'
												</div>
												<div class="textoOpinion">
													'.$RsParadaOpM0['descripcion'].'
												</div>
												
												<div class="contCalif">
													
												</div>

											</div>

											<br><br>';
									}
								}

						?>

					</div>

				</div>
			</div>

		</div>

<!--
		<hr>
-->
		<div class="footer" id="contact">
	   	<div class="container containerPie">
	   	   <div class="row footer-top">
	   			<div class="col-md-6 footer_grid"><!--<div class="col-md-3 footer_grid">-->

	   				<h3 class="m_13"><img class="imgGloboRed" src="imagenes/logoUnlam.png"><div class="titJuntoLogo">Sobre nosotros</div></h3>

                  <p class="m_14">Travelin fué creado como proyecto final de la "Tecnicatura en Desarrollo Web" de La Universidad Nacional de La Matanza, 
                  por los alumnos Avellaneda, Juliana y Quipildor, Leandro.</p>

<!--	   			
		   			<h3 class="m_13">About ios7 page</h3>
		   			<p class="m_14">aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.</p>
		   			<div class="address">
							<p>500 Lorem Ipsum Dolor Sit,</p>
							<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 		<p>Email: <span>support[at]seven.com</span></p>
						</div>
-->						
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
	   			<!--
	   			<div class="col-md-3 footer_grid">
	   				<ul class="f_grid1">
							<li><i class="f-link"> </i>
								<div class="extra-wrap">
									<p>Quick Links</p>
								</div>
								<div class="clearfix"> </div>
							</li>
						</ul>
						<div class="footer_lists">
							<ul class="list">
					   		<li><a href="#">Home</a></li>
					   		<li><a href="#">Features</a></li>
					   		<li><a href="#">Screenshots</a></li>
					   		<li><a href="#">About</a></li>
							</ul>
				    		<ul class="list1">
					   		<li><a href="#">Pricing</a></li>
					   		<li><a href="#">News</a></li>
					   		<li><a href="#">Stats</a></li>
					   		<li><a href="#">Contact</a></li>
				    		</ul>
				    		<div class="clearfix"> </div>
						</div>
	   			</div>
	   			<div class="col-md-3 footer_grid">
	   				<ul class="f_grid1">
							<li><i class="f-msg"> </i>
								<div class="extra-wrap">
									<p>Newsletter</p>
								</div>
								<div class="clearfix"> </div>
							</li>
						</ul>
						<p class="m_14">aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut</p>
						<div class="footer_search">
						   <form>
				     			<input type="text" value="Enter your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email';}">
				     			<input type="submit" value="Submit">
				   		</form>
			    		</div>
	   		 	</div>
	   		 	-->
	   		</div>
	   		<div class="footer_bottom">
	   		<!--
		   		<div class="copy">
			      	<p>2014 Template by <a href="http://w3layouts.com" target="_blank"> w3layouts</a></p>
			    	</div>
			    	<div class="social">	
				   	<ul>	
					  		<li class="s1"><a href="#"><span> </span></a></li>
					  		<li class="s2"><a href="#"><span> </span></a></li>
					  		<li class="s3"><a href="#"><span> </span></a></li>	
					  		<li class="s4"><a href="#"><span> </span></a></li>
					  		<li class="s5"><a href="#"><span> </span></a></li>
					  		<li class="s6"><a href="#"><span> </span></a></li>	
					  		<li class="s7"><a href="#"><span> </span></a></li>	
					  		<li class="s8"><a href="#"><span> </span></a></li>	
					  		<li class="s9"><a href="#"><span> </span></a></li>							
				   	</ul>
			    	</div>
			   -->
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

