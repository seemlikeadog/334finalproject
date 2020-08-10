<?php
require_once ('server.php');
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query  = "SELECT * from report";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);

$result->data_seek(0);
$row = $result->fetch_array(MYSQLI_NUM);



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width= device-width,initial-scale=1">
    <title>Pie chart</title>
    <link rel = "stylesheet" href = "bootstrap.min.css">
    <link rel = "stylesheet" href = "../css/otherspage.css">
    <script type="text/javascript" src="../js/var.js"></script>
    <script>
        function add(str){

            if(str == "add") {


                <?php

                $str = $_POST['str'];
                $addone = $row[0] + 1;
                $addsup = "UPDATE report SET yes = '$addone' where id = 1";
                $result = $conn->query($addsup);
                if (!$result) die ("Database access failed: " . $conn->error);
                ?>
            }

            if (str == "min"){


                <?php

                    $minone = $row[1]+1;
                    $addsup = "UPDATE report SET notsup = '$minone' where id = 1";
                    $result = $conn->query($addsup);
                    if (!$result) die ("Database access failed: " . $conn->error);
                ?>
            }


        }
    </script>

</head>
<body >


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
                <a class="nav-link" href="#">Daily</a>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {


        var data = google.visualization.arrayToDataTable([

            ['Task', 'Hours per Day'],
            <?php


                        echo "['".'yes'."', ".$row[0]."],";
                        echo "['".'no'."', ".$row[1]."],";

            ?>
        ]);

        var options = {
            title: ' Do you Like my project'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<center>
    <div class="container mt-5">
    <div id="piechart" style="width: 900px; height: 500px;"></div>

<form method="post" action="dataflowchart.php">

    <div class="bon">
        <button class = "btn btn-outline-success mt-5 mr-5" onclick="add(this.value)" value="add" style="width: 250px">Yes</button>
    </div>
    <div class="bon">
        <button class = "btn btn-outline-success mt-5 mr-5" onclick="add(this.value)" value="min" style="width: 250px"> <a >No</a></button>
    </div>


</form>
    </div>

</center>

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