<?php
	function Test1()
	{
		Init();
		global $Version;
		$POST = $_SERVER['REQUEST_METHOD'] === 'POST';
		
		if ($POST)
			Test1_POST();
		else
			include("views/test1.php");
	}

	function Test1_POST()
	{
		global $Version;
		$Result = array();
		$UserCount = 0;
		$POST = true;
		
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
		
		include("views/test1_post.php");
	}

	function Test1Res()
	{
		Init();
		global $Version;
		include("views/test1_res.php");
	}
?>