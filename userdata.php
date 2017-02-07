<!DOCTYPE html>
<html>
<head>
   <?php include("resources.php");?>  
</head>
<body>
   <?php include("nav.php"); ?>
    <div class="container">
		<div class="page-header" style="padding-top: 20px;">
			<h1>Prueba 1 - Búsqueda de usuarios</h1>
			<h4>Ingresa en el formulario el nombre de usuario a buscar. Para ver la explicación <a href="userdata _res.php">acá</a></h4>
		</div>
		<div>    	       
			<form method="post" id="usersearch">
			<p>Insert the username to find the user: <input type="text" name="usersearch" id="usersearch" /> <input type="submit" name="submitbutton" value="Buscar" /></p>
			</form>
		</div>
		<?php
			$result = "";
			if (isset($_POST['usersearch']) && !empty($_POST['usersearch'])) 
			{
				try 
				{
					$conn = new MongoClient();
					$db = $conn->nosqli;
					$collection = $db->users;
					$search = $_POST['usersearch'];
					$cursor = $collection->find(array('$where' => "function () { return this.username == '$search' ;}"));
					
					echo $cursor->count() . ' user found. <br/> <br/>';

					foreach ($cursor as $obj) 
					{
						echo 'Name: ' . $obj['name'] . '<br/>';
						echo 'Username: ' . $obj['username'] . '<br/>';
						echo 'Email: ' . $obj['email'] . '<br/>';
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