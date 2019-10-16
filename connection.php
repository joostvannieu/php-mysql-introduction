<?php
    function openConnection() : PDO {
        // Try to figure out what these should be for you
        $dbhost    = "localhost";
        $dbuser    = "root";
        $dbpass    = "junior";
        $db        = "becode";

        // Try to understand what happens here
        $pdo = new PDO('mysql:host='. $dbhost . ';dbname='. $db , $dbuser, $dbpass);

     // Why we do this here
     return $pdo;
    }

    function addNewStudent(PDO $pdo, array $data) : void
    {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO student (first_name, last_name, username, password, linkedin, github, email, preferred_language, 
                avatar, video, quote, quote_author) VALUES (:first_name, :last_name, :username, :password, :linkedin, :github, 
                :email, LOWER (:preferred_language), :avatar, :video, :quote, :quote_author)';
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
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
        $password = $data['password'];
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

    function fetchAllUsersInfo(PDO $pdo) : array {
        $sql = "SELECT first_name, last_name, email, preferred_language, id  FROM student";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function fetchUserInfo(PDO $pdo, int $userId) : array {
        $sql = "SELECT * FROM student WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id'=> $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    function printRows(array $data) : void{
        foreach ($data as $row){
            echo "<tr>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['preferred_language'] . "</td>
                    <td><a href='profile.php?user=" . $row['id'] . "'>My Page</a></td>
                </tr>";
        }
    }