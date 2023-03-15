<!DOCTYPE html>
<html>
<head>
	<title>Add Candidate</title>
</head>
<body>
	<h1>Add Candidate</h1>

	<form method="post" action="insert_candidate.php">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>
		<br>

		<label for="position_id">Position ID:</label>
		<input type="number" id="position_id" name="position_id" required>
		<br>

		<label for="num_votes">Number of Votes:</label>
		<input type="number" id="num_votes" name="num_votes" required>
		<br>

		<input type="submit" value="Add Candidate">
	</form>

	<br>
	<a href="manage_candidates.php">Back to Manage Candidates</a>
</body>
</html>
