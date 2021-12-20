<?php
$db = mysqli_connect("localhost", "root", "", "blood_donation");
if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT nid FROM users WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "Login Successful" . $row['nid'];
}
else {
    echo "Login Failed";
}


