
<html>
<head>
    <link type="text/css" href="../css/login.css" rel="stylesheet">
    <script type="text/javascript" src="../js/login.js"></script>
    <title>Login</title>
</head>
<body>

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
  <form action="registered.php" method="post">
  <div class="login">
        <h1> Registered</h1>
    <div class="form">
   <div class="item">
    <i class="fa fa-user-circle" aria-hidden="true"></i>
    <input type=text name = "username" placeholder="UserName" >
   </div>
   <div class="item">
    <i class="fa fa-key" aria-hidden="true"></i>
   <input type=text name = "password" placeholder="Password" >
   </div>
    <button value = "Registered">Registered</button>
    <a href = "http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/login.php"><button value="">Back</button></a>
       </div>
   </div>
  </form>

_END;

if (isset($_POST['username'])   &&
    isset($_POST['password']))
{
    $username   = get_post($conn, 'username');
    $password    = get_post($conn, 'password');
    $seekaccount = "SELECT * FROM `Login` WHERE username ='$username'";

    $result = $conn->query($seekaccount);
    $rowaccount = $result->num_rows;


    if($rowaccount == 1){
        echo "Username is already exist";
    }else{
        $createaccount = "INSERT INTO Login VALUES" .
            "('$username', '$password')";
        $result   = $conn->query($createaccount);
        if (!$result) echo "INSERT failed: $query<br>" .
            $conn->error . "<br><br>";
        header('location:http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/login.php');
    }

}

?>

</body>
</html>
