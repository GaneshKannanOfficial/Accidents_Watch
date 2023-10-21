
<?php
$insert = false;
$update = false;
$delete = false;
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
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/dbmsProject/inScreenPolice.php">Back</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="loginMain.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="container" style="border-radius:50px">
<h1 style="text-align:center;color:white;padding-right:250px">ACCIDENT HISTORY</h1>
	<table>
		<thead>
        <tr>
            <th scope="col">Accident Due To</th>
            <th scope="col">Year</th>
            <th scope="col">Fine Amount</th>
            <th scope="col">Imprisonment Duration</th>
            <th scope="col">Vehicle Type</th>
            <th scope="col">Registration Number</th>
            <th scope="col">Ownership</th>
		</tr>
		</thead>
		<tbody>
        <?php
        $sql = "SELECT * FROM accidenttable inner join vehicle on accidenttable.sno=vehicle.sno ";
        $result = mysqli_query($conn, $sql);
        $sno = 0;
        while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <td>". $row['acc'] . "</td>
            <td>". $row['year'] . "</td>
            <td>". $row['fine'] . "</td>
            <td>". $row['imp'] . "</td>
            <td>". $row['vehicleType'] . "</td>
            <td>". $row['regNo'] . "</td>
            <td>". $row['ownership'] . "</td>
            </tr>";
        }
        ?> 
		</tbody>
	</table>
</div>
<div class="lt">
<table style="width:200px">
		<thead>
        <tr>
            <th scope="col">Highest Fine Paid</th>
		</tr>
		</thead>
		<tbody>
        <?php
        $sql="Select * from accidenttable order by fine desc limit 1";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>" .$row['fine']. "</td>
            </tr>";
        }

        ?> 
		</tbody>
	</table>
</div>
<div class="rt">
<table style="width:400px">
		<thead>
        <tr>
            <th scope="col" colspan='2'>Vehicle Indulged In More Accidents</th>
		</tr>
		</thead>
		<tbody>
        <?php
        $sql="Select count(*),vehicleType from vehicle group by vehicleType";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
            <td scope='row'>" .$row['vehicleType']."</td>
            <td scope='row'>" .$row['count(*)']."</td>
            </tr>";
        }
        ?> 
		</tbody>
	</table>
</div>
<div class="lb">
<table style="width:200px">
		<thead>
        <tr>
            <th scope="col">Longest Imprisonment Duration</th>
		</tr>
		</thead>
		<tbody>
        <?php
        $sql="Select * from accidenttable order by imp desc limit 1";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>" .$row['imp']. "</td>
            </tr>";
        }

        ?> 
		</tbody>
	</table>
</div>
<div class="rb">
<table style="width:200px">
		<thead>
        <tr>
            <th scope="col">Year With Highest Accidents</th>
		</tr>
		</thead>
		<tbody>
        <?php
        $sql="select count(*),year from accidenttable group by year desc limit 1";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>" .$row['year']. "</td>
            </tr>";
        }

        ?> 
		</tbody>
	</table>
</div>
<style>
    html,
body {
	height: 100%;
}

body {
	margin: 0;
	background: black;
	font-family: sans-serif;
	font-weight: 100;
}

.container {
	position: absolute;
	top: 50%;
	left: 60%;
	transform: translate(-50%, -50%);
}
.lt {
	position: fixed;
	top: 15%;
	left: 10%;
	transform: translate(-50%, -50%);
}
.rt {
	position: fixed;
	top: 16%;
	left:85%;
	transform: translate(-50%, -50%);
}
.lb {
	position: fixed;
	bottom: 0%;
	left: 10%;
	transform: translate(-50%, -50%);
}
.rb {
	position: fixed;
	bottom: 0%;
	left: 85%;
	transform: translate(-50%, -50%);
}
table {
	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
	padding: 15px;
	background-color: rgba(255,255,255,0.5);
	color: #fff;
    text-align: center;
    width:30px
}

th {
	text-align: center;
    background-color: rgba(255,255,255,0.2);
}


</style>
