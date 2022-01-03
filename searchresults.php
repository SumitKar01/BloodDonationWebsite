<?php
session_start();
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
    <section id="results-table">
        <div class="container">
            <div id="results-table-box">
                <div id="results-title">
                    <h1>Search Results</h1>
                </div>
                <div id="results-table-contents">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Blood Group</th>
                            <th>District</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>
                        <?php
                            $sql="SELECT P.name, P.phone, P.email, D.blood, D.location FROM person P JOIN donor D ON P.nid=D.nid JOIN users U ON P.nid=U.nid WHERE U.type= 'donor' AND D.blood='$_POST[blood]' AND D.location = '$_POST[district]' ORDER BY P.name";
                            $result=mysqli_query($db,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['blood']."</td>";
                                    echo "<td>".$row['location']."</td>";
                                    echo "<td>".$row['phone']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "</tr>";
                                }                                                               }
                            else{
                                echo "<tr>";
                                echo "<td colspan='5'>No results found</td>";
                                echo "</tr>";
                            }
                            $sql = "SELECT COUNT(blood) FROM donor WHERE blood = '$_POST[blood]' AND location = '$_POST[district]'";
                            $result = mysqli_query($db, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo "<tr>";
                            echo "<td colspan='5'>".$row['COUNT(blood)']." Results Matched</td>";
                            echo "</tr>";

                        ?>
                    </table>
                </div>
            </div>                     
        </div>
    </section>
</body> 
</html>