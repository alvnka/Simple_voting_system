<!DOCTYPE html>
<html>
<head>
	<title>View Results</title>
</head>
<body>
	<h1>View Results</h1>
    <?php
// Include database connection file
$conn =  new mysqli("localhost", "root", "", "voters_db");
if(! $conn )
{
 die('Could not connect: ' . mysqli_error($conn));
}

// Retrieve results from database
$sql = "SELECT c.candidate_ID, c.Name, p.Position_ID, c.number_of_votes FROM candidates c INNER JOIN positions p ON c.position_ID = p.Position_ID ORDER BY p.Position_ID, c.number_of_votes DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// Display results in a table
	$current_position_id = "";
	echo "<table>";
	echo "<tr><th>Position ID</th><th>Position Name</th><th>Candidate ID</th><th>Candidate Name</th><th>Number of Votes</th></tr>";
	while($row = $result->fetch_assoc()) {
		if ($current_position_id != $row["Position_ID"]) {
			$current_position_id = $row["Position_ID"];
			$sql_position = "SELECT Name FROM positions WHERE Position_ID=" . $row["Position_ID"];
			$result_position = $conn->query($sql_position);
			$row_position = $result_position->fetch_assoc();
			echo "<tr><td>" . $row["Position_ID"] . "</td><td>" . $row_position["Name"] . "</td><td>" . $row["candidate_ID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["number_of_votes"] . "</td></tr>";
		} else {
			echo "<tr><td></td><td></td><td>" . $row["candidate_ID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["number_of_votes"] . "</td></tr>";
		}
	}
	echo "</table>";
} else {
	echo "No results found.";
}

// Close database connection
$conn->close();
?>
</body>
</html>
