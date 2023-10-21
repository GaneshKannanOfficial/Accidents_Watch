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
        $emailed = $_POST["emailed"];
        $pswd = $_POST["pswd"];
        // Sql query to be executed
        $sql = "SELECT * FROM `login`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            if($row['role'] == "User" && $row['password'] == $pswd && $row['userEmail'] == $emailed){
                echo "<script type='text/javascript'>location.href = 'inScreenPolice.php';</script>";    
            }else if($row['role'] == "Police" && $row['password'] == $pswd && $row['userEmail'] == $emailed){
                echo "<script type='text/javascript'>location.href = 'police.php';</script>";
            }else if($row['role'] == "Administrator" && $row['password'] == $pswd && $row['userEmail'] == $emailed){
                echo "<script type='text/javascript'>location.href = 'accidentReport.php';</script>";
            }
        }
}
?>