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
    <title>Client</title>


</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    
    <fieldset style="width: 60%; height: 450px; overflow: scroll;">
        <legend><b>client</b></legend>
        <h3 class="text-success" align="center">Client Information</h3>



        <div align='middle'>
            <form action="../Controller/searchClient.php" method="get" onsubmit="client(this); return false;">
           <input class="form-control" type="text" id="search" name="Search" placeholder="Search Client">
                <input class="btn btn-primary" type="submit" name="submit" value="Search">
            </form>
        </div>
        
        <br>

        <div class="container mt-3" id="records" align="center">
            <table class="table table-bordered" border="1" align="center">
                
            <thead class="table-dark">     
            <tr>
                        <th>Client ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Username</th>
                        
                    </tr>
             </thead>
                    <tbody>
                    <?php 
                        if ($qry->num_rows > 0) {
                            while ($data = $qry->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td> 101-" . $data['ID'] . "</td>";
                                echo "<td><a href='UkillChat.php?id=" . $data['ID'] . "'>" . $data['Name'] . "</a></td>";
                                echo "<td>" . $data['Gender'] . "</td>";
                                echo "<td>" . $data['DateOfBirth'] . "</td>";
                                echo "<td>" . $data['Email'] . "</td>";
                                echo "<td>" . $data['Contact'] . "</td>";
                                echo "<td>" . $data['Username'] . "</td>";
                                echo "<td><a href='/ProjectDH/View/EditClient.php?id=" . $data['ID'] ."'>Edit</a></td>";  
                                echo "<td><a href='/ProjectDH/Controller/DeleteActionClient.php?id=" . $data['ID'] ."'>Delete</a></td>";
                                
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
                            echo "<td>--</td>";
                            echo "</tr>";
                        }
                        $ezl->close();
                    ?>
                </tbody>
            </table>
        </div>
        <p style="text-align: center;"><a href="../View/ClientForm.php">Add a Client</a> | <a href="/ProjectDH/View/ClientReq.php">Client Requests</a></p>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/foooter.php'; ?>
    </fieldset>

    <script>
        function client(stdnt) {
            let search = stdnt.search.value;
			let resulturl = stdnt.action;

			if(search !== "") {
				let xhttp = new XMLHttpRequest();
				xhttp.onload = function(){
					document.getElementById('records').innerHTML = this.responseText;
				}

				xhttp.open("GET", resulturl + "?client=" + search);
				xhttp.send();
			}
            else {
                alert('Empty Search!');
            }
        }
    </script>
</body>
</html>