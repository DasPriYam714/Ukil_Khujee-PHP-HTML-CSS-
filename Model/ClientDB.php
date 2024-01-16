<?php 
    require 'Connect.php';

    function delete($id) {
        $ezl = connect();
        $sql = "DELETE FROM client WHERE ID=$id";
        $qry = $ezl->query($sql);

        header('location: ../View/Client.php');
    }

    function edit($id, $name, $gender, $dob, $phone, $email, $username) {
        $ezl = connect();
        $sql = "UPDATE client SET Name='$name', Email='$email', Gender='$gender', DateOfBirth='$dob', Contact='$phone', Username='$username' WHERE ID=$id";
        $qry = $ezl->query($sql);

        header("location: /ProjectDH/View/Client.php");
        $ezl->close();
    }

    function get($search) {
        $conn = connect(); 

        $sql = "SELECT * FROM client Where Name LIKE ?";
        $stmt = $conn->prepare($sql);
        $name = $search;
        $name = "%" . $name . "%";
        $stmt->bind_param("s", $name);

        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();

        return $result;
    }
?>