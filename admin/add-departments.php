<?php

include 'includes/db.php';
include 'includes/header.php';
include 'includes/adminbar.php';
if(!isset($_SESSION['alogin'])){
    header("location: admin-login.php?error=Firstly you need to login");
}
else{
$error="";

$message='';

if (isset($_POST['add-btn'])) 
{
    $department_name = $_POST['department_name'];
    $added_by = $_POST['added_by'];
    
    

    $data = $_POST;
    

    if (empty($data['department_name'])) {
            header("Location: add-departments.php?error=Fill All Mandatory fields");
    }else{

    $sql = "INSERT INTO department(department_name,added_by) VALUES (:department_name, :added_by)";
    $statement = $connection->prepare($sql);
    

        $statement->execute([
            ':department_name' => $department_name,
            ':added_by' => $added_by,
        ]);
        {
            $message = "data inserted successfully";
            header("Location: departments.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
</head>

<body>
    <section class="py-2">
        <div class="container">

            <div class="row">

                <div class=" col-6 m-auto">
                    <h1> Add New Department</h1><br>
                    <div class="card-body">
                        <?php if(isset($_GET['error'])) {?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET['error'] ?>
                        </div>
                        <?php }?>

                        <form method="POST">

                            <div class="form-group col-md-13">
                                <h4><label for="department "> Department </label></h4>
                                <input type="text" name="department_name" class="form-control"><br>
                            </div>
                            <div class="form-group col-md-13">
                                <h4><label for="added_by "> added_by </label></h4>
                                <input type="text" name="added_by" class="form-control"><br>
                            </div>
                            <div class="form-group col-md-13">
                                <button type="submit" name="add-btn" class="btn btn-primary">Add Employee</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<?php }?>
<?php include 'includes/footer.php'; ?>