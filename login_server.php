<?php
	try 
	{
		$conn = new MongoClient();
		$db = $conn->nosqli;
		$collection = $db->users;	
		$inputJSON = file_get_contents('php://input');
		$input = json_decode($inputJSON, TRUE);		
		
		$cursor = $collection->find($input);
		
		if($cursor->count() == 0)
			echo "Invalid credentials.";
		else
			echo "Welcome!";

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