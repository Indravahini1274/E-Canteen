<?php
try{
    define("HOST", "");
    define("DBNAME","");
    define("USER","");
    define("PASS","");
    $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //if($conn == true)
    //{
      //  echo "db connection is a success";
    //}else{
      //  echo "error";
    //} 
    }
    catch (PDOException $e)
    {
      echo "Failed to connect to database: " . $e->getMessage();
    }
?>
