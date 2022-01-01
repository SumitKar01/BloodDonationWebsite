<?php 
$db=mysqli_connect("localhost","root","","blood_donation");
if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Blood Donation Website</title>
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
                    <li><a href="">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="contact">
        <div class="container">
            <div id="contact-box">
                <div id="contact-title">
                    <h1>Contact Us</h1>
                </div>
                <div id="contact-form">
                    <form action="contact.php" method="post">
                        <div id="contact-form-section">
                            <div class="name">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div id="email">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div id="subject">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" id="subject">
                            </div>
                            <div id="message">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="10" maxlength="250"></textarea>
                                <p class="danger"> * Character Limit 250 Letter</p>
                            </div>
                            <div id="submit">
                                <input type="submit" value="Send" name="send">
                            </div>
                        </div>
                    </form>
                    <?php
                    if(isset($_POST['send'])){
                        $name=$_POST['name'];
                        $email=$_POST['email'];
                        $subject=$_POST['subject'];
                        $message=$_POST['message'];
                        $query="INSERT INTO feedback(ts,name,email,subject,msg) VALUES(CURRENT_TIMESTAMP,'$name','$email','$subject','$message')";
                        $result=mysqli_query($db,$query);
                        if($result){
                            echo "<p class='success'>Message Sent Successfully</p>";
                        }
                        else{
                            echo "<p class='danger'>Message Not Sent</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>