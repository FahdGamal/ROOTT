<?php
include_once '../include/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Execute query to delete user
    $sql_delete = "DELETE FROM user WHERE id = '$user_id'";
    $result_delete = mysqli_query($conn, $sql_delete);

    if ($result_delete) {
        $_SESSION['delete_message'] = "User deleted successfully.";
        // Redirect the user back to the index page after deleting the user
        header('Location: index.php');
        exit(); // Make sure to exit after redirection
    } else {
        $_SESSION['delete_message'] = "An error occurred while attempting to delete the user: " . mysqli_error($conn);
        // Redirect the user back to the index page
        header('Location: index.php');
        exit(); // Make sure to exit after redirection
    }
} else {
    $_SESSION['delete_message'] = "Invalid request.";
    // Redirect the user back to the index page
    header('Location: index.php');
    exit(); // Make sure to exit after redirection
}
?>
