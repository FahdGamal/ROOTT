<?php
require_once '../include/config.php';
$succMsg = NULL;
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `admin` (name,email,password) Values(:names,:emailid,:password)";
    $query = $dbconnection->prepare($sql);
    $query->bindParam(':names', $name, PDO::PARAM_STR);
    $query->bindParam(':emailid', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $contactno, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbconnection->lastInsertId();
    if ($lastInsertId > 0) {
        echo "<script>alert('Data insert Successfully');</script>";
        echo "<script>window.location.href='fetch.php'</script>";
    } else {

        echo "Data not insert successfully";
    }
}
