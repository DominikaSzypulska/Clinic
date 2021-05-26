<?php

session_start();

$host = "localhost";
$db_name = "dziennik";
$db_user = "root";
$db_password = "";

try {
    $dsn = 'mysql:host=' . $host . '; dbname=' . $db_name;
    $conn = new PDO($dsn, $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

define('ROOT_PATH', realpath(dirname(__FILE__)));
define('INCLUDE_PATH', realpath(dirname(__FILE__) . '/includes'));
define('BASE_URL', 'http://localhost/clinic/');

function getMultipleRecords($query, $params) {
    global $conn;
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll();
    $stmt->closeCursor();
    return $result;
}

function getSingleRecord($query, $params) {
    global $conn;
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result;
}

?>