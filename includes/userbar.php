<?php
include 'includes/header.php';

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
    <div class="wrapper">
        <div class="sidebar">
            <h2> Sidebar</h2>
            <ul>
                <!-- <li><a href="user-dashboard.php"><i class="fas fa-home">Home</a></li> -->
                <li><a href="user-profile.php"><i class="fas fa-department">My Profile</a></li>
                
                <li><a href="leave-apply.php"><i class="fas fa-home">Leaves</a></li>
                <li><a href="leave-history.php"><i class="fas fa-home">Leave History</a></li>
                <li><a href="user-logout.php"><i class="fas fa-home">Logout</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="header"> <h2>Welcome to Leave Management System</h2></div>
        </div>
    </div>
</body>
</html>
<?php include 'includes/footer.php'?>

