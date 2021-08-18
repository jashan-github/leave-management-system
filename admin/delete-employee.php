<?php

include 'includes/db.php';
if(!isset($_SESSION['alogin'])){
    header("location: admin-login.php?error=Firstly you need to login");    
}
else{

$id = $_GET['id'];
$sql = "DELETE FROM employee WHERE id=$id";
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
    "<script> alert:User successfully deleted</script>";
    header("Location: admin/employee.php");
}
}
?>