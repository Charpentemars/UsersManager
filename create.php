<?php
global $db;
require 'database.php';

$sql = "SELECT * FROM Role";
$statement = $db->query($sql);
$roles = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
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
    <form action="create_submit.php" method="post">
        <div class="form-group">
            <label for="name">Nom et prénom</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="role">Rôle</label>
            <select id="role" name="role" required>
                <option value="" selected>Sélectionner un rôle</option>
                <?php
                foreach ($roles as $role){
                ?>
                <option value="<?php echo $role['id']?>"><?php echo $role['name'] ?></option>
                <?php
                }
                ?>
            </select>
            <button class="primary" type="submit">Créer</button>
        </div>
</div>
</body>
</html>

