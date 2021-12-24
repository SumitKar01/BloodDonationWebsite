<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "blood_donation");
if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$blood = $_POST['blood'];
$dob = date('Y-m-d', strtotime($_POST['dob']));
$location = $_POST['district'];
$nid = $_POST['nid'];
$username = $_POST['username'];
$password = $_POST['password'];

$adduser = "INSERT INTO users (nid, username, password, type) VALUES ('$nid', '$username', '$password', 'donor')";
$adddonor = "INSERT INTO donor (nid, blood, location) VALUES ('$nid', '$blood', '$location')";
$addperson = "INSERT INTO person (nid, name, phone, email, dob) VALUES ('$nid', '$name', '$phone', '$email', '$dob')";

if(mysqli_query($db, $adduser) && mysqli_query($db, $adddonor) && mysqli_query($db, $addperson)){
    echo "Registration Successful";
    $_SESSION['nid'] = $nid;
    $_SESSION['registered'] = true;
    header("Location: register2form.php");
}
else {
    echo "Registration Failed";
    session_destroy();
    header("Location: register.html");
}


?>