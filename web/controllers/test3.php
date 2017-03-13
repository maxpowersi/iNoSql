<?php
	function Test3()
	{
		Init();
		global $Version;
		$Result = array();
		$Count = 0;
		$ShowLabel = false;

		if (isset($_GET['acctid']) && !empty($_GET['acctid'])) 
		{
			$ShowLabel =  true;
			try 
			{
				$conn = new MongoClient();
				$db = $conn->inosql;
				$collection = $db->paymentinfo;
				$search = $_GET['acctid'];				

				$cursor = $collection->find(array('id' => $search));
				
				$Count = $cursor->count();

				foreach ($cursor as $obj) 
				{
					$item = array();

					$item['name'] = $obj['name'];
					$item['id'] = $obj['id'];
					$item['cc'] = $obj['cc'];
					$item ['cvv2']= $obj['cvv2'];

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
		include("views/test3.php");
	}

	function Test3Res()
	{
		Init();
		global $Version;

		include("views/test3_res.php");
	}
?>