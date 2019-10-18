<?php
    require "connection.php";
    session_start();

/*$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
}*/

//CHECK WHAT PAGE THE POST WAS SENT FROM AND TAKE ACTION ACCORDINGLY
if (!empty($_POST['register'])) {
    processRegistrationForm(openConnection(), $_POST);
} elseif (!empty($_POST['login'])){
    login(openConnection(), $_POST);
}


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

    function processRegistrationForm(PDO $pdo, array $data) : void{
        if (!empty($data)) {
            if (validatePassword($data['password'], $data['password_confirm'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                addNewStudent($pdo, $data);
                session_destroy();
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['user'] =

                $sql = "SELECT id FROM student WHERE username = :username";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['username'=> $data['username']]);
                $id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['id'];
                header('Location: profile.php?user='. $id);
                unset($data);
                exit;

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
            //unset($data);
        }
    }

    function checkForErrors() : void{
        switch ($_GET) {
            case isset($_GET['p1']):
                echo "Password and password confirm do not match, please re-enter";
                break;
            case isset($_GET['p2']):
                echo "Username and password do not match, please try again";
                break;
            case isset($_GET['p3']):
                echo "You are not logged in, please log in first";
                break;
            default: echo "";
        }
    }

    function login(PDO $pdo, array $data) : void {
        if (!empty($data)){
            $sql = "SELECT password, id FROM student WHERE username = :username";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username'=> $data['username']]);
            //$passHash = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['password'];
            $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

            if (password_verify($data['password'], $loginData['password'])){
                //$id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['id'];
                //header('Location: profile.php?user='. $loginData['id']);
                $_SESSION['logged_in'] = true;
                header('location: index.php');
                exit;
            }else {
                $pwCheck = 0;
                header('Location: login.php?p2='. $pwCheck);
                exit;
            }
            //return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        }
    }

    function checkIfLoggedIn() : void{
        if (!$_SESSION['logged_in']) {
            header('Location: login.php?p3=0');
            exit;
        }
    }