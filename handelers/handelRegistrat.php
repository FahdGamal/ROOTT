<?php

// Include database connection file and validate 
require_once '../include/config.php';
require_once '../core/validation.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Redirect the user to an appropriate error page
    header('Location:../error.php');
    exit;
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];


$errors = [];


// Validate first name
if (!requiredVali($username)) {
    $errors['username'] = "User Name is required";
} elseif (!minVali($username, 3)) {
    $errors['username'] = "User Name must be at least 3 characters long";
} elseif (!maxVali($username, 20)) {
    $errors['username'] = "User Name must be less than 10 characters long";
}


// Validate email
if (!requiredVali($email)) {
    $errors['email'] = "Email is required";
} elseif (!emailVali($email)) {
    $errors['email'] = "Please enter a valid email address";
}



// Validate password
if (!requiredVali($password)) {
    $errors['password'] = "Password is required";
} elseif (!minVali($password, 6)) {
    $errors['password'] = "Password must be at least 6 characters long";
} elseif (!maxVali($password, 20)) {
    $errors['password'] = "Password must be less than 20 characters long";
}


// Check if email already exists
$check_email_sql = "SELECT COUNT(*) FROM `user` WHERE `email` = ?";
$check_email_stmt = mysqli_prepare($conn, $check_email_sql);
mysqli_stmt_bind_param($check_email_stmt, "s", $email);
mysqli_stmt_execute($check_email_stmt);
mysqli_stmt_bind_result($check_email_stmt, $email_count);
mysqli_stmt_fetch($check_email_stmt);
mysqli_stmt_close($check_email_stmt);

if ($email_count > 0) {
    $errors[] = "Email already exists";
}

// If there are validation errors, display them
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location:../register.php');
    exit; // Make sure to exit after redirect
}

// Hash the password before storing it
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the database
$sql = "INSERT INTO `user` (`id`, `username, `email`, `password`, `admin_id`) VALUES (NULL, ?, ?, ?, ?, 1)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashed_password);


if (mysqli_stmt_execute($stmt)) {
    $_SESSION['success'] = "Registration successful";
    header('Location:../index.php');
    exit; // Make sure to exit after redirect
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close statement
mysqli_stmt_close($stmt);

// Close database connection
mysqli_close($conn);
