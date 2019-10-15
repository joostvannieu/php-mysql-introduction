<?php
    require "connection.php";

    $userId = $_GET['user'];

    function fetchUserInfo(PDO $pdo, int $userId){
        return $pdo->query("SELECT * FROM student WHERE id = $userId")->fetchAll(PDO::FETCH_ASSOC);
    }

    $data = fetchUserInfo(openConnection(), $userId);
    var_dump($_GET);
    var_dump($data);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>

</body>
</html>