<?php

// Check Request Method
    function checkRequestMethod($method){
        if($_SERVER['REQUEST_METHOD'] == $method){
            return true;
        }
    return false;
    }

    function checkPostInput($input){
        if(isset($_POST[$input])){
            return true;
        }
        return false;
    }

    // Sanitization Inputs
    function sanitizeInput($input){
        return trim(htmlspecialchars(htmlentities($input)));
    }

    // Redirect Page
    function redirect($path){
        header("location:$path");
    }