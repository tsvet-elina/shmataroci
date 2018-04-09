<?php
const DB_NAME = "shmatki";
const DB_IP = "192.168.8.22";
const DB_PORT = "3306";
const DB_USER = "ittstudent";
const DB_PASS = "ittstudent-123";

$users = array();
$pdo = null;
try {

    $pdo = new PDO("mysql:host=" . DB_IP . ":" . DB_PORT . ";dbname=" . DB_NAME     . ';charset=utf8;',
        DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    echo "Problem with db query  - " . $e->getMessage();
}
