<?php
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectDH/Controller/Logout.php');
    }
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectDH/View/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script><title>Profile</title>
        <style>
            .edit {
                position: absolute;
                top: 0px;
                right: 2%;
            }

            .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: green;
            padding: 12px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button1 {
            
            background-color: green;
            color: black;
            border: 2px solid #21a814;
            border-radius: 10px;
        }
        </style>
    </head>
    <body>
        <?php include('../View/Adminbar.php') ?>

        <fieldset style="width: 40%; height: 100%; float: left; position: relative;">
            <legend class="text-success"><b>Profile</b></legend>
            <div class='edit'>
                <a href="/ProjectDH/View/Update.php">EDIT</a>
            </div>
            <br>
            <table>
                <tr>
                    <td>
                        <label for="name">Company Name </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['name']; ?>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <label for="email">Contact NO. </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['phone']; ?>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <label for="email">Email </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['email']; ?>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <label for="address">Address </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['address']; ?>
                    </td>
                </tr>
            </table>

            <ul>
            <center> <a href="/ProjectDH/View/ChangePass.php"><b><button class="button button1">Change Password</button></b></a><br><br>
    </center>
            </ul>
        </fieldset>
        <br>

        

        
        <fieldset style="width: 98%;">
            <?php include '../View/foooter.php'; ?>
        </fieldset>
    </body>
</html>