<?php
	require '../Model/AssistantDB.php';

	if(isset($_GET['assistent'])) {
		$name = $_GET['assistent'];
		$result = get($name);
	}

	if ($result->num_rows > 0) {
		echo "<table class="table table-bordered" border='1' align='center'>";
		echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Date of Birth</th>";
        echo "<th>Religion</th>";
        echo "<th>Email</th>";
        echo "<th>Phone No</th>";
        echo "<th>Username</th>";
        echo "<th>Action</th>";
		while ($data = $result->fetch_assoc()) {
            echo "</tr>";
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
	    echo "</table>";
	}
	else {
		echo "No record(s) found";
	}
?>
