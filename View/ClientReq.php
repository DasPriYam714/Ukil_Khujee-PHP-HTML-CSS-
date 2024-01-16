<?php
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectDH/Controller/Logout.php');
    }
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectDH/View/login.php");
    }

    define("t", "../Model/tempClient.json");
    $handle_t = fopen(t, "r");
    $fr1 = fread($handle_t, filesize(t));
    $arr1 = json_decode($fr1);
    $fc1 = fclose($handle_t);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <title>Client Requests</title>
    </head>
    <body>
        <?php include('../View/Adminbar.php') ?>
        <fieldset style="width: 50%; height: 20em; overflow: scroll;">
            <legend><b>Client Requests</b></legend>
            <br>
            <table  border="1" align="center">
            <tbody>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Username</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php 
                    if ($arr1 === NULL) {}
                    else {
                        for ($i = 0; $i < count($arr1); $i++) {
                            echo "<tr>";
                            echo "<td>" . $arr1[$i]->name . "</td>";
                            echo "<td>" . $arr1[$i]->gender . "</td>";
                            echo "<td>" . $arr1[$i]->dob . "</td>";
                            echo "<td>" . $arr1[$i]->email . "</td>";
                            echo "<td>" . $arr1[$i]->phone . "</td>";
                            echo "<td>" . $arr1[$i]->username . "</td>";
                            echo "<td>" . "<a href='/ProjectDH/View/AcceptClient.php?sl=" . $arr1[$i]->sl . "'>✅Accept</a></td>";
                            echo "<td>" . "<a href='/ProjectDH/View/DeclineClient.php?sl=" . $arr1[$i]->sl . "'>❌Decline</a></td>";
                        }
                    }
                ?>
            </tbody>
        </table>
        </fieldset>
        <br>
        <fieldset style="width: 98%;">
            <?php include '../View/foooter.php'; ?>
        </fieldset>
    </body>
</html>