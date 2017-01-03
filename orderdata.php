<!DOCTYPE html>
<html>
<head>
   <?php include("resources.php");?>
</head>
<body>
   <?php include("nav.php");?>

    <div class="container">
		<div class="page-header" style="padding-top: 20px;">
			<h1>Prueba 2 - Búsqueda de órdenes</h1>
			<h4>Ingresa en el formulario el número de órden a buscar. Para ver la explicación <a href="orderdata_res.php">acá</a></h4>
		</div>
		<div>	
			<b>Use the Order ID to locate your order:</b><br>       	       
			<form method="get" id="usersearch">
				<p><input type="text" name="ordersearch" id="ordersearch" /> <input type="submit" name="submitbutton" value="Search" /></p>
			</form>
		</div>

		<?php
			if (isset($_GET['ordersearch']) && !empty($_GET['ordersearch'])) 
			{
				try
				{
					$conn = new MongoClient();
					$db = $conn->nosqli;
					$collection = $db->orders;
					$search = $_GET['ordersearch'];
					$js = "function () { var query = '". $search . "'; return this.id == query;}";
					$cursor = $collection->find(array('$where' => $js));

					echo $cursor->count() . ' order(s) found. <br/><br/>';

					foreach ($cursor as $obj) 
					{
						echo 'Order ID: ' . $obj['id'] . '<br/>';
						echo 'Name: ' . $obj['name'] . '<br/>';
						echo 'Item: ' . $obj['item'] . '<br/>';
						echo 'Quantity: ' . $obj['quantity']. '<br/>';
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
			}
		?>
    </div>
</body>
</html>