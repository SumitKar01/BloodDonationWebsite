<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "blood_donation");
if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}


$nid = $_SESSION['nid'];
$pet = $_POST['pet'];
$friend = $_POST['friend'];

$addrecovery = "INSERT INTO recovery (nid, pet, friend) VALUES ('$nid', '$pet', '$friend')";

if(mysqli_query($db, $addrecovery) ){
    echo "Registration Successful";
    session_destroy();
    header("Location: login.php");
}
else {
    echo "Registration Failed";
    session_destroy();
   header("Location: register.html");
}


?>
