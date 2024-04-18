<?php
require_once 'include/config.php';
require_once 'include/header.php';
require_once 'include/nav.php';
?>


<div class="formLogin ">
    <div class="content rounded w-50 ">
        <h1 class="text-primary">Login</h1>
        <?php
        if (isset($_SESSION['log_errors'])) :
            foreach ($_SESSION['log_errors'] as $error) : ?>
                <div class="alert alert-danger text-center">
                    <?php echo $error; ?>
                </div>
        <?php
            endforeach;
            unset($_SESSION['log_errors']);
        endif;
        ?>

        <form action="handelers/handellogin.php" method="POST">
            <input name="email" id="logEmail" type="text" class="form-control my-3 " placeholder="Enter your email">
            <input name="password" id="logPassword" type="text" class="text-danger form-control my-3" placeholder="Enter your password" minlength="5" maxlength="10">
            <button class="btn btn-outline-info w-100 my-3">login</button>

        </form>
        <button onclick="document.location='register.php'" class="btn btn-outline-info w-100 my-3">Create a new
            account</button>
    </div>
</div>


<?php
include_once './include/footer.php';
?>