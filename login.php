<?php
session_start();
$falsepass=false;
if(isset($_POST['submit'])){
    $db = mysqli_connect("localhost", "root", "", "blood_donation");
    if(!$db){
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nid'] = $row['nid'];
        $_SESSION['loggedin'] = true;
        if($row['type'] == 'admin'){
            header("Location: admindashboard.php");
        }
        else if($row['type'] == 'moderator'){
            header("Location: moderatordashboard.php");
        }
        else{
            header("Location: userdashboard.php");
        }
        
    }
    else{
        $falsepass= true;
    }
}
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="login-area">
        <div class="container">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <div id="login-box">
                    <div id="username-box">
                        <label for="username">Username</label>
                        <br>
                        <input type="text" name="username" id="username" placeholder="Username/Email/Phone">
                    </div>
                    <div id="password-box">
                        <label for="password">Password</label>
                        <br>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <div id="forgot">
                        <p class= "danger"> 
                        <?php
                            if($falsepass==true){
                                echo "Wrong username or password";
                            }
                        ?>
                        </p>
                        <a href="">Forgot Password </a>
                    </div>
                    <div id="login-button">
                        <input type="submit" name="submit" value="Login">
                    </div>
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

