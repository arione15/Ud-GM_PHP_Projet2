<?php ob_start(); //NE PAS MODIFIER 
$titre = "Un catalogue de produits"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php


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

cohérence : si jamais transcriptions différentes des types. On peut mettre
(le type est placé à l'exterieur de la table Produit pour assurer la
comme varchar, int etc..ca permet d'avoir une liste de valeur pour type définies à l'avance
le type dans la table Produits si on l'enregistre dans la BD mysql en tant qu'énumération "enum"
                            mais ç'est compliqué de le traiter ne php : il faut créer des fonctions dédiées pour décomposer l'information)
                            Types : 

3- type de données ?
4- impact sur le code ?
*/
?>