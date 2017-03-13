<?php
	function Test2()
	{
		Init();
		global $Version;	
		$Result = array();
		$Count = 0;
		$ShowLabel = false;

		if (isset($_GET['ordersearch']) && !empty($_GET['ordersearch'])) 
		{
			$ShowLabel = true;
			
			try
			{
				$conn = new MongoClient();
				$db = $conn->inosql;
				$collection = $db->orders;
				$search = $_GET['ordersearch'];
				$js = "function () { var query = '". $search . "'; return this.id == query;}";
				$cursor = $collection->find(array('$where' => $js));

				$Count = $cursor->count() ;

				foreach ($cursor as $obj) 
				{
					$item = array();

					$item['id'] = $obj['id'];
					$item['name'] = $obj['name'];
					$item['item'] = $obj['item'];
					$item['quantity'] = $obj['quantity'];

					$Result[] = $item;
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

		include("views/test2.php");
	}

	function Test2Res()
	{
		Init();
		global $Version;

		include("views/test2_res.php");
	}
	
?>