<?php
    require "connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = openConnection();

$data = $pdo->query("SELECT * FROM student")->fetchAll(PDO::FETCH_ASSOC);
var_dump($data);
