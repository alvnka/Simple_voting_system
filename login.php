<?php
include("connection.php");
if(isset($_POSt['submit'])){
    $ID = $_POST['ID'];
    $password = $_POST['password'];
    
    $sql="select * from voters where ID = '$ID' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $COUNT = mysqli_num_rows($result);
    if($count==1){
        header ("Location:welcome.php");
    }
    else{
        echo '<script>
            window.location.href = "index.php",
            alert("Login failed. Invalid ID or password")
            </script>';
    }
}
?>
