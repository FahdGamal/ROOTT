<?php
include_once '../include/config.php';

$user = [];
$message = "";

// تحقق مما إذا كانت الطلبية POST وقد تم إرسال معرف المستخدم
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // استعلام لاسترداد معلومات المستخدم المطلوبة
    $sql_select = "SELECT * FROM user WHERE id = '$user_id'";
    $result_select = mysqli_query($conn, $sql_select);

    // التحقق مما إذا كان هناك نتيجة
    if ($result_select && mysqli_num_rows($result_select) > 0) {
        $user = mysqli_fetch_assoc($result_select);
    } else {
        $message = "User not found.";
    }
}

// تحديث المعلومات في قاعدة البيانات بناءً على البيانات المرسلة من النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $user_id = $_POST['user_id'];

    // تنفيذ استعلام لتحديث معلومات المستخدم
    $sql_update = "UPDATE user SET username = '$new_username', email = '$new_email' WHERE id = '$user_id'";
    $result_update = mysqli_query($conn, $sql_update);

    if ($result_update) {
        $message = "User information updated successfully.";
        // إعادة تحميل الصفحة لعرض رسالة التحديث بعد التحديث الناجح
        header("Refresh:0");
    } else {
        $message = "An error occurred while updating user information: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <div>
        <h2>Edit User</h2>
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="index.php" method="POST">
        <input type="hidden" name="user_id" value="<?php echo isset($user['id']) ? $user['id'] : ''; ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($user['username']) ? $user['username'] : ''; ?>"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>"><br><br>
            <button type="submit" name="submit">Save Changes</button>
        </form>
    </div>
</body>

</html>
