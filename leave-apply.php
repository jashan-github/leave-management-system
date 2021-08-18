<?php 

include 'includes/db.php';
include 'includes/header.php';
include 'includes/userbar.php';
if(!isset($_SESSION['emplogin'])){
    header("location: index.php?error=Firstly you need to login");    
}
else{

if(isset($_POST['leave-apply'])){
    $empid=$_SESSION['eid'];
    $leave_name= $_POST['leave_name'];
    $fromdate= $_POST['fromdate'];
    $todate= $_POST['todate'];
    $description= $_POST['description'];
    $status=0;
    if($fromdate>$todate){
        $error="ToDate should be greater than FromDate";
    }
    $sql= "INSERT INTO tblleaves (leave_name,fromdate,todate,description,empid,status)
            VALUES(:leave_name,:fromdate,:todate,:description,:empid,:status)";
    $query=$connection->prepare($sql);
    $query->execute([
        ':leave_name' => $leave_name,
        ':fromdate' => $fromdate,
        ':todate' => $todate,
        ':description' => $description,
        ':empid' => $empid,
        ':status' => $status,
    ]);
     


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Leave</title>
</head>

<body>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow" style="background-color: whitesmoke;">
                        <div class="card-header">
                            Apply Leave
                            <div class="card-body">
                                <?php if(isset($_GET['error'])) {?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_GET['error'] ?>
                                </div>
                                <?php }?>
                                <form method="POST">
                                    <div class="form-group col-md-13">
                                        <label for="Leave "> Select Leave Type </label>
                                        <select name="leave_name" class="form-control"
                                            value="<?php echo $allData->leave_name ?>">
                                            <option value=""> Select leave type...</option>

                                            <?php $sql = "SELECT leave_name from emp_leave";
                                                $query = $connection -> prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);    
                                                if($query->rowCount() > 0)
                                                {
                                                    foreach($results as $result)
                                                        {   ?>
                                            <option value="<?php echo ($result->leave_name);?>">
                                                <?php echo ($result->leave_name);?></option>
                                            <?php 
                                                    }} ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for=> Date From</label>
                                        <input type="date" class="form-control" name="fromdate" placeholder="" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for=> Date To</label>
                                        <input type="date" class="form-control" name="todate" placeholder="" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Description</label>
                                        <textarea id="textarea1" name="description" class="form-control" length="500"
                                            required></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" name="leave-apply" class="btn btn-primary">Apply</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>
<?php }
include 'includes/footer.php';?>