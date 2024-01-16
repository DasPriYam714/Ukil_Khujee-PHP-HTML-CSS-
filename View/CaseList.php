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

    $sql = "SELECT * FROM caselist";
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
    <title>Case Details</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    
    <fieldset style="width: 60%; height: 450px; overflow: scroll;">
        <legend><b>Case Details</b></legend>
        <h3 class="text-success" align="center">Case Details</h3>
        <div align='middle'>
            <form action="../Controller/searchCase.php" method="get" onsubmit="caselist(this); return false;">
                <input class="form-control" type="text" id="search" name="Search" placeholder="Search case">
                <input class="btn btn-primary" type="submit" name="submit" value="Search">
            </form>
        </div>
        <br>

        <div class="container mt-3" id="records" align="center">
            <table  class="table table-bordered" border="1" align="center">
            <thead class="table-dark"> 
                    <tr>
                        <th>Case ID</th>
                        <th>Price</th>
                        <th>Location</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if ($qry->num_rows > 0) {
                            while ($data = $qry->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td> 101-" . $data['ID'] . "</td>";
                                echo "<td>" . $data['Price'] . "</td>";
                                echo "<td>" . $data['Location'] . "</td>";
                                echo "<td>" . $data['Details'] . "</td>";

                                echo "<td><a href='/ProjectDH/Controller/DeleteActionCase.php?id=" . $data['ID'] ."'>Delete</a></td>";
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
                            echo "</tr>";
                        }
                        $ezl->close();
                    ?>
                </tbody>
            </table>
        </div>
        <p style="text-align: center;"><a href="/ProjectDH/View/CaseReq.php">Case Requests</a></p>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/foooter.php'; ?>
    </fieldset>

    <script>
        function caselist(stdnt) {
            let search = stdnt.search.value;
			let resulturl = stdnt.action;

			if(search !== "") {
				let xhttp = new XMLHttpRequest();
				xhttp.onload = function(){
					document.getElementById('records').innerHTML = this.responseText;
				}

				xhttp.open("GET", resulturl + "?caselist=" + search);
				xhttp.send();
			}
            else {
                alert('Empty Search!');
            }
        }
    </script>
</body>
</html>