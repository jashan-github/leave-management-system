<?php

$message= '';
include 'includes/db.php';
include 'includes/header.php';
include 'includes/adminbar.php';
if(!isset($_SESSION['alogin'])){
    header("location: admin-login.php?error=Firstly you need to login");    
}
else{

$sqlUsers = "SELECT * FROM emp_leave";
$statement = $connection->prepare($sqlUsers);
$statement->execute();
$allData = $statement->fetchAll(PDO::FETCH_ASSOC);

?><br>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaves</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <div class="col-md-11">
            <div class="line" style="text-align: right;">
                <a href="add-leave.php" class="btn btn-primary"> Add Leave</a>
            </div><br>
            <div class="card-header text-center">
                <h4> Leave List </h4>
            </div>
            <div class="card-body">
                <?php if (!empty($allData)) {?>
                <table class="table display responsive-table">
                    <thead>
                        <th> id</th>
                        <th> Leave Name</th>
                        <th> Added By</th>
                        <th width="20%"> Action</th>
                    </thead>
                    <tbody>
                        <?php
                                                
                        foreach ($allData as $key => $values) {?>
                        <tr>
                            <td> <?php echo $values['id']; ?> </td>
                            <td> <?php echo $values['leave_name']; ?> </td>
                            <td> <?php echo $values['added_by']; ?> </td>

                            <td>
                                <a href="edit-leave.php?id=<?php echo $values['id']?>" class="btn btn-primary">Edit
                                </a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');"
                                    href="delete-leave.php?id=<?php echo $values['id'] ?>"
                                    class="btn btn-danger">Delete
                                </a>
                            </td>
                        </tr>
                        <?php }?>


                    </tbody>
                </table>
                <?php }else{?>
                <h4>No Record Found.</h4>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php }?>
<?php include 'includes/footer.php';?>