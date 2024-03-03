<?php 

require "connect.php";

$db = connect();

$mixed_data = $db->query("SELECT employees.*, jobs.job_title FROM employees
LEFT JOIN jobs
ON employees.job_id = jobs.job_id
WHERE employees.job_id = jobs.job_id");

$data = $mixed_data->fetchALL(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Employee</th>
            <th>Job Title</th>
        </tr>
        <tbody>
        <?php foreach($data as $row) :?>
            <tr>
            <td><?= $row['first_name'] . ' ' . $row['last_name']?></td>
            <td><?= $row['job_title']?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>