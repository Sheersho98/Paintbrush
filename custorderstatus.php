<?php
  include "includes/connect.php";
  $c_id = $_SESSION['c_id'];
  $result = $con->query("SELECT* FROM order_table where a_id = '$c_id'");
  $row = $result->fetch_assoc();
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
    font-family: 'Black Ops One', cursive;
  }
  h1{
    text-align: left;
    padding-left: 190px;
    font-size: 45px;
    color: white;
    font-family: 'Nova Oval', cursive;
    margin-bottom: 25px;
  }
  #table {
  font-family: 'Nova Oval', cursive;
  border-collapse: collapse;
  width: 100%;
  }
  #table td, #table th {
  border: 1px solid #4bafb4;
  padding: 5px;
}
  #table tr:nth-child(even){background-color:#153237;}

  #table tr:hover {background-color: #1d4649;}

  #table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color:#071112;
    color: white;
  }
  a.btn{
    float: left;
    margin-left: 10px;
    border-radius: 45px;
    cursor: pointer;
    background-color:#0f2324;
    border:none;
    color:white;
    padding: 14px 32px;
    text-align: center;
    font-family: 'Finger Paint', cursive;
    text-transform: uppercase;
    display: inline-block;
    font-size: 15px;
  }
  a.btn:hover{
    background-color:#357a7e;
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
    <h1> Order History </h1>
    <div id = "content">

          <table id = "table" align= "center"  style = "width:1000px; line-height:40px;">
            <tr>
              <th> Piece Ordered </th>
              <th> Artist </th>
              <th> Quantity </th>
              <th> Total Price </th>
              <th> Payment Method </th>
              <th> Order Status </th>
            </tr>
            <?php
              if($result ->num_rows >0){


                $result_three = $con->query("SELECT* FROM order_table where c_id = '$c_id'");
                while($row_three = $result_three->fetch_assoc()){
                  $o_id = $row_three['o_id'];
                  $a_id = $row_three['a_id'];
                  $p_id = $row_three['p_id'];
                  $quantity = $row_three['quantity'];
                  $total = $row_three['total'];
                  $pay_type = $row_three['pay_type'];
                  $status = $row_three['status'];


                  $res = $con->query("SELECT name FROM artist WHERE a_id = '$a_id'");
                  $info = $res->fetch_assoc();

                  $aname = $info['name'];


                  $res_two = $con->query("SELECT title FROM product WHERE p_id = '$p_id'");
                  $info_two = $res_two->fetch_assoc();

                  $title = $info_two['title'];
                  echo "<tr>";
                  echo "<td>". $title. "</td>";
                  echo "<td>". $aname. "</td>";
                  echo "<td>". $quantity. "</td>";
                  echo "<td>". $total. "</td>";
                  echo "<td>". $pay_type. "</td>";
                  echo "<td>". $status. "</td>";
                  echo "<td><a class ='btn' href = 'custordercancel.php?o_id=".$o_id."'> Cancel Order </a></td>";
                  echo "</td>";
                }
              } else {
                echo "No orders available.";
              }
            ?>

      </table>

    </div>

  </body>
</html>
