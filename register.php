<?php
require_once 'include/config.php';
require_once 'include/header.php';
require_once 'include/nav.php';
//require_once 'handelers/handelRegistrat.php';

?>


<div class="formLogin ">
    <div class="content rounded w-50 ">
        <h1 class="text-primary">SignUp</h1>
        <?php
    if (isset($_SESSION['errors'])) :
      foreach ($_SESSION['errors'] as $error) : ?>
        <div class="alert alert-danger text-center">
            <?php echo $error; ?>
        </div>
        <?php
      endforeach;
      unset($_SESSION['errors']);
    endif;
    ?>

        <form action="handelers/handelRegistrat.php" method="POST">
            <input id="firstname" name="firstname" type="text" class="form-control my-3 "
                placeholder="Enter your firstname" minlength="5" maxlength="10">
            <input id="lastname" name="lastname" type="text" class="form-control my-3 "
                placeholder="Enter your lastname" minlength="5" maxlength="10">
            <input id="email" name="email" type="text" class="text-danger form-control my-3"
                placeholder="Enter your email">
            <input id="password" name="password" type="text" class="text-danger form-control my-3"
                placeholder="Enter your password" minlength="5" maxlength="10">
            <button id="submit" id="Sing" class="logIn btn btn-outline-info w-100 my-3">Sing Up</button>

        </form>
        <button onclick="document.location='login.php'" class="btn btn-outline-info w-100 my-3">You Have Account !!!
            LoginHere </button>
    </div>
</div>


<?php
require_once './include/footer.php';
?>