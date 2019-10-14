<?php
    require "connection.php";

    var_dump($_POST);

    /*
    $stmt = $pdo->prepare("INSERT INTO student     (first_name, 
                                                            last_name, 
                                                            username, 
                                                            linkedin, 
                                                            github, 
                                                            email,
                                                            preferred_language,
                                                            avatar,
                                                            video,
                                                            quote,
                                                            quote_author)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['first-name'],
                    $_POST['last-name'],
                    $_POST['username'],
                    $_POST['linkedin'],
                    $_POST['github'],
                    $_POST['email'],
                    $_POST['pref-lang'],
                    $_POST['avatar'],
                    $_POST['video'],
                    $_POST['quote'],
                    $_POST['author']
    ]);
    $stmt = null;
    */

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
<form action="insert.php" method="post">
    <fieldset>
        <label for="first-name">First name</label>
        <input type="text" name="first-name" id="first-name" required><br>
        <label for="first-name">Last name</label>
        <input type="text" name="last-name" id="last-name" required><br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required><br>
        <label for="linkedin">LinkedIn</label>
        <input type="text" name="linkedin" id="linkedin"><br>
        <label for="github">Github</label>
        <input type="text" name="github" id="github"><br>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required><br>
        <label for="pref-lang">Preferred Language</label>
        <input list="languages" name="pref-lang">
            <datalist id="languages">
                <option value="En">
                <option value="Nl">
                <option value="Fr">
            </datalist><br>
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar"><br>
        <label for="video">Video</label>
        <input type="url" name="video" id="video"><br>
        <label for="quote">Quote</label>
        <textarea name="quote" id="quote" rows="4" cols="100"></textarea><br>
        <label for="author">Quote Author</label>
        <input type="text" name="author" id="author">
        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>
</body>
</html>
