<?php
    require "connection.php";
    session_start();

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

    function processRegistrationForm(array $data)
    {
        if (!empty($data)) {
            if (validatePassword($data['password'], $data['password_confirm'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                addNewStudent(openConnection(), $data);
                session_destroy();
            } else {
                //var_dump($_POST);
                unset($_POST['password']);
                unset($_POST['password_confirm']);
                //var_dump($_POST);

                $_SESSION = $_POST;
                //var_dump($_SESSION);

                $pwCheck = 0;
                header('Location: register.php?p1='. $pwCheck);
                exit;
            }
            //var_dump($data);
            unset($data);
        }
    }
    processRegistrationForm($_POST);

    function checkForErrors(){
        if (!empty($_GET)){
            if ($_GET['p1'] == false){
                echo "Password and password confirm do not match, please re-enter";
            }
        }
    }
