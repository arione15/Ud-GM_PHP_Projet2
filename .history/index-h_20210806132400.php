<?php ob_start(); //NE PAS MODIFIER 
$titre = "Un catalogue de produits"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=catalogue;host=127.0.0.1';
$user = 'root';
$password = '';
try{
    $pdo = new PDO($dsn, $user, $password);
} catch(PDOException $e){
    echo "La connexion a échoué :" . $e->getMessage();
}
$req= "SELECT * FROM projet';


?>














<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
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