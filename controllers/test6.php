<?php
    function Test6()
    {
        RenderWithView("test6");
    }

    function Test6Server_POST()
    {
        try 
        {
            $conn = new MongoClient();
            $db = $conn->inosql;
            $collection = $db->users;	
            $input = request_GetJson();		
            
            $cursor = $collection->find($input);
            
            if($cursor->count() == 0)
                response_Write("Invalid username or password!");
            else
                response_Write("Welcome!");

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

    function Test6Res()
    {
        RenderWithView("test6_res");
    }
?>