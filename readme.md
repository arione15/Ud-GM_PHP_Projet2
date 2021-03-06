# Catalogue mes Projets

"Catalogue" est un site internet présentant les projets web que j'ai réalisés

## I. Environnement de développement

* PHP 7.4
* POO
* PDO
* mySQL

## II. Démarche
Créer 2 tables : `projet : idProjet, libelle, description, image, idType` et `type : idType, libelle` : faire la liaison entre le idType de la table projet et le idType de la table type -> 

## III. Points à retenir
 
1. faire le lien entre les `idType` : dans la table `projet` ajouter `FK_TYPE_PROJET` et renseigner le reste.

2. ajouter $options (dans $pdo) pour l'affichage des caractères spéciaux :
    ```php
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );
    try {
        //  $pdo = new PDO($dsn, $user, $password);
        $pdo = new PDO($dsn, $user, $password, $options);
    ```

3. la 2ème requête pour le type (qui est dans la table type) en faisant le lien avec la table projet :

    ```php
    $req2 = "SELECT * FROM type WHERE idType = :idType";
        $query = $pdo->prepare($req2);
        $query->bindValue(":idType", $projet["idType"], PDO::PARAM_INT);
        $query->execute();
        $type = $query->fetch(PDO::FETCH_ASSOC);
    ```

4. 
    ```php
    Etapes d'analyse de conception :
    1- tables à créer ?     ->  table produits et table types
    2- infos à conserver ?  ->  Produits : id, nom, image, description, type 

        (le type est placé à l'exterieur de la table Produit pour assurer la
        cohérence : si jamais transcriptions différentes des types. On peut mettre
        le type dans la table Produits si on l'enregistre dans la BD mysql en tant 
        qu'énumération `enum` comme `varchar`, `int` etc..ca permet d'avoir une liste de
        valeur pour type définies à l'avance mais ç'est compliqué de le traiter en 
        php : il faut créer des fonctions dédiées pour décomposer l'information. 
        D'où l'interte d'utiliser une table dédiée pour type.) On a une image pour chaque produit et un produit a une image donc on n'a pas besoin de faire une table `image`.
                            -> Types : id, libellé

    3- type de données ?
    4- impact sur le code ?

    ```