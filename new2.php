<?php
    $servername="localhost";
    $username="root";
    $password="";
    $databaseName="project2";
    $conn= mysqli_connect($servername,$username,$password,$databaseName);
    if(!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="astyle.css">


</head>
<body>
    <div class="side-menu">
        <div class="brand-menu">
            <h1>View</h1>
        </div>
        <ul>
            <li><button type="submit" class="btn btn-primary" onclick="window.open('iframe.php')">User Details </button></li>
            <li><button type="submit" class="btn btn-primary" onclick="window.open('iframe2.php')">Domestic</button></li>
            <li><button type="submit" class="btn btn-primary" onclick="window.open('iframe3.php')">Industrial</button></li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
            <input type="text" placeholder="Search">
            <button type="submit" class="btn btn-primary"> </button>
        </div>
        <div class="user">
            <img src="search.png" alt="" style="height:40px;width: 40px;margin-left: -530px;">
            <a href="#" class="btn1">Add New</a>
            <div class="image">
                <img src="user.webp" alt="">
            </div>
        </div>
        </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>1,45,000</h1>
                        <h3>Domestic</h3>
                    </div>
                    <div class="icons">
                        <img src="domestic.png" alt="">

                    </div>
                </div>
                <div class="card-2">
                    <div class="box">
                        <h1>15,000</h1>
                        <h3>Industry</h3>
                    </div>
                    <div class="icons">
                        <img src="industry.webp" alt="">
                        
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-transactions">
                    <div class="title">
                        <h2>Registration details</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table border="2">
                    <thead>
                        <tr>
                            <th>UserID</th>
                            <th>UName</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Type of user</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php 
        $sql="Select * from register";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
            <th scope='row'>" .$row['UserID']. "</th>
            <td>". $row['UserName'] . "</td>
            <td>" .$row['Email']. "</td>
            <td>" .$row['Enter Password']. "</td>
            <td>" .$row['Type']. "</td>
            </tr>";
        }
    ?>
  </tbody>
                    </table>
                </div>
                <div class="new-users">
                    <div class="title">
                        <h2>new user</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table border="1">
                        <thead>
                        <tr>
                            <th>UID</th>
                            <th>UName</th>
                            <th>Type</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql="Select * from register order by UserId desc limit 1";
                                $result=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_assoc($result)){
                                    echo "<tr>
                                    <th scope='row'>" .$row['UserID']. "</th>
                                    <td>". $row['UserName'] . "</td>
                                    <td>" .$row['Type']. "</td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                            

                    </table>

                </div>
            </div>
        </div>
    </div>
</body>
</html>