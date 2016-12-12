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
					<li class="ACTIVE"><a href="<?php echo base_url();?>index.php/usuarios/logueado">HOME <span class="sr-only">(current)</span></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url();?>index.php/usuarios/mostrar_perfil">Perfil</a></li>
					<li><a>Bienvenido, <?php echo $nickname_show ?></a></li>
					<li>
						<a href="<?php echo base_url() ?>index.php/usuarios/cerrar_sesion"> Cerrar sesión </a>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>


	<!-- ______________________________________________BODY____________________________________________-->

	<div class="container">
		<h1 class="text-center">  Bienvenido, <?php echo $nickname_show; ?> </h1>
		<h3 style="color: red;" class="text-center">  No posee pruebas asignadas. </h3>
		<br>
		<br>
		<br>
		<div class="container text-center">
			<div class="col-md-12">
				<p>Avatar:</p>
				<img src="<?php echo base_url() ?>uploads/<?php echo $id_persona; ?>.png" alt="Smiley face" height="124" width="124">
			</div>
			<br>
			
			<div class="col-md_12">
				<a class="btn btn-info" href="<?php echo base_url();?>index.php/usuarios/show_form">Agregar/Editar Avatar</a>
			</div>
		</div>
		
		
		<br>

	</div>
</body>

</html>