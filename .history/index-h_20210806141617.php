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

try{
    // $pdo = new PDO($dsn, $user, $password);
    $pdo = new PDO($dsn, $user, $password, $options);
} catch(PDOException $e){
    echo "La connexion a échoué :" . $e->getMessage();
}
$req= "SELECT * FROM projet";
$query = $pdo->prepare($req);
$query->execute();
$projets = $query->fetchAll(PDO::FETCH_ASSOC);

/* echo "<pre>";
    print_r($projets);
echo "</pre>";*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue - Projets</title>
</head>
<body>
    <h1>Mes Projets</h1>

<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
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



<?php 
/* 
Etapes d'analyse de conception :
1- tables à créer ?     ->  table produits et table types
2- infos à conserver ?  ->  Produits : nom, image, description, type 

(le type est placé à l'exterieur de la table Produit pour assurer la
cohérence : si jamais transcriptions différentes des types. On peut mettre
le type dans la table Produits si on l'enregistre dans la BD mysql en tant 
qu'énumération "enum" comme varchar, int etc..ca permet d'avoir une liste de
valeur pour type définies à l'avance mais ç'est compliqué de le traiter en 
php : il faut créer des fonctions dédiées pour décomposer l'information. 
D'où l'interte d'utiliser une table dédiée pour type.)
                        -> Types : 

3- type de données ?
4- impact sur le code ?
*/
?>