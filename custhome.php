<?php
  include 'includes/connect.php';
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
  <script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
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
  }




  select{
    width: 25%;
    padding: 4px 5px;
    border: none;
    border-radius: 10px;
    font-family: 'Oswald',sans-serif;
    font-size: 20px;
    position: static;
    margin-bottom: 30px;
  }
  /* Page Content */
  .content {
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
    padding-left: 30px;
    color: white;
    font-family: 'Nova Oval', cursive;
    margin-bottom: 25px;
  }
  /*Style for the modal image(s) */

  img {
    /* float: left; */
    /* margin-left: 160px; */
    /* border-radius: 5px; */
    cursor: pointer;
    width: 100%;
    height: auto;
    max-width: 700px;
    display: block;
    margin-left: auto;
    margin-right: auto;


  }
  .column {
  float: left;
  /* width: 33.33%; */
  padding: 15px;
  position: relative;
  /* max-width: 500px; */

}
.column:hover .overlay {
  width: 100%;
}
  .row::after{
    content: "";
    clear: both;
    display: table;
  }
  .text {
  white-space: nowrap;
  color: white;
  font-size: 20px;
  position: absolute;
  overflow: hidden;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}


  /* The Modal (background) */
  .overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0,0,0,0.5);
  overflow: hidden;
  width: 0;
  height: 100%;
  transition: .5s ease;
}
#myinput{

  float:right;
  border-radius: 4px;
  font-size: 18px;
  position: relative;
  width:40%;
  padding: 6px 15px;
  margin: 8px 0;
  box-sizing: border-box;
  margin-bottom: 30px;
}

  </style>
  </head>
  <body>
    <div class="header">
      <h1>Paintbrush</h1>
      <input type="text" id="myinput" name="search" placeholder="search..."><br>
      <p></p>
    </div>
    <div class="sidenav">
      <a href="custhome.php">Home</a>
      <a href="custorderstatus.php">Order History</a>
      <a href="index.html">Log Out</a>
    </div>
    <?php

    ?>

    <div class = "content">

          <?php
            $id = $_SESSION['c_id'];
            $sql = "SELECT* FROM customer WHERE c_id = '$id'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $name = $row['name'];
            echo "<h1>Gallery</h1>";
            echo "<br";
          ?>

          <br><br>
      <div class = "row">
      <?php
        // $con = mysqli_connect("localhost", "root", "root","paintbrush");
        // $id = $_SESSION['art_id'];
        $sql = "SELECT* FROM product";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)){
          $p_id = $row['p_id'];
          $title = $row['title'];
          // $desc = $row['desc'];
          // echo "<p>$title</p>";
          // echo "<br>";
          // echo "<img id='myImg'  src='images/".$row['img']."' alt='Snow' style='width:100%;max-width:500px;'>";
          echo "<div class = 'column'>";
          echo  "<a href='custproductview.php?p_id=".$p_id."'><img src='images/".$row['img']."'id='myImg' alt='".$title."'><div class='overlay'><div class='text'>".$title."</div></div></a>";
          echo "</div>";
          // echo "<div id='myModal' class='modal'>";
          // echo "<span class='close'>&times;</span>";
          // echo "<img class='modal-content' id='img01'>";
          // echo "<div id='caption'></div>";
          // echo "</div>";
        }
       ?>

      <!-- <img id="myImg" src="hiroshima.jpg" alt="Snow" style="width:100%;max-width:300px"> -->

      <!-- The Modal -->

        <!-- <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
      </div> -->
    </div>
  </div>


    <script>
          $("#myinput").keyup(function() {
          var val = $.trim(this.value);
          if (val === "")
            $('img').show();
          else {
            $('img').hide();
            val = val.split(" ").join("\\ ");
            $("img[alt*=" + val + " i]").show();
          }
      });

    </script>


  </body>
</html>
