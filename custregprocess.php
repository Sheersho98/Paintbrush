<?php
  include 'includes/connect.php';

  $email = $_POST['email'];
  $psw = $_POST['psw'];
  $psw_repeat = $_POST['psw_repeat'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  // $license = $_POST['license'];

  $sql = "INSERT INTO customer(email,password,name,address,phone_number) VALUES ('$email','$psw','$name','$address','$phone')";

  if($con->query($sql) === true){
    // $sql = "INSERT INTO id_email(email) VALUES ('$email')";
    // $con->query($sql);
    echo '<script type = "text/javascript">';
    echo 'alert("Registration Successful...Redirecting to Customer Login")';
    echo '</script>';

    echo '<script type = "text/javascript">';
    echo 'window.location.href = "custlogin.html"';
    echo '</script>';
  } else {
    echo "Error:". $sql . "<br>" . $con->error;
  }
  ?>
