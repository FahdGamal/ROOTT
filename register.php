<?php
require_once 'include/config.php';
require_once 'include/header.php';
require_once 'include/nav.php';
?>

<div class="formLogin ">
    <div class="content rounded w-50 ">
        <h1 class="text-primary">SignUp</h1>
        <form action="handelers/handelRegistrat.php" method="POST">
            <input id="firstname" name="firstname" type="text" class="form-control my-3 " placeholder="Enter your firstname" minlength="3" maxlength="10">
            <span id="firstname-error" class="text-danger"></span>
            
            <input id="lastname" name="lastname" type="text" class="form-control my-3 " placeholder="Enter your lastname" minlength="3" maxlength="10">
            <span id="lastname-error" class="text-danger"></span>
            
            <input id="email" name="email" type="text" class="text-danger form-control my-3" placeholder="Enter your email">
            <span id="email-error" class="text-danger"></span>
            
            <input id="password" name="password" type="text" class="text-danger form-control my-3" placeholder="Enter your password" minlength="6" maxlength="10">
            <span id="password-error" class="text-danger"></span>
            
            <button id="submit" id="Sing" class="logIn btn btn-outline-info w-100 my-3">Sing Up</button>
        </form>
        <button onclick="document.location='login.php'" class="btn btn-outline-info w-100 my-3">You Have Account !!!
            LoginHere </button>
    </div>
</div>

<script>
    // Function to display error messages under each field
    function displayError(fieldId, errorMessage) {
        document.getElementById(fieldId + "-error").innerText = errorMessage;
    }
</script>

<?php
require_once './include/footer.php';
?>
