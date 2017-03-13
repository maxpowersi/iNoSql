<?php
    function Test6()
    {
   		Init();
		global $Version;

        include("views/test6.php");
    }

    function Test6Server()
    {
        Init();
		global $Version;
        
        try 
        {
            $conn = new MongoClient();
            $db = $conn->inosql;
            $collection = $db->users;	
            $inputJSON = file_get_contents('php://input');
            $input = json_decode($inputJSON, TRUE);		
            
            $cursor = $collection->find($input);
            
            if($cursor->count() == 0)
                echo "Credenciales incorrectas.";
            else
                echo "Bienvenido!";

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
        Init();
		global $Version;

        include("views/test6_res.php");
    }

?>