<?php
include_once '../include/config.php';
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
                        <td><!-- يجب إضافة حقل كلمة المرور هنا --></td>
                        <td>
                            <form action="delete_user.php" method="POST" style="display: inline;">
                                <?php if (isset($_SESSION['delete_message'])) : ?>
                                    <p style="color: blue;"><?php echo $_SESSION['delete_message']; ?></p>
                                    <?php unset($_SESSION['delete_message']); ?> <!-- Clear the message after displaying it -->
                                    <?php endif; ?>
                                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <form action="./edit_us.php" method="POST" style="display: inline;">
                            <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>