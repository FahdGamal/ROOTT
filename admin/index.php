<?php
include_once '../include/config.php';

$user = [];
$message = "";

// Check if the request method is POST and user_id is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Query to retrieve user information
    $sql_select = "SELECT * FROM user WHERE id = '$user_id'";
    $result_select = mysqli_query($conn, $sql_select);

    // Check if there is a result
    if ($result_select && mysqli_num_rows($result_select) > 0) {
        $user = mysqli_fetch_assoc($result_select);
    } else {
        $message = "User not found.";
    }
}

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
        header("Refresh:0");
    } else {
        $message = "An error occurred while updating user information: " . mysqli_error($conn);
    }
}

// Query to retrieve all users
$sql = "SELECT `id`,`username`,`email` FROM user ";
$result = mysqli_query($conn, $sql);

$users = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Data of Users</h1>
        <!-- Display message -->
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <!-- Edit form -->
                            <form action="edit_user.php" method="POST" style="display: inline;">
                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                            <!-- Delete form -->
                            <form action="delete_user.php" method="POST" style="display: inline;">
                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
