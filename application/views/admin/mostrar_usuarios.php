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
					<li class=""><a href="<?php echo base_url();?>index.php/admin/logueado">HOME <span class="sr-only">(current)</span></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class=""><a <a href="<?php echo base_url();?>index.php/admin/mostrar_perfil">Perfil</a></li>
					<li><a>Bienvenido, <?php echo $nickname_show ?></a></li>
					<li>
						<a href="<?php echo base_url() ?>index.php/admin/cerrar_sesion"> Cerrar sesión </a>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<!-- ______________________________________________BODY____________________________________________-->
	<br>
	<br>
	<div class="container">

		<?php if($error): ?>
			<div class="col-md-6 col-md-offset-3">
				<h3 class="text-center" style="color: red;"> <?php echo $error ?></h3>
				<a href="<?php echo base_url();?>index.php/admin/logueado" class="btn btn-primary" >Volver</a>
			</div>
		<?php else: ?>
			<div class="col-md-10 col-md-offset-1">



				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Empresas</h3>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-hover ">
							<thead>
								<tr>
									<th>Rut</th>
									<th>Nombre</th>
									<th>Nickname</th>
									<th>Estado</th>									
								</tr>
							</thead>
							<tbody>

								<?php
								foreach ($usuarios as $row)
								{
									echo "<tr>";
									echo "<td>".$row['rut']."</td>";
									echo "<td>".$row['nombre']."</td>";
									echo "<td>".$row['nickname']."</td>";
									echo '<td><div">
        								  	<a class="btn btn-danger btn-sm" href="<?php echo base_url();?>index.php/"> estado</a>
								          </div>'.'</td>';
									echo "</tr>";
								}
								?>
							</tbody>
						</table> 
					</div>
				</div>
				<a href="<?php echo base_url();?>index.php/admin/logueado" class="btn btn-primary" >Volver</a>
			</div>
		<?php endif; ?>

	</div>
</body>

</html>