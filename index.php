<?php
global $db;
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
                    <a class="icon-wrapper" data-tooltip="Supprimer cette utilisateur" data-target="modal-delete" data-id="<?php echo $user['id']; ?>" onclick="toggleModal(event, <?php echo $user['id']; ?>)"> <i class="gg-trash"></i></a>
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
<dialog id="modal-delete">
    <article>
        <header>
            <button
                    aria-label="Close"
                    rel="prev"
                    data-target="modal-delete"
                    onclick="toggleModal(event)"
            ></button>
            <h3>Suppression de l'utilisateur</h3>
        </header>
        <p>
            Êtes-vous sûr de vouloir supprimer cette utilisateur ?<br>Cette action est irréversible.
        </p>
        <footer>
            <button role="button" class="secondary" data-target="modal-delete" onclick="toggleModal(event)">Annuler</button>
            <a href="delete.php?id=<?php echo $user['id'] ?>" role="button" class="primary">Supprimer</a>
        </footer>
    </article>
</dialog>
<script src="js/modal.js"></script>
</body>
</html>