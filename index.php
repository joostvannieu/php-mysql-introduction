<?php
    require "connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//$pdo = openConnection();
//$data = $pdo->query("SELECT * FROM student")->fetchAll(PDO::FETCH_ASSOC);
//var_dump($data);

function fetchAllUsersInfo(PDO $pdo){
    return $pdo->query("SELECT first_name, last_name, email, preferred_language, id  FROM student")->fetchAll(PDO::FETCH_ASSOC);
}

function printRows($data){
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

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overview</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>E-mail</th>
            <th>Language</th>
            <th>Page</th>
        </tr>
        <?php
            printRows(fetchAllUsersInfo(openConnection()));
        ?>
    </table>
</body>
</html>