<?php
require_once './include/header.php';
require_once './include/nav.php';
require_once './handelers/handelRegistrat.php';

?>


  <div class="formLogin ">
    <div class="content rounded w-50 ">
      <h1 class="text-primary">SignUp</h1>
      <?php
      if(isset($_SESSION['errors'])):
                    foreach($_SESSION['errors'] as $error): ?> 
                        <div class="alert alert-danger text-center">
                            <?php echo $error; ?>
                        </div>
                <?php 
                    endforeach;
                    unset($_SESSION['errors']);
                    endif;
                ?>

      <form action="index.php"  method="POST">
        <input required id="username" name = "name" type="text" class="form-control my-3 " placeholder="Enter your user name" minlength="5" maxlength="10">
        <input required id="email" name = "email" type="text" class="text-danger form-control my-3" placeholder="Enter your email">
        <input required id="password" name ="password" type="text" class="text-danger form-control my-3" placeholder="Enter your password" minlength="5" maxlength="10">
        <button required id="submit" id="Sing" class="logIn btn btn-outline-info w-100 my-3">Sing Up</button>
      </form>
    </div>
  </div>


<?php
require_once './include/footer.php';
?>