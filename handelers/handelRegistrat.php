<?php
require_once '../include/config.php';
require_once '../core/validation.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location:../error.php');
    exit;
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// Validate username
if (!requiredVali($username)) {
    $errors['username'] = "Username is required";
} elseif (!minVali($username, 3)) {
    $errors['username'] = "Username must be at least 3 characters long";
} elseif (!maxVali($username, 20)) {
    $errors['username'] = "Username must be less than 20 characters long";
}

// Validate email
if (!requiredVali($email)) {
    $errors['email'] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
    $errors['email'] = "Email already exists";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location:../register.php');
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO `user` (`id`, `username`, `email`, `password`, `admin_id`) VALUES (NULL, ?, ?, ?, 1)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['success'] = "Registration successful";
    header('Location:../login.php');
    exit;
} else {
    if (mysqli_errno($conn) == 1062) {
        $_SESSION['error'] = "Email address already exists. Please use a different email address.";
        header('Location:../registration.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
