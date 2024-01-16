<?php
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectDH/Controller/Logout.php');
    }
    
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectDH/View/login.php");
    }

    $ezl = new mysqli("localhost", "root", "", "ukhil");


    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql1 = "SELECT * FROM client";
    $sql2 = "SELECT * FROM caselist";
    $sql3 = "SELECT * FROM assistant";
    /*$sql4 = "SELECT * FROM caselist";*/

    $qry1 = $ezl->query($sql1);
   
    $qry2 = $ezl->query($sql2);
    $qry3 = $ezl->query($sql3);
    /* $qry4 = $ezl->query($sql4);*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <title>Dashboard</title>
        <style>
            td {
                width: 25%;
                text-align: center;
            }
        </style>
    </head>
    <body>
    
        <?php include('../View/Adminbar.php') ?>
        <div class="container mt-3">
  
        </div>
        
<div class="container mt-3">
        <h1 class="text-primary" style="font-size: 30px;" align='center'><b>Welcome Lawyer</b> <span class="badge bg-secondary"> <b><?php echo $_SESSION['username'];?></b></span></h1>

        <fieldset style="width: 50%;">
            
           
            <hr>
                <table class="table table-bordered" style="margin-left: auto; margin-right: auto;">
                <thead class="table-dark">
                    
                        <tr>
                            <td>Client</td>
                            <td>Caselist</td>
                            <td>Assistant</td>

                        </tr>
                        <thead>
                        <tbody>
                        <tr>
                            <td><?php echo $qry1->num_rows; ?></td>
                            <td><?php echo $qry2->num_rows; ?></td>
                            <td><?php echo $qry3->num_rows; ?></td>
                            
                        </tr>
                    </tbody>
                </table>
                
        </fieldset>

        
        <br>
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
 </div>
    </body>
</html>