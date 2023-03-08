<?php
session_start();

if(!isset($_SESSION['ID'])){
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['ID']; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
