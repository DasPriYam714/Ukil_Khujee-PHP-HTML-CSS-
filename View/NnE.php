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
    <title>News and Events</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    <fieldset style="width: 50%; height: 100%; float: left;">
        <legend><b>News And Events</b></legend>
        <br>
        <form action="/ProjectDH/Controller/NnEAction.php"  method="POST" onsubmit="return validnews(this)">
            <?php
                if(isset($_COOKIE['msg'])) {
                    echo $_COOKIE['msg'];
                }
            ?>
            <span id="newsErr"></span>
            <table>
                <tr>
                    <td>
                        <input type="date" name="date" value="<?php echo date('Y-m-d') ?>" hidden>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="news">Write a News or Events:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="news" id="news" cols="80" rows="10"></textarea>
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Post">
        </form>
        <br>
        <a href="/ProjectDH/View/NnEdata.php"><p style="text-align: center;">See all</p></a>
    </fieldset> 
    <fieldset style="width: 98%;">
        <?php 
            include '../View/Footer.php';
        ?>
    </fieldset>
</body>
</html>