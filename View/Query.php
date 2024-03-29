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

    $sql = "SELECT * FROM query";
    $result = $ezl->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Query</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>

    <fieldset style="width: 60%; height: 450px; float: left; overflow: scroll;">
        <legend><b>Query</b></legend>
        <table border="1" align="center">
            <br>
            <tbody>
                <tr>
                    <th>Client Name</th>
                    <th>Query</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
                <?php 
                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td>" . $data['Name'] . "</td>";
                                echo "<td>" . $data['Query'] . "</td>";
                                if ($data['Solve'] == 'no') {
                                    echo "<td><a href='/ProjectDH/Controller/QueryDone.php?id=" . $data['ID'] . "'>Done</a></td>";
                                }
                                else {
                                    echo "<td>✅Solved</td>";
                                }
                                echo "<td><a href='/ProjectDH/Controller/QueryDelete.php?id=" . $data['ID'] . "'>❌Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                    else {
                        echo "<tr>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <br>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php 
            include '../View/Footer.php'; 
        ?>
    </fieldset>
</body>
</html>