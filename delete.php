<?php
global $db;
require 'database.php';

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if ($id === false) {
    die('Invalid user ID');
}

$sql = 'SELECT user.id, user.name, email, Role.name as Role FROM User INNER JOIN Role ON User.role_id = Role.id WHERE User.id =:id';
$statement = $db->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $sql = 'DELETE FROM User WHERE id =:id';
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $result = $statement->execute();

    if ($result === false) {
        die('Failed to delete user');
    }

    header('Location: index.php');
} else {
    header('Location: index.php');
}
?>