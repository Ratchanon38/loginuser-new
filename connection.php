<?php 

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "loginuser";
    $conn = new mysqli('localhost','root' ,'', 'loginuser');
if ($conn->connect_errno){
   echo "Failad to connect to MySQL: " . $conn->connect_error;
} 

    try {
        $db = new PDO("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOEXCEPTION $e) {
        $e->getMessage();
    }
