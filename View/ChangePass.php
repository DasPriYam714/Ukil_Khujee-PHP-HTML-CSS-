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
    <script src="../View/js/admin.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Update Profile</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>

    <form class="form-outline mb-4" action="/ProjectDH/Controller/ChangepassAction.php" target="_self" method="post" onsubmit="return validchngpass(this)" novalidate>
        <fieldset style="width: 40%;">
            <legend><b>Change Password</b></legend>
            <br>
            <?php
                if(isset($_COOKIE['msg'])) {
                    echo $_COOKIE['msg'];
                }
            ?>
            <span id="passErr"></span>
            <table>
                <tr>
                    <td>
                        <label for="curpass">Current Password </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input class="form-control" type="password" name="currentpass" id="curpass" onkeyup="validpass(this.value)"><span id="msg"></span><br>
                        <span id="currErr"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="newpass">New Password </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input class="form-control" type="password" name="newpassword" id="newpass"><br>
                        <span id="newErr"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="repass">Retype Password </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input class="form-control" type="password" name="repassword" id="repass"><br>
                        <span id="reErr"></span>
                    </td>
                </tr>
            </table>
            <br>
        </fieldset>
        <br>
        <center>
        <input class="btn btn-primary" type='submit' name='submit' value='Update'>
            </center>
        <br>
    </form>

    <fieldset style="width: 98%;">
        <?php include '../View/foooter.php'; ?>
    </fieldset>

    <script>
        function validpass(pass) {
            if (pass == "") { 
                document.getElementById("msg").innerHTML = "";
                return;
            }
            else {
                let xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById("msg").innerHTML = this.responseText;
                }
                xhttp.open("POST", "../Controller/CheckpassAction.php");
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("pass=" + pass);
            }
        }
    </script>
</body>
</html>