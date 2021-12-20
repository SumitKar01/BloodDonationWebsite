<?php

$db = mysqli_connect("localhost", "root", "", "blood_donation");
if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$blood = $_POST['blood'];
$dob = $_POST['dob'];
$location = $_POST['district'];
$nid = $_POST['nid'];
$username = $_POST['username'];
$password = $_POST['password'];

$adduser = "INSERT INTO users (nid, username, password) VALUES ($nid, '$username', '$password')";
$addblood = "INSERT INTO blood (nid, bg, location) VALUES ($nid, '$blood', '$location')";
$addperson = "INSERT INTO person (nid, name, phone, email, dob) VALUES ($nid, '$name', '$phone', '$email', $dob)";

if(mysqli_query($db, $adduser) && mysqli_query($db, $addblood) && mysqli_query($db, $addperson)){
    echo "Registration Successful";
}
else {
    echo "Registration Failed";
}


?>