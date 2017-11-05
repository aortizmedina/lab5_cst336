<?php

function getDatabaseConnection()
{
    // $host = "us-cdbr-iron-east-05.cleardb.net";
    // $username = "b3d374bc5def80";
    // $password = "6038e853";
    // $dbname="heroku_876ef2f60b62635";
    
    // $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // return $dbConn;
    
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b7bb2f9ac871ba";
    $password = "e71f99e3";
    $dbname="heroku_c8ba92f77e57095";

// Create connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $conn;
//     $host = "us-cdbr-iron-east-05.cleardb.net";
//     $username = "root";
//     $password = "cst336";
//     $dbname="heroku_c8ba92f77e57095";

// // Create connection
//     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     return $conn;
    
  }

?>