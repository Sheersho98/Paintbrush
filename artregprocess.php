<?php
  include 'includes/connect.php';

  $email = $_POST['email'];
  $psw = $_POST['psw'];
  $psw_repeat = $_POST['psw_repeat'];
  $name = $_POST['name'];
  // $address = $_POST['address'];
  // $phone = $_POST['phone'];
  // $license = $_POST['license'];

  $sql = "INSERT INTO artist(email,password,name) VALUES ('$email','$psw','$name')";

  if($con->query($sql) === true){
    // $sql = "INSERT INTO id_email(email) VALUES ('$email')";
    // $con->query($sql);
    echo '<script type = "text/javascript">';
    echo 'alert("Registration Successful...Redirecting to Artist Login")';
    echo '</script>';

    echo '<script type = "text/javascript">';
    echo 'window.location.href = "artlogin.html"';
    echo '</script>';
  } else {
    echo "Error:". $sql . "<br>" . $con->error;
  }
  ?>
