<?php
require_once 'include/config.php';
require_once 'include/header.php';
require_once 'include/nav.php';

?>


<div class="formLogin ">
    <div class="content rounded w-50 ">
        <h1 class="text-primary">SignUp</h1>

        <form action="handelers/handelRegistrat.php" method="POST">
            
            <input id="username" name="username" type="text" class="form-control my-3 " placeholder="Enter Your UserName" minlength="3" maxlength="10">
            <?php
            if (isset($_SESSION['errors']['username'])) :
            ?>
                <span class="text-danger"><?php echo $_SESSION['errors']['username']; ?></span>
            <?php
                unset($_SESSION['errors']['username']);
            endif;
            ?>
            <input id="email" name="email" type="email" class="form-control my-3" placeholder="Enter Your Email">
            <?php
            if (isset($_SESSION['errors']['email'])) :
            ?>
                <span class="text-danger"><?php echo $_SESSION['errors']['email']; ?></span>
            <?php
                unset($_SESSION['errors']['email']);
            endif;
            ?>
            <input id="password" name="password" type="password" class="form-control my-3" placeholder="Enter Your Password" minlength="6" maxlength="10">
            <?php
            if (isset($_SESSION['errors']['password'])) :
            ?>
                <span class="text-danger"><?php echo $_SESSION['errors']['password']; ?></span>
            <?php
                unset($_SESSION['errors']['password']);
            endif;
            ?>
            <button id="submit" id="Sing" class="logIn btn btn-outline-info w-100 my-3">Sing Up</button>

        </form>
        <button onclick="document.location='login.php'" class="btn btn-outline-info w-100 my-3">You Have Account !!!
            LoginHere </button>
    </div>
</div>


<?php
require_once './include/footer.php';
?>