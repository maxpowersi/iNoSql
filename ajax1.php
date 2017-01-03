<!DOCTYPE html>
<html>
<head>
 <?php include("resources.php");?>
 <script>
 	function enviar()
	 {
		if (isNaN($("#acctidd").val()))
		{
			alert("Debe ingresar un valor númerico");
			return;
		}			

		var response = $.ajax({ type: "GET",   
                        		url: "ajax1_server.php?acctid="+$("#acctidd").val(),   
                        		async: false
                              }).responseText;

		$("#cardNumber").text("Card number: " + response);
		$("#acctidd").val("");
	 }
 </script>
</head>
<body>
   <?php include("nav.php");?>
    <div class="container">
		<div class="page-header" style="padding-top: 20px;">
			<h1>Prueba 5 - Información de cliente</h1>
			<h4>Ingresa en el formulario el número de pago a buscar. Para ver la explicación <a href="ajax1_res.php">acá</a></h4>
		</div>
		<div>	
			<h3>Customer Information</h3>
			<h4>Enter your customer ID to show your account information:</h3>
				Customer ID:
				<input type="text" name="acctid" id="acctidd" value="">
				<br>
				<br>
				<span id="cardNumber">Card number: </span>
				<br/>
				<br/>
				<input type="button" value="Send" onclick="enviar();">
		</div>
</body>
</html>