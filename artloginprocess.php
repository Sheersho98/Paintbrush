<?php
  include 'includes/connect.php';
  $admin = 'admin';
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = $con->query("SELECT* FROM artist WHERE email = '$email' and password = '$password'");
  // $result_two = $con->query("SELECT* FROM id_email WHERE email = '$email'");

  $row = $result->fetch_assoc();
  // $row_two = $result_two->fetch_assoc();

  $art_id = $row['a_id'];
  if($row['email'] == $email && $row['password']==$password){
    //session_start();
    $_SESSION['art_id'] = $art_id;
    echo $_SESSION['art_id'];
    header("location:arthome.php");
  } else {
    echo '<script type = "text/javascript">';
    echo 'alert("Incorrect Information. Try again.")';
    echo '</script>';

    echo '<script type = "text/javascript">';
    echo 'window.location.href = "artlogin.html"';
    echo '</script>';
  }
?>
