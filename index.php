<?php 
include "functions.php";
require "connect.php";

$db = connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $unprep_first_name = $_POST['first_name'];
  $unprep_last_name = $_POST['last_name'];
  $unprep_email = $_POST['email'];
  $unprep_phone = $_POST['phone'];

 $first_name = sanitizeName($unprep_first_name);
 $last_name = sanitizeName($unprep_last_name);
 $email = validateEmail($unprep_email);
 $phone = validatePhone($unprep_phone);

 
$addUser = $db->prepare("INSERT INTO users (first_name, last_name, email, phone) VALUES (:first_name, :last_name, :email, :phone)");

$addUser->execute([':first_name' => $first_name, ':last_name' => $last_name, ':email' => $email, ':phone' => $phone]);
} else {

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud App</title>
</head>

<body style>

  <form style="width:400px;" method = "POST">
    <div style="display:flex; flex-direction:column; gap:30px;">
      <div style="display:flex; gap:30px;">
        <div style="display:flex; flex-direction:column;">
          <label>First name</label>
          <input type="text" name="first_name" placeholder="Enter your first name here" />
        </div>

        <div style="display:flex; flex-direction:column;">
          <label>Last Name</label>
          <input type="text" name="last_name" placeholder="Enter your last name here" />
        </div>
      </div>
      <div style="display:flex; gap:30px;">
        <div style="display:flex; flex-direction:column;">
          <label>Email</label>
          <input type="text" name="email" placeholder="Enter your email here" />
        </div>

        <div style="display:flex; flex-direction:column;">
          <label>Phone</label>
          <input type="text" name="phone" placeholder="Enter your phone number here" />
        </div>
      </div>
    </div>
    <input type="submit" value="Submit">
    </form>

</body>

</html>