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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <style>
        .card {
            border: 2px solid #007bff;
            border-radius: 10px;
        }

        .card-title {
            color: #007bff;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Edit User</h2>
                        <?php if (!empty($message)) : ?>
                            <div class="alert alert-info"><?php echo $message; ?></div>
                        <?php endif; ?>
                        <form action="update_user.php" method="POST">
                            <input type="hidden" name="user_id" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($user['username']) ? $user['username'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>