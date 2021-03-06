<?php
	function Test1()
	{
		RenderWithView("test1");
	}

	function Test1_POST()
	{
		$Result = array();
		$UserCount = 0;
		
		if (isset($_POST['usersearch']) && !empty($_POST['usersearch'])) 
		{
			try 
			{
				$conn = new MongoClient();
				$db = $conn->inosql;
				$collection = $db->users;
				$search = $_POST['usersearch'];
				$cursor = $collection->find(array('$where' => "function () { return this.username == '$search' ;}"));
				
				$UserCount = $cursor->count();

				foreach ($cursor as $obj) 
				{
					$item = array();
					$item["Name"] = $obj['name'];			
					$item["Username"] = $obj['username'];
					$item["Email"] = $obj['email'];		
					
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
		
		RenderWithView("test1_post", array("UserCount" => $UserCount, "Result" => $Result));
	}

	function Test1Res()
	{
		RenderWithView("test1_res");
	}
?>