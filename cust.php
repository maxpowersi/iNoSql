<!DOCTYPE html>
<html>
<head>
 <?php include("resources.php");?>
</head>
<body>
   <?php include("nav.php");?>
    <div class="container">
		<div class="page-header" style="padding-top: 20px;">
			<h1>Prueba 3 - Información de cliente</h1>
			<h4>Ingresa en el formulario el número de pago a buscar. Para ver la explicación <a href="cust _res.php">acá</a></h4>
		</div>
		<div>	
			<h3>Customer Information</h3>
			<h4>Enter your customer ID to show your account information:</h3>
			<form method = "get" action = "acct.php">
				Customer ID:
				<input type="text" name="acctid" value="">
				<br>
				<br>
				<input type="submit" value="Send">
			</form>
		</div>
</body>
</html>