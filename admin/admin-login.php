<?php
include 'includes/db.php';
include 'includes/header.php';
// include 'includes/adminbar.php';
// is_loggedin();
$error='';


if(isset($_POST['login-btn']))
{
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $data = $_POST;

    if (empty($data['email']))
    {
        header("Location: admin-login.php?error=Fields cannot blanked");
    }
    else
    {
        $query=$connection->prepare("SELECT email,password FROM admin WHERE email=:email and password=:password");
        $query->execute([
            'email' => $_POST["email"],
            'password' => $_POST["password"], 
        ]);
        $row=$query->rowCount();    
        if($row>0){
            $_SESSION['alogin']=$_POST['email'];
            header("location: dashboard.php");  
        } 
        else{
            echo "<script>alert('Invalid Details');</script>";
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
    <title>Login form</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class="py-5">
        <div class="container">
            <h1>Welcome to Leave Management System</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <h2> Admin Panel</h2>
                        </div>
                        <div class="card-body">
                            <?php if(isset($_GET['error'])) {?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_GET['error'] ?>
                            </div>
                            <?php }?>

                            <form method="POST">
                                <div class="form-group mb-3">
                                    <label for=> E-mail address</label>
                                    <input type="email" class="form-control" name="email" id="e-mail"
                                        placeholder="Enter your e-mail">
                                </div>

                                <div class="form-group mb-3">
                                    <label for=> Enter your password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Enter your password">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="login-btn" class="btn btn-primary">Login</button>
                                    <p class="float-right mt-2"> Want to login as User <a href="/index.php"
                                            class="text-primary"> User Login </a> </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>





<?php include 'includes/footer.php'; ?>