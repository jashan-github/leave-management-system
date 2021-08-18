<?php 

include 'includes/userbar.php';
include 'includes/db.php';
include 'includes/header.php';
if(!isset($_SESSION['emplogin'])){
    header("location: index.php?error=Firstly you need to login");    
}
else{

    ?>


<?php }
include 'includes/footer.php';
?>