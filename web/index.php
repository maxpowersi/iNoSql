<?php
  include ("controllers/main.php");
  include ("controllers/test1.php");
  include ("controllers/test2.php");
  include ("controllers/test3.php");
  include ("controllers/test4.php");
  include ("controllers/test5.php");
  include ("controllers/test6.php");
  
  $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
  $fileName = basename($path);
  $ext = ".php";

  switch ($fileName)
  {
    case "test1" . $ext:
      Test1();
      break;

    case "test1_res" . $ext:
      Test1Res();
      break;

    case "test2" . $ext:
      Test2();
      break;

    case "test2_res" . $ext:
      Test2Res();
      break;

    case "test3" . $ext:
      Test3();
      break;
    
    case "test3_res" . $ext:
      Test3Res();
      break;
    case "test4" . $ext:
      Test4();
      break;
    
    case "test4_res" . $ext:
      Test4Res();
      break;
    
    case "test5" . $ext:
      Test5();
      break;
    
    case "test5_server" . $ext:
      Test5Server();
      break;
    
    case "test5_res" . $ext:
      Test5Res();
      break;
    
    case "test6" . $ext:
      Test6();
      break;
    
    case "test6_server" . $ext:
      Test6Server();
      break;

    case "test6_res" . $ext:
      Test6Res();
      break;
    
    case "payloads" . $ext:
      Payloads();
      break;
    
    case "setup" . $ext:
      Setup();
      break;

    case "index" . $ext:
      Home();
      break;

    default:
        NotFound();
        break;
    }
?>