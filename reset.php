<?php
session_start();
$log=false;
$db = mysqli_connect('localhost', 'root', '', 'blood_donation');
if(isset($_POST['reset-pass']))
{
    $db = mysqli_connect('localhost', 'root', '', 'blood_donation');
    if(!$db){
        die("Connection failed: " . mysqli_connect_error());
    }
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $pet=$_POST['pet'];
    $friend=$_POST['friend'];
    $password=$_POST['password'];

    $sql= "UPDATE users SET password = '$password' WHERE nid = (SELECT P.nid FROM recovery R JOIN person P ON R.nid=P.nid WHERE P.email='$email' AND P.phone='$phone' AND R.pet='$pet' AND R.friend='$friend')";
    if (mysqli_query($db, $sql)) {
        $success=true;
        $log = true;
    } else {
        $success=false;
        $log = true;
    }   
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="title">
                <h1>
                    Rokto
                </h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="reset-area">
        <div class="container">
            <h1>Reset</h1>
            <form action="reset.php" method="post">
                <div id="reset-box">
                    <div class="email-box">
                        <label for="email">What's Your Email?</label>
                        <br>
                        <input type="email" id="email" name="email" placeholder="example@email.com" required>
                    </div>
                    <div class="phone-box">
                        <label for="phone">What's Your Phone Number?</label>
                        <br>
                        <input type="text" id="phone" name="phone" placeholder="+8801XXXXXXXXX" required>
                    </div>
                    <div class="pet-box">
                        <label for="pet">What's Your Pet Name?</label>
                        <br>
                        <input type="text" name="pet" id="pet" placeholder="Enter Your Pet Name" required>
                    </div>
                    <div class="friend-box">
                        <label for="friend">What's Your Best friend Name?</label>
                        <br>
                        <input type="text" name="friend" id="friend" placeholder="Your Best Friend Name" required>
                    </div>
                     <div class="reset-pass">
                        <label for="password">Enter New Password</label>
                        <br>
                        <input type="password" id="password" name="password" placeholder="Password" >
                    </div>
                    <div id="login-button">
                        <input type="submit" name="reset-pass" value="Reset Password">
                    </div>
                    <?php
                        if($log==true){
                            if($success==true){
                                echo "<p class='success'>Your password has been reset successfully</p>";
                            }
                            else{
                                echo "<p class='danger'>Your password has not been reset successfully</p>";
                            }
                        }
                    ?>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <div class="container">
            <section>
                <h3>Contact Info:</h3>
                <p>Email: abcd@gmailcom</p>
            </section>
        </div>
    </footer>
</body>

</html>

