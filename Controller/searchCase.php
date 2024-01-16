<?php
	require '../Model/CaselistDB.php';

	if(isset($_GET['caselist'])) {
		$name = $_GET['caselist'];
		$result = get($name);
	}

	if ($result->num_rows > 0) {
		echo "<table border='1' align='center'>";
		echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Price</th>";
        echo "<th>Location</th>";
        echo "<th>Details</th>";
        echo "<th>Action</th>";
		while ($data = $result->fetch_assoc()) {
            echo "</tr>";
	        echo "<tr>";
            echo "<td>" . $data['ID'] . "</td>";
            echo "<td>" . $data['Price'] . "</td>";
            echo "<td>" . $data['Location'] . "</td>";
            echo "<td>" . $data['Details'] . "</td>";

            echo "<td><a href='/ProjectDH/Controller/DeleteActionApartment.php?id=" . $data['ID'] ."'>Delete</a></td>";
            echo "</tr>";
	    }
	    echo "</table>";
	}
	else {
		echo "No record(s) found";
	}
?>