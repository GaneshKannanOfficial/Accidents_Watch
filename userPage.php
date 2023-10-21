<?php
// INSERT INTO `usertable` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
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
    $userid = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `usertable` WHERE `userid` = $userid";
    $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['useridEdit'])){
        $userid = $_POST["useridEdit"];
        $firstname = $_POST["firstnameEdit"];
        $lastname = $_POST["lastnameEdit"];
        $dob = $_POST["dobEdit"];
        $phnum = $_POST["phnumEdit"];

        // Sql query to be executed
        $sql = "UPDATE `usertable` SET `firstname` = '$firstname' , `lastname` = '$lastname' , `dob` = '$dob' ,`phnum` = '$phnum'  WHERE `usertable`.`userid` = $userid";
        $result = mysqli_query($conn, $sql);
        if($result){
            $update = true;
        }
        else{
            echo "We could not update the record successfully";
        }
    }
    else{
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $dob = $_POST["dob"];
        $phnum = $_POST["phnum"];    

        // Sql query to be executed
        $sql = "INSERT INTO `usertable` (`firstname`, `lastname`,`dob`,`phnum`) VALUES ('$firstname', '$lastname','$dob','$phnum')";
        $result = mysqli_query($conn, $sql);


        if($result){
            $insert = true;
        }
        else{
            echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
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
                <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/dbmsProject/userPage.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="useridEdit" id="useridEdit">
                    <div class="form-group">
                        <label for="title">First Name</label>
                        <input type="text" class="form-control" id="firstnameEdit" name="firstnameEdit" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="title">Last Name</label>
                        <input type="text" class="form-control" id="lastnameEdit" name="lastnameEdit" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="desc">Date of Birth</label>
                        <input type="date" class="form-control" id="dobEdit" name="dobEdit" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="desc">Phone Number</label>
                        <input type="text" class="form-control" id="phnumEdit" name="phnumEdit" aria-describedby="emailHelp">
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
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
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
<div class="container my-4">
    <h2>WANNA MANAGE THE USER REPORT?</h2>
    <form action="/dbmsProject/userPage.php" method="POST">
        <div class="form-group">
            <label for="title"> First Name </label>
            <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="title"> Last Name </label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>

        <div class="form-group">
            <label for="desc">Date of birth</label>
            <input type="date" class="form-control" id="dob" name="dob" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="desc">Phone number</label>
            <input type="text" class="form-control" id="phnum" name="phnum" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Add User  </button>
    </form>
</div>

<div class="container my-4">


    <table class="table" id="myTable">
        <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM `usertable`";
        $result = mysqli_query($conn, $sql);
        $userid = 0;
        while($row = mysqli_fetch_assoc($result)){
            $userid = $userid + 1;
            echo "<tr>
            <th scope='row'>". $userid . "</th>
            <td>". $row['firstname'] . "</td>
            <td>". $row['lastname'] . "</td>
            <td>". $row['dob'] . "</td>
            <td>". $row['phnum'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['userid'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['userid'].">Delete</button>  </td>
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
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            tr = e.target.parentNode.parentNode;
            firstname = tr.getElementsByTagName("td")[0].innerText;
            lastname = tr.getElementsByTagName("td")[1].innerText;
            dob = tr.getElementsByTagName("td")[2].innerText;
            phnum = tr.getElementsByTagName("td")[3].innerText;
            console.log(firstname, lastname, dob,phnum);
            firstnameEdit.value = firstname;
            dobEdit.value = dob;
            phnumEdit.value = phnum;
            lastnameEdit.value = lastname;
            useridEdit.value = e.target.id;
            console.log(e.target.id)
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            userid = e.target.id.substr(1);

            if (confirm("Are you sure you want to delete this note!")) {
                console.log("yes");
                window.location = `/dbmsProject/userPage.php?delete=${userid}`;
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