<?php

// Include database connection file
require_once '../include/config.php';

// Include validation file
require_once '../core/validation.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach($_POST as $key => $value){
        $$key = sanitizeInput($value);
    }

// Get form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = array();

// Validate name
// firstname => required , min:3 , max:10
if (!requiredVali($firstname)) {
    $errors[] = "Frist Name is required";
} elseif (!minVali($firstname, 3)) {
    $errors[] = "Frist Name Must be Greater Than 3 Chars";
} elseif (!maxVali($firstname, 10)) {
    $errors[] = "Frist Name Must be Less Than 20 Chars";
}




// lastname => required , min:3 , max:10
if (!requiredVali($lastname)) {
    $errors[] = "Last Name is required";
} elseif (!minVali($lastname, 3)) {
    $errors[] = "Last Name Must be Greater Than 3 Chars";
} elseif (!maxVali($lastname, 10)) {
    $errors[] = "Last Name Must be Less Than 20 Chars";
}




// email => required , type(email)
if (!requiredVali($email)) {
    $errors[] = "Email is required";
} elseif (!emailVali($email)) {
    $errors[] = "Please enter a valid email address";
}




// Password => required , min:3 , max:20
if (!requiredVali($password)) {
    $errors[] = "Password is required";
} elseif (!minVali($password, 6)) {
    $errors[] = "Password Must be Greater Than 6 Chars";
} elseif (!maxVali($password, 20)) {
    $errors[] = "Password Must be Less Than 20 Chars";
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



    
    // var_dump($sql);
    // exit;
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Registration successful";
        header('Location:../index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}



// Close database connection
mysqli_close($conn);
}else {
    echo "WTF";
    // redirect("../register.php");
}
