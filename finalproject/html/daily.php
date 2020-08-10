<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width= device-width,initial-scale=1">
    <title>Daily</title>
    <link rel = "stylesheet" href = "bootstrap.min.css">
    <link rel = "stylesheet" href = "../css/otherspage.css">

    <script type="text/javascript" src="../js/checkboxes.js"></script>

    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

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
                <a class="nav-link" href="otherspage.php">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>

    </div>
</nav>



<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h2>What To Eat </h2>
        <?php
        require_once ('server.php');
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        if (isset($_POST['delete']) && isset($_POST['Dinner']))
        {
            $Dinner   = get_post($conn, 'Dinner');
            $query  = "DELETE FROM meal WHERE Dinner='$Dinner'";
            $result = $conn->query($query);
            if (!$result) echo "DELETE failed: $query<br>" .
                $conn->error . "<br><br>";
        }


        if (isset($_POST['Breakfast'])   &&
            isset($_POST['Lunch'])    &&
            isset($_POST['Dinner']))
        {
            $Breakfast   = get_post($conn, 'Breakfast');
            $Lunch    = get_post($conn, 'Lunch');
            $Dinner = get_post($conn, 'Dinner');
            $query    = "INSERT INTO meal VALUES" .
                "('$Breakfast', '$Lunch', '$Dinner', CURRENT_DATE())";
            $result   = $conn->query($query);

            if (!$result) echo "INSERT failed: $query<br>" .
                $conn->error . "<br><br>";
        }

        if(isset($_POST['cb'])){

            foreach($_POST['cb'] as $deletenumb){
                $query  = "DELETE FROM meal WHERE Dinner='$deletenumb'";
                $result = $conn->query($query);
            }
        }



        $query  = "select * from meal";
        $result = $conn->query($query);
        if (!$result) die ("Database access failed: " . $conn->error);

        $rows = $result->num_rows;
        echo <<<_END

   <form action="managemeal.php" method="post">

    <table id="customers">
    <tr>

  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="password value="$row[2]">
        <th>Breakfast</th>
        <th>Lunch</th>
        <th>Dinner</th>
        <th>DATE</th>
        <td><input name = "number" type = "checkbox" onclick = "check_all(this)" value=""></td>
    </tr>

_END;



        for ($j = 0 ; $j < $rows ; ++$j)
        {
            $result->data_seek($j);
            $row = $result->fetch_array(MYSQLI_NUM);

            echo <<<_END

      <tr>
       <td>$row[0]</td>
       <td>$row[1]</td>
       <td>$row[2]</td>
       <td>$row[3]</td>
       <td><input type = "checkbox" name = "cb[]"  value = "$row[2]"></td>
      </tr>



_END;



        }
        echo <<<_END
      </table>
      </form>
_END;

        $result->close();
        $conn->close();

        function get_post($conn, $var)
        {
            $var= stripslashes($var);
            $var = strip_tags($var);
            return $conn->real_escape_string($_POST[$var]);
        }
        ?>


    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
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