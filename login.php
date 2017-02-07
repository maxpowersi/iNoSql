<!DOCTYPE html>
<html>
<head>
   <?php include("resources.php");?>  
</head>

<body>
   <?php include("nav.php");?>
   
	<script type="text/javascript">
		function enviar()
		{
				var response = $.ajax({
										type: "POST",
										url: "/inosql/login_server.php",
										data: JSON.stringify({username:$("#user").val(), password: $("#pass").val()}),
										contentType: "application/json",
										dataType: "json",
										async: false
									}).responseText;
				$("#user").val("");
				$("#pass").val("");
				alert(response);
		}
	</script>
   
    <div class="container">
		<div class="page-header" style="padding-top: 20px;">
			<h1>Prueba 6 - Login JSON</h1>
			<h4>Ingresa en el formulario las credenciales de autenticación. Para ver la explicación <a href="login_res.php">acá</a></h4>
		</div>
		<div>	
			<h3>Login</h3>
				User
				<br>
				<input type="text" name="user" id="user" value="">
				<br>
				<br>
				Password:
				<br>
				<input type="password" name="pass" id="pass" value="">
				<br/>
				<br/>
				<input type="button" value="Send" onclick="enviar();">
		</div>
</body>
</html>
</html>