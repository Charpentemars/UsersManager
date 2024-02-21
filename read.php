<?php

require 'database.php';

$sql = 'SELECT user.id, user.name, email, Role.name as Role FROM User INNER JOIN Role ON User.role_id = Role.id WHERE User.id =:id';


$statement = $db->prepare($sql);

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Visualisation de l'utilisateur</title>
    <link rel="stylesheet" href="css/pico.min.css" />
    <link rel="stylesheet" href="css/icons.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
    <h1>Visualisation de l'utilisateur</h1>
    <div class="grid_header">
        <a class="icon-wrapper" href="index.php" data-tooltip="Retour à la liste des utilisateurs"><i class="gg-arrow-left-o"></i></a>
        <a class="icon-wrapper" href="https://www.google.com/" data-tooltip="Quitter le gestionnaire"><i class="gg-close-o"></i></a>
    </div>
    <br>
    <div class="grid">
        <?php
        if ($user) {
        ?>
        <table class="striped">
            <thead data-theme="dark">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['Role'] ?></td>
            </tr>
            </tbody>
        </table>
        <?php }
        else{
            echo "Aucun utilisateur trouvé";
        }
        ?>
    </div>
</body>
</html>