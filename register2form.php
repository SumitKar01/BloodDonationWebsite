<?php
session_start();
if(($_SESSION['registered'])!=true){
    header("Location: 404.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Register</title>
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
    <section id="register">
        <div class="container">
            <div id="register-area">
                <h1>Register now and be a part of our community</h1>
                <br>
                <form action="register2.php" method="post">
                    <div class="type-box">
                        <label for="type">Do you want to be Donor?</label>
                        <select name="type" id="type" required>
                            <option value="donor">Yes</option>
                            <option value="recipient">No</option>
                        </select>
                    </div>
                    <div class="re">
                        <h2 class="danger">Recovery Information: </h2>
                        <br>
                    </div>
                    <div class="pet-box">
                        <label for="pet">What's Your Pet Name?</label>
                        <input type="text" name="pet" id="pet" placeholder="Enter Your Pet Name" required>
                    </div>
                    <div class="friend-box">
                        <label for="friend">What's Your Best friend Name?</label>
                        <input type="text" name="friend" id="friend" placeholder="Your Best Friend Name" required>
                    </div>
                
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
        
    </section>

    <footer>
        <div class="container">
            <section>
                <p>
                    <h3>Contact Info:</h3>
                    <p>
                        <p>Email: abcd@gmailcom</p>
                    </p>
                </p>
            </section>
        </div>
    </footer>  
</body>
</html>