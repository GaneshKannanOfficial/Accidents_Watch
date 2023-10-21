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

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql1 = "DELETE FROM `accidenttable` WHERE `sno` = $sno";
    $sql2 = "DELETE FROM `vehicle` WHERE `sno` = $sno";
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['snoEdit'])){
        // Update the record
        $sno = $_POST["snoEdit"];
        $acc = $_POST["accEdit"];
        $year = $_POST["yearEdit"];
        $fine = $_POST["fineEdit"];
        $imp = $_POST["impEdit"];
        $vt = $_POST["vtEdit"];
        $rno = $_POST["rnoEdit"];
        $owner = $_POST["ownerEdit"];

        // Sql query to be executed
        $sql1 = "UPDATE `accidenttable` SET `acc` = '$acc' , `year` = '$year' , `fine` = '$fine',`imp` = '$imp' WHERE `accidenttable`.`sno` = $sno";
        $sql2 = "UPDATE `vehicle` SET `vehicleType` = '$vt' , `regNo` = '$rno' , `ownership` = '$owner' WHERE `vehicle`.`sno` = $sno";
        $result1 = mysqli_query($conn, $sql1);
        $result2 = mysqli_query($conn, $sql2);
    }
    else{
        $acc = $_POST["acc"];
        $year = $_POST["year"];
        $fine = $_POST["fine"];
        $imp = $_POST["imp"];
        $vt = $_POST["vt"];
        $rno = $_POST["rno"];
        $owner = $_POST["owner"];

        // Sql query to be executed


        if(!($vt=="none" && $owner=="none")){
            $sql1 = "INSERT INTO `accidenttable` (`acc`, `year`,`fine`,`imp`) VALUES ('$acc', '$year','$fine','$imp')";
            $result1 = mysqli_query($conn, $sql1);
            $sql2 = "INSERT INTO `vehicle` (`regNo`, `vehicleType`,`ownership`) VALUES ('$rno', '$vt','$owner')";
            $result2 = mysqli_query($conn, $sql2);
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


    <title>REPORT GENERATOR</title>

</head>

<body>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit this Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/dbmsProject/accidentReport.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <div class="form-group">
                        <label for="title">Accident Type</label>
                        <input type="text" class="form-control" id="accEdit" name="accEdit" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="title">Year</label>
                        <input type="text" class="form-control" id="yearEdit" name="yearEdit" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="desc">Fine Charged</label>
                        <input type="text" class="form-control" id="fineEdit" name="fineEdit" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
            <label for="desc">Imprisonment Duration</label>
            <input type="text" class="form-control" id="impEdit" name="impEdit" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="desc">Vehicle Type</label><br>
            <select name="vtEdit" id="vtEdit">
            <option value="none">none</option>
            <option value="two wheeler">two wheeler</option>
            <option value="four wheeler">four wheeler</option>
            </select>
        </div><br>
        <div class="form-group">
            <label for="desc">Registration Number</label>
            <input type="text" class="form-control" id="rnoEdit" name="rnoEdit" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="desc">Ownership</label><br>
            <select id="ownerEdit" name="ownerEdit">
            <option value="none">none</option>
            <option value="owned">owned</option>
            <option value="not owned">not owned</option>
            </select>
        </div>
                </div>
                <div class="modal-footer d-block mr-auto">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="/crud/logo.svg" height="28px" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="loginMain.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="About.html">About</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<?php
if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
}
?>
<?php
if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
}
?>
<?php
if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
}
?>
<div class="container my-4" style="box-shadow:5px 10px 18px black;border-radius:30px">
    <h2 style="text-align:center">Deputy Chief Administrator</h2>
    <form action="/dbmsProject/accidentReport.php" method="POST">
        <div class="form-group">
            <label for="title"> Cause Of Accident </label>
            <input type="text" class="form-control" id="acc" name="acc" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="title"> Year </label>
            <input type="text" class="form-control" id="year" name="year">
        </div>

        <div class="form-group">
            <label for="desc">Fine Amount</label>
            <input type="text" class="form-control" id="fine" name="fine" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="desc">Imprisonment Duration</label>
            <input type="text" class="form-control" id="imp" name="imp" aria-describedby="emailHelp">
        </div><br>
        <div class="form-group">
            <label for="desc">Vehicle Type</label><br>
            <select name="vt" id="vt">
            <option value="none">none</option>
            <option value="two wheeler">two wheeler</option>
            <option value="four wheeler">four wheeler</option>
            </select>
        </div><br>
        <div class="form-group">
            <label for="desc">Registration Number</label>
            <input type="text" class="form-control" id="rno" name="rno" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="desc">Ownership</label><br>
            <select id="owner" name="owner">
            <option value="none">none</option>
            <option value="owned">owned</option>
            <option value="not owned">not owned</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Accident</button>
         <button class="btn btn-primary" onclick="window.open('history_admin.php')">HISTORY</button><br><br>
    </form>
</div>
</div>
<div class="container my-4">
    <table class="table" id="myTable">
        <thead>
        <tr>
            <th scope="col">Accident Due To</th>
            <th scope="col">Year</th>
            <th scope="col">Fine Amount</th>
            <th scope="col">Imprisonment Duration</th>
            <th scope="col">Vehicle Type</th>
            <th scope="col">Registration Number</th>
            <th scope="col">Ownership</th>
            <th scope="col">Actions</th>
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
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
          </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<hr>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            tr = e.target.parentNode.parentNode;
            acc = tr.getElementsByTagName("td")[0].innerText;
            year = tr.getElementsByTagName("td")[1].innerText;
            fine = tr.getElementsByTagName("td")[2].innerText;
            imp = tr.getElementsByTagName("td")[3].innerText;
            vt = tr.getElementsByTagName("td")[4].innerText;
            rno = tr.getElementsByTagName("td")[5].innerText;
            owner = tr.getElementsByTagName("td")[6].innerText;
            // console.log(acc, year, fine);
            accEdit.value = acc;
            yearEdit.value = year;
            fineEdit.value = fine;
            impEdit.value = imp;
            vtEdit.value = vt;
            rnoEdit.value = rno;
            ownerEdit.value = owner;
            snoEdit.value = e.target.id;
            // console.log(e.target.id)
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            sno = e.target.id.substr(1);

            if (confirm("Are you sure you want to delete this note!")) {
                console.log("yes");
                window.location = `/dbmsProject/accidentReport.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
            }
            else {
                console.log("no");
            }
        })
    })
</script>
</body>

</html>