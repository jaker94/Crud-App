<?php 
require "connect.php";

$db = connect();

$addEmployeeSTMT = $db->prepare('INSERT INTO employees 
(first_name, 
last_name, email, 
phone_number, hire_date, 
job_id, salary, manager_id, 
department_id) VALUES 
(:first_name, 
:last_name, 
:email, 
:phone_number, 
:hire_date, 
:job_id, 
:salary, 
:manager_id, 
:department_id)');

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email =  $_POST['email'];
        $phone_number =  $_POST['phone_number'];
        $hire_date =  $_POST['hire_date'];
        $job_id =  $_POST['job_id'];
        $salary =  $_POST['salary'];
        $manager_id =  $_POST['manager_id'];
        $department_id =  $_POST['department_id'];

        $addEmployeeSTMT->execute([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone_number' => $phone_number,
            'hire_date' => $hire_date,
            'job_id' => $job_id,
            'salary' => $salary,
            'manager_id' => $manager_id,
            'department_id' => $department_id]);
        

    } else {

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
          <input type="text" name="phone_number" placeholder="Enter your phone number here" />
        </div>
      </div>
      <div style="display:flex; gap:30px;">
        <div style="display:flex; flex-direction:column;">
          <label>Hire Date</label>
          <input type="text" name="hire_date" placeholder="Enter your date here" />
        </div>

        <div style="display:flex; flex-direction:column;">
          <label>Job ID</label>
          <input type="text" name="job_id" placeholder="Enter the Job ID here" />
        </div>
      </div>
      <div style="display:flex; gap:30px;">
        <div style="display:flex; flex-direction:column;">
          <label>Salary</label>
          <input type="text" name="salary" placeholder="Enter salary here" />
        </div>

        <div style="display:flex; flex-direction:column;">
          <label>Manager ID</label>
          <input type="text" name="manager_id" placeholder="Enter manager id" />
        </div>
        <div style="display:flex; flex-direction:column;">
          <label>Department ID</label>
          <input type="text" name="department_id" placeholder="Enter department id" />
        </div>
      </div>
    </div>
    <input type="submit" value="Submit">
    </form>
</body>
</html>