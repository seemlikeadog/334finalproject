<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content = "width= device-width,initial-scale=1">
    <title>HomePage</title>
    <link rel = "stylesheet" href = "bootstrap.min.css">
    <link rel = "stylesheet" href = "../css/homepage.css">

    <script type="text/javascript" src="../js/slider.js"></script>
      <script src="https://kit.fontawesome.com/69b80e9693.js" crossorigin="anonymous"></script>


  </head>
  <body onload="changepic()" style="background-color: rgb(218, 247, 166)">
  <nav class="navbar border-bottom navbar-expand-md navbar-dark bg-info mb-4 fixed-top">
    <a class="navbar-brand" href="" style="font-family: 'Brush Script MT'">APPLEK</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/daily.php">Daily</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="otherspage.php">News</a>
        </li>
          <li class="nav-item active">
              <a class="nav-link" href="dataflowchart.php">Pie Chart</a>
          </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>

    </div>
  </nav>



  <main role="main" class="container">
    <div >

      <center><img class = "mainpic" id ="pic1" src="../pic/1.png" width="100%" height="80%" ></center>

    </div>

    <div class="starter-template" >
      <a href="http://wang1my.myweb.cs.uwindsor.ca/60334/project/html/basicinform.html"><h1 >Some Basic information about our school</h1>
        <p class="lead">Like the location,tuition of shchool.<br> ............</p></a>
    </div>


      <?php
      require_once ('server.php');
      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error) die($conn->connect_error);

      $query  = "select * from New";
      $result = $conn->query($query);

      $result->data_seek(0);
      $row = $result->fetch_array(MYSQLI_NUM);

      $array2 = NULL;

      $array = explode(' ', $row[1]);
      for($temp = 0 ; $temp<50 ;$temp++){
          if($array[$temp]){
              if($temp == 49){
                  $array2[$temp] = "...";
              }else {
                  $array2[$temp] = $array[$temp];
              }
          }
      }

      $string = implode(' ', $array2);

echo <<<_END

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>$row[0]</h2>
          <p contenteditable="true">$string</p>
          <p><a class="btn btn-success" href="otherspage.php" role="button">View details &raquo;</a></p>
        </div>
_END;


      $result->data_seek(1);
      $row = $result->fetch_array(MYSQLI_NUM);

      $array2 = NULL;

      $array = explode(' ', $row[1]);
      for($temp = 0 ; $temp<50 ;$temp++){
          if($array[$temp]){
              if($temp == 49){
                  $array2[$temp] = "...";
              }else {
                  $array2[$temp] = $array[$temp];
              }
          }
      }
      $string = implode(' ', $array2);
echo <<<_END
        <div class="col-md-4">
          <h2>$row[0]</h2>
          <p contenteditable="true">$string</p>
          <p><a class="btn btn-success" href="otherspage2.php" role="button">View details &raquo;</a></p>
        </div>
_END;
      $result->data_seek(2);
      $row = $result->fetch_array(MYSQLI_NUM);

      $array2 = NULL;

      $array = explode(' ', $row[1]);
      for($temp = 0 ; $temp<50 ;$temp++){
          if($array[$temp]){
              if($temp == 49){
                  $array2[$temp] = "...";
              }else {
                  $array2[$temp] = $array[$temp];
              }
          }
      }
      $string = implode(' ', $array2);
echo <<<_END
        <div class="col-md-4">
          <h2>$row[0]</h2>
          <p contenteditable="true">$string</p>
          <p><a class="btn btn-success" href="otherspage3.php" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

    </div>
_END
          ?>

    <nav class="navbar navbar-expand-sm navbar-dark bg-info" id = "end">

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Contact Us         <span class="sr-only">(current)</span></a>
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




  </main>
  </body>
</html>
