<?php

include 'includes/db.php';
include 'includes/header.php';
include 'includes/adminbar.php';
if(!isset($_SESSION['alogin'])){
    header("location: admin-login.php?error=Firstly you need to login");    
}
else{
$sql = "SELECT * FROM department WHERE id=:id";
$statement = $connection->prepare($sql);
$statement->bindValue('id', $_GET['id']);
$statement->execute();
$allData = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['update-btn'])) 
{
    $id = $_POST['id'];
    $department_name = $_POST['department_name'];
    $added_by = $_POST['added_by'];
    $sql = "UPDATE department SET department_name=:department_name, added_by=:added_by WHERE id=:id";
    $stmt = $connection->prepare($sql);    

    $stmt->execute([
        ':department_name' => $department_name, 
        ':added_by' => $added_by, 
        ':id' => $id,        
    ]); 

    {
        header("Location: departments.php");
    }
}

?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2> Update user</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
                            <div class="form-group col-md-13">
                                <h4><label for="department "> Department </label></h4>
                                <input type="text" name="department_name"
                                    value="<?php echo $allData->department_name ?>" class="form-control"><br>
                            </div>
                            <div class="form-group col-md-13">
                                <h4><label for="added_by "> added_by </label></h4>
                                <input type="text" name="added_by" value="<?php echo $allData->added_by ?>"
                                    class="form-control"><br>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="update-btn" class="btn btn-primary">Update User</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
    <?php include 'includes/footer.php';?>