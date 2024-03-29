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

    $sql = "SELECT * FROM client";
    $qry = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <title>Edit Client Profile</title>
    </head>
    <body>
        <?php
            $id = $name = $gender = $dob = $phone = $email = $username = "";
            if (isset($_GET['id'])) {		
                $id = $_GET['id'];
                if($qry->num_rows > 0) {
                    while ($data = $qry->fetch_assoc()) {
                        if (+$id == $data['ID']) {
                            $name = $data['Name'];
                            $gender = $data['Gender'];
                            $dob = $data['DateOfBirth'];
                            $phone = $data['Contact'];
                            $email = $data['Email'];
                            $username = $data['Username'];
                        }
                    }
                }
            }
            else {
                die("Invalid Request");
            }
        ?>

        <?php include('../View/Adminbar.php') ?>
        <fieldset style="width: 40%; height: auto;">
            <legend><b>Client Profile</b></legend>
            <br>
            <form action="/ProjectDH/Controller/EditClientAction.php" method="POST" onsubmit="return validclient(this)">
                <?php 
                    if(isset($_COOKIE['msg'])){
                        echo $_COOKIE['msg'];
                    }
                ?>
                <span id="inputErr" style="color: red;"></span>
                <input type="number" name="id" value="<?php echo $id; ?>" hidden>
                <table>
                    <tr>
                        <td>
                            <label for="name">Name </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="name" id="name" value="<?php echo $name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gen">Gender </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input <?php if($gender == 'Male') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Male" id="male"> <label for="male">Male</label> 
                            <input <?php if($gender == 'Female') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Female" id="female"> <label for="female">Female</label>
                            <input <?php if($gender == 'Other') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Other" id="other"> <label for="other">Others</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dob">Date of Birth </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>">
                            <?php if(isset($_COOKIE['dob'])){echo $_COOKIE['dob'];} ?>
                            <br><span id="dobErr" style="color: red;"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phone">Phone No. </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="email" name="email" id="email" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="user">Username </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="username" id="user" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                </table>
                <br>
                <input type='submit' name='submit' value='Update'>
            </form>
        </fieldset>
        <br>
        <fieldset style="width: 98%;">
            <?php include '../View/foooter.php'; ?>
        </fieldset>

        <script>
            function validclient(valid) {
                let inputErr = document.getElementById("inputErr");
                inputErr.innerHTML = "";

                let name = valid.name.value;
                let gender = valid.gender.value;
                let dob = valid.dob.value;
                let phone = valid.phone.value;
                let email = valid.email.value;
                let username = valid.username.value;
                let isvalid = true;

                var date = new Date(dob);
                var currdate = new Date();
                
                if (name == "") {
                    inputErr.innerHTML = "❗Input should not be empty.";
                    isvalid = false;
                }
                if (gender == "") {
                    inputErr.innerHTML = "❗Input should not be empty.";
                    isvalid = false;
                }
                if (dob == "") {
                    inputErr.innerHTML = "❗Input should not be empty.";
                    isvalid = false;
                }
                else if ((currdate.getFullYear() - date.getFullYear()) < 18) {
                    dobErr.innerHTML = "❌Not old enough, Must be 18 or older.";
                    isvalid = false;
                }
                if (email == "") {
                    inputErr.innerHTML = "❗Input should not be empty.";
                    isvalid = false;
                }
                if (username == "") {
                    inputErr.innerHTML = "❗Input should not be empty.";
                    isvalid = false;
                }

                return isvalid;
            }
        </script>
    </body>
</html>