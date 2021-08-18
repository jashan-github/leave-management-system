<?php

include 'includes/db.php';
include 'includes/header.php';
include 'includes/adminbar.php';
$msg='';
$error='';
if(!isset($_SESSION['alogin'])){
    header("location: admin-login.php?error=Firstly you need to login");    
}
else{

if(isset($_POST['chng-pass']))
{   
    $password=md5($_POST['password']);
    $newpassword=md5($_POST['newpassword']);
    $id=$_SESSION['id'];
    $sql ="SELECT Password FROM admin WHERE email=:email and password=:password";
    $query= $connection-> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0)
    {
    $con="update admin set password=:newpassword where email=:email";
    $chngpwd1 = $connection->prepare($con);
    $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
    $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $chngpwd1->execute();
    prd($chngpwd1);
    $msg="Your Password succesfully changed";
    }
    else {
    $error="Your current password is wrong";    
    }

    }





    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
</head>

<body>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <h2> Change Password</h2>
                        </div>
                        <div class="card-body">
                            <?php if(isset($_GET['error'])) {?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_GET['error'] ?>
                            </div>
                            <?php }?>

                            <form method="POST">
                                <div class="form-group mb-3">
                                    <label for=> Enter your current password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Enter your Current password" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for=> Enter your New password</label>
                                    <input type="password" class="form-control" name="newpassword" id="password"
                                        placeholder="Enter your password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for=> Enter your confirm password</label>
                                    <input type="password" class="form-control" name="confirmnewpassword" id="password"
                                        placeholder="Enter your password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="chng-pass" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
<?php } ?>

<?php include 'includes/footer.php';?>