<?php
    session_start();
    if(isset($_SESSION['username'])) {
        if($_SESSION['username'] == 'admin')
            header("Location: /ProjectDH/View/Ukill.php");
        else 
        header("Location: /ProjectDH/View/Dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <title>Signin</title>
        <style>
            fieldset {
                width: 500px;
            }

            <style>
        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
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
            
            background-color: white;
            color: black;
            border: 2px solid #21a814;
            border-radius: 10px;
        }

        </style>
        </style>
    </head>
    <body>
        <fieldset style="width: 98%;">
            <?php include('../View/Header[1].php'); ?>
            <div style="float: right;">
                <a href="/ProjectDH/Home/index.php">Home</a> 
            </div>
        </fieldset>

        <form class="form-outline mb-4" action="/ProjectDH/Controller/LoginAction.php" target="_self" method="POST" onsubmit="return validlogin(this)">  
            <fieldset class ="p-3 mb-2 bg-secondary text-white"  style="width: 500px; margin-left: auto; margin-right: auto;">
                <legend><h3>SignIn</h3></legend>
                <?php
                    if (isset($_COOKIE['msg'])) {
                        echo $_COOKIE['msg'];
                    }
                ?>
                <span id="msg"></span>
               <table>
                
                    <tr>
                        <td>
                            <label for="user">Username </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input class="form-control" type="text" name="user" id="user">
                            <span id="userErr" style="color: red;"></span>
                        </td>
                    </tr>
                
                    <tr>
                        <td>
                            <label for="pass">Password </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input class="form-control" type="password" name="pass" id="pass">
                            <span id="passErr" style="color: red;"></span>
                        </td>
                    </tr>
                </table> 
                <br>
                <input type="checkbox" name="remember" id="rem"><label for="rem">Remember me</label>
                <br><br>
               
                <input class="btn btn-primary" type="submit" name="login" value="Login">
                <a href="/ProjectDH/View/registration.php">Need to registration?</a>
            </fieldset>
        </form>

        <br>
        
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
        <script>
            function validlogin(login) {
            let userErr = document.getElementById("userErr");
            let passErr = document.getElementById("passErr");

            userErr.innerHTML = "";
            passErr.innerHTML = "";

            let user = login.user.value;
            let pass = login.pass.value;

            let isvalid = true;
            let isEmpty = false;
            if(user === "") {
                userErr.innerHTML = "❗Username should not empty!";
                isvalid = false;
                isEmpty = true;
            }
            if(pass === "") {
                passErr.innerHTML = "❗Password should not empty!";
                isvalid = false;
                isEmpty = true;
            }
            return isvalid;
        }
        </script>
    </body>
</html>