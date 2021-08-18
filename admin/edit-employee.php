<?php

include 'includes/db.php';
include 'includes/header.php';
include 'includes/adminbar.php';
if(!isset($_SESSION['alogin'])){
    header("location: admin-login.php?error=Firstly you need to login");    
}
else{
// $id=$_GET['id'];

$sql = "SELECT * FROM employee WHERE id=:id";
$statement = $connection->prepare($sql);
$statement->bindValue('id', $_GET['id']);
$statement->execute();
$allData = $statement->fetch(PDO::FETCH_OBJ);

if (isset($_POST['update-btn'])) 
{
    
    $sql = "UPDATE employee SET name=:name, email=:email, phone=:phone, department=:department, address=:address WHERE id=:id";
    $stmt = $connection->prepare($sql);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $deapartment = $_POST['deapartment'];
    $address = $_POST['address'];

    $stmt->execute([
        ':name' => $name, 
        ':email' => $email,
        ':phone' => $phone,
        ':department' => $department,
        ':address' => $address,  
        ':id' => $id,       
    ]); 
    {
        header("Location: employee.php");
    }
}

?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2> Update leave</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
                            <div class="form-group col-md-13">
                                <h4><label for="name"> name </label></h4>
                                <input type="text" name="name"
                                    value="<?php echo $allData->name ?>" class="form-control"><br>
                            </div>
                            <div class="form-group col-md-13">
                                <h4><label for="email "> email </label></h4>
                                <input type="text" name="email" value="<?php echo $allData->email ?>"
                                    class="form-control"><br>
                            </div>
                            <div class="form-group col-md-13">
                                <h4><label for="phone "> phone </label></h4>
                                <input type="text" name="phone" value="<?php echo $allData->phone ?>"
                                    class="form-control"><br>
                            </div>
                            <div class="form-group col-md-13">
                                    
                                    <label for="Department "> Department </label>
                                <select name="department" class="form-control" value="<?php echo $allData->department ?>">
                                <option value=""> Select Department</option>
                                <?php $sql = "SELECT department_name from department";
                                        $query = $connection -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        
                                        if($query->rowCount() > 0)
                                        {
                                        foreach($results as $result)
                                        {   ?>                                            
                                        <option value="<?php echo ($result->department_name);?>">
                                        <?php echo ($result->department_name);?></option>
                                        <?php }} ?>
                                </select><br>
                            </div>
                            <div class="form-group col-md-13">
                                <h4><label for="address "> address </label></h4>
                                <input type="text" name="address" value="<?php echo $allData->address ?>"
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
    <?php include 'includes/footer.php';