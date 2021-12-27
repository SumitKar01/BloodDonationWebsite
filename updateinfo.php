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
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
if(isset($_POST['update-name']))
{
    $sql="UPDATE person SET name='$_POST[name]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
if(isset($_POST['update-email']))
{
    $sql="UPDATE person SET email='$_POST[email]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['update-phone']))
{
    $sql="UPDATE person SET phone='$_POST[phone]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['update-blood']))
{
    $sql="UPDATE donor SET blood='$_POST[blood]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['update-location']))
{
    $sql="UPDATE donor SET location='$_POST[district]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['update-username']))
{
    $sql="UPDATE users SET username='$_POST[username]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
} 
if(isset($_POST['update-password']))
{
    $sql="UPDATE users SET password='$_POST[password]' WHERE nid='$nid'";
    mysqli_query($db, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}
if(isset($_POST['adduserac']))
{
    $sql="INSERT INTO users (nid, username, password, type) VALUES ('$_POST[nid]', '$_POST[username]', '$_POST[password]', '$_POST[type]')";
    mysqli_query($db, $sql);
    $sql="INSERT INTO person (nid, name, email, phone) VALUES ('$_POST[nid]', '$_POST[name]', '$_POST[email]', '$_POST[phone]')";
    mysqli_query($db, $sql);
    $sql="INSERT INTO donor (nid, blood, location) VALUES ('$_POST[nid]', '$_POST[blood]', '$_POST[district]')";
    mysqli_query($db, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
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
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
} 

if(isset($_POST['deleteuser'])){
    $sql="SELECT nid FROM users WHERE username='$_POST[username]'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $nid = $row['nid'];
    $sql = "DELETE FROM users WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    $sql = "DELETE FROM donor WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    $sql = "DELETE FROM person WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    $sql = "DELETE FROM recovery WHERE nid = '$nid'";
    mysqli_query($db, $sql);
    header('location: admindashboard.php');
    
} 
                    
                        
                    
?>