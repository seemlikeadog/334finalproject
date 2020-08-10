<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width= device-width,initial-scale=1">
    <title>adminpage2</title>
    <link rel = "stylesheet" href = "bootstrap.min.css">
    <link rel = "stylesheet" href = "../css/dashboard.css">
    <link rel = "stylesheet" href = "../css/admaindatabase.css">
    <script type="text/javascript" src="../js/var.js"></script>
</head>
<body>


<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/admindatabase.html" aria-label="Product">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Admin</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/manageaccount.php">Manage Account</a>
        <a class="py-2 d-none d-md-inline-block" href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/managemeal.php">EveryDays Meal</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Post News</a>
    </div>
</nav>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <button class = "btn btn-warning" value="1" onclick="new1(this)"><a href ="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/adminpage1.php">Edit First New</a></button>
    <button class = "btn btn-warning" value="2" onclick="new1(this)">Edit Second New</button>
    <button class = "btn btn-warning" value="3" onclick="new1(this)"><a href ="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/adminpage3.php">Edit Third New</a></button>

</div>
<br>
<form action="adminpage2.php" method="post">
    <div class="col-md-12" id = "topic">
        <input type="text" style="width: 300px" name="head" id = "head"placeholder="head" class = "form-control">
        <br>
        <textarea cols="80" rows="10" placeholder="content" name = "content" class="form-control"></textarea>
        <input type="submit" class = "btn-warning" value="Finish Editing">
    </div>
</form>


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

<?php
require_once ('server.php');
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$new = "<script>document.writeln(new1(c))</script>";
echo $new;

if (isset($_POST['head'])   &&
    isset($_POST['content']))
{

    $head   = get_post($conn, 'head');
    $content    = get_post($conn, 'content');
    $query    = "UPDATE New SET head = '$head', content = '$content' where id = 2";
    //UPDATE `New` SET `head`="31231",`content`="3123123" WHERE id = 1
    $result   = $conn->query($query);



    if (!$result) echo "INSERT failed: $query<br>" .
        $conn->error . "<br><br>";


}

function get_post($conn, $var)
{
    $var= stripslashes($var);
    $var = strip_tags($var);
    return $conn->real_escape_string($_POST[$var]);
}
?>


</body>
</html>