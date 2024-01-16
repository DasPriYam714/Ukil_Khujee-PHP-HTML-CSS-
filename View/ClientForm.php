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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <title>Registration</title>
        <script src="../View/js/registration.js"></script>
        <style> 
            legend {
                font-weight: bold; 
                font-size: large;
            }
        </style>
    </head> 
    <body>
        <?php 
            include('../View/Adminbar.php');
        ?>

        <form  action="/ProjectDH/Controller/ClientAction.php" target="_self" method="post" onsubmit="return validclient(this)" novalidate>
            <fieldset style="width: auto; height: 100%; float: left;">
                <legend><b>Client Form</b></legend>
                <?php
                    if(isset($_COOKIE['msg'])) {
                        echo $_COOKIE['msg'];
                    }
                ?>
                <table>
                    <tr>
                        <td >
                            <label for="name">Name </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="name" id="name"> <span id="nameErr">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gen">Gender </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="gender" value="Male" id="male"> <label for="male">Male</label> 
                            <input type="radio" name="gender" value="Memale" id="female"> <label for="female">Female</label>
                            <input type="radio" name="gender" value="Other" id="other"> <label for="other">Others</label>
                            <span id="genderErr">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dob">Date of Birth </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="date" name="dob" id="dob"> <span id="dobErr">*<?php if(isset($_COOKIE['dob'])) {echo $_COOKIE['dob'];} ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phone">Contact No. </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="tel" name="phone" id="phone"><span id="phoneErr">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="email" name="email" id="email"> <span id="emailErr">*<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];} ?></span>
                        </td>
                    </tr>
                </table>
                <br>
                <h3 class="text-success">Credential</h3>
                <table> 
                    <tr>
                        <td>
                            <label for="user">Username </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="username" id="user"> <span id="userErr">*<?php if(isset($_COOKIE['user'])) {echo $_COOKIE['user'];} ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="password" id="pass"> <span id="passErr">*<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="conpass">Confirm Password </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="conpassword" id="conpass"> <span id="conpassErr">*</span>
                        </td>
                    </tr>
                </table>
                <br>
                <input class="btn btn-primary" type='submit' name='submit' value='Submit'> <input class="btn btn-primary" type='reset' name='reset' value='Clear'>
            </fieldset>
            <br>
            <br>
            <br>
            <br>
            <br>

        </form>
        <fieldset style="width: 98%;">
            <?php 
                include '../View/foooter.php'; 
            ?>
        </fieldset>
    </body>
</html>