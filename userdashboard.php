<?php
session_start();
$db=mysqli_connect("localhost", "root", "", "blood_donation");
if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}
$nid=$_SESSION['nid'];
$sql="SELECT * FROM person WHERE nid='$nid'";
$result=mysqli_query($db, $sql);
$person=mysqli_fetch_assoc($result);
$name=$person['name'];
$email=$person['email'];
$phone=$person['phone'];
$sql="SELECT * FROM donor WHERE nid='$nid'";
$result=mysqli_query($db, $sql);
$donor=mysqli_fetch_assoc($result);
$blood=$donor['blood'];
$location=$donor['location'];

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
                    <li><a href=""><?php echo"Welcome "."$name"; ?></a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <section id="details">
        <div class="container">
            <div id="details-area">
                <h1>
                    Your Details
                </h1>
                <table>
                    <tr>
                        <td>Name</td>
                        <td><?php echo"$name"; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo"$email"; ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?php echo"$phone"; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo"$location"; ?></td>
                    </tr>
                    <tr>
                        <td>Blood Group</td>
                        <td><?php echo"$blood"; ?></td>
                    </tr>

                </table>
            </div>
        </div>
    </section>
    <section id ="status">
        <div class="container">
            <div id="status-box">
                <h1>
                    Update Donation Status
                </h1>
                <form action="updateinfo.php" method="post">
                    <label for="type">Are you ready to Donate Blood?</label>
                    <select name="type" id="type" required>
                        <option value="donor">Yes</option>
                        <option value="recipient">No</option>
                    </select>
                    <input type="submit" value="Update" name="donate">
                </form>
            </div>
        </div>
    </section>
    <section id="update-details">
        <div class="container">
            <div id="update-details-box">
                <h1>
                    Update Your Personal Details
                </h1>
                <form action="updateinfo.php" method="post">
                    <div class="name-box">
                        <label for="name">Name</label>
                        <input type="text" id="name"name="name" placeholder="Full Name" required>
                        <input type="submit" value="Update" name="update-name">
                    </div>
                </form>
                <form action="updateinfo.php" method="post">
                    <div class="email-box">
                        <label for="email">Email</label>
                        <input type="email" id="email"name="email" placeholder="Email" required>
                        <input type="submit" value="Update" name="update-email">
                    </div>
                </form>
                <form action="updateinfo.php" method="post">
                    <div class="phone-box">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone"name="phone" placeholder="Phone Number" required>
                        <input type="submit" value="Update" name="update-phone">
                    </div>
                </form>
                <form action="updateinfo.php" method="post">
                    <div class="blood-box">
                        <label for="blood">Blood Group</label>
                        <select name="blood" id="blood">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <input type="submit" value="Update" name="update-blood">
                        
                    </div>
                </form>
                <form action="updateinfo.php" method="post">
                    <div class="location-box">
                        <label for="district">District</label>
                        <select name="district">
                            <option value="Bagerhat">Bagerhat</option>
                            <option value="Bandarban">Bandarban</option>
                            <option value="Barguna">Barguna</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Bhola">Bhola</option>
                            <option value="Bogra">Bogra</option>
                            <option value="Brahmanbaria">Brahmanbaria</option>
                            <option value="Chandpur">Chandpur</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Chuadanga">Chuadanga</option>
                            <option value="Comilla">Comilla</option>
                            <option value="Cox'sBazar">Cox'sBazar</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Feni">Feni</option>
                            <option value="Gaibandha">Gaibandha</option>
                            <option value="Gazipur">Gazipur</option>
                            <option value="Gopalganj">Gopalganj</option>
                            <option value="Habiganj">Habiganj</option>
                            <option value="Jaipurhat">Jaipurhat</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Jessore">Jessore</option>
                            <option value="Jhalokati">Jhalokati</option>
                            <option value="Jhenaidah">Jhenaidah</option>
                            <option value="Khagrachari">Khagrachari</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Kishoreganj">Kishoreganj</option>
                            <option value="Kurigram">Kurigram</option>
                            <option value="Kushtia">Kushtia</option>
                            <option value="Lakshmipur">Lakshmipur</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Madaripur">Madaripur</option>
                            <option value="Magura">Magura</option>
                            <option value="Manikganj">Manikganj</option>
                            <option value="Maulvibazar">Maulvibazar</option>
                            <option value="Meherpur">Meherpur</option>
                            <option value="Munshiganj">Munshiganj</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Naogaon">Naogaon</option>
                            <option value="Narail">Narail</option>
                            <option value="Narayanganj">Narayanganj</option>
                            <option value="Narsingdi">Narsingdi</option>
                            <option value="Natore">Natore</option>
                            <option value="Nawabganj">Nawabganj</option>
                            <option value="Netrokona">Netrokona</option>
                            <option value="Nilphamari">Nilphamari</option>
                            <option value="Noakhali">Noakhali</option>
                            <option value="Pabna">Pabna</option>
                            <option value="Panchagarh">Panchagarh</option>
                            <option value="Patuakhali">Patuakhali</option>
                            <option value="Pirojpur">Pirojpur</option>
                            <option value="Rajbari">Rajbari</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rangamati">Rangamati</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Satkhira">Satkhira</option>
                            <option value="Shariatpur">Shariatpur</option>
                            <option value="Sherpur">Sherpur</option>
                            <option value="Sirajganj">Sirajganj</option>
                            <option value="Sunamganj">Sunamganj</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Tangail">Tangail</option>
                            <option value="Thakurgaon">Thakurgaon</option>
                        </select>
                        <input type="submit" value="Update" name="update-location">
                        
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="update-login">
        <div class="container">
            <div id="update-login-box">
                <h2>Update Login Information</h2>
                <form action="updateinfo.php" method="post">
                    <div class="username-box">
                        <label for="username">Username</label>
                        <input type="username" id="username" name="username" placeholder="Username" required>
                        <input type="submit" value="Update" name="update-username">
                    </div>
                </form>
                <form action="updateinfo.php" method="post">
                    <div class="password-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <input type="submit" value="Update" name="update-password">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="user-search">
        <div class="container">
            <div id="user-search-box">
                <h1>
                    Search for a Donor
                </h1>
                <form action="searchresults.php" method="post">
                    <label for="blood">Blood Group</label>
                    
                    <select name="blood" id="blood">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    <br>
                    <label for="district">District</label>
                    <select name="district">
                        <option value="Bagerhat">Bagerhat</option>
                        <option value="Bandarban">Bandarban</option>
                        <option value="Barguna">Barguna</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Bhola">Bhola</option>
                        <option value="Bogra">Bogra</option>
                        <option value="Brahmanbaria">Brahmanbaria</option>
                        <option value="Chandpur">Chandpur</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Chuadanga">Chuadanga</option>
                        <option value="Comilla">Comilla</option>
                        <option value="Cox'sBazar">Cox'sBazar</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Dinajpur">Dinajpur</option>
                        <option value="Faridpur">Faridpur</option>
                        <option value="Feni">Feni</option>
                        <option value="Gaibandha">Gaibandha</option>
                        <option value="Gazipur">Gazipur</option>
                        <option value="Gopalganj">Gopalganj</option>
                        <option value="Habiganj">Habiganj</option>
                        <option value="Jaipurhat">Jaipurhat</option>
                        <option value="Jamalpur">Jamalpur</option>
                        <option value="Jessore">Jessore</option>
                        <option value="Jhalokati">Jhalokati</option>
                        <option value="Jhenaidah">Jhenaidah</option>
                        <option value="Khagrachari">Khagrachari</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Kishoreganj">Kishoreganj</option>
                        <option value="Kurigram">Kurigram</option>
                        <option value="Kushtia">Kushtia</option>
                        <option value="Lakshmipur">Lakshmipur</option>
                        <option value="Lalmonirhat">Lalmonirhat</option>
                        <option value="Madaripur">Madaripur</option>
                        <option value="Magura">Magura</option>
                        <option value="Manikganj">Manikganj</option>
                        <option value="Maulvibazar">Maulvibazar</option>
                        <option value="Meherpur">Meherpur</option>
                        <option value="Munshiganj">Munshiganj</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Naogaon">Naogaon</option>
                        <option value="Narail">Narail</option>
                        <option value="Narayanganj">Narayanganj</option>
                        <option value="Narsingdi">Narsingdi</option>
                        <option value="Natore">Natore</option>
                        <option value="Nawabganj">Nawabganj</option>
                        <option value="Netrokona">Netrokona</option>
                        <option value="Nilphamari">Nilphamari</option>
                        <option value="Noakhali">Noakhali</option>
                        <option value="Pabna">Pabna</option>
                        <option value="Panchagarh">Panchagarh</option>
                        <option value="Patuakhali">Patuakhali</option>
                        <option value="Pirojpur">Pirojpur</option>
                        <option value="Rajbari">Rajbari</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Rangamati">Rangamati</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Satkhira">Satkhira</option>
                        <option value="Shariatpur">Shariatpur</option>
                        <option value="Sherpur">Sherpur</option>
                        <option value="Sirajganj">Sirajganj</option>
                        <option value="Sunamganj">Sunamganj</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Tangail">Tangail</option>
                        <option value="Thakurgaon">Thakurgaon</option>
                    </select>
                    <br>
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
    </section>
    <section id="user-delete">
        <div class="container">
            <div id="user-delete-box">
                <h1>
                    Delete Your Account
                </h1>
                <p>Are you sure you want to delete your account?</p>
                <form action="updateinfo.php" method="post">
                    <input type="submit" value="Delete" name = "delete">
                    
                </form>
            </div>
        </div>
    </section>
</body>