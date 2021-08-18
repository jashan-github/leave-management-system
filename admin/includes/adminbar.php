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
                <li><a href="dashboard.php"><i class="fas fa-home">Home</a></li>

                <li><a href="departments.php"><i class="fas fa-department">Departments</a></li>
                
                <li><a href="leaves.php"><i class="fas fa-home">Leaves</a></li>

                <li><a href="employee.php"><i class="fas fa-home">Employee Master</a></li>
                <li><a href="changepassword.php"><i class="fas fa-home">Change Password</a></li>
                <li><a href="logout.php"><i class="fas fa-home"> Logout</a></li>

            </ul>
        </div>
        <div class="main_content">
            <div class="header"> <h1>Welcome to Admin Panel</h1></div>
        </div>
    </div>
</body>
</html>
<?php include 'includes/footer.php'?>

