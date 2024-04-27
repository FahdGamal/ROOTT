<?php
// Include database connection file
include_once '../include/config.php';

// Post form data
$email = $_POST['email'];
$password = $_POST['password'];


// Validation
$errors = array();

// Validate email
if (empty($email)) {
    $errors['email'] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
}

// Validate password
if (empty($password)) {
    $errors['password'] = "Password is required";
}

// If there are validation errors, display them
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location:../login.php');
} else {
    // If validation passes, proceed to check credentials in the database
    // SQL query to fetch user data based on email
    $sql = "SELECT * FROM user WHERE email = '$email'";
    //var_dump($sql);
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a new session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
            echo "Login successful. Welcome, " . $user['first_name'] . ' ' . $user['last_name'];
            header('Location:../index.php');
        } else {

            $errors['password'] = "Incorrect password";
            $_SESSION['errors'] = $errors;
            header('Location:../login.php');
        }
    } else {
        $errors['user'] = "User not fount";
        $_SESSION['errors'] = $errors;
        header('Location:../login.php');
    }
}

// Close database connection
mysqli_close($conn);
