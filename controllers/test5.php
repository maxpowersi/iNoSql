<?php
	function Test5()
	{
		RenderWithView("test5");
	}

    function Test5Server()
    {
        try 
        {
            $conn = new MongoClient();
            $db = $conn->nosqli;
            $collection = $db->paymentinfo;
            $search = $_GET['acctid'];				
            $cursor = $collection->find(array('id' => $search));
            
            if($cursor->count() == 0)
                response_Write("");

            foreach ($cursor as $obj) 
            {
                response_Write($obj['cc']);
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

	function Test5Res()
	{
		RenderWithView("test5_res");
	}
?>
