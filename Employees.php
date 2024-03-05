<?php

require "connect.php";

$db = connect();

$employee_query = $db->query("SELECT employees.*, jobs.job_title, departments.department_name, departments.location_id FROM employees
LEFT JOIN jobs
ON employees.job_id = jobs.job_id
LEFT JOIN departments
ON employees.department_id = departments.department_id
WHERE employees.job_id = jobs.job_id
AND employees.department_id = departments.department_id");

$employees = $employee_query->fetchAll(PDO::FETCH_ASSOC);

$manager_query = $db->query("SELECT employees.first_name AS employee_first_name, 
employees.last_name AS employee_last_name, 
manager.first_name AS manager_first_name, 
manager.last_name AS manager_last_name 
FROM employees 
JOIN employees AS manager 
ON employees.manager_id = manager.employee_id");

$managers = $manager_query->fetchAll(PDO::FETCH_ASSOC);

$dependents_query = $db->query("SELECT employees.first_name AS employee_first_name,
employees.last_name AS employee_last_name,
dependents.first_name as dependents_first_name,
dependents.last_name AS dependents_last_name
FROM employees
LEFT JOIN dependents
ON employees.employee_id = dependents.employee_id");

$dependents = $dependents_query->fetchAll(PDO::FETCH_ASSOC);

$locations_query = $db->query("SELECT departments.department_id, departments.location_id, locations.city, locations.state_province, locations.country_id, countries.country_name, regions.region_name 
FROM departments 
LEFT JOIN locations ON departments.location_id = locations.location_id 
LEFT JOIN countries ON locations.country_id = countries.country_id 
LEFT JOIN regions ON countries.region_id = regions.region_id;");

$locations = $locations_query->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
</head>

<body>
    <h1 style="text-align:center;"> Employees </h1>
    <table style="width:100%;border:2px solid black;">
        <tr style="width:100%;">
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Hire Date</th>
            <th>Job Title</th>
            <th>Salary</th>
            <th>Manager</th>
            <th>Department</th>
            <th>Dependent</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Region</th>
        </tr>
        <tbody>
            <?php foreach ($employees as $employee) : ?>
                <tr style="text-align:center; border-bottom:1px solid black;">
                    <td><?= $employee['first_name'] . ' ' . $employee['last_name'] ?></td>
                    <td><?= $employee['email'] ?></td>
                    <td><?= $employee['phone_number'] ?></td>
                    <td><?= $employee['hire_date'] ?></td>
                    <td><?= $employee['job_title'] ?></td>
                    <td><?= $employee['salary'] ?></td>
                    <td><?php foreach ($managers as $manager) : ?>
                            <?php if ($manager['employee_first_name'] == $employee['first_name'] && $manager['employee_last_name'] == $employee['last_name']) : ?>
                                <?= $manager['manager_first_name'] . ' ' . $manager['manager_last_name'] ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?= $employee['department_name'] ?>
                    </td>
                    <td>
                        <?php foreach ($dependents as $dependent) : ?>
                            <?php if ($dependent['employee_first_name'] == $employee['first_name'] && $dependent['employee_last_name'] == $employee['last_name']) : ?>
                                <?= $dependent['dependents_first_name'] . ' ' . $dependent['dependents_last_name'] ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <?php foreach ($locations as $location) :?>
                        <?php if ($location['department_id'] == $employee['department_id'] && $location['location_id'] == $employee['location_id']) :?>
                            <td>
                            <?= $location['city'] ?>
                            </td>
                            <td>
                                <?= $location['state_province'] ?>
                            </td>
                            <td>
                                <?= $location['country_id'] ?>
                            </td>
                            <td>
                                <?= $location['region_name']?>
                            </td>
                            <?php endif; ?>
                            <?php endforeach;?>

                    <td></td>
                    <td></td>
                </tr>

            <?php endforeach ?>
        </tbody>

    </table>


</body>

</html>