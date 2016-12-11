<!DOCTYPE html>
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

<style type="text/css">

      /* Sticky footer styles
      Style usado para agregar la barra inferior, Footer.
      https://getbootstrap.com/2.3.2/examples/sticky-footer.html
      -------------------------------------------------- */
      html,
      body {
        height: 100%;

      }

      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;

        margin: 0 auto -60px;
      }


      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }

     
      .container .credit {
        margin: 20px 0;
      }

    </style>
</head>

<body>

<div id="wrap">
	<div id="container" class="container">
	<div class="row col-md-12">
	<br>
	<h2 class="text-center"> Ejercicio 6</h2>
	<br>

	<div class="jumbotron">
	<div class="container">
    <br>
  


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Información de Heroes, Comics y Peliculas</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-hover col-md-6">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Nombre Civil</th>
      <th>Comic</th>
      <th>Saga</th>
      <th>Pelicula</th>
     
    </tr>
  </thead>
  <tbody>

    <?php 
		
		for ($i=0; $i < count($Heroes); $i++) { 
			echo"<tr>";
			$object = $Heroes[$i];
			echo"<td>".($i+1)."</td>";
			echo"<td>".$object->Nombre."</td>";
			echo"<td>".$object->NombreCivil."</td>";
			echo"<td>".$object->Comic."</td>";
			echo"<td>".$object->Saga."</td>";
			echo"<td>".$object->Pelicula."</td>";

			echo"</tr>";
		}?>

  </tbody>
</table> 
  </div>
</div>




    <br>
  

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Información Adicional</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-hover col-md-6">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Poder</th>
      <th>Historia</th>
      <th>Categoria</th>
     
    </tr>
  </thead>
  <tbody>

    <?php 
		
		for ($i=0; $i < count($HeroesDetail); $i++) { 
			echo"<tr>";
			$object = $HeroesDetail[$i];
			echo"<td>".($i+1)."</td>";
			echo"<td>".$object->Nombre."</td>";
			echo"<td>".$object->Poder."</td>";
			echo"<td>".$object->Historia."</td>";
			echo"<td>".$object->Categoria."</td>";

			echo"</tr>";
		}?>

  </tbody>
</table> 
  </div>
</div>



	</div>

	<br>

	
	</div>
	</div>
	<div id="push"></div>

	</div>
	<div id="footer">
      <div class="container">
        <p class="muted credit">Created by <a href="http://www.njara.cl">Nicolás Jara</a>.</p>
      </div>
    </div>

   
</body>

</html>