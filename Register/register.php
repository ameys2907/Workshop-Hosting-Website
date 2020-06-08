<?php

session_start();

$username = $phonenumber = $email = $address = $event = $msg ="";
$result = 0;  //initialize variable

$db = mysqli_connect('localhost', 'root', '', 'mydb'); // connect to the database

// Check connection
if ($db->connect_error) {
    die("Connection Failed: " . $db->connect_error);
}

if (isset($_POST['submit'])) 
{
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['name']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $event = mysqli_real_escape_string($db, $_POST['event']);

    $query = "INSERT INTO userinfo (UserName, UserPhone, UserEmail, UserAddress, UserEvent) 
              VALUES('$username', '$phonenumber', '$email', '$address', '$event' )"; 
    
    if (!mysqli_query($db,$query)) {
      die('Error: '.mysqli_error($db));
    }
    echo "1 record added";
    mysqli_close($db); 
  
}
  
?>