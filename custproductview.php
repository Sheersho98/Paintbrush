<?php
  include "includes/connect.php";
  $p_id = $_GET['p_id'];
  $c_id = $_SESSION['c_id'];
  $sql = "SELECT* FROM product WHERE p_id = '$p_id'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Artist Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nova+Oval&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Finger+Paint&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gorditas&display=swap" rel="stylesheet">
  <style>
  /* Style the body */
  body {

    font-family: Arial;
    color: white;
    margin: 0;
    background-color: black;
  }

  /* Header/Logo Title */
  .header {
    background-image: url("https://www.vangoghgallery.com/painting/img/blossom_header.jpg");
    padding: 60px;
    margin-left: 160px;
    text-align: left;
    background-color: #19334d;
    color: white;
    font-size: 30px;

    margin-bottom: 50px;
  }
  .sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 160px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #0e2125; /* Black */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
  opacity: 0.85;
}

/* The navigation menu links */
.sidenav a {
  font-family: 'Finger Paint', cursive;
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #2a636f;
}

/* Style page content */
.main {
  margin-left: 160px; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}





  /* Page Content */
  #content {
    margin-left: 180px;
    margin-right: 20px;
    background-color: #071113;
    overflow: auto;
    border-style: solid;
    border-width: 3px;
    border-radius: 25px;
    border-color: black;
    padding: 35px;
    /* margin: 0px; */
    font-family: 'Nova Oval', cursive;
    font-size: 25px;
    color: white;
    margin-bottom: 150px;
  }
  .header h1{
    text-align: left;
    font-family: 'Finger Paint', cursive;
    float: none;
    font-size: 65px;
    font-weight: 800;
    padding-left: 15px;
    color: white;
  }
  .header p{
    text-align: left;
    padding-left: 15px;
    color: white;
    font-family: 'Nova Oval', cursive;
  }
  h1{
    text-align: left;
    padding-left: 180px;
    font-size: 45px;
    color: white;
    font-family: 'Nova Oval', cursive;
    margin-bottom: 25px;
  }
  a.order{
    float: left;
    margin-left: 25px;
    border-radius: 35px;
    cursor: pointer;
    background-color:#153237;
    border:none;
    color:white;
    padding: 14px 32px;
    text-align: center;
    font-family: 'Finger Paint', cursive;
    text-transform: uppercase;
    display: inline-block;
    font-size: 19px;
  }
  a.order:hover{
    background-color:#23545c;
  }
  </style>
  </head>
  <body>
    <div class="header">
      <h1>Paintbrush</h1>
      <p></p>
    </div>
    <div class="sidenav">
      <a href="custhome.php">Home</a>
      <a href="custorderstatus.php">Order History</a>
      <a href="index.html">Log Out</a>
    </div>
    <h1>  </h1>

      <?php
      $title = $row['title'];
      $desc = $row['description'];
      $price = $row['price'];
       // echo $p_id;
       echo "<h1>$title</h1>";
       echo "<div id = 'content'>";

       echo "<br>";
       echo "<img src='images/".$row['img']."' alt='' style='width:100%;max-width:1000px;'>";
       echo "<br>";
       echo "<h2> Description </h2>";
       echo "<p>$desc</p>";
       echo "<br>";
       echo "<p>Price : $price Tk<p>";
       ?>
       <br>
       <a href ="custorder.php?p_id=<?php echo $p_id?>" class = "order"> Place an Order</a>
       <br>


    </div>

  </body>
</html>
