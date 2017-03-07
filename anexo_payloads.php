<!DOCTYPE html>
<html>
<head>
   <?php include("resources.php");?>
</head>
<body>
   <?php include("nav.php"); ?>
    <div class="container">
		<div class="page-header" style="padding-top: 20px;">
			<h1>Anexo - Payloads </h1>
		</div>
		<div>
			<p class="lead">A continuación hacemos un listado de los payloads usados en los ejemplos y algunos otros, a modo resumen.</p>
			<p class="lead">
			$content = file("payloads.txt");
			foreach ($content as $line) 
			{
					echo ('<li>' . $line . '</li>);
			}
			</p>
		</div>
    </div>
</body>
</html>