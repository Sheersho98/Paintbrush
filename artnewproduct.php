<?php
  if(isset($_POST['upload'])){
    include 'includes/connect.php';
    //the path to store the uploaded image
    $target = "images/".basename($_FILES['image']['name']);

    //getting form data
    $image = $_FILES['image']['name'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $id = $_SESSION['art_id'];

    $sql = "INSERT INTO product(a_id,price,img,title,description) VALUES ('$id', '$price','$image','$title','$desc')";
    mysqli_query($con, $sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
      $msg = "Art Added Successfully";

      echo '<script type = "text/javascript">';
      echo 'alert("Upload Successful...Redirecting to Home")';
      echo '</script>';

      echo '<script type = "text/javascript">';
      echo 'window.location.href = "arthome.php"';
      echo '</script>';
    } else {
      $msg = "Error";

      echo '<script type = "text/javascript">';
      echo 'alert("Error...Redirecting to Home")';
      echo '</script>';

      echo '<script type = "text/javascript">';
      echo 'window.location.href = "arthome.php"';
      echo '</script>';
    }
  }
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
    background-image: url("https://www.vangoghgallery.com/img/starry_header.jpg");
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
  background-color: #091c2a; /* Black */
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
  color: #1c6197;
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
    background-color: #040e15;
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

  h1{
    text-align: left;
    padding-left: 190px;
    color: white;
    font-family: 'Nova Oval', cursive;
    margin-bottom: 25px;
    font-size: 45px;
  }
  input[type = text] {
    width:20%;
    padding: 6px 15px;
    margin: 8px 0;
    box-sizing: border-box;
    margin-bottom: 30px;
    font-family: 'Nova Oval', cursive;
    font-size: 20px;
  }
  input[type = number] {
    width:20%;
    padding: 6px 15px;
    margin: 8px 0;
    box-sizing: border-box;
    margin-bottom: 30px;
    font-family: 'Nova Oval', cursive;
    font-size: 20px;
  }
  input[type=submit]{
    float: left;
    border-radius: 35px;
    cursor: pointer;
    background-color:#081c2b;
    border:none;
    color:white;
    padding: 14px 32px;
    text-align: center;
    font-family: 'Finger Paint', cursive;
    text-transform: uppercase;
    display: inline-block;
    font-size: 19px;
  }
  input[type=submit]:hover{
    background-color:#103856;
  }
  textarea{
  width:75%;
  height:150px;
  padding:12px 20px;
  box-sizing: border-box;
  border: 2px solid #b3d9ff;
  border-radius: 4px;
}
  input[type=file]{
    float: none;
    /* border-radius: 35px; */
    cursor: pointer;
    background-color:#081c2b;
    border:none;
    color:white;
    padding: 14px 32px;
    text-align: center;
    font-family: 'Finger Paint', cursive;
    text-transform: uppercase;
    display: inline-block;
    font-size: 19px;
  }
  </style>
  </head>
  <body>
    <div class="header">
      <h1>Paintbrush</h1>
      <p></p>
    </div>
    <div class="sidenav">
      <a href="arthome.php">Profile</a>
      <a href="#">Orders</a>
      <a href="artnewproduct.php">Add Product</a>
      <a href="index.html">Log Out</a>
    </div>
    <h1> Add new Art </h1>
    <div id = "content">
      <form method = "post" action = "artnewproduct.php" enctype="multipart/form-data">
        <input type = "hidden" name = "size" value = "1000000">
        <div>
          <p> Choose File </p>
          <input type = "file" name = "image">
        </div>
        <div>
          <p> Set a Title for your Art </p>
          <input type = "text" name = "title" placeholder="Add a Title" required>
        </div>
        <div>
          <p> Add Description </p>
          <textarea name = "desc" cols = "50" row = "5" placeholder="Add a Description"></textarea>
        </div>
        <div>
          <p> Set a Price </p>
          <input type = "number" name = "price" placeholder="Add a Price in $" required>
        </div>
        <div>
          <input type="submit" name = "upload" value = "Upload Image">
        </div>
      </form>
    </div>

  </body>
</html>
