<?php
$db_name = 'your_db_name';
$user='your_user';
$pass='your_password';
$host='your_host';

try {
    $db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    print "Erreur : " . $e->getMessage();
}
