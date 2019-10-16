<?php
    require "connection.php";

/*$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
}*/


    function processEmail(string $email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            //reload page with filled in fields set and pass the warning to the loaded page
        }//else do something nothing
    }

    function validatePassword(string $pass, string $pass_conf) : bool {
        if ($pass === $pass_conf){
            return true;
        }else {
            return false;
        }
    }

    function login($data){

    }