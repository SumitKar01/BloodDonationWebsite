<?php
session_start();
if($_SESSION['loggedin'] != true){
    header("Location: 404.html");
}
else {
    echo "Welcome ".$_SESSION['nid'];
    session_destroy();
}

?>