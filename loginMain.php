<?php
// INSERT INTO `accidenttable` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());

// Connect to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "project2";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email2 = $_POST["email2"];
        $pswd1 = $_POST["pswd1"];
        $role=$_POST["role"];
        $bool1=true;
        $sql2 = "SELECT * FROM `login`";
        $result2=mysqli_query($conn, $sql2);
        while($row = mysqli_fetch_assoc($result2)){
            if($row['userEmail'] == $email2){
                $bool1=false;
                break;
            }
        }
        if($bool1==true){
            $sql = "INSERT INTO `login` (`userEmail`, `password`,`role`) VALUES ('$email2', '$pswd1','$role')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $insert = true;
            }
        
        }else{
            echo "<script type='text/javascript'>alert('User Already Exists');</script>";
        }
        
}
?>

<html>
    <head>
        <title>Road Accident Report</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <link rel="stylesheet" href="../fonts/WaterBrush-Regular.ttf">
        <script>
        </script>
    </head>
<link rel="stylesheet" href="css with preloader.css">
<meta charset="UTF-8">
<body onload="myfunc()"  onsubmit="validation1()">
<div style="background-color: black;text-align:center;color:white"><span style="font-size:50px;text-shadow:8px 10px 7px red">Road Accidents due to alcohol and drugs</span></div>
    <div id="loading"></div>
    <div class="bdy">
        <div class="main">
        
            <input type="checkbox" id="chk" aria-hidden="true">
                <div class="signup"> 
                    <form action="/dbmsProject/loginMain.php" method="POST">
                        <label for="chk" aria-hidden="true">
                            Sign up
                        </label>
                        <input type="email" id="email2" name="email2" placeholder="Email">
                        <input type="password" id="pswd1" name="pswd1" placeholder="Set Password">
                        <!-- <input type="" id="pswd2" placeholder="Confirm Password"> -->
                        <select name="role" id="role" style="">
                            <option value="" style="color: gray;">Select your option</option>
                            <option value="User">User</option>
                            <option value="Police">Police</option>
                            <option value="Administrator">Administrator</option>
                        </select>
                        <input class="btn" id="signupbtn" type="submit" value="Sign Up" style="padding-bottom:40px" >
                        <!-- <a style="margin: auto ;padding-left: 100px;"  href="htmlop..html">Click here for more signup options.</a> -->
                    </form>
                </div>
                <div class="login"> 
                    <form action="/dbmsProject/logcheck.php" method="POST">
                        <label for="chk" aria-hidden="true" style="color: rgb(147, 91, 106);">
                            Login
                        </label> 
                        <input type="email" id="emailed" name="emailed" placeholder="Email" required>
                        <input type="password" id="pswd" name="pswd" placeholder="Password" required>
                        <button class="btn" id="loginbtn">Login</button>
                        
                    </form> 
                   
                </div>
        </div>
    </div>
    <!-- <iframe style="display: none;" width="560" height="315" src="https://www.youtube.com/embed/Yf5d_Zx3AaI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

    <br/>
    <script>
            
        var pre = document.getElementById('loading');
        function myfunc(){
            pre.style.display= 'none';
        }
    
    </script>
</body>
    <footer style="background-color: white;height: 150px;padding: 20px" >
        <div style="text-align: center">
            Copyright &copy; 2022
        </div>
        <div style="text-align: center;font-family: 'BankGothic Md BT';font-weight: bold;">
            Made by the group of 5 with &hearts;!
        </div>

    </footer>

</html>