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

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        while ($data = $qry->fetch_assoc()) {
            if (+$id == $data['ID']) {
                $name = $data['Name'];
            }
        }
    }
    $sql = "SELECT * FROM chat";
    $qry = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Client</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    
    <fieldset style="width: 50%; height: 400px; ">
        <legend><b><?php echo $name; ?></b></legend>
        <div class="container mt-3" id="msg" style="height: 90%; overflow: auto; display:flex; flex-direction:column-reverse;">
            <table class="table table-bordered" style="margin-top: 100%;" border="0px" width="100%">
                <tbody>
                    <?php
                        while ($data = $qry->fetch_assoc()) {
                            if($data['User'] == 'client'){
                                echo "<tr>";
                                echo "<td>";
                                echo "<div>" . $data['Chat'] . "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            else {
                                echo "<tr>";
                                echo "<td>";
                                echo "<div align = 'right' border='1px solid black'>" . $data['Chat'] . "</div>";
                                echo "</td>";
                                echo "</tr>";   
                            }
                        }
                    ?>
                    <!-- <tr>
                        <td><div id="msg" align = 'right'></div></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <div align="center" style="margin-top: 5px;">
            <form action="../Controller/UkillChatAction.php" onsubmit="validchat(this); return false;" method="POST">
                <input type="text" name="name" value="admin" hidden>
                <input class="form-control"  style="width: 80%;" type="text" name="adminchat" placeholder="Type your massage..." autocomplete="off">
                <input class="btn btn-primary" type="submit" name="chatsubmit" value="Send">
            </form>
        </div>        
    </fieldset>
    <br>
    <br>
    <br>
    <br>
    <br>

    <fieldset style="width: 98%;">
        <?php include '../View/foooter.php'; ?>
    </fieldset>

    <script>
        function validchat(valid) {
            let adminchat = valid.adminchat.value;
            let name = valid.name.value;

            let isvalid = true;

            if(adminchat == "") {
                isvalid = false;
            }

            if(isvalid) {
                const actionURL = valid.action;
                const actionMethod = valid.method;

                let xhttp = new XMLHttpRequest();
                document.getElementById('msg').innerHTML = "";

                xhttp.onload = function() {
                    document.getElementById('msg').innerHTML = this.responseText;
                }
                xhttp.open(actionMethod, actionURL);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("adminchat=" + adminchat + "&name=" + name);            
            }
            
        }
        $(document).ready(function(){
            setInterval(function(){
                $('#msg').load("../Controller/ChatFetch.php");
            });
        });
    </script>
</body>
</html>