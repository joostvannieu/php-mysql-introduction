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

        $stmt->bindValue(':first_name', $data['first_name']);
        $stmt->bindValue(':last_name', $data['last_name']);
        $stmt->bindValue(':username', $data['username']);
        $stmt->bindValue(':password', $data['password']);
        $stmt->bindValue(':linkedin', $data['linkedin']);
        $stmt->bindValue(':github', $data['github']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':preferred_language', $data['preferred_language']);
        $stmt->bindValue(':avatar', $data['avatar']);
        $stmt->bindValue(':video', $data['video']);
        $stmt->bindValue(':quote', $data['quote']);
        $stmt->bindValue(':quote_author', $data['quote_author']);

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