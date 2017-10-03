<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kci_inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbllogin WHERE username='".$_POST['username']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if(md5($_POST['password']) == $row['password']){
        $_SESSION['sudahlogin']='ya';
        header('location: index.php');
        die();
    } else {
        $_SESSION['sudahlogin']='belum';
    }
    
} else {
    $_SESSION['sudahlogin']='belum';
}
header('location: /latihan/pages/examples/login.php');
$conn->close();
?> 