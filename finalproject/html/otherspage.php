<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width= device-width,initial-scale=1">
    <title>New</title>
    <link rel = "stylesheet" href = "bootstrap.min.css">
    <link rel = "stylesheet" href = "../css/homepage.css">
    <link rel = "stylesheet" href = "../css/otherspage.css">

</head>
<body onload="changepic()">


<nav class="navbar border-bottom navbar-expand-md navbar-dark bg-info mb-4 fixed-top">
    <a class="navbar-brand" href="" style="font-family: 'Brush Script MT'">APPLEK</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/homepage.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/daily.php">Daily</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>

    </div>
</nav>

<div class="container">
<div class="col-md-12" id = "topic">
    <?php
    require_once ('server.php');
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "select * from New";
    $result = $conn->query($query);

    $result->data_seek(0);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
        <h2>$row[0]</h2>
    <center><p>$row[1]</p></center>
    <p><a class="btn btn-warning" href="otherspage2.php" role="button">Go Next &raquo;</a></p>
_END;

    ?>
</div>
</div>

<nav class="navbar navbar-expand-sm navbar-dark bg-info" id = "end">

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" id = "fix-form" href="#">Contact Us         <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Copyright</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">E-mail</a>
            </li>
            <li class="nav-item dropup active">
                <a  class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropup</a>
            </li>
        </ul>
    </div>
</nav>


</body>
</html>