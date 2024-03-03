<?php
include "functions.php";
require "connect.php";

$db = connect();

// if ($_SERVER['REQUEST_METHOD'] === 'POST'){
//   $unprep_first_name = $_POST['first_name'];
//   $unprep_last_name = $_POST['last_name'];
//   $unprep_email = $_POST['email'];
//   $unprep_phone = $_POST['phone'];

//  $first_name = sanitizeName($unprep_first_name);
//  $last_name = sanitizeName($unprep_last_name);
//  $email = validateEmail($unprep_email);
//  $phone = validatePhone($unprep_phone);


// $addUser = $db->prepare("INSERT INTO users (first_name, last_name, email, phone) VALUES (:first_name, :last_name, :email, :phone)");

// $addUser->execute([':first_name' => $first_name, ':last_name' => $last_name, ':email' => $email, ':phone' => $phone]);
// } else {

// }



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud App</title>
</head>

<body>
  <div style="width:1880px; display:flex; flex-direction:column; justify-content:space-around;align-items:center; height:100vh">
    <div>
      <a href="employees.php">
      <button style="height: 100px; width: 200px; border-radius: 30px;">Current Employees</button>
</a>
<a href="addEmployee.php">
      <button style="height: 100px; width: 200px; border-radius: 30px;">Add Employee</button>
    </div>
</a>
    <div>
      <a href="mixedData.php">
      <button style="height: 100px; width: 200px; border-radius: 30px;">Mixed Data</button>
</a>
      <button style="height: 100px; width: 200px; border-radius: 30px;">Employees</button>
    </div>
  </div>
</body>

</html>