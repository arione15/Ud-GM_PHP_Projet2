<?php ob_start(); //NE PAS MODIFIER 
$titre = "Un catalogue de produits"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=catalogue;host=127.0.0.1';
$user = 'root';
$password = '';

// Ajout d'options dans $pdo pour éviter le mauvais affichage des cractères accentués
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);

try {
    //  $pdo = new PDO($dsn, $user, $password);
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    echo "La connexion a échoué :" . $e->getMessage();
}
$req = "SELECT * FROM projet";
$query = $pdo->prepare($req);
$query->execute();
$projets = $query->fetchAll(PDO::FETCH_ASSOC);

/*  echo "<pre>";
    print_r($projets);
    echo "</pre>";
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Catalogue - Projets</title>
</head>

<body>
    <h1>Mes Projets</h1>

    <div class="row no-gutters">
        <?php foreach ($projets as $projet) : ?>
            <div class="col-4">
                <div class="card m-2">
                    <img src="./source/<?= $projet["image"] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $projet["libelle"] ?></h5>
                        <p class="card-text"><?= $projet["description"] ?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        <!-- Faire un badge à la palce du bouton-lien -->
                        <!-- Faire une une requête sur la table Type pour récuperer l'info de l'idType 
                    pas le idType lui-même qui n'est qu'un chiffre dans la table Projet -->
                        <?php
                        $req2 = "SELECT * FROM type WHERE idType = $projet["idType"]";
                        $query = $pdo->prepare($req2);
                        $query->bindValue(":idType", $projet["idType"], PDO::PARAM_INT);
                        $query->execute();
                        $type = $query->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <span class="badge badge-primary"><?= $type["libelle"] ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../../global/common/template.php";
?>
