<?php
    require "connection.php";

    //var_dump($_POST);

    function addNewStudent(PDO $pdo, $data)
    {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO student (first_name, last_name, username, linkedin, github, email, preferred_language, avatar, video, quote, quote_author) VALUES (:first_name, :last_name, :username, :linkedin, :github, :email, :preferred_language, :avatar, :video, :quote, :quote_author)';
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':linkedin', $linkedin);
        $stmt->bindParam(':github', $github);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':preferred_language', $preferred_language);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':video', $video);
        $stmt->bindParam(':quote', $quote);
        $stmt->bindParam(':quote_author', $quote_author);

        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $username = $data['username'];
        $linkedin = $data['linkedin'];
        $github = $data['github'];
        $email = $data['email'];
        $preferred_language = $data['preferred_language'];
        $avatar = $data['avatar'];
        $video = $data['video'];
        $quote = $data['quote'];
        $quote_author = $data['quote_author'];

        $stmt->execute();
        $stmt = null;

    }

    if (!empty($_POST)){
        addNewStudent(openConnection(), $_POST);
        unset($_POST);
    }


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
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" required><br>
        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" required><br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required><br>
        <label for="linkedin">LinkedIn</label>
        <input type="text" name="linkedin" id="linkedin"><br>
        <label for="github">Github</label>
        <input type="text" name="github" id="github"><br>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required><br>
        <label for="preferred_language">Preferred Language</label>
        <input list="languages" name="preferred_language">
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
        <label for="quote_author">Quote Author</label>
        <input type="text" name="quote_author" id="quote_author">
        <br><br>
        <input type="submit" value="Save">
    </fieldset>
</form>
</body>
</html>
