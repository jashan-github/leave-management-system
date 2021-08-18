<?php
session_start();

// function is_loggedin(){
//     if(isset($_SESSION))
//     {
//         if(isset($_SESSION['alogin'])){
//         return true;
//     }
//     else{
//         return false;
//     }
// }
// }
// is_loggedin();



function prd($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    exit;
}

$username = "root";
$password = "";
$db = 'mysql:host=localhost; dbname=leave management';

try {
    $connection = new PDO($db, $username, $password);

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connected successfully";

} 
catch (PDOException $e) 
{
    echo "Connection failed: " . $e->getMessage();
}

?>