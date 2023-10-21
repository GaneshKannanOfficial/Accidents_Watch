<!-- index.html -->
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Navigation Buttons</title>
  <style>
    .signupbtn{
        margin: 10px auto;
        justify-content: center;
        display: block;
        color: linear-gradient(90deg, rgb(0, 0, 0) 33%, rgb(245, 249, 249) 67%);
        background: linear-gradient(90deg, rgb(255, 255, 255) 33%, rgb(53, 54, 54) 67%);
        background-size: 300%;
        font-size: 1em;
        font-weight: bold;
        margin-top: 20px;
        outline: none;
        border: none;
        border-radius:5px;
        transition: .2s ease-in;
        cursor: pointer;
        background-position: left;
        transition: background-position 1s;
        box-shadow: 5px 5px 5px #000;
    }
    .signupbtn:hover{
        color: #e0dede;
        background-position: right;
    }
  </style>
</head>
<body style="background: rgb(233, 218, 193);padding: right 60px">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="/crud/logo.svg" height="28px" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/dbmsProject/accidentReport.php">Back</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="loginMain.php" target="_blank">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="About.html">Contact Us</a>
                </li>
    
            </ul>
        </div>
    </nav>
    
  <h1 style="background: rgb(85, 186, 185);text-align:center">Road Accidents due to alcohol and drugs</h1>
  
    <table style="margin-left:auto;margin-right:auto">
        <tr>
            <td>
                <img style="margin-left:50px;margin-top:170px" height="100" src="search.png">
                        
                
                
            </td>
            <td style="width: 100px;">

            </td>
            <td>
                <img style="margin-left:40px;margin-top:170px" height="100" src="transparency.png">
                        
                
            </td>
            <td style="width: 100px;"></td>
        </tr>
        <tr>
            
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            <!-- <img style="margin-left:20px;" height="100" src="user/pics/userRl.png"> -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button style="padding: 50px;" class="signupbtn" onclick="location.href='search.php'">SEARCH</button>
                        </td>
                    </tr>
                </table>
                
                
            </td>
            <td style="width: 100px;">

            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <!-- <img style="margin-left:20px;" height="100" src="user/pics/police.png"> -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button style="padding: 50px;" class="signupbtn" onclick="location.href='history.php'">VIEW   </button>
                        </td>
                    </tr>
                </table>
                
            </td>
            <td style="width: 100px;"></td>
        </tr>
    </table>
  
</body>
</html>