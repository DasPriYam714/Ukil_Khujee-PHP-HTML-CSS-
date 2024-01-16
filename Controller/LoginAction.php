<?php
    session_start();
    $username = $password = "";
    $isEmpty = $isValid = false;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        function test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = test($_POST["user"]);
        $password = test($_POST["pass"]);
        $remember = test($_POST["remember"]);

        if(empty($username)) 
            $isEmpty = true;

        if(empty($password))
            $isEmpty = true;

        if(!$isEmpty) {  
            if($remember == "") {
                setcookie('rem', 'remember', time() + 5, '/');
            }
            else {
                setcookie('rem', 'remember', 0, '/');
            }
            
            $server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $dbname = "ukhil";
            $ezl = new mysqli($server, $db_user, $db_pass, $dbname);

            if ($ezl->connect_error) {
                die("Data base Connection failed: " . $ezl->connect_error);
            }

            $sql1 = "SELECT * FROM ukil";
            $sql2 = "SELECT * FROM client";
            $row1 = $ezl->query($sql1);
            $row2 = $ezl->query($sql2);
            $ukil = $row1->fetch_assoc();
                        
            if($ukil['Username'] == $username and $ukil['Password'] == $password) {
                $_SESSION['name'] = $ukil['CompanyName'];
                $_SESSION['email'] = $ukil['Email'];
                $_SESSION['phone'] = $ukil['Contact'];
                $_SESSION['address'] = $ukil['Address'];
                
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: /ProjectDH/View/Dashboard.php");
                $isValid = true;
            }
            else if($row2->num_rows > 0) {
                while($teacher = $row2->fetch_assoc()) {
                    if($teacher['Username'] == $username and $teacher['Password'] == $password) {
                        $_SESSION['id'] = $teacher['ID'];
                        $_SESSION['name'] = $teacher['Name'];
                        $_SESSION['email'] = $teacher['Email'];
                        $_SESSION['gender'] = $teacher['Gender'];  
                        $_SESSION['dob'] = $teacher['DateOfBirth'];
                        $_SESSION['phone'] = $teacher['Contact'];

                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;

                        header("Location: /ProjectDH/View/Dashboard.php");
                        $isValid = true;
                    }
                }
            }
            if(!$isValid) {
                header("Location: /ProjectDH/View/login.php");
                setcookie('msg', "❌Please input correct Username or Password <br><br>", time() + 30, "/");
            }

            $ezl->close();
        }
        else {
            header("Location: /ProjectDH/View/login.php");
            setcookie('msg', '❌Please input  Username and Password<br><br>', time() + 30, "/");
        }
    }
?>