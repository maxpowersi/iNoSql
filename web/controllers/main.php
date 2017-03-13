<?php
	global $Version;
	
	function Init()
	{
		global $Version;	
		$archivo = file("version.txt");		
		foreach ($archivo as $line) 
			$Version = $line;
	}
	
	function NotFound()
	{
		Init();
		global $Version;

		include("views/not_found.php");
	}

	function Home()
	{
		Init();
		global $Version;
		
		include("views/home.php");
	}
	
	function Payloads()
	{
		Init();		
		global $Version;
		$Payloads = array();
		
		$archivo = file("controllers/payloads.txt");		
		foreach ($archivo as $line) 
		{
			$Payloads[] = $line;
		}
		
		include("views/payloads.php");
	}

	function Setup()
	{
		Init();		
		global $Version;
		$POST = $_SERVER['REQUEST_METHOD'] === 'POST';
		
		if ($POST)
			Setup_POST();
		else
			include("views/setup.php");
	}	

	function Setup_POST()
	{	
		Init();
		global $Version;

		$conn = new MongoClient();	
		$db = $conn->inosql;

		$collection = $db->users;
		$collection->drop();
		$a = array("name" => "Jhon doe", "username" => "admin", "email" => "admin@d.com", "password" => "123456");
		$b = array("name" => "Mr Robot", "username" => "singleuser", "email" => "singleuser@d.com", "password" => "123456");
		$collection->insert($a);	
		$collection->insert($b);
	
		$collection = $db->orders;
		$collection->drop();
		$a = array("id" => "122", "name" => "Mr Robot", "item" => "tablet", "quantity" => "1");
		$b = array("id" => "1337", "name" => "Jhon doe", "item" => "computer", "quantity" => "60");
		$collection->insert($a);	
		$collection->insert($b);

		$collection = $db->paymentinfo;
		$collection->drop();
		$a = array("id" => "1", "name" => "Jhon doe", "cc" => "4045 4545 2322 3243", "cvv2" => "345");
		$b = array("id" => "2", "name" => "Mr Robot", "cc" => "2222 2222 2222 2222", "cvv2" => "222");
		$collection->insert($a);	
		$collection->insert($b);

		$conn->close();

		include("views/setup_post.php");
	}

?>