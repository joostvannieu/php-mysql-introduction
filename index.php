<?php
    require "connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//$pdo = openConnection();
//$data = $pdo->query("SELECT * FROM student")->fetchAll(PDO::FETCH_ASSOC);
//var_dump($data);

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
    <nav>
        <ul>
            <li><a href="index.php">Overview</a></li>
            <li><a href="register.php">Insert</a></li>
            <li><a href="#">Placeholder</a></li>
            <li><a href="#">Placeholder2</a></li>
        </ul>
    </nav>
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