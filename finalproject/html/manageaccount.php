<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <meta name = "viewport" content = "width= device-width,initial-scale=1">
    <title>Manageaccount</title>
    <link rel = "stylesheet" href = "bootstrap.min.css">
    <link rel = "stylesheet" href = "../css/dashboard.css">
    <link rel = "stylesheet" href = "../css/admaindatabase.css">
    <link rel = "stylesheet" href = "../css/table.css">

    <link href="../css/table.css" rel="stylesheet" type="text/css">
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


<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/admindatabase.html" aria-label="Product">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Admin</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/manageaccount.php">Manage Account</a>
        <a class="py-2 d-none d-md-inline-block" href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/managemeal.php">EveryDays Meal</a>
        <a class="py-2 d-none d-md-inline-block" href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/editnews.html">Post News</a>
    </div>
</nav>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <?php
        require_once ('server.php');
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        if (isset($_POST['delete']) && isset($_POST['password']))
        {
            $password   = get_post($conn, 'password');
            $query  = "DELETE FROM Login WHERE password='$password'";
            $result = $conn->query($query);
            if (!$result) echo "DELETE failed: $query<br>" .
                $conn->error . "<br><br>";
        }



        if(isset($_POST['cb'])){

            foreach($_POST['cb'] as $deletenumb){
                $query  = "DELETE FROM Login WHERE password='$deletenumb'";
                $result = $conn->query($query);
            }
        }



        $query  = "select * from Login";
        $result = $conn->query($query);
        if (!$result) die ("Database access failed: " . $conn->error);

        $rows = $result->num_rows;
        echo <<<_END

   <form action="manageaccount.php" method="post">

    <table id = "customers">
    <tr>

  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="password value="$row[1]">
  <input type="submit"  value="DELETE"></form>
        <th>Username</th>
        <th>Password</th>
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
       <td><input type = "checkbox" name = "cb[]"  value = "$row[1]"></td>
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




<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
        </div>
        <div class="col-6 col-md">
            <h5>About</h5>

            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>About</h5>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>About</h5>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>About</h5>

        </div>
    </div>
</footer>


</body>
</html>