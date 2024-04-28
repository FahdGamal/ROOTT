<?php
require_once('./include/config.php');
if (strlen($_SESSION['user_id']) == 0) {
    header('location:logout.php');
} else {
    require_once('./include/nav.php');
    require_once('./include/header.php');
?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <?php
                    $userid = $_SESSION['user_id'];
                    $query = mysqli_query($conn, "select * from user where id='$userid'");
                    while ($result = mysqli_fetch_array($query)) { ?>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="btn btn-sm btn-outline-primary mr-2" ><?php echo $result['username']; ?>  Profile</h5>
                            <div>
                                <!-- <a href="edit-profile.php" class="btn btn-sm btn-outline-primary mr-2">Edit Profile</a> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th>User Name</th>
                                        <td><?php echo $result['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td colspan="3"><?php echo $result['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td colspan="3">******** </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Additional content if needed -->
            </div>
        </div>
    </div>

<?php
    require_once('./include/footer.php');
}
?>