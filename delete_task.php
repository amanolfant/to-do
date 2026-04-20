<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo "<script>alert('Please login first'); window.location.href='login.php';</script>";
    exit;
}
$con = mysqli_connect("localhost","root","","to-do");
if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $stmt = $con->prepare("DELETE FROM tasks WHERE id= ? AND user_id = ?");
    $stmt->bind_param("ii" , $id, $user_id);
    if($stmt->execute()){
        header("Location: display.php");
        exit;
    }
    else{
        echo "error:" . $stmt->error;   
    }
    $stmt->close();
}
?>