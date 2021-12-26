<?php
session_start();
$nid = $_SESSION['nid'];
$db = mysqli_connect("localhost", "root", "", "blood_donation");
if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['donate']))
{
    $sql="UPDATE users SET type='$_POST[type]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header("Location: userdashboard.php");
} 
if(isset($_POST['update-name']))
{
    $sql="UPDATE person SET name='$_POST[name]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header("Location: userdashboard.php");
} 
if(isset($_POST['update-email']))
{
    $sql="UPDATE person SET email='$_POST[email]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header("Location: userdashboard.php");
}
if(isset($_POST['update-phone']))
{
    $sql="UPDATE person SET phone='$_POST[phone]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header("Location: userdashboard.php");
}
if(isset($_POST['update-blood']))
{
    $sql="UPDATE donor SET blood='$_POST[blood]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header("Location: userdashboard.php");
}
if(isset($_POST['update-location']))
{
    $sql="UPDATE donor SET location='$_POST[district]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header("Location: userdashboard.php");
}
if(isset($_POST['update-username']))
{
    $sql="UPDATE users SET username='$_POST[username]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header("Location: userdashboard.php");
    
} 
if(isset($_POST['update-password']))
{
    $sql="UPDATE users SET password='$_POST[password]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header("Location: userdashboard.php");
    
} 
if(isset($_POST['delete'])){
    $sql = "DELETE FROM users WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    $sql = "DELETE FROM donor WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    $sql = "DELETE FROM person WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    $sql = "DELETE FROM recovery WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    session_destroy();
    header('location: index.html');
    
} 
                    
                        
                    
?>