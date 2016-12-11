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
          <li class=""><a href="<?php echo base_url();?>index.php/">HOME <span class="sr-only">(current)</span></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <!-- ______________________________________________BODY____________________________________________-->
  
  <div class="container">
   <h1 class="text-center"> Iniciar sesión </h1>
   <br>


   <div class="col-md-6 col-md-offset-3">
     <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/admin/iniciar_sesion_post">
      <fieldset>
        <legend>INICIAR SESIÓN ADMINISTRADOR</legend>




        <div class="form-group">
          <label for="rut" class="col-lg-2 control-label">Rut</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="rut" id="rut" placeholder="Ej: 11111111-1">
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-lg-2 control-label">Contraseña</label>
          <div class="col-lg-10">
            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
          </div>
        </div>

        <?php if ($error): ?>


          <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong>  <p> <?php echo $error ?> </p>
        </div>

      <?php endif; ?>

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <a class="btn btn-danger btn-sm" href="<?php echo base_url();?>index.php/"> Volver</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>


</div>
</body>

</html>