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
					
					
				</ul>
				<form class="navbar-form navbar-left">
				
				<ul class="nav navbar-nav navbar-right">
					
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="jumbotron">
		<div class="container text-center">
			<h1>Hello, World!</h1>
			<p>Bienvenido a la Plataforma Web GIPAC</p>
			<br>
			<br>
			<div class="col-md-4 text-center">
				<p>ADMINISTRADOR</p>
				
				<a class="btn btn-default" href="<?php echo base_url();?>index.php/admin/iniciar_sesion">Iniciar Sesión Administrador</a>
			</div>	
			<div class="col-md-4 text-center">
				<p>EMPRESA</p>

				<a class="btn btn-default" href="<?php echo base_url();?>index.php/empresa/iniciar_sesion">Iniciar Sesión Empresa</a>
			</div>	
			<div class="col-md-4 text-center">
				<p>ALUMNO</p>
				
				<a class="btn btn-default" href="<?php echo base_url();?>index.php/usuarios/iniciar_sesion">Iniciar Sesión Alumno</a>
				<br>
				<br>
				<a class="btn btn-default" href="<?php echo base_url();?>index.php/usuarios/registro_usuario">Crear Cuento Alumno</a>
			</div>
		</div>
	</div>
</body>

</html>