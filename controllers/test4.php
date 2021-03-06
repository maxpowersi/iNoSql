<?php
	function Test4()
	{
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

               $Count = $cursor->count();

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

                RenderWithView("test4", array("Count" => $Count, "Result" => $Result, "ShowLabel" => $ShowLabel));
            } 
            catch (MongoConnectionException $e) 
            {
                die('Error connecting to MongoDB server : ' . $e->getMessage());
            } 
            catch (MongoException $e) 
            {
                RenderWithView("test4", array("Count" => 0, "Result" => array(), "ShowLabel" => true));
            }
        }
        else
            RenderWithView("test4", array("Count" => $Count, "Result" => $Result, "ShowLabel" => $ShowLabel));
	}

	function Test4Res()
	{
		RenderWithView("test4_res");
	}
?>