<?php

require 'database.php';

$SQL = "SELECT * FROM user";
$statement = $db->query($SQL);
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="css/pico.min.css" />
    <link rel="stylesheet" href="css/icons.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
    <h1>Gestion des utilisateurs</h1>
    <div class="grid_header">
        <a class="icon-wrapper" href="create.php" data-tooltip="Ajouter un utilisateur (Soon)"><i class="gg-add"></i></a>
        <a class="icon-wrapper" href="https://www.google.com/" data-tooltip="Quitter le gestionnaire"><i class="gg-close-o"></i></a>
    </div>
    <br>

    <table class="striped">
        <thead data-theme="dark">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user){
        ?>
        <!-- Début user -->
        <tr>
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td>
                <div class="grid">
                    <a class="icon-wrapper" data-tooltip="Visualiser cette utilisateur" href="read.php?id=<?php echo $user['id'] ?>"> <i class="gg-search"></i></a>
                    <a class="icon-wrapper" data-tooltip="Modifier cette utilisateur (Soon)" href="update.php?id=<?php echo $user['id'] ?>"> <i class="gg-pen"></i></a>
                    <a class="icon-wrapper" data-tooltip="Supprimer cette utilisateur (Soon)" href="delete.php?id=<?php echo $user['id'] ?>"> <i class="gg-trash"></i></a>
                </div>

            </td>
        </tr>
        <!-- Fin user -->
        <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>