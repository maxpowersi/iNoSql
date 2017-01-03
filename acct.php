<!DOCTYPE html>
<html>
<head>
  <?php include("resources.php");?>
</head>
<body>
   <?php include("nav.php");?>

    <div class="container">
		<div class="page-header" style="padding-top: 20px;">
			<h1>Prueba 3 - Búsqueda de pagos</h1>
			<h4>Ingresa en el formulario el número de pago a buscar. Para ver la explicación <a href="cust _res.php">acá</a></h4>
		</div>		
		<?php
			try 
			{
				$conn = new MongoClient();
				$db = $conn->nosqli;
				$collection = $db->paymentinfo;
				$search = $_GET['acctid'];				
				$cursor = $collection->find(array('id' => $search));
				
				echo $cursor->count() . ' document(s) found. <br/>';

				foreach ($cursor as $obj) 
				{
					echo 'Name: ' . $obj['name'] . '<br/>';
					echo 'Customer ID: ' . $obj['id'] . '<br/>';
					echo 'Card Number: ' . $obj['cc'] . '<br/>';
					echo 'CVV2 Code: ' . $obj['cvv2'] . '<br/>';
					echo '<br/>';
				}
				
			$conn->close();
			}
			catch (MongoConnectionException $e) 
			{
				die('Error connecting to MongoDB server : ' . $e->getMessage());
			}
			catch (MongoException $e) 
			{
				die('Error: ' . $e->getMessage());
			}
		?>
    </div>
</body>
</html>
