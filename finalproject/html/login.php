
<html lang="en">
<head>

    <link rel = "stylesheet" href = "../css/login2.css">
    <link rel = "stylesheet" href = "bootstrap.min.css">
    <script type="text/javascript" src="../js/login.js"></script>
    <script src="https://kit.fontawesome.com/69b80e9693.js" crossorigin="anonymous"></script>

    <title>Login</title>
</head>
<body style="background-color: rgb(218, 247, 166)">



<!-- <div id="demo">
    <h1>All you need to know on this project</h1>
    <button type="button" onclick="loadDoc()">Tap</button>
</div> -->

<script>
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML =
                    this.responseText;
            }
        };
        xhttp.open("GET", "ajax_info.txt", true);
        xhttp.send();
    }
</script>
<?php
require_once ('server.php');
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

function get_post($conn, $var)
{
    $var= stripslashes($var);
    $var = strip_tags($var);
    return $conn->real_escape_string($_POST[$var]);
}

echo <<<_END
<center>
<div class = "ground">
  <form action="login.php" method="post">
    <div class="container-fluid">
        <i class="fab fa-bity" style="font-size: 200px"></i>
        <div class="form">
                <div class="input-group mb-3 pt-5">
                     <div class="input-group-prepend ">
                        <span class="input-group-text" id="inputGroup-sizing-default">Username:</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name = "username" placeholder="UserName">
         </div>
                <div class="input-group mb-3 pt-5"">
                     <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Password :</span>
                </div>
                <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name = "password" placeholder="password">
         </div>
         <div class="bon">
            <button class = "btn btn-outline-success mt-5" value = "Login">Log In</button>
         </div>
         <div class="bon">
         <button class = "btn btn-outline-success mt-5" href = "http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/registered.php" value="Registered"> <a >registered</a></button>
         </div>
       </div>
    </div>
   
  </form>
  
 </div>
  
</center>
  
  

_END;

if (isset($_POST['username'])   &&
    isset($_POST['password']))
{
    $username   = get_post($conn, 'username');
    $password    = get_post($conn, 'password');

    if(($username == 'admin') && ($password == '123')){
        header('location: http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/admindatabase.html ');
    }
    $k = "SELECT * FROM `Login` WHERE username ='$username' and password ='$password'";

    $result = $conn->query($k);

    $rows = $result->num_rows;

    if($rows == 1){
        header('location: http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/homepage.php ');
    }

}

?>

</body>
</html>
