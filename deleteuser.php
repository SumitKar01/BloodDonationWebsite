<?php
session_start();
    $db=mysqli_connect("localhost","root","","blood_donation");
    $nid = $_GET['nid'];
    $sql = "DELETE FROM users WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    $sql = "DELETE FROM donor WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    $sql = "DELETE FROM person WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    $sql = "DELETE FROM recovery WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    header('location: admindashboard.php');
?>