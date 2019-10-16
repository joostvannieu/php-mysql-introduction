<?php
    require "auth.php";

    var_dump($_POST);

    /*if (!empty($_POST)){
        processEmail($_POST);
        unset($_POST);
    }*/

    login($_POST);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<form action="login.php" method="POST">
    <fieldset>
        <legend>Login</legend>
        <label for="username">Username / E-mail</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Let me in">
    </fieldset>
    <div>

    </div>
</form>
</body>
</html>