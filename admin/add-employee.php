<?php
$error="";
$message='';
include 'includes/db.php';
include 'includes/header.php';
include 'includes/adminbar.php';
if(!isset($_SESSION['alogin'])){
    header("location: admin-login.php?error=Firstly you need to login");    
}
else{

if (isset($_POST['add-btn'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $confirm_password = $_POST['confirm_password'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    
    $data = $_POST;

    if (empty($data['name'])) {
            header("Location: add-employee.php?error=Fill All Mandatory fields");
    }else
    {
        //check email already registered or not.
        $sql=$connection->prepare("SELECT * FROM employee WHERE email =?");
        $sql->execute([$email]);
        $result = $sql->rowcount();

        if ($result > 0) {
            header("Location: employee.php?error=E-mail is already registered");
        }
        // else {
        //         // Check Both passwords are same or not.
        //         if ($_POST['password'] !== $_POST['confirm_password']) {
        //             header("Location: employee.php?error=Password Should not Match");
        //         }
                else{
                
                    $sql = "INSERT INTO employee(name,email,phone,password,department,address,role) 
                            VALUES (:name, :email, :phone, :password,:department, :address,'2')";
                    $statement = $connection->prepare($sql);
                    $statement->execute(
                        [
                            ':name' => $name,
                            ':email' => $email,
                            ':phone' => $phone,
                            ':password' => $password,
                            ':department' => $department,
                            ':address' => $address,            
                        ]);
                            {
                                $message = "data inserted successfully";
                                header("Location: employee.php");
                            }
                }
            }
        }
    // }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add employee</title>
    
</head>

<body>
    <section class="py-2">
        <div class="container">

            <div class="row">

                <div class=" col-6 m-auto">
                    <h1> Add New employee</h1><br>
                    <div class="card-body">
                        <?php if(isset($_GET['error'])) {?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET['error'] ?>
                        </div>
                        <?php }?>

                        <form method="POST">

                            <div class="form-group col-md-13">
                                <label for="name "> Name </label>
                                <input type="name" name="name" class="form-control" placeholder="Enter your name"><br>
                            </div>
                            <div class="form-group col-md-13">
                                <label for="email "> Email address</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="Enter your email"><br>
                            </div>
                            <div class="form-group col-md-13">
                                <label for="phone "> Phone number </label>
                                <input type="text" name="phone" class="form-control"
                                    placeholder="Enter your phone No."><br>
                            </div>
                            <div class="form-group col-md-13">
                                <label for="Department "> Department </label>
                                <select name="department" class="form-control">
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
                            <div class="form-group mb-3">
                                <label for=> Enter your password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Enter your password" >
                            </div>
                            <!-- <div class="form-group mb-3">
                                <label for=> Enter your confirm password</label>
                                <input type="password" class="form-control" name="Confirm_password" id="password"
                                    placeholder="Enter your confirm password" required>
                            </div> -->
                            <div class="form-group col-md-13">
                                <label for="address "> Address </label>
                                <input type="text" name="address" class="form-control"
                                    placeholder="Enter your Address"><br>
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