<?php

// Include database connection file
require_once '../include/config.php';

// Include validation file
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
if (!requiredVali($firstname)) {
    $errors[] = "First Name is required";
    echo "<script>document.getElementById('firstname').innerHTML = 'First Name is required';</script>";
} elseif (!minVali($firstname, 3)) {
    $errors[] = "First Name must be at least 3 characters long";
    echo "<script>document.getElementById('firstname').innerHTML = 'First Name must be at least 3 characters long';</script>";
} elseif (!maxVali($firstname, 10)) {
    $errors[] = "First Name must be less than 10 characters long";
    echo "<script>document.getElementById('firstname').innerHTML = 'First Name must be less than 10 characters long';</script>";
}



// Validate last name
if (!requiredVali($lastname)) {
    $errors[] = "Last Name is required";
    echo "<script>document.getElementById('lastname-error').innerHTML = 'Last Name is required';</script>";
} elseif (!minVali($lastname, 3)) {
    $errors[] = "Last Name must be at least 3 characters long";
    echo "<script>document.getElementById('lastname-error').innerHTML = 'Last Name must be at least 3 characters long';</script>";
} elseif (!maxVali($lastname, 10)) {
    $errors[] = "Last Name must be less than 10 characters long";
    echo "<script>document.getElementById('lastname-error').innerHTML = 'Last Name must be less than 10 characters long';</script>";
}



// Validate email
if (!requiredVali($email)) {
    $errors[] = "Email is required";
    echo "<script>document.getElementById('email-error').innerHTML = 'Email is required';</script>";
} elseif (!emailVali($email)) {
    $errors[] = "Please enter a valid email address";
    echo "<script>document.getElementById('email-error').innerHTML = 'Please enter a valid email address';</script>";
}



// Validate password
if (!requiredVali($password)) {
    $errors[] = "Password is required";
    echo "<script>document.getElementById('password-error').innerHTML = 'Password is required';</script>";
} elseif (!minVali($password, 6)) {
    $errors[] = "Password must be at least 6 characters long";
    echo "<script>document.getElementById('password-error').innerHTML = 'Password must be at least 6 characters long';</script>";
} elseif (!maxVali($password, 20)) {
    $errors[] = "Password must be less than 20 characters long";
    echo "<script>document.getElementById('password-error').innerHTML = 'Password must be less than 20 characters long';</script>";
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
    echo "<script>displayError('email', 'Email already exists');</script>";
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
$sql = "INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `admin_id`) VALUES (NULL, ?, ?, ?, ?, 1)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $hashed_password);


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
?>
