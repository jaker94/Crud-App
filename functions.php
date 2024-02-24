<?php

function sanitizeName($string)
{

    $sanitized_name = htmlspecialchars($string);

    return $sanitized_name;
}

function validateEmail($email)
{

    $filtered_Email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($filtered_Email) {
        return $filtered_Email;
    } else {
        return "Invalid Email";
    }
}
function validatePhone($phone)
{

    $filtered_phone = preg_replace("/[0-9]/", '', $phone);

    if (strlen($filtered_phone) == 11) {
        return $filtered_phone = preg_replace("/^1/", '', $filtered_phone);
    } else if (strlen($filtered_phone) == 10) {
        return $filtered_phone;
    } else {
        return "Invalid phone";
    }
}
