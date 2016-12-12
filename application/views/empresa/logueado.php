<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ejercicio 6</title>

	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->

	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/flatly/bootstrap.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>

	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">TICS</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="ACTIVE"><a href="<?php echo base_url();?>index.php/empresa/logueado">HOME <span class="sr-only">(current)</span></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url();?>index.php/empresa/mostrar_perfil">Perfil</a></li>
					<li><a>Bienvenido, <?php echo $nickname_show ?></a></li>
					<li>
						<a href="<?php echo base_url() ?>index.php/empresa/cerrar_sesion"> Cerrar sesión </a>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>


	<!-- ______________________________________________BODY____________________________________________-->

	<div class="container">
		<h1 class="text-center">  Bienvenido, <?php echo $nickname_show; ?> </h1>
		<br>
		<div class="row col-md-4 col-md-offset-4">
			<a href="<?php echo base_url() ?>index.php/empresa/mostrar_orden_compra" class="btn btn-primary btn-block">Ver Orden Compra</a>
			<br>
			<a href="<?php echo base_url() ?>index.php/empresa/mostrar_alumnos" class="btn btn-primary btn-block">Ver Alumnos</a>
			<br>
			<a class="btn btn-primary btn-block">Ver Cursos</a>
			<br>
			<a href="<?php echo base_url() ?>index.php/empresa/mostrar_datos_empresa" class="btn btn-primary btn-block">Datos Empresa</a>

		</div>
	</div>
</body>

</html>