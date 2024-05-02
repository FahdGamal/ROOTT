<?php
include_once '../include/config.php';

// Update user information in the database based on form data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $user_id = $_POST['user_id'];

    // Execute query to update user information
    $sql_update = "UPDATE user SET username = '$new_username', email = '$new_email' WHERE id = '$user_id'";
    $result_update = mysqli_query($conn, $sql_update);

    // Check if the update was successful
    if ($result_update) {
        $message = "User information updated successfully.";
        // Reload the page to display the update message after successful update
        $_SESSION['edit_message'] = $message;
        header("Location: index.php");
    } else {
        $message = "An error occurred while updating user information: " . mysqli_error($conn);
    }
}
