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

    $sql = "SELECT * FROM assistant";
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
        <title>Assistant</title>
    </head>
    <body>
    <?php include('../View/Adminbar.php') ?>
    <fieldset style="width: 60%; height: 450px; overflow: scroll;">
        <legend><b>Assistant</b></legend>
        <h3 class="text-success" align="center">Assistant Information</h3>
        
        <div align='middle'>
            <form action="../Controller/searchAssistant.php" method="get" onsubmit="assistant(this); return false;">
            <input class="form-control" type="text" id="search" name="Search" placeholder="Search Assistant">
                <input class="btn btn-primary" type="submit" name="submit" value="Search"></h2>
            </form>
        </div>
        <br>    
        <div class="container mt-3" id="records" align="center">
            <table class="table table-bordered" border="1" align="center">
            <thead class="table-dark"> 
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Religion</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($data = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $data['ID'] . "</td>";
                                echo "<td>" . $data['FirstName'] . " " . $data['LastName'] . "</td>";
                                echo "<td>" . $data['DateOfBirth'] . "</td>";
                                echo "<td>" . $data['Religion'] . "</td>";
                                echo "<td>" . $data['Email'] . "</td>";
                                echo "<td>" . $data['PhoneNo'] . "</td>";
                                echo "<td>" . $data['Username'] . "</td>";
                                echo "<td>" . "<a href='/ProjectDH/Controller/DeleteActionAssistant.php?id=" . $data['ID'] . "'>Delete</a></td>";
                                echo "</tr>";
                            }
                        }
                        else {
                            echo "<tr>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
        <p style="text-align: center;"><a href="/ProjectDH/View/Registration.php">Add a Assistant</a></p>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/foooter.php'; ?>
    </fieldset>

    <script>
        function assistant(stdnt) {
            let search = stdnt.search.value;
			let resulturl = stdnt.action;

			if(search !== "") {
				let xhttp = new XMLHttpRequest();
				xhttp.onload = function(){
					document.getElementById('records').innerHTML = this.responseText;
				}

				xhttp.open("GET", resulturl + "?assistant=" + search);
				xhttp.send();
			}
            else {
                alert('Empty Search!');
            }
        }
    </script>
    </body>
</html>