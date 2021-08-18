<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
</head>

<body>


    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header text-center ">
                            <div class="card-title ">
                                <h4> Registration Form </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if(isset($_GET['error'])) {?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_GET['error'] ?>
                            </div>
                            <?php }?>


                            <form action="registration.php" method="POST">
                                <div class="form-group mb-3 ">
                                    <label for=> Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="enter your name">
                                </div>
                                <div class="form-group mb-3"></div>
                                <div class="form-group mb-3">
                                    <label for=> E-mail address</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter your e-mail">
                                    <!-- <div class="red-text"><?php echo $message;?> </div> -->

                                </div>
                                <div class="form-group mb-3"></div>
                                <div class="form-group mb-3">
                                    <label for=> Mobile Number</label>
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="Enter your mobile number">
                                </div>
                                <div class="form-group mb-3"></div>
                                <div class="form-group mb-3">
                                    <label for=> Enter your password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter your password">
                                </div>
                                <div class="form-group mb-3"></div>
                                <div class="form-group mb-3">
                                    <label for=> Enter your confirm password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" placeholder="Enter your confirm password">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                                    <p class="float-right mt-2"> Already have an account? <a href="index.php"
                                            class="text-primary"> Login </a> </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>