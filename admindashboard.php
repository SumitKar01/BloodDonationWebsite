<?php
session_start();
$db=mysqli_connect("localhost","root","","blood_donation");
if(!$db){
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT P.nid,P.name, P.phone, P.email, D.blood, D.location, U.username FROM person P JOIN donor D ON P.nid=D.nid JOIN users U ON P.nid=U.nid HAVING P.nid='".$_SESSION['nid']."'";
$result=mysqli_query($db, $sql);
$admin=mysqli_fetch_assoc($result);
$name=$admin['name'];
$email=$admin['email'];
$phone=$admin['phone'];
$blood=$admin['blood'];
$location=$admin['location'];
$username=$admin['username'];
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
                    <li><a href=""><?php echo"Welcome "."$username"; ?></li>
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
    <section id="total-blood">
        <div class="container">
            <div id="blood-box">
                <h1>Total Blood Reserved</h1>
                <table>
                    <?php
                        $sql = "SELECT blood, COUNT(blood) AS Total FROM donor D JOIN users U ON D.nid=U.nid  WHERE U.type='donor' GROUP BY blood";
                        $result = mysqli_query($db, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td>".$row['blood']."</td>";
                                echo "<td>".$row['Total']."</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
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
    <section id="update-details">
        <div class="container">
            <div id="update-details-box">
                <h1>
                    Add User Account
                </h1>
                <form action="updateinfo.php" method="post">
                    <div class="type-box">
                        <label for="type">Account Type</label>
                        <select name="type" id="type" required>
                            <option value="donor">Donor</option>
                            <option value="recipient">Recipient</option>
                            <option value="moderator">Moderator</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="name-box">
                        <label for="nid">NID No</label>
                        <input type="number" name="nid" id="nid" placeholder="NID Number" required>
                        <label for="name">Name</label>
                        <input type="text" id="name"name="name" placeholder="Full Name" required>
                        <label for="email">Email</label>
                        <input type="email" id="email"name="email" placeholder="Email" required>
                        <label for="phone">Phone</label>
                        <input type="text" id="phone"name="phone" placeholder="Phone Number" required>
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
                        <label for="username">Username</label>
                        <input type="username" id="username" name="username" placeholder="Username" required>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <label for="friend">Friend</label>
                        <input type="text" id="friend" name="friend" placeholder="Friend Name" required>
                        <label for="pet">Pet Name</label>
                        <input type="text" id="pet" name="pet" placeholder="Pet Name" required>
                        <br>
                        <input type="submit" value="ADD USER" name="adduserac">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="searchuserac">
        <div class="container">
            <div id="searchuserac-box">
                <h1>User List</h1>
                <form action="admindashboard.php" method="post">
                        <label for="searchusers">Search User</label>
                        <br>
                        <input type="text" id="searchusers" name="searchusers" placeholder="Search User">
                        <input type="submit" value="SEARCH" name="searchuserlist">
                        <input type="submit" value="CLEAR" name="clearuserlist">
                </form>
                <div id="search-userac-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Blood Group</th>
                                <th>District</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['searchuserlist'])&&!empty($_POST['searchusers'])) {
                                $sql="SELECT P.nid,P.name, P.phone, P.email, D.blood, D.location, U.username FROM person P JOIN donor D ON P.nid=D.nid JOIN users U ON P.nid=U.nid WHERE name LIKE '%".$_POST['searchusers']."%' OR email LIKE '%".$_POST['searchusers']."%' OR phone LIKE '%".$_POST['searchusers']."%' OR blood LIKE '%".$_POST['searchusers']."%' OR location LIKE '%".$_POST['searchusers']."%' OR username LIKE '%".$_POST['searchusers']."%'";
                            }
                            elseif(isset($_POST['clearuserlist'])){
                                $sql="SELECT P.nid,P.name, P.phone, P.email, D.blood, D.location, U.username FROM person P JOIN donor D ON P.nid=D.nid JOIN users U ON P.nid=U.nid ORDER BY P.name";
                            }
                            else{
                                $sql="SELECT P.nid,P.name, P.phone, P.email, D.blood, D.location, U.username FROM person P JOIN donor D ON P.nid=D.nid JOIN users U ON P.nid=U.nid ORDER BY P.name";
                            }
                            $result=mysqli_query($db,$sql);
                            if (mysqli_num_rows($result)>0) {
                                while($row=mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['phone']."</td>";
                                    echo "<td>".$row['blood']."</td>";
                                    echo "<td>".$row['location']."</td>";
                                    echo "<td>".$row['username']."</td>";
                                    echo "<td><a href='deleteuser.php?nid=".$row['nid']."'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            }
                            else{
                                echo "<tr>";
                                echo "<td colspan='7'>No Record Found</td>";
                                echo "</tr>";
                            }
                    
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section id="user-delete">
        <div class="container">
            <div id="user-delete-box">
                <h1>
                    Delete An User Account
                </h1>
                <form action="updateinfo.php" method="post">
                
                    <label for="username">Username</label>
                    <input type="username" id="username" name="username" placeholder="Username" required>
                    <br>
                    <input type="submit" value="Delete"name="deleteuser">

                </form>
            </div>
        </div>
    </section>
    <section id="feedback">
        <div class="container">
            <div id="feedback-box">
                <h1>Feedback</h1>
                <div id="feedback-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql="SELECT * FROM feedback ORDER BY ts DESC"; 
                            $result=mysqli_query($db,$sql);
                            if (mysqli_num_rows($result)>0) {
                                while($row=mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['subject']."</td>";
                                    echo "<td>".$row['msg']."</td>";
                                    echo "</tr>";
                                }
                            }
                            else{
                                echo "<tr>";
                                echo "<td colspan='4'>No Record Found</td>";
                                echo "</tr>";
                            }
                    
                            ?>
                        </tbody>
                    </table>
                </div>
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