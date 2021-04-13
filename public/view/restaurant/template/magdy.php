<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="fr"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="fr"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js" lang="fr"> <![endif]-->
<html>

<head>
	<!-- etiquetas metas -->
	<?= viewadd("includes/add/headermetas") ?>
	<!--BEGIN OF TERMS OF USE. DO NOT EDIT OR DELETE THESE LINES. IF YOU EDIT OR DELETE THESE LINES AN ALERT MESSAGE MAY APPEAR WHEN TEMPLATE WILL BE ONLINE-->
	<style>
		#free-flash-header a,
		#free-flash-header a:hover {
			color: #363636;
		}

		#free-flash-header a:hover {
			text-decoration: none
		}
	</style>
	<!--END OF TERMS OF USE-->

	<!-- Bootstrap -->
	<link href="<?= assets('app/css/magdy/style2.css') ?>" rel="stylesheet" type="text/css" media="all">
	<?php
	// require assetsphp('app/css/magdy/style2') 
	?>

	<!-- Bootstrap cdn -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<!-- end Bootstrap -->

	<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900,900italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
	<!-- font-awesone -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<!-- LightBox -->
	<link href="<?= assets('app/css/magdy/lightbox/vlightbox.css') ?>" rel="stylesheet" type="text/css" media="all">
	<link href="<?= assets('app/css/magdy/lightbox/style-gallery.css') ?>" rel="stylesheet" type="text/css" media="all">
	<link href="<?= assets('app/css/magdy/lightbox/visuallightbox.css') ?>" rel="stylesheet" type="text/css" media="all">
	<link href="<?= assets('app/css/magdy/lightbox/style.css') ?>" rel="stylesheet" type="text/css" />
	<!-- end LightBox -->

	<!-- javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body class=" text-light bg-dark">


	<div class="">
		<!--BEGIN OF TERMS OF USE. DO NOT EDIT OR DELETE THESE LINES. IF YOU EDIT OR DELETE THESE LINES AN ALERT MESSAGE MAY APPEAR WHEN TEMPLATE WILL BE ONLINE-->
		<!-- <div id="copy" style="height: 75px; position: absolute; bottom: 0px; left:0px; border: none; width: 100%;">
			<div id="free-flash-header" style="width:820px;margin:0 auto;text-align:right;position:relative;bottom:0px;margin-top:63px;color:#363636;font-size:10px;font-family:Verdana"><strong>musica relajante</strong> : <a href="">musica relajante</a></div>
		</div> -->
		<!--END OF TERMS OF USE-->
		<header class="">
			<?php
			?>

			<!-- logo -->
			<div class=" justify-content-center text-dark">
				<div class=" position-fixed" style="top:25px; left:15px; z-index:1001;">
					<?php if (!empty($parameter->data->logo[0])) { ?>
						<a href="#" class=""> <img style="height:55px; " class="rounded" id="nav-brand" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/logo/<?= $parameter->data->logo[0]; ?>" alt="icon" class=" pt-2 rounded-circle"></a>
					<?php } ?>
				</div>
				<div class="position-sticky  d-flex justify-content-center w-100 py-5" style="z-index: 1000; background-color:#fff; top:0;">
					<div class="name_title text-center d-block ">
						<div class="d-flex d-inline justify-content-center">
							<div class="orange_square mr-5 d-md-block d-none" style="background:<?= $parameter->data->color_web2 ?>;"></div>
							<h1 class=" mr-5"><?= $parameter->data->nombre_empresa ?></h1>
							<div class="orange_square d-md-block d-none" style="background:<?= $parameter->data->color_web1 ?>;"></div>
						</div>
						<div class="d-flex d-inline justify-content-center">
							<div class="green_square mr-5 d-md-block d-none" style="background:<?= $parameter->data->color_web1 ?>;"></div>
							<h2 class=" mr-5">"<?= $parameter->data->titulo_sobre_nosotros ?>"</h2>
							<div class="green_square d-md-block d-none" style="background:<?= $parameter->data->color_web2 ?>;"></div>
						</div>

					</div>
					<div class="picture_logo d-lg-block d-none">
					</div>
				</div>
			</div>
			<!-- logo -->


		</header>
		<script>
			$(document).ready(function() {

				$(".show-hidden").hide('swing');

			});

			function showHide(a) {
				if ($(".show-hidden" + a).css('display') == 'none') {
					$(".show-hidden").hide('swing');
					$(".show-hidden" + a).show('swing');
					$(".show-hidden" + a).removeAttr('display')
				} else {
					$(".show-hidden" + a).hide('swing');
				}
			}
		</script>

		<div id="" class="col-12 mt-5  acordeon">

			<style>
				@media (max-width: 1100px) {
					.acordeon {
						/* display: none; */
						position: absolute;
						left: 0;
					}

				}
			</style>
			<!-- BURGUER -->
			<div class="btn-10 col-2 d-lg-none d-block text-light">
				<button class="burguer navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<i class=" fas fa-bars fa-lg"></i>
				</button>
			</div>
			<aside class="col col-12 justify-content-between">
				<!-- naviguation -->
				<script>
					$(document).ready(function() {

						$(".burguer").click(() => {
							if ($(".main-nav").css('display') == 'none') {
								$(".main-nav").removeAttr('class', 'd-none');
								$(".main-nav").removeAttr('class', 'position-fixed');
							} else if($(".main-nav").css('display') == 'block') {
								$(".main-nav").removeAttr('class', 'd-block');
								$(".main-nav").css('class', 'd-none');

							}
						});

					});
				</script>
				<nav class="col-xl-2  col-md-3 col-sm-4 col-6 position-fixed d-lg-block d-none main-nav" style="z-index:1003; top:230px; left:0px;">
					<ul>
						<li>
							<a href="<?= SERVERURL ?>">
								<i class="fas fa-caret-right"></i>
								<span>HOME</span>
								<div class="bg-nav"></div>
							</a>
						</li>
						<?php if (isset($_SESSION["usuario"])) { ?>
							<li>
								<a href="<?= SERVERURL ?>restaurant/inicio">
									<i class="fas fa-caret-right"></i>
									<span>USER</span>
									<div class="bg-nav"></div>
								</a>
							</li>
						<?php  } ?>
						<li>
							<a href="javascript:void[0]" id="show-design" class="" onclick="showHide('templatename')">
								<i class="fas fa-caret-right"></i>
								<span>ALOC_RAISE</span>
								<div class="bg-nav"></div>
							</a>
						</li>
						<?php
						$data = ["templatename" => ["aaron", "liam", "magui"], "ira" => ["informacion", "menu"]];
						foreach ($data["templatename"] as $k => $v) {
						?>
							<li class="show-hidden show-hiddentemplatename ml-4 " style="line-height: 1;">
								<a href="<?= SERVERURL . "design/example/" . $v ?>">
									<i class="fas fa-caret-right "></i>
									<span><small>DISEÑO <?= strtoupper($v) ?></small></span>
									<div class="bg-nav"></div>
								</a>
							</li>
						<?php } ?>



						<li class="">
							<a href="javascript:void[0]" id="show-ira" onclick="showHide('ira')">
								<i class="fas fa-caret-right"></i>
								<span>IR A..</span>
								<div class="bg-nav"></div>
							</a>
						</li>


						<?php
						foreach ($data["ira"] as $k => $v) {
						?>
							<li class="show-hidden show-hiddenira ml-4 " style="line-height: 1;">
								<a href="<?= '#' . $v ?>">
									<i class="fas fa-caret-right "></i>
									<span><small><?= strtoupper($v) ?></small></span>
									<div class="bg-nav"></div>
								</a>
							</li>
						<?php } ?>

						<?php if (!isset($_SESSION["usuario"])) { ?>
							<li>
								<a href="<?= SERVERURL ?>iniciar-sesion">
									<i class="fas fa-caret-right"></i>
									<span>INICIAR SESIÓN</span>
									<div class="bg-nav"></div>
								</a>
							</li>
						<?php } else { ?>
							<li>
								<a href="<?= SERVERURL ?>login/signOut">
									<i class="fas fa-caret-right"></i>
									<span>CERRAR SESIÓN</span>
									<div class="bg-nav"></div>
								</a>
							</li>
						<?php } ?>
						<audio id="nav-sound" preload="auto">
							<source src="<?= assets('app/audio/magdy/bouton.mp3') ?>">
							</source>
						</audio>

					</ul>
				</nav>
			</aside>
		</div>
		<!-- end naviguation -->

	</div>
	<div class="container">
		<div id="wowslider-container2" class=" my-5 w-100">
			<div class="ws_images ">
				<ul>
					<?php

					for ($i = 0; $i < count($parameter->data->portada); $i++) {
					?>
						<li>
							<img class="" id="img1_<?= $i ?>" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[$i]; ?>" alt="First slide">
						</li>
					<?php

					}
					?>

				</ul>
			</div>
			<div class="ws_thumbs row justify-content-center align-content-center">

				<?php

				for ($i = 0; $i < count($parameter->data->portada); $i++) {
				?>
					<a class="" href="#img1_<?= $i ?>" title="image-1">
						<img class="rounded" style="" src="<?= SERVERURL ?>public/users/<?= $parameter->data->id_usuario; ?>/img/portada/<?= $parameter->data->portada[$i]; ?>" alt="First slide">
					</a>
				<?php

				}
				?>


			</div>

			<div class="ws_shadow"></div>
		</div>
	</div>
	<?php
	switch ($parameter->data->moneda) {
		case 1:
			$parameter->data->moneda = '€';
			break;
		case 2:
			$parameter->data->moneda = '$';
			break;
		case 3:
			$parameter->data->moneda = '£';
			break;
	}

	?>

	<!-- SOBRE NOSOTROS -->
	<div class="container row  col-12  justify-content-between mt-5 pt-5">
		<div class="col-lg-2"></div>
		<div class=" col-lg-4 col-12">
			<h3 class="text-center"><?= $parameter->data->titulo_sobre_nosotros ?> </h3>
			<?php
			if (!empty($parameter->data->sobre_nosotros)) {
				for ($i = 0; $i < count($parameter->data->sobre_nosotros); $i++) {
			?>
					<p class="text-justify"> &nbsp&nbsp<?= $parameter->data->sobre_nosotros[$i] ?></p>

			<?php
				}
			}
			?>
		</div>
		<!-- <div class="col-lg-1"></div> -->
		<div class=" text-center col-lg-4 col-12   ">
			<h3>MENÚ DEL DÍA</h3>
			<?php viewadd("restaurant/template/add/menu_diario", $parameter) ?>
		</div>
	</div>
	<!-- MENUS -->
	<div class=" col-12 row justify-content-end mb-5" id="menu">
		<div class=" col-10 row justify-content-between">
			<?php require helpers('phases'); ?>
			<?php
			if ($parameter->data->sw_menu_text == '1') {
			?>
				<!--MENU IMAGES -->
				<div class="clear show-mobile "></div>
				<?php require helpers('phases'); ?>

				<?php
				$section = ["carta", "bebida"];
				foreach ($section as $v) {
				?>
					<div class="col-12 my-5">


						<h3 class="col-12 mb-4" style="text-align: center;"><?= strtoupper($v) ?></h3>
						<div class=" col-12 d-flex justify-content-end">
							<div class="col-lg-8 col-12 text-right">
								<?php $aleatorio = rand(0, count($phases) - 1); ?>
								<p class="  mb-0 ">&nbsp&nbsp&nbsp<?= $phases[$aleatorio]['phase'] ?></p>
								<p class=""><cite class=""><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite></small> </p>
							</div>
						</div>
						<div class="col-12 row mb-4">
							<button id="<?= "btnshow" . $v ?>" onclick='cartaHide("<?= $v ?>")' class="btn btn-primary w-50"><?= "ver " . $v ?></button>
						</div>

						<div class=" row col-12 d-flex flex-wrap justify-content-between">
							<?php
							if (!empty($parameter->data->$v)) {
								for ($i = 0; $i < count($parameter->data->$v); $i++) {
							?>
									<div class="vlightbox-cont bloc-img carta<?= $v ?> col-md-2 col-3">
										<a class="vlightbox1" style='' href="<?= SERVERURL . 'public/users/' . $parameter->data->id_usuario . '/img/' . $v . '/' . $parameter->data->$v[$i]; ?>" title="<?= $v . ' ' . ($i + 1) ?>">
											<img class="rounded " src="<?= SERVERURL . 'public/users/' . $parameter->data->id_usuario . '/img/' . $v . '/' . $parameter->data->$v[$i]; ?>">
										</a>
									</div>
							<?php
								}
							}
							?>
						</div>

						</article>
					</div>
				<?php
				}
				?>

			<?php
			} else {
			?>
				<!--MENU TEXT -->
				<div class="clear show-mobile"></div>
				<?php

				$section = ["carta_text", "bebida_text"];
				$alergenos = ["altramuces", "apio", "azufresulfitos", "cacahuetes", "crustaceos", "frutoscascara", "gluten", "huevos", "lacteos", "moluscos", "mostaza", "pescado", "sesamo", "soya"];
				$alergenostitle = ["altramuces", "apio", "azufre y sulfitos", "cacahuetes", "crustáceos", "frutos de cáscara", "gluten", "huevos", "lácteos", "moluscos", "mostaza", "pescado", "sésamo", "soja"];
				foreach ($section as  $v) {
				?>
					<div class="col-lg-6 col-12 row align-self-start pr-0 ">
						<article class="my-5 col-12 row py-5 " style="border: 1px dotted rgb(78, 76, 76);">

							<h3 class="col-12" style="text-align: center;"><?= strtoupper($v) ?></h3>
							<div class=" col-12 d-flex justify-content-end">
								<div class="col-lg-8 col-12 text-right">
									<?php $aleatorio = rand(0, count($phases) - 1); ?>
									<p class="  mb-0 ">&nbsp&nbsp&nbsp<?= $phases[$aleatorio]['phase'] ?></p>
									<p class=""><cite class=""><small><?= $phases[$aleatorio]['author'] ?> (<?= $phases[$aleatorio]['profession'] ?>)</cite></small> </p>
								</div>
							</div>
							<div class="col-12 row  pr-0">
								<button id="<?= "btnshow" . $v ?>" onclick='cartaHide("<?= $v ?>")' class="btn btn-primary w-50"><?= "ver " . $v ?></button>
							</div>

							<div class="col-12  pr-0">
								<?php
								if (!empty($parameter->data->$v)) {
									for ($i = 0; $i < count($parameter->data->$v); $i++) {
								?>
										<div class="vlightbox-cont bloc-img row col-12 pr-0  pb-4 carta<?= $v ?> " style="border-bottom: 6px dotted rgb(78, 76, 76);">
											<!-- <a class="vlightbox1<?= $v . $i ?> col-12 text-center " href="#ejemplo<?= $v . $i ?>"> -->
											<h3 class="pt-4 text-center text-primary"><?php print_r($parameter->data->$v[$i][0]) ?></h3>
											<!-- </a> -->
											<div id="ejemplo<?= $v . $i ?> row col-12 pr-0 " style="align-self: stretch;">
												<?php for ($a = 1; $a < count($parameter->data->$v[$i]); $a++) { ?>
													<div class=" row col-12  ml-2" style="border-top:1px dotted rgb(78, 76, 76);">
														<p class="col-10 mb-0"> <?php print_r($parameter->data->$v[$i][$a][0]) ?></p>
														<p class="col-2 text-right mb-0"> <?php print_r($parameter->data->$v[$i][$a][2]);
																							echo $parameter->data->moneda ?></p>
													</div>
													<div class="col-12 d-flex justify-content-between  pl-3">
														<p class="pl-4"> <small><?php print_r($parameter->data->$v[$i][$a][1]) ?></small></p>
														<div style="display:inline-flex; justify-content:end;">
															<?php
															for ($o = 3; $o < count($parameter->data->$v[$i][$a]); $o++) {
																if (in_array($parameter->data->$v[$i][$a][$o], $alergenos)) {
															?>
																	<img src="<?= assets("img/alergenos/ico/") . $parameter->data->$v[$i][$a][$o] . '.png'  ?>" alt="" style='width:23px; height:23px;'>
															<?php
																}
															}
															?>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
								<?php
									}
								}
								?>
							</div>


						</article>
					</div>
			<?php

				}
			}
			?>

			<script>
				$(document).ready(function() {

					$(".vlightbox-cont").hide('swing');

				});

				function cartaHide(showhide) {
					if ($(".carta" + showhide).css('display') == 'none') {
						$(".carta" + showhide).show("swing")
						$("#btnshow" + showhide).removeAttr("class", "btn btn-primary w-50");
						$("#btnshow" + showhide).attr("class", "btn btn-primary w-100");

					} else {
						$(".carta" + showhide).hide("swing")
						$("#btnshow" + showhide).removeAttr("class", "btn btn-primary w-100");
						$("#btnshow" + showhide).attr("class", "btn btn-primary w-50");
					}
				}
			</script>
			</script>
			<div class="col-12 row justify-content-center">
				<!-- <div class=" text-center col-lg-4 col-12 bg-dark  my-5 pt-5 align-self-start" id="menu">
					<h3>MENÚ DEL DÍA</h3>
					<?php viewadd("restaurant/template/add/menu_diario", $parameter) ?>
				</div> -->
			</div>

		</div>

	</div>


	<!-- card wifi -->

	<div class=" container-fluid row  justify-content-center bg-dark mx-0 py-5 text-light">
		<!-- Aceptamos Tarjetas de Crédito< -->
		<div class="container row col-6 <?php if ($parameter->data->swaceptartarjetas == 1) {
											echo 'justify-content-between';
										} else {
											echo 'justify-content-end';
										} ?>">
			<?php if ($parameter->data->swaceptartarjetas == 1) { ?>
				<section class=" col-lg-6 col-12" id="ccards">
					<p class="font-weight-bold ml-3 col-12">Aceptamos </p>
					<div class="cards  col-12">
						<img class="" width="65px" src="<?= assets("app/img/amex.gif") ?>" alt="tarjeta-de-credito-imagen-animada-0011" />
						<img class="" width="65px" src="<?= assets("app/img/mastercard.gif") ?>" alt="tarjeta-de-credito-imagen-animada-0010" />
						<img class="" width="65px" src="<?= assets("app/img/visa.gif")  ?>" alt="tarjeta-de-credito-imagen-animada-0009" />
					</div>
				</section>
			<?php } ?>
			<!-- wifi -->
			<div class="text-right  mb-5 mb-lg-0  pr-0 col-lg-6 col-12" id="mainwifi">
				<?php if ($parameter->data->swwifi == 1) { ?>
					<p class="mb-0 "><strong> WIFI <i class="fas fa-wifi fa-2x"></i></strong></p>
					<p class="mb-0"><strong>Nombre red : </strong><?= $parameter->data->wifi_name ?></p>
					<p><strong>Clave : </strong><?= $parameter->data->wifi_pass ?></p>
				<?php } ?>
			</div>
		</div>
	</div>


	<?php if (!empty($parameter->data->email)) { ?>
		<div class="signup-section mt-5 container-fluid position-sticky " id="informacion">
			<section class="container py-5">
				<div class="row">
					<div class="col-md-10 col-lg-8 mx-auto text-center ">
						<i class="far fa-paper-plane fa-2x mb-2 "></i>
						<h3 class="mb-5 ">Información y sugerencias</h3>
						<form class="d-flex flex-column form-group" action="<?= SERVERURL ?>email/enviarMailApp" method="post">
							<input class="form-control mb-2" id="nombre_empresa" name="nombre_empresa" type="hidden" value="<?= $parameter->data->nombre_empresa ?>" required />
							<input class="form-control mb-2" id="email_usuario_registrado" name="email_usuario_registrado" type="hidden" value="<?= $parameter->data->email ?>" required />
							<input class="form-control mb-2" id="nombre_web" name="nombre_web" type="hidden" value="<?= $parameter->data->nombre_web ?>" required />
							<input class="form-control mb-2" id="email_cliente" name="email" type="email" placeholder="Ingrese su e-mail..." required />
							<input class="form-control mb-2" id="asunto" name="asunto" type="text" placeholder="Asunto..." required>
							<textarea class="form-control  mb-2" name="contenido" id="" rows="3" placeholder="Sugerencias, información o lo que tu quieras..." required></textarea>
							<button class="btn btn-outline-light mx-auto mb-2 enviar_email" type="submit" name="enviar_email">ENVIAR</button>
						</form>


					</div>
				</div>
			</section>
		</div>
	<?php } ?>




	<!-- <div class="footer  container-fluid position-sticky my-5" id="footer"> -->
	<footer class="row  mx-auto row pt-4  justify-content-around bg-dark text-light border-top">
		<ul class=" col-lg-2 col-sm-3 col-12 px-0">
			<dl class="  ">
				<dt class="pb-3">Contacto</dt>
				<dd class="pb-0 mb-2 "><a href="mailto:<?= $parameter->data->email; ?>" target="_blank"><?= $parameter->data->email; ?></a></dd>
				<?php if (!empty($parameter->data->telefono[0])) { ?>
					<dd class="pb-0 mb-2 "><a href="https://api.whatsapp.com/send?phone=<?= $parameter->data->telefono[0]; ?>&text=Hola!%20Que%20tal!" target="_blank">Un whatsapp <i class="fab fa-whatsapp"> ?</i> </a></dd>
					<dd class="pb-0 mb-2 "><a href="tel:<?= $parameter->data->telefono[0]; ?>" target="_blank"><?= $parameter->data->telefono[0]; ?></a></dd>
				<?php } ?>
			</dl>
		</ul>
		<ul class="col-lg-2 col-sm-3 col-12 px-0">
			<dl class=" text-center ">
				<dt class="pb-3">Horarios</dt>
				<?php
				if (!empty($parameter->data->horario)) {
					for ($i = 0; $i < count($parameter->data->horario); $i++) {
				?>
						<dd class=""><?= $parameter->data->horario[$i]; ?></dd>
				<?php
					}
				}
				?>
			</dl>
		</ul>
		<ul class=" col-lg-2 col-sm-3 col-12 px-0">
			<dl class=" text-right">
				<dt class="pb-3 ">Visitanos</dt>
				<dd class="pb-0 mb-2 "><a href="<?= $parameter->data->ubicacion_google; ?>" target="_blank"><i class="fas fa-street-view fa-3x"> </i></a></dd>
				<dd> <?= $parameter->data->direccion ?></dd>
				<dd> <?= $parameter->data->codigo_postal . ' ' . $parameter->data->ciudad . ' ' . $parameter->data->estado ?></dd>
				<dd> <?= $parameter->data->pais ?></dd>
			</dl>
		</ul>
	</footer>
	<!-- footer -->
	<footer class="justify-content-center d-flex bg-light text-primary pt-3">



		<div class="">
			<a class="dark_grey small_text" href="<?= SERVERURL . 'politica-privacidad' ?>">Política de privacidad -</a>
			<a class="dark_grey small_text" href="<?= SERVERURL . 'politica-cookies' ?>">Política de cookies -</a>
			<a class="dark_grey small_text" href="<?= SERVERURL . 'aviso-legal' ?> ">Aviso legal</a>
		</div>
		<div class="">
			<p class="copyright"> - Copyright &copy; <?php echo date('Y') ?> <a href="<?= SERVERURL ?>">Aloc_Raise</a></p>
		</div>

	</footer>
	<!-- end footer -->
	</div>
	<audio id="audio-bg">
		<!-- <source src="<?= assets('app/audio/magdy/cuna.mp3') ?>"> -->
	</audio>
	<script type='text/javascript' src="<?= assets('app/js/magdy/js2/jquery-2.1.3.js') ?>"></script>
	<script type='text/javascript' src="<?= assets('app/js/magdy/js/visuallightbox.js') ?>"></script>
	<script type='text/javascript' src="<?= assets('app/js/magdy/js/vlbdata.js') ?>"></script>
	<script type="text/javascript" src="<?= assets('app/js/magdy/js/wowslider.js') ?>"></script>
	<script type="text/javascript" src="<?= assets('app/js/magdy/js/wowslider-gallery.js') ?>"></script>
	<script type="text/javascript" src="<?= assets('app/js/magdy/js/script.js') ?>"></script>
	<!-- gallery portada-->
	<script type="text/javascript" src="<?= assets('app/js/magdy/js/script-gallery.js') ?>"></script> 
	<script type='text/javascript' src="<?= assets('app/js/magdy/js2/app.js') ?>"></script>
</body>

</html>