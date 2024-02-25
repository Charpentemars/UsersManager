<?php
global $db;
require 'database.php';

$name = $_POST['name'];
$email = $_POST['email'];
$role = $_POST['role'];

$sql = "INSERT INTO User (name, email, role_id) VALUES (:name, :email, :role)";
$statement = $db->prepare($sql);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':role', $role, PDO::PARAM_INT);

if ($statement->execute()) {
    $message = 'Votre utilisateur a bien été créé';
} else {
    $message = 'Une erreur est survenue lors de la création de votre utilisateur';
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Création d'un utilisateur</title>
    <link rel="stylesheet" href="css/pico.min.css" />
    <link rel="stylesheet" href="css/icons.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
    <h1>Création d'un utilisateur</h1>
    <div class="grid_header">
        <a class="icon-wrapper" href="index.php" data-tooltip="Retour à la liste des utilisateurs"><i class="gg-arrow-left-o"></i></a>
        <a class="icon-wrapper" href="https://www.google.com/" data-tooltip="Quitter le gestionnaire"><i class="gg-close-o"></i></a>
    </div>
    <br>
    <p><?php echo $message ?></p>
    <a href="index.php">Retour à la liste des utilisateurs</a>
</div>
</body>
</html>
