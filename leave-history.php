<?php

$message= '';
include 'includes/db.php';
include 'includes/header.php';
include 'includes/userbar.php';
if(!isset($_SESSION['emplogin'])){
    header("location: index.php?error=Firstly you need to login");    
}
else{

?><br>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave History</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <div class="col-md-11">
            <div class="card-header text-center">
                <h4> Leave History </h4>
            </div>
            <div class="card-body">
                <?php if (!empty($allData)) {?>
                <table class="table display responsive-table">
                    <thead>
                        <th> id</th>
                        <th> Leave Name</th>
                        <th> From</th>
                        <th> To</th>
                        <th> Description</th>
                        <th> Posting Date</th>
                        <th> Status</th>
                    </thead>
                    <tbody>
                        <?php
                        $eid=$_SESSION['eid'];
                        $sqlUsers = "SELECT leave_name,fromdate,todate,description,postingdate,status 
                                        FROM tblleaves WHERE empid=:eid";
                        // $sqlUsers= "SELECT tblleaves.id, tblleaves.leave_name AS l_name, 
                        //             employee.name FROM tblleaves, employee 
                        //             WHERE tblleaves.empid=employee.id ORDER By tblleaves.id";
                        $statement = $connection->prepare($sqlUsers);
                        $statement->execute();
                        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
                        if($statement->rowCount()>0){                        
                        foreach ($results as $result) {?>
                        <tr>
                            <td> <?php echo $result['id']; ?> </td>
                            <td> <?php echo $result['leave_name']; ?> </td>
                            <td> <?php echo $result['fromdate']; ?> </td>
                            <td> <?php echo $result['todate']; ?> </td>
                            <td> <?php echo $result['description']; ?> </td>
                            <td> <?php echo $result['postingdate']; ?> </td>
                            <td><?php $stats=$result['status'];
                                    if($stats==1){
                                             ?>
                                <span style="color: green">Approved</span>
                                <?php } if($stats==2)  { ?>
                                <span style="color: red">Not Approved</span>
                                <?php } if($stats==0)  { ?>
                                <span style="color: blue">waiting for approval</span>
                                <?php } }?>

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
<?php  }
include 'includes/footer.php';?>