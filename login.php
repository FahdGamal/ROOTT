<?php
require_once 'include/config.php';
require_once 'include/header.php';
require_once 'include/nav.php';
?>


<div class="formLogin ">
    <div class="content rounded w-50 ">
        <h1 class="text-primary">Login</h1>


        <form action="handelers/handellogin.php" method="POST">
            <?php
            if (isset($_SESSION['errors']['user'])) :
            ?>
            <span class="text-danger"><?php echo $_SESSION['errors']['user']; ?></span>
            <?php
                unset($_SESSION['errors']['user']);
            endif;
            ?>
            <input id="email" name="email" type="text" class="form-control my-3" placeholder="Enter your email">
            <?php
            if (isset($_SESSION['errors']['email'])) :
            ?>
            <span class="text-danger"><?php echo $_SESSION['errors']['email']; ?></span>
            <?php
                unset($_SESSION['errors']['email']);
            endif;
            ?>
            <input id="password" name="password" type="text" class="form-control my-3" placeholder="Enter your password"
                minlength="6" maxlength="10">
            <?php
            if (isset($_SESSION['errors']['password'])) :
            ?>
            <span class="text-danger"><?php echo $_SESSION['errors']['password']; ?></span>
            <?php
                unset($_SESSION['errors']['password']);
            endif;
            ?><button class="btn btn-outline-info w-100 my-3">login</button>

        </form>
        <button onclick="document.location='register.php'" class="btn btn-outline-info w-100 my-3">Create a new
            account</button>
    </div>
</div>


<?php
include_once './include/footer.php';
?>