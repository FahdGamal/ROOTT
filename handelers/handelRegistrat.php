<?php

// Include database connection file
require_once '../include/config.php';

// Get form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validation
$errors = array();

// Validate name
if (empty($firstname)) {
    $errors[] = "First Name is required";
}
if (empty($lastname)) {
    $errors[] = "Last Name is required";
}
// Validate email
if (empty($email)) {
    $errors[] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

// Validate password
if (empty($password)) {
    $errors[] = "Password is required";
} elseif (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters long";
}

// If there are validation errors, display them
if (!empty($errors)) {

    $_SESSION['errors'] = $errors;
    header('Location:../register.php');
} else {
    // If validation passes, proceed to insert data into the database
    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //  insert data into the database
    $sql = "INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `admin_id`) VALUES (NULL,'$firstname','$lastname', '$email', '$hashed_password',1)";
    //var_dump($sql);
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Registration successful";
        header('Location:../index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
