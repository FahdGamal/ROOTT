<?php
// Include database connection file
include_once '../include/config.php';


// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validation
$errors = array();

// Validate email
if (empty($email)) {
    $errors[] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

// Validate password
if (empty($password)) {
    $errors[] = "Password is required";
}

// If there are validation errors, display them
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
} else {
    // If validation passes, proceed to check credentials in the database
    // SQL query to fetch user data based on email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a new session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            echo "Login successful. Welcome, " . $user['name'];
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}

// Close database connection
mysqli_close($conn);
?>
