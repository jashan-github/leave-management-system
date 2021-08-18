<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/adminbar.php';
if(!isset($_SESSION['alogin'])){
    header("location: admin-login.php");
}
else{
$sqlUsers = "SELECT * FROM employee";
$search_txt='';
if(isset($_POST['search_txt']) && $_POST['search_txt'] !=''){
    $search_txt=$_POST['search_txt'];
    $sqlUsers.= " where name like '%$search_txt%' or email like '%$search_txt%' 
                    or department like '%$search_txt%' or phone like '%$search_txt%'";
}
$statement = $connection->prepare($sqlUsers);
$statement->execute();
$allData = $statement->fetchAll(PDO::FETCH_ASSOC);

?> <br>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="css/sidebar.css">
</head>

<body>
    <div class="container">
        <div class="col-md-11">
            <form method="post">
                <input type="textbox" name="search_txt" value="<?php echo $search_txt ?>" />
                <input type="submit" name="search" value="Search" />
            </form>
            <div class="line" style="text-align: right;">
                <a href="add-employee.php" class="btn btn-primary"> Add Employee</a>
            </div><br>
            <div class="card-header text-center">
                <h4> Employee List </h4>
            </div>
            <div class="card-body">
                <?php if (!empty($allData)) {?>
                <table class="table display responsive-table">
                    <thead>
                        <th> id</th>
                        <th> Employee Name</th>
                        <th> Email Adress</th>
                        <th> Contact No.</th>
                        <th> Department</th>
                        <th> Address</th>
                        <th width="20%"> Action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allData as $key => $values) {?>
                        <tr>
                            <td> <?php echo $values['id']; ?> </td>
                            <td> <?php echo $values['name']; ?> </td>
                            <td> <?php echo $values['email']; ?> </td>
                            <td> <?php echo $values['phone']; ?> </td>
                            <td> <?php echo $values['department']; ?> </td>
                            <td> <?php echo $values['address']; ?> </td>

                            <td>
                                <a href="edit-employee.php?id=<?php echo $values['id']?>" class="btn btn-primary">Edit
                                </a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');"
                                    href="delete-employee.php?id=<?php echo $values['id'] ?>"
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
<?php include 'includes/footer.php';