<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>

<h1>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h1>

<ul>
  <li><a href="manage_voters.php">Manage Voters</a></li>
  <li><a href="manage_positions.php">Manage Positions</a></li>
  <li><a href="manage_candidates.php">Manage Candidates</a></li>
  <li><a href="view_results.php">View Results</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

</body>
</html>
