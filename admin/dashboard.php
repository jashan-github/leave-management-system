<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/adminbar.php';
if(!isset($_SESSION['alogin'])){
    header("location: admin-login.php?error=Firstly you need to login");    
}
else{

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/sidebar.css">
</head>

<body>
    <div class="py-5">
        <div class="container">
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h6>Departments</h6>
                    </div>
                    <div class="card-body">
                        Total Added Departments is : 2
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
    <?php }?>
<?php include 'includes/footer.php';