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
					<li><a href="<?php echo base_url();?>index.php/empresa/logueado">Registro Usuario <span class="sr-only">(current)</span></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">

				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<!-- ______________________________________________BODY____________________________________________-->
	<br>
	<br>
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/usuarios/registro_usuario">
				<fieldset>
					<legend>Registro de Usuario</legend>

					<div class="form-group">
						<label for="rut" class="col-lg-2 control-label">Rut</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="rut" id="rut" placeholder="Ej: 11111111-1" required>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-lg-2 control-label">Contraseña</label>
						<div class="col-lg-10">
							<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
						</div>
					</div>

					<div class="form-group">
						<label for="nickname" class="col-lg-2 control-label">Nickname</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="nickname" id="nickname" placeholder="Nickname" required>
						</div>
					</div>

					<div class="form-group">
						<label for="nombre" class="col-lg-2 control-label">Nombre</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
						</div>
					</div>

					<div class="form-group">
						<label for="apellido_paterno" class="col-lg-2 control-label">Apellido Paterno</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido Paterno" required>
						</div>
					</div>

					<div class="form-group">
						<label for="apellido_materno" class="col-lg-2 control-label">Apellido Materno</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="apellido_materno" id="apellido_materno" placeholder="Apellido Materno" required>
						</div>
					</div>
					<div class="form-group">
						<label for="correo" class="col-lg-2 control-label">Correo</label>
						<div class="col-lg-10">
							<input type="mail" class="form-control" name="correo" id="correo" placeholder="Correo electrónico" required>
						</div>
					</div>
					<div class="form-group">
						<label for="sexo" class="col-lg-2 control-label">Sexo</label>
						<div class="col-lg-10">
							<select class="form-control" id="sexo" name="sexo" required>

								<option value="1">Masculino</option>
								<option value="2">Femenino</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<a class="btn btn-danger btn-sm" href="<?php echo base_url();?>index.php/usuarios/mostrar_perfil"> Cancelar</a>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>

	</div>
</body>

</html>