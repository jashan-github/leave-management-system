<?php 

include 'includes/db.php';
include 'includes/header.php';
include 'includes/userbar.php';
if(!isset($_SESSION['emplogin'])){
    header("location: index.php?error=Firstly you need to login");    
}
else{
?>

Welcome here....




<?php
}
include 'includes/footer.php'; ?>




