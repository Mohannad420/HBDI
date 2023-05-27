<?php
$dsn = 'mysql:host=localhost;dbname=hdmi-pro;charset=utf8;'; // Data Source Name 
$user = 'root'; // The User To Connect
$pass = ''; // password Of This User 

try {
    $db = new PDO($dsn, $user , $pass); // Start A New Connectiom=n With PDO Class
    // echo 'connect succsess' ;
}
catch(PDOException $e) {
    echo 'Failed' . $e->getMessage();
}


?>