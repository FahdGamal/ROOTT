<?php

function requiredVali($input)
{
    if (empty($input)) {
        return false;
    } else {
        return true;
    }
}

function minVali($input, $length)
{
    if (strlen($input) < $length) {
        return false;
    } else {
        return true;
    }
}

function maxVali($input, $length)
{
    if (strlen($input) > $length) {
        return false;
    } else {
        return true;
    }
}

function emailVali($input)
{
    if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}




// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $website = test_input($_POST["website"]);
    $comment = test_input($_POST["comment"]);
    $gender = test_input($_POST["gender"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
