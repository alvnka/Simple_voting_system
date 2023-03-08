<?php
include("connection.php");
if(isset($_POST['submit'])){
    $ID = $_POST['ID'];
    $password = $_POST['password'];
    
    $sql="select * from voters where ID = '$ID' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count==1){
        header ("Location: home_page.php");
        exit();
    }
    else{
        echo '<script>
            window.location.href = "index.php";
            alert("Login failed. Invalid ID or password");
            </script>';
    }
}
?>
