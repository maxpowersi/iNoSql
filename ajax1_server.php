<?php
	try 
	{
		$conn = new MongoClient();
		$db = $conn->nosqli;
		$collection = $db->paymentinfo;
		$search = $_GET['acctid'];				
		$cursor = $collection->find(array('id' => $search));
		
		if($cursor->count() == 0)
			echo "";

		foreach ($cursor as $obj) 
		{
			echo $obj['cc'];
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