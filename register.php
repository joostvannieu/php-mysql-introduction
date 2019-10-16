<?php
    require "auth.php";
    checkForErrors();
    //var_dump($_SESSION);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">Overview</a></li>
        <li><a href="register.php">Insert</a></li>
        <li><a href="#">Placeholder</a></li>
        <li><a href="#">Placeholder2</a></li>
    </ul>
</nav>
<form action="auth.php" method="POST">
    <fieldset>
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" required value="<?php echo $_SESSION['first_name'] ?>"><br>
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" id="last_name" required value="<?php echo $_SESSION['last_name'] ?>"><br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required value="<?php echo $_SESSION['username'] ?>"><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required><br>
        <label for="password_confirm">Password confirmation</label>
        <input type="password" name="password_confirm" id="password_confirm" required><br>
            <label for="linkedin">LinkedIn</label>
            <input type="url" name="linkedin" id="linkedin" value="<?php echo $_SESSION['linkedin'] ?>"><br>
        <label for="github">Github</label>
        <input type="url" name="github" id="github" value="<?php echo $_SESSION['github'] ?>"><br>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required value="<?php echo $_SESSION['email'] ?>"><br>
        <label for="preferred_language">Preferred Language</label>
        <input list="languages" name="preferred_language" value="<?php echo $_SESSION['preferred_language'] ?>"">
            <datalist id="languages">
                <option value="En">
                <option value="Nl">
                <option value="Fr">
            </datalist><br>
        <label for="avatar">Avatar</label>
        <input type="url" name="avatar" id="avatar" value="<?php echo $_SESSION['avatar'] ?>"><br>
            <label for="video">Video</label>
            <input type="url" name="video" id="video" value="<?php echo $_SESSION['video'] ?>"><br>
        <label for="quote">Quote</label>
        <textarea name="quote" id="quote" rows="4" cols="100" placeholder="<?php echo $_SESSION['quote'] ?>"></textarea><br>
            <label for="quote_author">Quote Author</label>
            <input type="text" name="quote_author" id="quote_author" value="<?php echo $_SESSION['quote_author'] ?>"><br>
        <br>
        <input type="submit" value="Register" name="register">
    </fieldset>
</form>
</body>
</html>
