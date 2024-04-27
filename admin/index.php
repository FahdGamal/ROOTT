<?php
include_once '../include/config.php';
$sql = "SELECT `id`,`username`,`email` FROM user ";
//var_dump($sql);
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $users = [];
    while ($row = mysqli_fetch_assoc($result))
        $users[] = $row;
    // var_dump($users);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Data of User</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) :
                    // print($user["id"]);
                    // var_dump($user);
                ?>
                    <tr>
                        <td>
                            <?= $user['id']  ?>
                        </td>
                        <td>
                            <?= $user['username'] ?>
                        </td>
                        <td>
                            <?= $user['email'] ?>
                        </td>

                        <form action="delete_user.php" method="POST" style="display: inline;">
                            <input type="hidden" name="user_id" value="1">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <form action="edit_user.php" method="POST" style="display: inline;">
                            <input type="hidden" name="user_id" value="1">
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